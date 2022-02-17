<?php
	// Include section
	include_once "rkFramework.php";

	// Rubrik cluster connection settings
	$clusterConnect=array(
		"username" => "username",
		"password" => "password",
		"ip" => "192.168.1.2"
	);	
	
	// =====================================================================
	// Main entry point
	// =====================================================================

	// First thing first, check access to cluster (both network and credentials)	
	if(rkCheckAccess($clusterConnect)!= "ok")
	{
		print(rkColorRed("\n/!\ Error, cluster connection failed (nework or credentials).\n\n"));
		exit();
	}

	// Ok, we can connect on the cluster, let's check the syntax now

	// If SLA is provided on command line
	if(isset($argv[1]))
	{
		if($argv[1]=="--list")
		{
			// list all available SLA defined on cluster for reference and exit.
			$SLA=rkGetSLAs($clusterConnect);
			print("\n".rkColorOutput("Available SLA on this cluster are :")." \n\n");
			for($i=0;$i<count($SLA);$i++)
			{
				print("\t".$SLA[$i]["name"]."\n");
			}
			print("\nYou may choose from one of the above SLAs.\n\n");
			exit();
		}
		// Check if SLA is defined on cluster
		
		$SLAs=rkGetSLAs($clusterConnect);
 
 		// Check if provided SLA exists on cluster
 		$found=0;
		for($i=0;$i<count($SLAs);$i++)
		{
			if($SLAs[$i]["name"]==trim($argv[1])) $found=1;
		}
		if($found) print("SLA ".rkColorOutput($argv[1])." is found in the cluster\n");
		else
		{
			print(rkColorRed("/!\ Error!")."\n");
			print("SLA ".rkColorOutput($argv[1])." not found, aborting.\n\n");
			exit();
		}
		
		// Get SLA ID from name
		$slaID=rkGetSLAid($clusterConnect,$argv[1]);

		// Searching for unprotected VMs
		print("Searching for ".rkColorOutput("Unprotected VMs").".... ");

		// Get list of all VMs
		$VMs=rkGetAllVMs($clusterConnect);
		print(rkcolorOutput(count($VMs))." were found.\n");
		print("\n");
		
		$applied=0;
		// For each VM, if no SLA applied, ask if the argument SLA must be applied Y/N
		for($i=0;$i<count($VMs);$i++)
		{
			if($VMs[$i]["sla"]=="Unprotected")
			{
				print("Do you want SLA ".rkColorOutput($argv[1])." to be applied to VM ".rkColorOutput($VMs[$i]["name"])." ? ");
				$key=readline("(y/n/q) ");
			
				switch($key)
				{
					case "y":
						print("Applying SLA ".rkColorOutput($argv[1])." to VM ".rkColorOutput($VMs[$i]["name"]));
						rkSetSLA($clusterConnect,$VMs[$i]["vmid"], $slaID);
						print(" - Done.\n");
						$applied++;
						break;
						
					case "n":
						print("No SLA will be applied, skipping\n");
						break;

					case "q":
						print("\nStop requested.\n");
						print("\nTotal of ".rkColorOutput($applied)." VM(s) have been applied with SLA ".rkColorOutput($argv[1])."\n");
						exit();
						break;
				}
			}
		}

		print("\nProcess ended.");
		print("\nTotal of ".rkColorOutput($applied)." VM(s) have been applied with SLA ".rkColorOutput($argv[1])."\n");
	}
	else
	{
		print(rkColorOutput("\n/!\ Warning, you must specify a valid SLA name as argument, or --list for listing existing SLAs.\n\n"));
		print("  Syntax : \tphp rkProtect.php <SLA Name>\n");
		print("      or : \tphp rkProtect.php --list\n\n");
		print("Examples : \tphp rkProtect.php \"first level\"\n");
		print("      or\tphp rkProtect.php mySla\n\n");
	}

?>
