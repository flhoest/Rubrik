<?php

	// Include section
	include_once "rkFramework.php";

	// Rubrik cluster connection settings
	$clusterConnect=array(
		"username" => "User:::FFFFFF999999",
		"password" => "XKZGDdKEET8KLTmqlkdsjfmlkqjdsmflkjqsdmflkjqmslkdfjmqsldkfj",
		"ip" => "1.2.3.4"	
	);	
	
	// ----------------------------------------------------------
	// Function who create a token based on service account creds
	// ----------------------------------------------------------
	
	function rkGetServiceAccountToken($clusterConnect)
	{
		$API="/api/v1/service_account/session";

		$config_params="
		{
  			\"serviceAccountId\": \"".$clusterConnect["username"]."\", 
  			\"secret\": \"".$clusterConnect["password"]."\"
  		}
		";

		$curl = curl_init();
   		
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS,$config_params);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($config_params),'Accept: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		$result = json_decode(curl_exec($curl));
		curl_close($curl);

		return($result->token);
	}

	// ---------------------------------------------------------------
	// Function who delete the secure token session from the appliance
	// ---------------------------------------------------------------

	function rkDelServiceAccountToken($clusterConnect)
	{
		$API="/api/v1/session/me";

		$curl = curl_init();
   	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$clusterConnect["token"]));

		$result = json_decode(curl_exec($curl));
		$info=curl_getinfo($curl,CURLINFO_HTTP_CODE);

		curl_close($curl);

		// Return code wheen successful is 204
		if($info==204) return TRUE;
		else return FALSE;

	}

	// ----------------------------------------------------------------------------------------------
	// Function who retrieve upgrade history of a cluster - adjusted to use the service account token
	// ----------------------------------------------------------------------------------------------

	function rktGetUpgradeHistory($clusterConnect)
	{
		$API="/api/v1/config/history/list_updates?namespace=local_atlas&source=Upgrade";

		$curl = curl_init();

		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}
		
		$result=curl_exec($curl);
		$result=json_decode($result);
		curl_close($curl);

		$history=$result;

		$upgradesHistory=array();
		for($i=0;$i<count($history->data);$i++)
		{
			// cleanup date/time format
			$dateTime=$history->data[$i]->modifiedDateTime;
			// Remove last 7 characters -> 2021-06-30T10:08:12.269Z and add 00 sec
			$dateTime=substr($dateTime, 0, -7);
			$dateTime=$dateTime."00";
			$dateTime=rkGetHumanTime($dateTime);
	
			// cleanup version number
			$version=$history->data[$i]->configChangeMetadata;
			$version=substr($version,strpos($version,"tarball_version")+18,strlen($version));
			$version=str_replace(array("\"","}"),"",$version);
	
			$upgradesHistory[$i]=$dateTime."|".$version;
		}

		return(array_values(array_unique($upgradesHistory)));	
	}

	// ===========================================
	// Main Entry Point
	// ===========================================

	// Note : authentication for issuing any API call must be done using the "bearer <token>" format rather than using <username> <password> anymore 
	// Example, retieving cluster upgrade history : 

	$authToken=rkGetServiceAccountToken($clusterConnect);
	$clusterConnect["token"]=$authToken;
	print("Session started -> ".$authToken."\n");

	var_dump(rktGetUpgradeHistory($clusterConnect));

	$deleted=rkDelServiceAccountToken($clusterConnect,$clusterConnect["token"]);
	if($deleted) print("Session cleaned up.\n\n");
	else print("Session was not deleted successfully, please check CDM logs");

?>
