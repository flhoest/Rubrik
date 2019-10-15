#!/usr/bin/php
<?php

	//////////////////////////////////////////////////////////////////////////////
	//                   Rubrik Php User Management version 1.0                 //
	//                     (c) 2018, 2019 - F. Lhoest                           //
	//////////////////////////////////////////////////////////////////////////////
	//                      Created on OS X with BBEdit                         //
	//////////////////////////////////////////////////////////////////////////////
	
	/*				__________        ___.            .__  __    
					\______   \ __ __ \_ |__  _______ |__||  | __
					 |       _/|  |  \ | __ \ \_  __ \|  ||  |/ /
					 |    |   \|  |  / | \_\ \ |  | \/|  ||    < 
					 |____|_  /|____/  |___  / |__|   |__||__|_ \
				 		\/             \/                  \/
	*/

	// ----------------------------------------------
	// Includes
	// ----------------------------------------------

	include_once "rkCredentials.php";
	include_once "rkFramework.php";

	// ==========================
	// Local functions
	// ==========================

	// ----------------------------------------------

	function getObscuredText($strMaskChar='*')
    {
        if(!is_string($strMaskChar) || $strMaskChar=='')
        {
            $strMaskChar='*';
        }
        $strMaskChar=substr($strMaskChar,0,1);
        readline_callback_handler_install('', function(){});
        $strObscured='';
        while(true)
        {
            $strChar = stream_get_contents(STDIN, 1);
            $intCount=0;
            
			// Protect against copy and paste passwords
			// Comment \/\/\/ to remove password injection protection
            $arrRead = array(STDIN);
            $arrWrite = NULL;
            $arrExcept = NULL;

            while (stream_select($arrRead, $arrWrite, $arrExcept, 0,0) && in_array(STDIN, $arrRead))            
            {
                stream_get_contents(STDIN, 1);
                $intCount++;
            }

			//        /\/\/\
			// End of protection against copy and paste passwords
            if($strChar===chr(10))
            {
                break;
            }
            if ($intCount===0)
            {
                if(ord($strChar)===127)
                {
                    if(strlen($strObscured)>0)
                    {
                        $strObscured=substr($strObscured,0,strlen($strObscured)-1);
                        echo(chr(27).chr(91)."D"." ".chr(27).chr(91)."D");
                    }
                }
                elseif ($strChar>=' ')
                {
                    $strObscured.=$strChar;
                    echo($strMaskChar);
                    //echo(ord($strChar));
                }
            }
        }
        readline_callback_handler_remove();
        return($strObscured);
    }

	// ----------------------------------------------

	function syntaxError()
	{
		global $argv;
		
		print("\n\n========================================\n");
		print(rkColorRed("Syntax error")." : ".rkColorOutput("min 2 keywords are required!"));
		print("\n========================================\n\n");
		print($argv[0]." [ACTION] [ClusteName] [UserName]\n");
// 		print($argv[0]." [cluster_name]\n\n");
		print("\tAction can be : add, del, list\n");
// 		print("\tCluster name can be : BE, UK, US, ...\n\n");
		print(rkColorOutput("Example: \t".$argv[0]." add US flhoest")."\n");
		print(rkColorOutput("Example: \t".$argv[0]." list BE ")."\n\n");
		print("Note : keywords are case insensitive.\n\n");
		print("Ended.\n\n");
		exit();
	}

	// ----------------------------------------------
	
	function isStrongPassword($password)
	{
		// Validate password strength
		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number    = preg_match('@[0-9]@', $password);
		$specialChars = preg_match('@[^\w]@', $password);

		if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) 
		{
			return "no";
		}
		else
		{
			return "yes";
		}	
	}	

	// ==============================================
	// Main entry point
	// ==============================================
	
	if(   (count($argv)==3) || (count($argv)==4)     ) 
	{
		$action=$argv[1];
		$cluster=$argv[2];
		if(isset($argv[3])) $user=$argv[3];
		
		switch(strtoupper($action))
		{
			case "ADD":
				print("Creating user ".rkColorOutput($user)." in ".rkColorOutput($cluster)."\n");
				print("Password : ");		
				$password=getObscuredText();

				// Check if password is strong
				if(isStrongPassword($password))
				{
					// Add user into the $user cluster
					// Parse $clusterConnect until "cluster" = $cluster
					for($i=0;$i<count($clusterConnect);$i++)
					{
						if($clusterConnect[$i]["cluster"]==strtoupper($cluster))
						{
							print("\n");
							$connect["ip"]=$clusterConnect[$i]["ip"];
							$connect["username"]=$clusterConnect[$i]["username"];
							$connect["password"]=$clusterConnect[$i]["password"];
						}
					}

					if(isset($connect))
					{
						// Cluster found in credential file, adding user now
						$res=rkCreateUser($connect,$user,$password);
						if(isset($res->id)) 
						{
							$newID=$res->id;
							print("User has been created (id=".rkColorOutput($newID).")\n");
							// Set admin right on user
							$res=rkMakeAdminUser($connect,$newID);
							if(isset($res->total))
							{
								print("User has been granted with admin rights.\n");
							}
							else
							{
								print("Cannot make user admin at this time.\n");
							}
						}
						else print("User has not been created!\n");
					}
					else
					{
						print("\nCluster ".rkColorRed(strtoupper($cluster))." not found!\n");
					}
				}
				break;

			case "DEL":
				print("deleting user ".rkColorOutput($user)." in ".rkColorOutput(strtoupper($cluster))."\n");

				// Get cluster connection info based on requested cluster in command line
				for($i=0;$i<count($clusterConnect);$i++)
				{
					if($clusterConnect[$i]["cluster"]==strtoupper($cluster))
					{
						$connect["ip"]=$clusterConnect[$i]["ip"];
						$connect["username"]=$clusterConnect[$i]["username"];
						$connect["password"]=$clusterConnect[$i]["password"];
					}
				}

				if(isset($connect))
				{
					// Cluster found in credential file, deleting user now
					$userID=rkGetUserID($connect,$user);
					if($userID==NULL)
					{
						print("User not found. Exiting.\n");
						exit();
					}

					$res=rkDeleteUser($connect,$userID);
					if($res=="OK") 
					{
						print("User has been deleted\n");
					}
					else print("User has not been deleted!\n");
				}
				else
				{
					print("\nCluster ".rkColorRed(strtoupper($cluster))." not found!\n");
				}
				break;
				
			case "LIST":
				print("Listing users in ".rkColorOutput(strtoupper($cluster))."\n");
				// Get cluster connection info based on requested cluster in command line
				for($i=0;$i<count($clusterConnect);$i++)
				{
					if($clusterConnect[$i]["cluster"]==strtoupper($cluster))
					{
						$connect["ip"]=$clusterConnect[$i]["ip"];
						$connect["username"]=$clusterConnect[$i]["username"];
						$connect["password"]=$clusterConnect[$i]["password"];
					}
				}

				if(isset($connect))
				{
					// Cluster found in credential file, listing users now
					$res=rkGetUsers($connect);
					print("\n");
					
					for($i=0;$i<count($res);$i++)
					{
						print("Username : \t".rkColorOutput($res[$i]->username)."\n");
						print("ID : \t\t".rkColorOutput($res[$i]->id)."\n");
						print("\n");
					}
					print("Listing completed.\n");
				}
				else
				{
					print("\nCluster ".rkColorRed(strtoupper($cluster))." not found!\n");
				}
				break;
				
			default:
				print("Error, wrong action keyword\n");
				syntaxError();
		}
	}
	else
	{
		syntaxError();
	}
?>
