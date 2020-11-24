<?php
	// Include section
	include_once 'rkFramework.php';

	// Initialisation section
	$clusterConnect=array(
		"username" => "username",
		"password" => "password",
		"ip" => "<cluster ip>"
	);

	$objectID="NutanixVirtualMachine:::86be7f0c-2b98-4e03-93d9-57f06e419eb7-vm-c1dd1716-7d54-4121-9434-1a12ea0fb37e";
	$snapID="26eba277-8eee-4c7e-9c12-9671a82367a6";
	$tempFolder=sys_get_temp_dir();
		
	// ===========================================
	// Main entry point
	// ===========================================

	print("\n===============================\n");
	print(" Rubrik Backup Integrity Check\n");
	print("=======================v 1.0===\n\n");

	print("Target Object : ".rkColorOutput($objectID)."\n");

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

	system("wget -q --no-check-certificate -O ".$tempFolder."/".$eventID." ".$result->links[1]->href." > /dev/null");
	$content=file_get_contents($tempFolder."/".$eventID);
	system("rm ".$tempFolder."/".$eventID);

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
