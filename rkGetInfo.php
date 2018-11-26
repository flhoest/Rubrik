#!/usr/bin/php 

<?PHP
	include_once "credentials.php";
	include_once "rkFramework.php";

	$padSize=80;
	$lastEventCount=5;

	// ===========================================================================
	// Main entry point
	// ===========================================================================

	$cluster=json_decode(getRubrikClusterDetails($clusterConnect));
	$SLA=json_decode(getRubrikSLAs($clusterConnect));

	print("+-".str_pad("",$padSize-11,"-",STR_PAD_RIGHT)."-+\n");
	print("| ".str_pad("Cluster Name : ".rkColorOutput($cluster -> name),$padSize," ",STR_PAD_RIGHT)." |\n");
	print("+-".str_pad("",$padSize-11,"-",STR_PAD_RIGHT)."-+\n");
	print("| ".str_pad("Atlas version : ".rkColorOutput($cluster -> version),$padSize," ",STR_PAD_RIGHT)." |\n");
	print("| ".str_pad("Total capacity : ".rkColorOutput(formatBytes(json_decode(getRubrikTotalStorage($clusterConnect))->bytes)),$padSize," ",STR_PAD_RIGHT)." |\n");
	print("| ".str_pad("Number of node(s) : ".rkColorOutput(json_decode(getRubrikNodeCount($clusterConnect))->total),$padSize," ",STR_PAD_RIGHT)." |\n");

	$clusterData=json_decode(getRubrikNodeCount($clusterConnect));
	$nodeNum=1;
	foreach ($clusterData->data as $item) 
	{
		print("| ".str_pad("Node #".$nodeNum." : ".rkColorOutput($item->id." (".$item->ipAddress.")"),$padSize," ",STR_PAD_RIGHT)." |\n");
		$nodeNum++;
	}

	print("+-".str_pad("",$padSize-11,"-",STR_PAD_RIGHT)."-+\n");
	print("| ".str_pad("Available SLAs (Total VMs)",$padSize-11," ",STR_PAD_RIGHT)." |\n");
	print("+-".str_pad("",$padSize-11,"-",STR_PAD_RIGHT)."-+\n");

	foreach ($SLA->data as $item) 
	{
		$obj=0;
		$obj=$obj+ $item -> numVms + $item -> numNutanixVms + $item -> numHypervVms;
			
   		print("| ".str_pad(rkColorOutput($item -> name." (".$obj.") ") ,$padSize," ",STR_PAD_RIGHT)." |\n");
	}
	print("+-".str_pad("",$padSize-11,"-",STR_PAD_RIGHT)."-+\n");
	$availableSpace=json_decode(getRubrikAvailableStorage($clusterConnect));
	print("| ".str_pad("Available Space : ".rkColorOutput(formatBytes($availableSpace->value)),$padSize," ",STR_PAD_RIGHT)." |\n");
	print("| ".str_pad("Cluster Runway : ".rkColorOutput(json_decode(getRubrikRunway($clusterConnect))->days." day(s)"),$padSize," ",STR_PAD_RIGHT)." |\n");
	print("+-".str_pad("",$padSize-11,"-",STR_PAD_RIGHT)."-+\n\n");
	
	print("Last ".$lastEventCount." events in the cluster of type 'Backup' \n\n");

	$events=json_decode(getRubrikEvents($clusterConnect,$lastEventCount,"Backup","",""));
	
	foreach ($events->data as $item) 
	{
		print("Time : ".$item->time."\n");
		print("Message : ".json_decode($item->eventInfo)->message."\n");
		print("---------\n");
	}
	
?>
