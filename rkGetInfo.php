#!/usr/bin/php 

<?php
	//////////////////////////////////////////////////////////////////////////////
	//               Rubrik Php Information - rkGetInfo.php v 1.2               //
	//                        (c) 2019 - F. Lhoest                              //
	//////////////////////////////////////////////////////////////////////////////
	
	/*				__________        ___.            .__  __    
					\______   \ __ __ \_ |__  _______ |__||  | __
					 |       _/|  |  \ | __ \ \_  __ \|  ||  |/ /
					 |    |   \|  |  / | \_\ \ |  | \/|  ||    < 
					 |____|_  /|____/  |___  / |__|   |__||__|_ \
						\/             \/                  \/	
	*/

	// This script is retrieving basic information about a Rubrik cluster.
	// It is making good use of the rkFramework.php and is provided as an example
	// Note : there is a lot of layout functions (str_pad) so the actual code is much
	// simpler than you may think once those functions have been removed.
	// The whole purpose of this is to get quick information on the target cluster.

	include_once "rkCredentials.php";
	include_once "rkFramework.php";

	// Define width of the screen (output)
	$padSize=140;
	
	// Do you want to display the last backup event from the cluster ?
	$displayEvents=true;

	// Number of events to retieve from the cluster
	$lastEventCount=5;

	// ===========================================================================
	// Main entry point
	// ===========================================================================

	// Check if cluster can be queried
	
	$access=rkCheckAccess($clusterConnect);
	if($access!="ok")
	{
		print("Cannot connect to cluster!\n");
		print(rkColorRed($access)."\n");
	}

	// Basic info section
	
	$cluster=json_decode(getRubrikClusterDetails($clusterConnect));
	$SLA=json_decode(getRubrikSLAs($clusterConnect));
	$snapshots=rkGetAllSnapshotInfo($clusterConnect);

	print("+-".str_pad("",$padSize-11,"-",STR_PAD_RIGHT)."-+\n");
	print("| ".str_pad("Cluster Name : ".rkColorOutput($cluster -> name),$padSize," ",STR_PAD_RIGHT)." |\n");
	print("+-".str_pad("",$padSize-11,"-",STR_PAD_RIGHT)."-+\n");
	print("| ".str_pad("Atlas version : ".rkColorOutput($cluster -> version),$padSize," ",STR_PAD_RIGHT)." |\n");
	print("| ".str_pad("Total capacity : ".rkColorOutput(formatBytes(json_decode(getRubrikTotalStorage($clusterConnect))->bytes)),$padSize," ",STR_PAD_RIGHT)." |\n");
	print("| ".str_pad("Number of node(s) : ".rkColorOutput(json_decode(getRubrikNodeCount($clusterConnect))->total),$padSize," ",STR_PAD_RIGHT)." |\n");
	print("| ".str_pad("Total Snapshot(s) : ".rkColorOutput(rkGetSnapshotCount($clusterConnect)),$padSize," ",STR_PAD_RIGHT)." |\n");

	$clusterData=json_decode(getRubrikNodeCount($clusterConnect));
	$nodeNum=1;

 	foreach ($clusterData->data as $item) 
	{
		print("| ".str_pad("Node #".$nodeNum." : ".rkColorOutput($item->id." (".$item->ipAddress.")"),$padSize," ",STR_PAD_RIGHT)." |\n");
		$nodeNum++;
	}

	print("+-".str_pad("",$padSize-11,"-",STR_PAD_RIGHT)."-+\n");
	
	// Support Tunnel status

	$supportTunnel=json_decode(rkGetSupportTunnel($clusterConnect));
 
 	if($supportTunnel->data[0]->supportTunnel->isTunnelEnabled)
	{
		$time=rkGetTimeStamp($supportTunnel->data[0]->supportTunnel->enabledTime);
		print("| ".str_pad("Support Tunnel is currently ".rkColorRed("open")." (enabled on : ".rkColorOutput(date('D M d H:i:s e Y', $time)).")",$padSize+11," ",STR_PAD_RIGHT)." |\n");
		print("| ".str_pad("Tunnel port is : ".rkColorOutput($supportTunnel->data[0]->supportTunnel->port),$padSize," ",STR_PAD_RIGHT)." |\n");
	}
	else print("| ".str_pad("Support Tunnel is currently ".rkColorRed("down!"),$padSize," ",STR_PAD_RIGHT)." |\n");

	// SLA section
	
	print("+-".str_pad("",$padSize-11,"-",STR_PAD_RIGHT)."-+\n");
	print("| ".str_pad("Available SLAs (Total Object(s))",$padSize-11," ",STR_PAD_RIGHT)." |\n");
	print("+-".str_pad("",$padSize-11,"-",STR_PAD_RIGHT)."-+\n");

	$SLA=json_decode(getRubrikSLAs($clusterConnect));
 
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
			
   		print("| ".str_pad(rkColorOutput($item -> name." (".$obj.") ") ,$padSize," ",STR_PAD_RIGHT)." |\n");
	}
	print("+-".str_pad("",$padSize-11,"-",STR_PAD_RIGHT)."-+\n");

	$availableSpace=json_decode(getRubrikAvailableStorage($clusterConnect));
	print("| ".str_pad("Available Space : ".rkColorOutput(formatBytes($availableSpace->value)),$padSize," ",STR_PAD_RIGHT)." |\n");
	print("| ".str_pad("Cluster Runway : ".rkColorOutput(json_decode(getRubrikRunway($clusterConnect))->days." day(s)"),$padSize," ",STR_PAD_RIGHT)." |\n");
	print("+-".str_pad("",$padSize-11,"-",STR_PAD_RIGHT)."-+\n");
	print("| ".str_pad("Snapshots Ingested : ".rkColorOutput($snapshots["Ingested"]),$padSize," ",STR_PAD_RIGHT)." |\n");
	print("| ".str_pad("Logical Snapshots size : ".rkColorOutput($snapshots["Logical"]),$padSize," ",STR_PAD_RIGHT)." |\n");
	print("| ".str_pad("Physical Snapshots size : ".rkColorOutput($snapshots["Physical"]),$padSize," ",STR_PAD_RIGHT)." |\n");
	
	print("+-".str_pad("",$padSize-11,"-",STR_PAD_RIGHT)."-+\n");

	// Check for unmanaged object that could be removed
	$unmanaged=json_decode(rkGetUnmanaged($clusterConnect));

	if(count($unmanaged->data)>0)	
	{
		print("| ".str_pad(rkColorRed("The below items are unmanaged"),$padSize," ",STR_PAD_RIGHT)." |\n");
		print("+-".str_pad("",$padSize-11,"-",STR_PAD_RIGHT)."-+\n");

		$totalUnmanagedStorage=0;
		foreach ($unmanaged->data as $item) 
		{
			$totalUnmanagedStorage+=$item->localStorage;
			print("| ".str_pad("Object ID : ".rkColorOutput($item->id),$padSize," ",STR_PAD_RIGHT)." |\n");
			print("| ".str_pad("Object Name : ".rkColorOutput($item->name),$padSize," ",STR_PAD_RIGHT)." |\n");
			print("| ".str_pad("Object located on : ".rkColorOutput($item->physicalLocation[0]->name),$padSize," ",STR_PAD_RIGHT)." |\n");
			print("| ".str_pad("Objedt is : ".rkColorOutput($item->unmanagedStatus),$padSize," ",STR_PAD_RIGHT)." |\n");
			print("| ".str_pad("Size on disk : ".rkColorOutput(formatBytes($item->localStorage)),$padSize," ",STR_PAD_RIGHT)." |\n");
		}
		
		print("+-".str_pad("",$padSize-11,"-",STR_PAD_RIGHT)."-+\n");
		print("| ".str_pad("Potential savings from relic's : ".rkColorOutput(formatBytes($totalUnmanagedStorage)),$padSize," ",STR_PAD_RIGHT)." |\n");
		print("+-".str_pad("",$padSize-11,"-",STR_PAD_RIGHT)."-+\n");
	}

	if($displayEvents)
	{
		print("| ".str_pad("Last ".rkColorOutput($lastEventCount)." backup events",$padSize-11," ",STR_PAD_RIGHT)." |\n");
		print("+-".str_pad("",$padSize-11,"-",STR_PAD_RIGHT)."-+\n");
		$events=json_decode(getRubrikEvents($clusterConnect,$lastEventCount,"Backup","",""));
	
		foreach ($events->data as $item) 
		{
			print("| ".str_pad("Time : ".rkColorOutput($item->time),$padSize," ",STR_PAD_RIGHT)." |\n");
			print("| ".str_pad("Message : ".rkColorOutput(json_decode($item->eventInfo)->message),$padSize," ",STR_PAD_RIGHT)." |\n");
			print("| ".str_pad("-",$padSize-11," ",STR_PAD_RIGHT)." |\n");
		}
		print("+-".str_pad("",$padSize-11,"-",STR_PAD_RIGHT)."-+\n");
	}

?>
