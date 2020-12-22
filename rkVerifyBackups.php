<?php

	//////////////////////////////////////////////////////////////////////////////
	//            Rubrik Php backup verifier - rkVerifyBackups.php v 1.0         //
	//                        (c) 2020 - F. Lhoest                              //
	//////////////////////////////////////////////////////////////////////////////
	
	/*				__________        ___.            .__  __    
					\______   \ __ __ \_ |__  _______ |__||  | __
					 |       _/|  |  \ | __ \ \_  __ \|  ||  |/ /
					 |    |   \|  |  / | \_\ \ |  | \/|  ||    < 
					 |____|_  /|____/  |___  / |__|   |__||__|_ \
						\/             \/                  \/	
	*/

	// This script verifies the snapshot integrity of a given object It currently
	// supports vmware VMS, Nutanix AHV VMs and Filesets. More objects to come

	// Include section
	include_once 'rkFramework.php';
	include_once 'rkCredentials.php';

	$tempFolder=sys_get_temp_dir();

	$object="Centos-vm1";
	//$object="Win10-vm1";
	
	// Detects what OS the script is running on. Either Windows or Linux family	
	$os=PHP_OS;

	// For Windows only
	// GNU Wget for Windows is required for this script to work -> https://eternallybored.org/misc/wget/
	
	$wgetPath="C:\\";

	if($os=="WINNT" && !file_exists($wgetPath."wget.exe"))
	{
		print(rkColorRed("ERROR, WGET.EXE not found in ".$wgetPath.".\n\n"));
		exit();
	} 	
	
	// ===========================================
	// Main entry point
	// ===========================================

	print("\n\n\n\n===============================\n");
	print(" Rubrik Backup Integrity Check\n");
	print("=======================v 1.1===\n\n");

	$objectID=rkObjectNametoID($clusterConnect,$object);
	print("Target Object : ".rkColorOutput($object)." (ID : ".rkColorOutput($objectID).")\n");

	// If snapshot ID has been specify, use it, either the last available snap for object will be selected by default
	if (isset($snapID))
	{
		print("Target Snapshot : ".rkColorOutput($snapID)."\n");
		$eventID=rkStartIntegrityChk($clusterConnect,$objectID,$snapID)->id;
	} 
	else $eventID=rkStartIntegrityChk($clusterConnect,$objectID)->id;

	$success=FALSE;
	$url="";
	print("Checking .... ");

	// Loop until status = succeeded
	// Check in event log until status == SUCCEEDED and then read download URL 

	while (!$success)
	{
		$result=rkIntegrityResult($clusterConnect,$eventID);
		if(isset($result->progress)) print(str_pad(rkColorOutput(round($result->progress,1)."%"), 20 ," ", STR_PAD_RIGHT));

		if($result->status=="SUCCEEDED")
		{
			$success=TRUE;
			$url=$result->links[1]->href;
		}
		// Wait 1 sec to avoid bombing/DDoS the API endpoint :)
		sleep(1);
		echo "\033[9D";
	}
		
	print(rkColorOutput("\nDone!      \n"));

	if($os=="WINNT")
	{
		// Windows does not support ":" as part of the file name, change with "_"
		$tempFileName=str_replace(":","_",$eventID);
		system($wgetPath."wget.exe -q --no-check-certificate -O ".$tempFolder."\\".$tempFileName." ".$result->links[1]->href." > NULL");
		$content=file_get_contents($tempFolder."\\".$tempFileName);
		system("del ".$tempFolder."\\".$tempFileName);
	}	
	else
	{
		// If not Windows, we are in UNIX Family so we are using /
		system("wget -q --no-check-certificate -O ".$tempFolder."/".$eventID." ".$result->links[1]->href." > /dev/null");
		$content=file_get_contents($tempFolder."/".$eventID);
		system("rm ".$tempFolder."/".$eventID);
	}	
	
	// Compute time taken to verify snapshot
	$startTime=$result->startTime;
	$endTime=$result->endTime;

	$dateFormat='H:i:s';
	$startTS=rkGetTimeStamp($startTime);
	$endTS=rkGetTimeStamp($endTime);
	$duration=$endTS-$startTS;
	$duration=date($dateFormat,$duration);	

	$tmp=explode(",",$content);
	$integrityStatus=str_replace("\"","",$tmp[16]);
	$objectName=str_replace("\"","",$tmp[11]);
	
	print("Object ".rkColorOutput($objectName)." integrity check is ".rkColorOutput($integrityStatus."\n"));
	print("Backup verified in ".rkColorOutput($duration)." (hh:mm:ss)\n\n");
?>
