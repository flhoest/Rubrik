<?php

	///////////////////////////////////////////////////////////////////
	// Includes section
	///////////////////////////////////////////////////////////////////
	
	include_once "includes/rkClusters.php";
	include_once "includes/rkFramework.php";

	///////////////////////////////////////////////////////////////////
	// Init section
	///////////////////////////////////////////////////////////////////

	// Generic parameters
	date_default_timezone_set('UTC');

	// Current version number
	$ver="0.7";

	// Number of event to retrieve
	$num_events=30;
	
	// Specify favicon
	$favicon="includes/rubrik.ico";
	
	// Specify Company logo
	$logo="includes/company.jpg";
	
	// Applicatioin main title
	$appTitle="Clusters Overview";

	///////////////////////////////////////////////////////////////////
	// Specific functions
	///////////////////////////////////////////////////////////////////

	// Add button providing target and button text

	function addButton($location,$text)
	{
            print("<button class=\"btn btn-default btn-sm\" type=\"button\" onclick=\"window.location.href='".$location."'\">".$text."</button>");
	}

	// Add back button

	function addBackButton()
	{
            print("<button class=\"btn btn-default btn-sm\" type=\"button\" onclick=\"javascript:history.go(-1)\">< Back</button>");
	}

	// Add page header

	function addHeader()
	{
		GLOBAL $logo;
		
		print("<table class=\"table table-borderless\"   style=\"margin-bottom: 0px;\">");
		print("<tr style=\"vertical-align:bottom;\">");
		// insert company logo here
		print("<td style=vertical-align:bottom !important;\"><img src=\"".$logo."\" height=\"40\"></td>");
		// insert current time here
		print("<td class=\"text-right\" style=vertical-align:bottom !important;\"><br><i>Last refresh : ".date('Y-m-d @ H:i e')."</i></td></tr></table>");
		print("<hr><br>");

	}

	// Add page footer

	function addFooter()
	{
		GLOBAL $ver;

		print("<!-- Footer -->");
		print("<hr><table class=\"table table-borderless\">");
		print("<tr valign=\"top\" style=\"height: 80px;\"><td>");
		print("<i><b>Rubrik Central ".$ver."</b></i></td>");
		print("<td class=\"text-right\">&copy; 2019 - Frederic Lhoest</td></tr></table>");
		print("<!-- Footer -->");
	}

	///////////////////////////////////////////////////////////////////
	// Starting point
	///////////////////////////////////////////////////////////////////

	// Step 1 is to decrypt the encrypted passord stored in the rkClusters.php file using hex2bin
	
	for ($i=0;$i<count($clusterConnect);$i++)
	{
		$clusterConnect[$i]["password"]=hex2bin($clusterConnect[$i]["password"]);
	}

	print("<html lang=\"en\">");
	print("<head>
			<meta charset=\"utf-8\">
			<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
			
			<link rel=\"icon\" type=\"image/x-icon\" href=\"".$favicon."\">

			<!-- Latest compiled and minified CSS -->
			<link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css\" integrity=\"sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO\" crossorigin=\"anonymous\">
			
			<title>Rubrik Central v".$ver."</title>
			<style type=\"text/css\">
   				body { 
   						background: #F6F6F6 !important;
   					}
   				hr { 
 						display: block;
 	 					margin-top: 0em !important;
  						margin-bottom: 0em !important;
  						margin-left: auto;
  						margin-right: auto;
  						border-style: inset;
  						border-width: 1px !important;
					} 
					 
			</style>
  
  		</style>

			<script src=\"https://code.jquery.com/jquery-3.2.1.slim.min.js\" integrity=\"sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN\" crossorigin=\"anonymous\"></script>
			<script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js\" integrity=\"sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q\" crossorigin=\"anonymous\"></script>
			<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js\" integrity=\"sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl\" crossorigin=\"anonymous\"></script>
			
			</head><body>\n");
			
	print("<div class=\"container\">
				<div class=\"starter-template\">");
	addHeader();
				
	// ++++++++++++++++++++++++++++++++
	// DETAILS MODE
	// ++++++++++++++++++++++++++++++++

	if(isset($_GET["details"]))
	{
		if(isset($_GET["sla"]))
		{
			$sla=json_decode(getRubrikSLAs($clusterConnect[$_GET["details"]]));
		
			print("<br><br>");
			print("<h1> Details for SLA <span class=\"text-info\"><i>".$_GET["sla"]."</i></span></h1><br>");

			// Buttons

            print("<p class=\"text-center\">");
            addBackButton();
            print("$nbsp &nbsp;");
            addButton($_SERVER["SCRIPT_NAME"],"Home");  
            print("</p>");
            
			print("<h3>Object Summary</h3>");
			print("				<table class=\"table table-striped\" >
								<thead class=\"thead-dark\">
									<tr>
										<th>vSphere objects</th>
										<th>Nutanix AHV</th>
										<th>Windows Hosts</th>
										<th>Linux Hosts</th>
										<th>MS SQL</th>
										<th>Managed Volumes</th>
										<th>File Sets</th>
									</tr>
								</thead><tbody>");

			for($i=0;$i<count($sla->data);$i++)
			{
				if($sla->data[$i]->name == $_GET["sla"])
				{
					print("<tr>");
					print("<td align=\"center\">".$sla->data[$i]->numVms."</td>");
					print("<td align=\"center\">".$sla->data[$i]->numNutanixVms."</td>");
					print("<td align=\"center\">".$sla->data[$i]->numWindowsHosts."</td>");
					print("<td align=\"center\">".$sla->data[$i]->numLinuxHosts."</td>");
					print("<td align=\"center\">".$sla->data[$i]->numDbs."</td>");
					print("<td align=\"center\">".$sla->data[$i]->numManagedVolumes."</td>");
					print("<td align=\"center\">".$sla->data[$i]->numFilesets."</td>");
					print("</tr>");
					
					if($sla->data[$i]->numDbs)
					{
						// Get MS SQL Info
						$mssql=json_decode(rkGetMSSQL($clusterConnect[$_GET["details"]]));
					}
					
					if($sla->data[$i]->numWindowsHosts)
					{
						$windowsFileSets=json_decode(rkGetWindowsFilesets($clusterConnect[$_GET["details"]]));
					}
					
					if($sla->data[$i]->numNutanixVms)
					{
						$nutanixVM=json_decode(rkGetNutanixVM($clusterConnect[$_GET["details"]]));
					}

					if($sla->data[$i]->numVms)
					{
						$vmwareVM=json_decode(rkGetvmwareVM($clusterConnect[$_GET["details"]]));
					}
				}
			}

			print("</tbody></table><br>");
			
			print("<h3>Object Details</h3>");
			print("				<table class=\"table table-hover\" >
								<thead class=\"thead-dark\">
									<tr>
										<th>Object</th>
										<th>Source</th>
										<th class=\"text-right\">Type</th>
									</tr>
								</thead><tbody>");
			
			// Put all objects here and print table

			// MS SQL
			if(isset($mssql))
			{
				for($v=0;$v<count($mssql->data);$v++)
				{
					if($mssql->data[$v]->configuredSlaDomainName==$_GET["sla"]) 
					{
						print("<tr><td>".$mssql->data[$v]->effectiveSlaSourceObjectName."</td>");
						print("<td>".$mssql->data[$v]->configuredSlaDomainName."</td>");
						print("<td align=\"right\">MS SQL</td></tr>");
					}
				}
			}

			// Windows File Sets
			if(isset($windowsFileSets))
			{
				for($v=0;$v<count($windowsFileSets->data);$v++)
				{
					if($windowsFileSets->data[$v]->filesets)
					{
						for($w=0;$w<count($windowsFileSets->data[$v]->filesets);$w++)
						{
							if($windowsFileSets->data[$v]->filesets[$w]->configuredSlaDomainName==$_GET["sla"])
							{
								print("<tr><td>".$windowsFileSets->data[$v]->filesets[$w]->hostName." -> ".$windowsFileSets->data[$v]->filesets[$w]->templateName."</td>");
								print("<td align=\"right\">Windows Fileset</td></tr>");
							}
						}
					}
				}
			}
			
			// Nutanix AHV

			if(isset($nutanixVM))
			{
				for($v=0;$v<count($nutanixVM->data);$v++)
				{
					if($nutanixVM->data[$v]->configuredSlaDomainName==$_GET["sla"]) 
					{
						print("<tr><td>".$nutanixVM->data[$v]->effectiveSlaSourceObjectName."</td>");
						print("<td>".$nutanixVM->data[$v]->nutanixClusterName."</td>");
						print("<td align=\"right\">Nutanix AHV</td></tr>");
						
					}
				}
			}

			// vmware VMs
			
			if(isset($vmwareVM))
			{
				for($v=0;$v<count($vmwareVM->data);$v++)
				{
					if($vmwareVM->data[$v]->configuredSlaDomainName==$_GET["sla"]) 
					{
						print("<tr><td>".$vmwareVM->data[$v]->name."</td>");
						print("<td>".$vmwareVM->data[$v]->clusterName."</td>");
						print("<td align=\"right\">vmware</td></tr>");
						
					}
				}
			}
			
			print("</thead></tbody></table>");

			addFooter();
		}
		else
		{
			// Get all details about cluster
			$clusterDetails=json_decode(rkGetClusterDetails($clusterConnect[$_GET["details"]]));

			// Get unmanaged objects
			$unmanaged=json_decode(rkGetUnmanaged($clusterConnect[$_GET["details"]]));
			
			// Get storage info
			$totalStorage=json_decode(getRubrikTotalStorage($clusterConnect[$_GET["details"]]));
			$availableStorage=json_decode(getRubrikAvailableStorage($clusterConnect[$_GET["details"]]));
			$runway=getRubrikRunway($clusterConnect[$_GET["details"]]);
			$snapshots=rkGetSnapshotCount($clusterConnect[$_GET["details"]]);

			// Get Support tunnel info
			$supportTunnel=json_decode(rkGetSupportTunnel($clusterConnect[$_GET["details"]]));

			// Get physical hosts			
			$pHosts=rkGetAgentConnectivity($clusterConnect[$_GET["details"]],"");
	
			print("<h1><center>Details for <i> <span class=\"text-info\">".$clusterConnect[$_GET["details"]]["cluster"]."</span></i></center><h1>");
            print("<p class=\"text-center\">");
            addButton($_SERVER["SCRIPT_NAME"],"Home");
            print("</p>");

			///////////////////////////////////////////////////////////////////
			// Initial Screen
			///////////////////////////////////////////////////////////////////
			
			print("<h3>Basic Info</h3>");
			print("				<table class=\"table\" >
								<thead class=\"thead-dark\">
									<tr>
										<th>Name</th>
										<th>Version</th>
										<th>Location</th>
										<th>Time Zone</th>										
										<th class=\"text-right\">Support Tunnel</th>
									</tr>
								</thead><tbody>");
			print("<tr><td>".$clusterDetails->name."</td>");
			print("<td>".$clusterDetails->version."</td>");
			print("<td>".$clusterDetails->geolocation->address."</td>");
			print("<td>".$clusterDetails->timezone->timezone."</td>");
			
			if($supportTunnel->data[0]->supportTunnel->isTunnelEnabled)
			{
				print("<td align=\"right\">Open (".$supportTunnel->data[0]->supportTunnel->port.")</td>");
			}
			else print("<td align=\"right\">Closed</td>");
			
			print("</tr></tbody></table><br>");
			
			// Storage Info 
						
			print("<h3>Storage</h3>");
			
			print("				<table class=\"table\" >
								<thead class=\"thead-dark\">
									<tr>
										<th>Total Storage</th>
										<th>Available Storage</th>
										<th>Full at</th>
										<th>Full in</th>										
										<th class=\"text-right\">Snapshot(s)</th>
									</tr>
								</thead><tbody>");
			print("<tr><td>".formatBytes($totalStorage->bytes,2)."</td>");
			print("<td>".formatBytes($availableStorage,2)."</td>");
			$percentUsed=round(100-($availableStorage/$totalStorage->bytes*100),2);
			print("<td>".$percentUsed." %</td>");
			print("<td>".$runway." day(s)</td>");
			print("<td align=\"right\">".$snapshots."</td>");

			print("</tr></tbody></table><br>");

			// Compute SLA details

			$SLA=json_decode(getRubrikSLAs($clusterConnect[$_GET["details"]]));
// 			print("<pre>"); var_dump($SLA); print("</pre>");
 			$slaData=array();
 			$itemNum=0;
 			
			foreach ($SLA->data as $item) 
			{
				// Count number of objects in each SLA.
				$obj=0;
				$obj+= $item -> numVms;
				$obj+= $item -> numNutanixVms;
				$obj+= $item -> numHypervVms;
				$obj+= $item -> numDbs;
				$obj+= $item -> numFilesets;
				$obj+= $item -> numManagedVolumes;
				$obj+= $item -> numStorageArrayVolumeGroups;
				$obj+= $item -> numWindowsVolumeGroups;
				$obj+= $item -> numLinuxHosts;
				$obj+= $item -> numShares;
				$obj+= $item -> numWindowsHosts;
				$obj+= $item -> numEc2Instances;
				$obj+= $item -> numVcdVapps;
				
				$slaData[$itemNum]["objects"]=$obj;
				$slaData[$itemNum]["name"]=$item->name;

				// Parse all frequencies for specified SLA
				for($z=0;$z<count($item->frequencies);$z++)
				{
					if($item->frequencies[$z]->timeUnit=="Hourly") 
					{
						$slaData[$itemNum]["hourly"]["frequency"]=$item->frequencies[$z]->frequency;
						$slaData[$itemNum]["hourly"]["retention"]=$item->frequencies[$z]->retention/24;
					}
					if($item->frequencies[$z]->timeUnit=="Daily") 
					{
						$slaData[$itemNum]["daily"]["frequency"]=$item->frequencies[$z]->frequency;
						$slaData[$itemNum]["daily"]["retention"]=$item->frequencies[$z]->retention;
					}
					if($item->frequencies[$z]->timeUnit=="Monthly") 
					{
						$slaData[$itemNum]["monthly"]["frequency"]=$item->frequencies[$z]->frequency;
						$slaData[$itemNum]["monthly"]["retention"]=$item->frequencies[$z]->retention/12;
					}
					if($item->frequencies[$z]->timeUnit=="Yearly") 
					{
						$slaData[$itemNum]["yearly"]["frequency"]=$item->frequencies[$z]->frequency;
						$slaData[$itemNum]["yearly"]["retention"]=$item->frequencies[$z]->retention;
					}
					
				}

				$itemNum++;
			}

			// Display SLAs info
			print("<h3>SLAs</h3>");
			print("				<table class=\"table table-hover\" >
								<thead class=\"thead-dark\">
									<tr>
										<th>SLA Name</th>
										<th class=\"text-center\">Hourly</th>
										<th class=\"text-center\">Daily</th>
										<th class=\"text-center\">Monthly</th>
										<th class=\"text-center\">Yearly</th>
										<th class=\"text-right\">Objects</th>
									</tr>
								</thead><tbody>");

			for($i=0;$i<count($slaData);$i++)
			{
				print("<tr><td>".$slaData[$i]["name"]."</td>");

				if(isset($slaData[$i]["hourly"])) print("<td align=\"center\"> Every ".$slaData[$i]["hourly"]["frequency"]." hour(s)/<br> keep ".$slaData[$i]["hourly"]["retention"]." day(s)</td>");		
				else print("<td align=\"center\">-/-</td>");		

				if(isset($slaData[$i]["daily"])) print("<td align=\"center\"> Every ".$slaData[$i]["daily"]["frequency"]." day(s)/<br> keep ".$slaData[$i]["daily"]["retention"]." day(s)</td>");		
				else print("<td align=\"center\">-/-</td>");		
				
				if(isset($slaData[$i]["monthly"])) print("<td align=\"center\"> Every ".$slaData[$i]["monthly"]["frequency"]." month(s)/<br> keep ".$slaData[$i]["monthly"]["retention"]." year(s)</td>");		
				else print("<td align=\"center\">-/-</td>");		

				if(isset($slaData[$i]["yearly"])) print("<td align=\"center\"> Every ".$slaData[$i]["yearly"]["frequency"]." year(s)/<br> keep ".$slaData[$i]["yearly"]["retention"]." year(s)</td>");		
				else print("<td align=\"center\">-/-</td>");		

				if ($slaData[$i]["objects"]>0)
				{
					print("<td align=\"right\"><a href=?details=".$_GET["details"]."&sla=".urlencode($slaData[$i]["name"]).">".$slaData[$i]["objects"]."</td></tr>");
				} 
				else
				{
					print("<td align=\"right\">0</td></tr>");
				}
			} 

			print("</tbody></table><br>");

			// Display physical host (Rubrik agent)

			print("<h3>Rubrik Connectors Hosts</h3>");
			print("				<table class=\"table table-hover\" >
								<thead class=\"thead-dark\">
									<tr>
										<th>Object Name</th>
										<th>OS</th>
										<th>OS Version</th>
										<th class=\"text-right\">Status</th>
									</tr>
								</thead><tbody>");
			if(count($pHosts))
			{
				for($i=0;$i<count($pHosts->data);$i++)
				{
					print("<tr><td>".$pHosts->data[$i]->name."</td>");
					print("<td>".$pHosts->data[$i]->operatingSystem."</td>");
					print("<td>".$pHosts->data[$i]->operatingSystemType."</td>");
					print("<td>".$pHosts->data[$i]->status."</td>");
				}
			}
			else print("<tr><td>No Rubrik Connector deployed in this cluster!</td></tr>");
			print("</tbody></table><br>");


			// Display Unmanaged Object and potential savings
			
			$unmanagedTotalSize=0;
			print("<h3>Unmanaged Objects</h3>");
			print("				<table class=\"table table-hover\" >
								<thead class=\"thead-dark\">
									<tr>
										<th>Object Name</th>
										<th>Object Type</th>
										<th class=\"text-right\">Status</th>
										<th class=\"text-right\">Size</th>
										<th>Source</th>
										<th>Action</th>
									</tr>
								</thead><tbody>");
			
			if(count($unmanaged->data))
			{
				for($i=0;$i<count($unmanaged->data);$i++)
				{
					print("<tr><td>".$unmanaged->data[$i]->name."</td>");
					print("<td>".$unmanaged->data[$i]->objectType."</td>");
					print("<td align=\"right\">".$unmanaged->data[$i]->unmanagedStatus."</td>");
					$unmanagedTotalSize+=$unmanaged->data[$i]->localStorage;
					if($unmanaged->data[$i]->localStorage) print("<td align=\"right\">".formatBytes($unmanaged->data[$i]->localStorage,2)."</td>");
					else print("<td align=\"right\">-</td>");
					print("<td>".$unmanaged->data[$i]->physicalLocation[0]->name."</td>");
					print("<td>");
		            addButton("?action=delobj&objid=".urlencode($unmanaged->data[$i]->id),"Delete");
		            print("</td></tr>");
				}
			}
			else print("<tr><td>No Unmanaged objects found</td></tr>");
			
			// Display total row
			print("<tr class=\"table-active\"><td colspan=\"3\"><b>Total</b></td><td align=\"right\"><b>".formatBytes($unmanagedTotalSize,2)."</b></td><td colspan=\"2\"</td></tr>");
			print("</tbody></table><br>");

			// Display last $num_events events of type backup
		
			$events=json_decode(getRubrikEvents($clusterConnect[$_GET["details"]],$num_events,"Backup","",""));

			print("<h3>Last <span class=\"text-info\"><i>".$num_events." </i></span>Backup Events</h3>");
			print("				<table class=\"table table-hover\" >
								<thead class=\"thead-dark\">
									<tr>
										<th>Date/Time</th>
										<th>Event Decription</th>
										<th>Status</th>
									</tr>
								</thead><tbody>");
	
			foreach ($events->data as $item)
			{
				//rewrite date/time to shorter version
				
				$dateOfEvent=$item->time;
				$dateOfEvent = DateTime::createFromFormat("D M d H:i:s e Y", $dateOfEvent);
				$myTime = $dateOfEvent->format('Y-m-d H:i:s');

				switch($item->eventStatus)
				{
					case "Running" :
						print("<tr class=\"table-active\"><td>".$myTime."</td>");
						print("<td width=\"60%\">".json_decode($item->eventInfo)->message."</td>");
						print("<td>".$item->eventStatus." (".$item->eventProgress." %)</td>");
						print("</tr>");
						break;
					case "Success":
						print("<tr class=\"table-success\"><td>".$myTime."</td>");
						print("<td width=\"60%\">".json_decode($item->eventInfo)->message."</td>");
						print("<td>".$item->eventStatus."</td>");
						print("</tr>");
						break;
					case "Queued":
						print("<tr class=\"table-info\"><td>".$myTime."</td>");
						print("<td width=\"60%\">".json_decode($item->eventInfo)->message."</td>");
						print("<td>".$item->eventStatus."</td>");
						print("</tr>");
						break;
					case "Failure":
						print("<tr class=\"table-danger\"><td>".$myTime."</td>");
						print("<td width=\"60%\">".json_decode($item->eventInfo)->message."</td>");
						print("<td>".$item->eventStatus."</td>");
						print("</tr>");
						break;
				}
			}
			print("</tbody></table><br>");
			addFooter();
		}
	}
	else

	// ++++++++++++++++++++++++++++++++
	// DEFAULT VIEW
	// ++++++++++++++++++++++++++++++++

	{
		if(isset($_GET["action"]))
		{
			switch ($_GET["action"])
			{
				case "delobj":
					print("this will delete object : ".$_GET["objid"]."<br>");
					$message=rkDeleteUnmanaged($clusterConnect,$objid);
//
// This section is still under development
//
// 					print("Message : ".rkDeleteUnmanaged($clusterConnect,$objid));
// 					$message=rkDeleteUnmanaged($clusterConnect,"NutanixVirtualMachine:::42074972-bccc-454b-b338-083087c1bcba-vm-fa1841a2-5746-4364-90ef-2aa8f1622bfc");
// 					print("Message : ".$message);
// print("<pre>"); var_dump(json_decode($message)); print("</pre>");
					break;
		
			}
			addFooter();
			exit();
		}
	
		print("<br><h1>".$appTitle."</h1>");
		print("
						</div>
						<div class=\"table-responsive\">
							<table class=\"table table-striped\" >
								<thead class=\"thead-dark\">
								<tr>
									<th>Cluster</th>
									<th>Version</th>
									<th class=\"text-right\">Node(s)</th>
									<th class=\"text-right\">Total Capacity</th>
									<th class=\"text-right\">Available Storage</th>
								</tr>
							</thead><tbody>");

		// Get details for every clusters

		for($i=0;$i<count($clusterConnect);$i++)
		{
			print("<tr><td><a href=?details=".$i.">".$clusterConnect[$i]["cluster"]."</a></td>");
			print("<td>".rkGetClusterVersion($clusterConnect[$i])."</td>");
			print("<td align=\"right\">".getRubrikNodeCount($clusterConnect[$i])."</td>");
			print("<td align=\"right\">".formatBytes(json_decode(getRubrikTotalStorage($clusterConnect[$i]))->bytes)."</td>");
			print("<td align=\"right\">".formatBytes(getRubrikAvailableStorage($clusterConnect[$i]),2,"metric")."</td>");
			print("</tr>");
		}

		print("</tbody></table>");
		print("</div><br>");

		addFooter();
										
		print("		</div><br><br>\n");
		print("</body></html>");
	}
?>