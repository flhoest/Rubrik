<?php
	include_once "rkFramework.php";
                            
	$rkEdge=array(
				0=>"10.0.2.10"
	);

	// List all DB required to dump to disk
	
	$DBs=array(
		0 => array(
				"sourceRubrik" => $rkEdge[0],
				"hostName" => "sql-s1.rubrik.lab",
				"instanceName" => "MSSQLSERVER",  
				"dbName" => "AdventureWorks"
				),
		1 => array(
				"sourceRubrik" => $rkEdge[0],
				"hostName" => "sql-s1.rubrik.lab",
				"instanceName" => "MSSQLSERVER",
				"dbName" => "model"
				)				
			);

	$DBs=array_values($DBs);                            

	// For Windows only
	// GNU Wget for Windows is required for this script to work -> https://eternallybored.org/misc/wget/
	$wgetPath="C:\\";

	// Detects what OS the script is running on. Either Windows or Linux family	
	$os=PHP_OS;

	if($os=="WINNT" && !file_exists($wgetPath."wget.exe"))
	{
		print(rkColorRed("ERROR, WGET.EXE not found in ".$wgetPath.".\n\n"));
		exit();
	} 	
			
	// ------------------ New function ----------------------

	function rkDownloadSQLSnap($clusterConnect,$sqlHostName,$sqlInstanceName,$sqlDBName,$targetPath)
	{
		global $os,$wgetPath;
		
		// Get MSSQLID

		$mssqlInstanceID=rkGetMSSQLInstanceID($clusterConnect,$sqlInstanceName,$sqlHostName);
		$msSQLID=rkGetMSSQLdbID($clusterConnect,$mssqlInstanceID,$sqlDBName);

		// Get last recovery point 

		$recoveryPoint=rkGetMSSQLLastRecoveryPoint($clusterConnect,$msSQLID)->date;	
		$timeStamp=rkGetTimeStamp($recoveryPoint)."000";

		// Restore Post configuration
		
		$config_params="{
					  \"recoveryPoint\": {
    				  \"timestampMs\": ".$timeStamp."
  						}
					}";
					
		// API to issue download of data
	
		$API="/api/v1/mssql/db/".urlencode($msSQLID)."/download_files";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS,$config_params);
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: '.strlen($config_params),'Accept: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		$result = json_decode(curl_exec($curl));
		$info=curl_getinfo($curl,CURLINFO_HTTP_CODE);
		curl_close($curl);

		$eventID=$result->id;

		// Loop until status = succeeded
		$success=FALSE;
		$url="";
		
		print("Preparing file for download ... ");

		while (!$success)
		{
			// Check in event log until status == SUCCEEDED and then read download URL 
			$API="/api/v1/mssql/request/".urlencode($eventID);

			$curl = curl_init();
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			$result = json_decode(curl_exec($curl));
			curl_close($curl);

			print(str_pad ($result->status, 10 ," ", STR_PAD_RIGHT));
			echo "\033[10D";

			if($result->status=="SUCCEEDED")
			{
				$success=TRUE;
				$url=$result->links[1]->href;
			}

			// Wait 1 sec to avoid bombing the API endpoint
			sleep(1);
		}

		// download files according to $url 

		if($os=="WINNT")
		{
			// Windows does not support ":" as part of the file name, change with "_"
			//$tempFileName=str_replace(":","_",$eventID);
			print(rkColorOutput('Done!      '));
			print("\nWriting files to disk ... ");
			system($wgetPath."wget.exe -q --no-check-certificate -O ".$targetPath."\\".$sqlHostName."-".$sqlInstanceName."-".$sqlDBName.".zip ".$url." > NULL");
			print(rkColorOutput('Done!      '));
			print("\nFile ".rkColorOutput($targetPath."\\".$sqlHostName."-".$sqlInstanceName."-".$sqlDBName.".zip")." saved to disk.\n\n");
		}	
		else
		{
			// If not Windows, we are in UNIX Family so we are using /
			print(rkColorOutput('Done!      '));
			print("\nWriting files to disk ... ");
			system("wget -q --no-check-certificate -O ".$targetPath."/".$sqlHostName."-".$sqlInstanceName."-".$sqlDBName.".zip ".$url." > /dev/null");
			print(rkColorOutput('Done!      '));
			print("\nFile ".rkColorOutput($targetPath."/".$sqlHostName."-".$sqlInstanceName."-".$sqlDBName.".zip")." saved to disk.\n\n");
		}	
		return $url;
	}

	// ===============================================================
	// Main entry point
	// ===============================================================

	print("\n\nDownloading MS SQL DB Files\n");
	print("===========================\n\n");
	
	$countDB=count($DBs);

	for($i=0;$i<$countDB;$i++)
	{
		$step=$i+1;
		print("(".rkColorOutput($step)."/".rkColorOutput($countDB).") - Working on ".rkColorOutput($DBs[$i]["hostName"]." - ".$DBs[$i]["instanceName"]." - ".$DBs[$i]["dbName"])."\n");
		// construct clusterConnect
		
		$clusterConnect=array(
						"username" => "user",
						"password" => "password",
						"ip" => $DBs[$i]["sourceRubrik"]
                            );
                            
		rkDownloadSQLSnap($clusterConnect,$DBs[$i]["hostName"],$DBs[$i]["instanceName"],$DBs[$i]["dbName"],getcwd());
	}

?>
