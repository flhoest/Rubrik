<?php

	// Include section
	include_once "rkFramework.php";
	
	// Rubrik Appliance

	$clusterConnect=array(
		"username" => "username",
		"password" => "password",
		"ip" => "a.b.c.d",
	);	
	
	$upgrade=rkGetUpgradeHistory($clusterConnect);
	
	$title="Rubrik Upgrade history for cluster ".rkColorOutput($clusterConnect["ip"]);
	print("\n".$title."\n");
	for($i=0;$i<strlen($title)-11;$i++) print("-");
	print("\n");
	
	for($i=0;$i<count($upgrade);$i++)
	{
		$tmp=explode("|",$upgrade[$i]);
		print("On ".rkColorOutput($tmp[0])." cluster was upgraded to version ".rkColorOutput($tmp[1]));
		print("\n");
	}
	print("\n");

?>
