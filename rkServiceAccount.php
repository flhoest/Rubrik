<?php

	// Include section
	include_once "rkFramework.php";

	// Rubrik cluster connection settings
	$clusterConnect=array(
		"username" => "User:::c72[...]be5a-d365eb6ca2cc",
		"password" => "XKZGDdKffffff999999999ffffff99999",
		"ip" => "1.2.3.4"	
	);	
	
	// ===========================================
	// Main Entry Point
	// ===========================================

	// Note : authentication for issuing any API call must be done using the "bearer <token>" format rather than using <username> <password> anymore 
	// Example, retieving cluster upgrade history : 

	$authToken=rkGetServiceAccountToken($clusterConnect);
	
	if($authToken) $clusterConnect["token"]=$authToken;
	else
	{
		print("Error accessing cluster, check credentials.\n\n");
		exit();
	}
	print("Session started -> ".$authToken."\n");

	var_dump(rkGetUpgradeHistory($clusterConnect));

	$deleted=rkDelServiceAccountToken($clusterConnect,$clusterConnect["token"]);

	if($deleted) print("Session cleaned up.\n\n");
	else print("Session was not deleted successfully, please check CDM logs");

?>
