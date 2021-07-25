<?PHP

	include_once "rkFramework.php";
	
  $clusterConnect=array(
		0 => array(
			"cluster" => "cluster1",
			"username" => "username",
			"password" => "70617373776f7264",
			"ip" => "192.168.1.1"
		),
		1 => array(
			"cluster" => "cluster2",
			"username" => "username",
			"password" => "70617373776f7264",
			"ip" => "192.168.1.2"
	));
			
	// ============================================================
	// Entry point
	// ============================================================
		
	// Loop through all clusters defined in rkClusters.php

	print("\n\n\n");
	print(rkColorOutput("__________        ___.            .__  __    \n"));
	print(rkColorOutput("\______   \ __ __ \_ |__  _______ |__||  | __\n"));
	print(rkColorOutput(" |       _/|  |  \ | __ \ \_  __ \|  ||  |/ /\n"));
	print(rkColorOutput(" |    |   \|  |  / | \_\ \ |  | \/|  ||    < \n"));
	print(rkColorOutput(" |____|_  /|____/  |___  / |__|   |__||__|_ \\\n"));
	print(rkColorOutput("		\/             \/          \/ \n"));
	
	print("+--------------------------------------------------+\n");
	print("|    ".rkColorBold("Rubrik Cluster Executive Summary Generator")."    |\n");
	print("+--------------------------------------------------+\n");
	print("\t\t\t  (c) 2021 - Frederic Lhoest\n\n");
	print("This script is collecting data from specified Rubrik clusters, summarizes details and reports\n");
	print("aggregated numbers for each clusters.\n\n");
	print("It requires the PhP Rubrik Framework available here : ".inColor("UCya","https://github.com/flhoest/Rubrik").".\n\n");

	// Init Grand Total array
	$grandTotal=array("totalStorage" => 0,
					"availableStorage" => 0,
					"snaps" => 0,
					"dataIngested" => 0,
					"dataStored" => 0
	);
	
	for($i=0;$i<count($clusterConnect);$i++)
	{
		// Create connection string
		$connect["ip"]=$clusterConnect[$i]["ip"];
		$connect["username"]=$clusterConnect[$i]["username"];
		$connect["password"]=hex2bin($clusterConnect[$i]["password"]);

		// Call to the BIG function
		$data=rkGetExecSum($connect);

		// Display gathered results
		print(inColor("BGre","{".$data["name"]."} ")."+---------------------------------------------\n");
		print(inColor("BGre","{".$data["name"]."} ")."| ".rkColorBold("Cluster Identity")." \n");
		print(inColor("BGre","{".$data["name"]."} ")."+---------------------------------------------------------\n");
		print(inColor("BGre","{".$data["name"]."} ")."| Cluster name : ".rkColorOutput($data["name"])."\n");
		print(inColor("BGre","{".$data["name"]."} ")."| Cluster location : ".rkColorOutput($data["location"])."\n");
		print(inColor("BGre","{".$data["name"]."} ")."| Number of nodes : ".rkColorOutput($data["nodeCount"])." - Running : ".rkColorOutput($data["version"])."\n");
		print(inColor("BGre","{".$data["name"]."} ")."+-----------------------------------------------------------------\n");

		// Print individual node info
		for($j=0;$j<count($data["nodeDetails"]);$j++)
		{
			$curNode=$j+1;
			print(inColor("BGre","{".$data["name"]."} ")."\\-------");
			print("+ ".rkColorBold("Node ".$curNode)."\n");
			print(inColor("BGre","{".$data["name"]."} ")."\t  | IP address : ".rkColorOutput($data["nodeDetails"][$j]["ip"])."\n");
			print(inColor("BGre","{".$data["name"]."} ")."\t  | Node serial number : ".rkColorOutput($data["nodeDetails"][$j]["id"])."\n");
			print(inColor("BGre","{".$data["name"]."} ")."\t  | Node status : ".rkColorOutput($data["nodeDetails"][$j]["status"])."\n");		
		}
		print("\n");
		print(inColor("BGre","{".$data["name"]."} ")."+---------------------------------------------\n");
		print(inColor("BGre","{".$data["name"]."} ")."| ".rkColorBold("Storage")." \n");
		print(inColor("BGre","{".$data["name"]."} ")."+---------------------------------------------------------\n");
		print(inColor("BGre","{".$data["name"]."} ")."| Total Storage : ".rkColorOutput(rkFormatBytes($data["totalStorage"]))."\n");
		print(inColor("BGre","{".$data["name"]."} ")."| Available Storage : ".rkColorOutput(rkFormatBytes($data["availableStorage"]))."\n");
		print(inColor("BGre","{".$data["name"]."} ")."| Snapshots : ".rkColorOutput($data["snaps"])."\n");
		print(inColor("BGre","{".$data["name"]."} ")."| Data Ingested : ".rkColorOutput(rkFormatBytes($data["dataIngested"]))."\n");
		print(inColor("BGre","{".$data["name"]."} ")."| Data Stored : ".rkColorOutput(rkFormatBytes($data["dataStored"]))."\n");

		// Ratio is calculated based on this formula :
		// https://www.snia.org/sites/default/files/Understanding_Data_Deduplication_Ratios-20080718.pdf page 5 

		$ratio=$data["dataIngested"]/$data["dataStored"];
		print(inColor("BGre","{".$data["name"]."} ")."| Storage optimization Ratio is : ".rkColorOutput(round($ratio,1).":1")."\n");
		print(inColor("BGre","{".$data["name"]."} ")."+----------------------------------------------------------\n\n");

		print(inColor("BGre","{".$data["name"]."} ")."+---------------------------------------------\n");
		print(inColor("BGre","{".$data["name"]."} ")."| ".rkColorBold("Storage Breakdown per SLA (with percentage of total)")." \n");
		print(inColor("BGre","{".$data["name"]."} ")."+---------------------------------------------------------\n");

		for($j=0;$j<count($data["sla_storage"]);$j++)
		{
			print(inColor("BGre","{".$data["name"]."} ").str_pad("| ".$data["sla_storage"][$j]["name"]." : ",40,".",STR_PAD_RIGHT));
	
			$size=$data["sla_storage"][$j]["size"];
			print(" ".rkColorOutput(rkFormatBytes($size)));
			
			if($size)
			{
				$percent=round($size/$data["totalStorage"]*100,2);
				print(rkColorOutput(" (".$percent." %)\n"));
			}
			else print("\n");
		}
		print("+-----------------------------------------------------------\n\n");
		
		// Commpute summary data per clusters
		$grandTotal["totalStorage"]+=$data["totalStorage"];
		$grandTotal["availableStorage"]+=$data["availableStorage"];
		$grandTotal["snaps"]+=$data["snaps"];
		$grandTotal["dataIngested"]+=$data["dataIngested"];
		$grandTotal["dataStored"]+=$data["dataStored"];
	}
	
	// Display Total figures for all clusters

	print("+--------------------------------------------------\n");
	print("| ".rkColorBold("Summary for all Clusters")." \n");
	print("+--------------------------------------------------\n");

	print("| Total storage in all clusters : ".rkColorOutput(rkFormatBytes($grandTotal["totalStorage"]))."\n");
	print("| Available storage in all clusters : ".rkColorOutput(rkFormatBytes($grandTotal["availableStorage"]))."\n");
	print("| All snapshots : ".rkColorOutput($grandTotal["snaps"])."\n");
	print("| Total data ingested : ".rkColorOutput(rkFormatBytes($grandTotal["dataIngested"]))."\n");
	print("| Total data stored : ".rkColorOutput(rkFormatBytes($grandTotal["dataStored"]))."\n");
	
	// Compute overall storage savings ratio
	
	$grandRatio=$grandTotal["dataIngested"]/$grandTotal["dataStored"];
	print("| Storage optimization Ratio is : ".rkColorOutput(round($grandRatio,1).":1")."\n");
	print("+-----------------------------------------------------------\n\n\n");

?>
