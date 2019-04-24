<?php

	//////////////////////////////////////////////////////////////////////////////
	//                   Rubrik Php Framework version 0.990                     //
	//                     (c) 2018, 2019 - F. Lhoest                           //
	//////////////////////////////////////////////////////////////////////////////
	
	/*				__________        ___.            .__  __    
					\______   \ __ __ \_ |__  _______ |__||  | __
					 |       _/|  |  \ | __ \ \_  __ \|  ||  |/ /
					 |    |   \|  |  / | \_\ \ |  | \/|  ||    < 
					 |____|_  /|____/  |___  / |__|   |__||__|_ \
						\/             \/                  \/	
	*/
	
	// Function index in alphabetical order
	// ------------------------------------

	// getRubrikAvailableStorage($clusterConnect)
	// getRubrikClusterID($clusterConnect)
	// getRubrikEvents($clusterConnect,$numEvents,$eventType="Backup",$objectType,$objectName)
	// getRubrikNodeCount($clusterConnect)
	// getRubrikRunway($clusterConnect)
	// getRubrikSLAname($clusterConnect,$SLAid)
	// getRubrikSLAs($clusterConnect)
	// getRubrikTotalStorage($clusterConnect)
	// rkCheckAccess($clusterConnect)
	// rkColorOutput($string)
	// rkColorRed($string)
	// rkCreateReport($clusterConnect,$rptName,$rptSpecs)
	// rkCreateReportSchedule($clusterConnect,$rptID,$scheduleDefinition)
	// rkDelUnmanagedObject($clusterConnect,$objName,$keepAmount)
	// rkDeleteUnmanaged($clusterConnect,$ObjID)
	// rkEpochToSQL($EpochTime)
	// rkFileSetBackup($clusterConnect,$filesetId)
	// rkFormatBytes($bytes,$decimals=2,$system='metric')
	// rkGetAgentConnectivity($clusterConnect,$hostName)
	// rkGetAllSnapshotInfo($clusterConnect)
	// rkGetClusterDetails($clusterConnect)
	// rkGetClusterVersion($clusterConnect)
	// rkGetEpoch($dateString)
	// rkGetEpoch2($dateString)
	// rkGetFailedAmount($clusterConnect,$objectName)
	// rkGetFileSet($clusterConnect)
	// rkGetFileSetSnapshotsDetails($clusterConnect,$ID)
	// rkGetFileURLfromSnap($clusterConnect,$snapshotID,$fileName)
	// rkGetFilesetSnaps($clusterConnect,$filesetID)
	// rkGetHostID($clusterConnect,$hostName)
	// rkGetHypervVM($clusterConnect)
	// rkGetMSSQL($clusterConnect)
	// rkGetMSSQLInstanceID($clusterConnect,$dbName,$dbHost)
	// rkGetMSSQLSnapshotSize($clusterConnect,$dbID,$DateTime)
	// rkGetMSSQLid($clusterConnect,$dbName,$dbHost)
	// rkGetNutanixVM($clusterConnect)
	// rkGetObjectStatus($clusterConnect,$objectName)
	// rkGetRecoveryStatus($clusterConnect,$object,$jobID)
	// rkGetReportID($clusterConnect,$reportName)
	// rkGetSnapshotCount($clusterConnect)
	// rkGetSpecificMSSQL($clusterConnect,$sqlID)
	// rkGetSupportToken($clusterConnect)
	// rkGetSupportTunnel($clusterConnect)
	// rkGetTimeStamp($dateString)
	// rkGetUnmanaged($clusterConnect)
	// rkGetUnmanagedSnapshots($clusterConnect,$ID)
	// rkGetWindowsFilesets($clusterConnect)
	// rkGetmssqlSnapshot($clusterConnect,$mssqlID)
	// rkGetvmwareVM($clusterConnect)
	// rkMSSQLRestore($clusterConnect,$dbSourceID,$dbTargetInstanceID,$dbTargetName,$timeStamp,$dbFilePath,$overwrite=false)
	// rkMSSQLgetFiles($clusterConnect,$dbSourceID,$dbRecoveryTime)
	// rkRefreshHost($clusterConnect,$hostName)
	// rkRefreshReport($clusterConnect,$rptID)
	
	// ---------------------------------------------------------------------------
	// Function to populate a return variable (JSON text) with all cluster details
	// ---------------------------------------------------------------------------
	
	function rkGetClusterDetails($clusterConnect)
	{
		$API="/api/v1/cluster/me";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);
		return $result;
	}

	// ---------------------------------------------------------------------------
	// Function to check if you have sufficient rights or correct credentials to connect
	// ---------------------------------------------------------------------------
	
	function rkCheckAccess($clusterConnect)
	{
		$API="/api/v1/cluster/me";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);

		if($result=="The request was a legal request, but the server is refusing to respond to it.")
		{
			return("right_error");
		}
		if(strpos($result,"\"message\":\"Incorrect username/password\""))
		{
			return("credentials_error");
		}
		if(strpos($result,"apiVersion"))
		{
			return("ok");
		}
		else return ("Unable to connect");
	}

	// --------------------------------------------------
	// Function to get defined filesets in the cluster
	// --------------------------------------------------
	
	function rkGetFileSet($clusterConnect)
	{
		$API="/api/v1/fileset";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);

		return json_decode($result);
	}
	
	// --------------------------------------------------
	// Function to initiate a fileset protection
	// --------------------------------------------------
	
	function rkFileSetBackup($clusterConnect,$filesetId)
	{
		$API="/api/v1/fileset/".urlencode($filesetId)."/snapshot";
				
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS,array());
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Accept: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);

		return(json_decode($result));
	
	}
	
	// --------------------------------------------------
	// Function to get the running version on the cluster
	// --------------------------------------------------
	
	function rkGetClusterVersion($clusterConnect)
	{
		$API="/api/v1/cluster/me";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);

		return json_decode($result)->version;
	}
		
	// ----------------------------------------------------------------------------
	// Function to populate a return variable (JSON text) with all SLA's configured
	// ----------------------------------------------------------------------------

	function getRubrikSLAs($clusterConnect)
	{
		// Check if cluster is running v 5.0.0-p1-827 in this case, need to invoke api v2 call
		$ver=rkGetClusterVersion($clusterConnect);

		if($ver=="5.0.0-p1-827") $API="/api/v2/sla_domain?sort_order=asc";
		else $API="/api/v1/sla_domain?sort_order=asc";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);

		return $result;	
	}
	
	// ----------------------------------------------------------------------------
	// Function who returns the Rubrik Cluster ID
	// ----------------------------------------------------------------------------

	function getRubrikClusterID($clusterConnect)
	{
		$API="/api/v1/cluster/me";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);
		$tmp=json_decode($result);
		$id=$tmp -> id;

		return $id;
	}

	// -------------------------------------------------------
	// Function who returns the last num events in the Cluster
	// -------------------------------------------------------
 
 	// Possible values for $eventType are :
	//
	// Archive, Audit, AuthDomain, Backup, CloudNativeSource, Configuration, Diagnostic, Instanciate, Maintenance, 
	// NutanixCluster, Recovery, Replication, StorageArray, System, Vcd, VCenter
	
	function getRubrikEvents($clusterConnect,$numEvents,$eventType="Backup",$objectType,$objectName)
	{
	
		$API="/api/internal/event?limit=".$numEvents."&event_type=".$eventType;

		if($objectType!="") $API=$API."&object_type=".$objectType;
		if($objectName!="") $API=$API."&object_name=".$objectName;

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);

		return $result;
	}

	// -----------------------------------------------
	// Function who returns backup status of an object
	// -----------------------------------------------
	
	function rkGetObjectStatus($clusterConnect,$objectName)
	{
	
		$API="/api/internal/event?&object_name=".$objectName."&show_only_latest=false&filter_only_on_latest=true&event_type=Backup";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);

		return json_decode($result);
	}

	// -------------------------------------------------------
	// Function who returns total storage capacity for cluster
	// -------------------------------------------------------

	function getRubrikTotalStorage($clusterConnect)
	{
		$API="/api/internal/cluster/me/disk_capacity";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);

		return $result;
	}

	// -----------------------------------------------------
	// Function who returns available storage in the Cluster
	// -----------------------------------------------------

	function getRubrikAvailableStorage($clusterConnect)
	{
		$API="/api/internal/stats/available_storage";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);

		return json_decode($result)->value;
	}
	
	// ---------------------------------------------------
	// Function who returns runway in days for the cluster
	// ---------------------------------------------------

	function getRubrikRunway($clusterConnect)
	{
		$API="/api/internal/stats/runway_remaining";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);

		return json_decode($result)->days;
	}
		
	// ---------------------------------------------------
	// Function who returns number of nodes in cluster
	// ---------------------------------------------------

	function getRubrikNodeCount($clusterConnect)
	{
		$API="/api/internal/cluster/me/node";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);

// 		$node_count=json_decode($result)->total;
		return json_decode($result);
	}

	// ---------------------------------------------------
	// Function who returns all snapshots of a fileset
	// ---------------------------------------------------

	function rkGetFilesetSnaps($clusterConnect,$filesetID)
	{
		$API="/api/v1/fileset/".urlencode($filesetID);

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);

		return json_decode($result);
	}

	// ---------------------------------------------------------------
	// Function who returns URL for downloading a file from a snapshot
	// ---------------------------------------------------------------

	function rkGetFileURLfromSnap($clusterConnect,$snapshotID,$fileName)
	{
		// Step 1 - Generate URL

		$API="/api/internal/fileset/snapshot/".$snapshotID."/download_files";
		$config_params="
		{
			  \"sourceDirs\": [
				\"".$fileName."\"
			  ]
		}";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS,$config_params);
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: '.strlen($config_params),'Accept: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		$result = json_decode(curl_exec($curl));
		$info=curl_getinfo($curl,CURLINFO_HTTP_CODE);
		curl_close($curl);

		$id=$result->id;
		
		// Step 2 - Get generated URL from above id Generating URL takes few second, need to loop until SUCCEEDED
		
		$API="/api/v1/fileset/request/".urlencode($id);

		$Stat="RUNNING";

		while ($Stat!="SUCCEEDED")
		{
			sleep(1);
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			$result = json_decode(curl_exec($curl));
			curl_close($curl);
			if($result->status=="SUCCEEDED") $Stat="SUCCEEDED";
		}

		return($result->links[1]->href);
	}

	// ---------------------------------------------------
	// Function who returns all MS SQL object details
	// ---------------------------------------------------

	function rkGetMSSQL($clusterConnect)
	{
		$API="/api/v1/mssql/db";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);

		return $result;
	}
	
	// ------------------------------------------------
	// Function who returns list of unmanaged snapshots
	// ------------------------------------------------

	function rkGetUnmanagedSnapshots($clusterConnect,$ID)
	{
		$API="/api/internal/unmanaged_object/".urlencode($ID)."/snapshot";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = json_decode(curl_exec($curl));
		curl_close($curl);	

		return($result);
	}

	// ---------------------------------------------------
	// Function who returns details for FileSets snapshots
	// ---------------------------------------------------

	function rkGetFileSetSnapshotsDetails($clusterConnect,$ID)
	{
		$API="/api/v1/fileset/snapshot/".$ID."?verbose=true";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = json_decode(curl_exec($curl));
		curl_close($curl);	

		return($result);
	}
	
	
	// ---------------------------------------------------
	// Function who returns all Windows FileSets
	// ---------------------------------------------------

	function rkGetWindowsFilesets($clusterConnect)
	{
		$API="/api/internal/host_fileset?operating_system_type=Windows";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);

		return $result;
	}

	// ---------------------------------------------------
	// Function who returns all Nutanix VMs
	// ---------------------------------------------------

	function rkGetNutanixVM($clusterConnect)
	{
		$API="/api/internal/nutanix/vm";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);
		return json_decode($result);
	}
	
	// ---------------------------------------------------
	// Function who returns all vmware VMs
	// ---------------------------------------------------

	function rkGetvmwareVM($clusterConnect)
	{
		$API="/api/v1/vmware/vm";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);

		return json_decode($result);
	}

	// ---------------------------------------------------
	// Function who returns all hyper-v VMs
	// ---------------------------------------------------

	function rkGetHypervVM($clusterConnect)
	{
		$API="/api/internal/hyperv/vm";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);

		return json_decode($result);
	}
	
	// ---------------------------------------------------
	// Function who returns specific MS SQL object details
	// ---------------------------------------------------

	function rkGetSpecificMSSQL($clusterConnect,$sqlID)
	{
		$API="/api/v1/mssql/db/".urlencode($sqlID);

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);

		return $result;
	}

	// ---------------------------------------------------
	// Function who returns MS SQL ID from Name
	// ---------------------------------------------------

	function rkGetMSSQLid($clusterConnect,$dbName,$dbHost)
	{
		$API="/api/v1/mssql/db";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		$result = json_decode($result)->data;
		curl_close($curl);

		$dbID='';

		for($i=0;$i<count($result);$i++)
		{
			if(($result[$i]->name==$dbName || $result[$i]->InstanceName==$dbName) && $result[$i]->rootProperties->rootName==$dbHost)
			{
// 				print("id : \t\t\t\t".rkColorOutput($result[$i]->id)."\n");     		
// 				print("Host : \t\t\t\t".rkColorOutput($result[$i]->rootProperties->rootName)."\n");
				$dbID=$result[$i]->id;
			}
		}
		return($dbID);
	}

	// --------------------------------------------------------
	// Function who returns MS SQL Instance ID from Name / Host
	// --------------------------------------------------------

	function rkGetMSSQLInstanceID($clusterConnect,$dbName,$dbHost)
	{
		$API="/api/v1/mssql/instance";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		$result = json_decode($result)->data;
		curl_close($curl);

		$instanceID='';
		for($i=0;$i<count($result);$i++)
		{
			if($result[$i]->name==$dbName && $result[$i]->rootProperties->rootName==$dbHost)
			{
				$instanceID=$result[$i]->id;
			}
		}
		return $instanceID;
	}
	
	// ---------------------------------------------------
	// Function converts SLA name to SLA ID
	// ---------------------------------------------------

	function getRubrikSLAname($clusterConnect,$SLAid)
	{
		$API="/api/v1/sla_domain";
		
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);
		
		$result=json_decode($result)->data;
		
		$myName='';
		for($i=0;$i<count($result);$i++)
		{
			if($result[$i]->id == $SLAid) $myName=$result[$i]->name;
		}

		return($myName);		
	}

	// ---------------------------------------------------------------------------
	// Function to get MS SQL file details
	// ---------------------------------------------------------------------------
	
	function rkMSSQLgetFiles($clusterConnect,$dbSourceID,$dbRecoveryTime)
	{
		$API="/api/internal/mssql/db/".urlencode($dbSourceID)."/restore_files?time=".$dbRecoveryTime;
		
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);
		
		$result=json_decode($result);
		
		return($result);		
	}
	
	// ---------------------------------------------------------------------------
	// Restore MS SQL DB at a given time
	// ---------------------------------------------------------------------------
	
	function rkMSSQLRestore($clusterConnect,$dbSourceID,$dbTargetInstanceID,$dbTargetName,$timeStamp,$dbFilePath,$overwrite=false)
	{
		$path=addslashes($dbFilePath);

		// Since Andes - CDM v 5.x - target DB overwrite is possible.
		// I CDM version >= 5.x and $overwrite=true -> overwrite will be initiated
		$cdmver=rkGetClusterVersion($clusterConnect);
		
		if($cdmver[0]>="5")
		{
			// Ok to use $overwrite content
			$v5=true;
		}
		else
		{
			// $overwrite will be ignored
			$v5=false;
		}
		
		// Get original logicalName

		// Convert epoch to SQL time stamp
		$names=rkMSSQLgetFiles($clusterConnect,$dbSourceID,rkEpochToSQL(substr($timeStamp, 0, -3)));

		$logicalName1=$names[0]->logicalName;
		$logicalName2=$names[1]->logicalName;
		$fileName1=$names[0]->originalName;
		$fileName2=$names[1]->originalName;
		
		// Note : logicalName must be the same as the source DB. It can be changed using newlogicalName
		$tSQL=json_decode(rkGetMSSQL($clusterConnect))->data;

		for($i=0;$i<count($tSQL);$i++)
		{
			if($tSQL[$i]->id==$dbSourceID) 
			{
				$logicalName=$tSQL[$i]->name;
			}
		}
		
		if($v5)
		{
			$overwrite=var_export($overwrite,true);
			$config_params=
			"{
				\"recoveryPoint\": 
				{
					\"timestampMs\": ".$timeStamp."
				},
				\"targetInstanceId\": \"".$dbTargetInstanceID."\",
				\"targetDatabaseName\": \"".$dbTargetName."\",
				\"targetFilePaths\": 
				[
					{
						\"logicalName\": \"".$logicalName1."\",
						\"exportPath\": \"".$path."\"
					},
					{
						\"logicalName\": \"".$logicalName2."\",
						\"exportPath\": \"".$path."\"
					}
				],
				\"finishRecovery\": true,
				\"maxDataStreams\": 4,
				\"allowOverwrite\": ".$overwrite."
			}";
		}
		else
		{
			$config_params=
			"{
				\"recoveryPoint\": 
				{
					\"timestampMs\": ".$timeStamp."
				},
				\"targetInstanceId\": \"".$dbTargetInstanceID."\",
				\"targetDatabaseName\": \"".$dbTargetName."\",
				\"targetFilePaths\": 
				[
					{
						\"logicalName\": \"".$logicalName1."\",
						\"exportPath\": \"".$path."\"
					},
					{
						\"logicalName\": \"".$logicalName2."\",
						\"exportPath\": \"".$path."\"
					}
				],
				\"finishRecovery\": true,
				\"maxDataStreams\": 4
			}";
		}
		$API="/api/v1/mssql/db/".urlencode($dbSourceID)."/export";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS,$config_params);
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($config_params),'Accept: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		$result = json_decode(curl_exec($curl));
		curl_close($curl);
		return $result;
	}
	
	// ---------------------------------------------------------------------------
	// Get recovery status of specified object, returns status, info and time and
	// if not completed, the progress in %age
	// ---------------------------------------------------------------------------

	function rkGetRecoveryStatus($clusterConnect,$object,$jobID)
	{
		$API="/api/internal/event?&event_type=Recovery&object_name=".$object."&show_only_latest=true";
		
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);
		
		$result=json_decode($result)->data;
		var_dump($result);
		var_dump($object);

		// Match associated $jobID
		foreach ($result as $item) 
		{
			if($item->jobInstanceId==$jobID)
			{
				$res["time"]=$item->time;
				if(isset($item->eventProgress))
				{
					$res["progress"]=$item->eventProgress;
				}
		
				$res["status"]=$result[0]->eventStatus;
				$res["info"]=$result[0]->eventInfo;
				
				//Not clean, I know ... looking for other solution
				break;
			}
			else
			{
				$res["time"]="Mon Jan 14 12:00:00 UTC 2019";
				$res["status"]="error - not found !";
				$res["info"]="error - not found !";
			}
		}
		return $res;
	}

	// ---------------------------------------------------
	// Function returning snapshot of an MS SQL DB
	// ---------------------------------------------------

	function rkGetmssqlSnapshot($clusterConnect,$mssqlID)
	{
		$API="/api/v1/mssql/db/".urlencode($mssqlID)."/snapshot";
		
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);
		
		return(json_decode($result));
	}

	// ---------------------------------------------------
	// Function generating support token
	// ---------------------------------------------------

	function rkGetSupportToken($clusterConnect)
	{
		$API="/api/v1/session";
		
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS,array());
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Accept: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);

		return(json_decode($result));
	}
		
	// ---------------------------------------------------------------------------
	// Convert Rubrik human readable time to EPOCH time used in APIs
	// ---------------------------------------------------------------------------
	
	function rkGetEpoch($dateString)
	{
		$epoch=DateTime::createFromFormat("D M d H:i:s e Y",$dateString);
		return date_format($epoch,'U')."000";
	}
	
	function rkGetEpoch2($dateString)
	{
		$epoch=DateTime::createFromFormat("D M d H:i:s e Y",$dateString);
		return date_format($epoch,'U');
	}


	// ---------------------------------------------------------------------------
	// Convert SQL human readable time to timestamp
	// ---------------------------------------------------------------------------
	
	function rkGetTimeStamp($dateString)
	{
		$tmp1=str_replace('T', ' ', $dateString);
		$tmp2=trim(str_replace('.000Z', ' ', $tmp1));
		$tmp3=strtotime($tmp2);
		return $tmp3;
	}

	// ---------------------------------------------------------------------------
	// Convert Epoch time to SQL human readable time
	// ---------------------------------------------------------------------------
 
 	function rkEpochToSQL($EpochTime)
	{				
		$SQLTime=DateTime::createFromFormat("U",$EpochTime);
		return date_format($SQLTime,"Y-m-d\TH:i:s");
	}
	
	// ---------------------------------------------------------------------------
	// Get physical size of a snapshot (for restoration purpose)
	// ---------------------------------------------------------------------------
 
 	function rkGetMSSQLSnapshotSize($clusterConnect,$dbID,$DateTime)
 	{
		// 3 Steps 	
 		// Step 1 : Get snapshot id based on time /api/v1/mssql/db/<id>/snapshot?after_time=<time1>&before_time=<time2>

		$API="/api/v1/mssql/db/".$dbID."/snapshot?after_time=".urlencode($DateTime)."&before_time=".urlencode($DateTime);

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);
		
 		// Step 2 : Get snapable_id /api/internal/mssql/db/<id>/snappable_id

		$snapshotID=json_decode($result)->data[0]->id;
		
		$API="/api/internal/mssql/db/".$dbID."/snappable_id";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);

		$snappableID=json_decode($result)->snappableId;

 		// Step 3 : Get size of object /api/internal/snapshot/<id>/storage/stats?snappable_id=<id>

		$API="/api/internal/snapshot/".$snapshotID."/storage/stats?snappable_id=".$snappableID;

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);

		return(json_decode($result)->logicalBytes);
		
 	}

	// ---------------------------------------------------------------------------
	// Get host id from hostname
	// ---------------------------------------------------------------------------
 
 	function rkGetHostID($clusterConnect,$hostName)
 	{
		$API="/api/v1/host?hostname=".urlencode($hostName);

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);

		if(isset(json_decode($result)->data[0]->id)) return json_decode($result)->data[0]->id;
		else return(FALSE);
		
 	}

	// ---------------------------------------------------------------------------
	// Send query to refresh specific host (updating DB, Files, number of VMs)
	// ---------------------------------------------------------------------------
	
	function rkRefreshHost($clusterConnect,$hostName)
	{
		$hostID=rkGetHostID($clusterConnect,$hostName);

		$API="/api/v1/host/".urlencode($hostID)."/refresh";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS,array());
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Accept: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		$result = curl_exec($curl);
		curl_close($curl);

		return($result);
	}

	// ---------------------------------------------------------------------------
	// Return connected if the $hotName agent is reachable
	// ---------------------------------------------------------------------------
	
	function rkGetAgentConnectivity($clusterConnect,$hostName)
	{
		if($hostName) $API="/api/internal/host/envoy?hostname=".$hostName;
		else $API="/api/internal/host/envoy";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		$result = curl_exec($curl);
		curl_close($curl);
		
		if($hostName=="") return(json_decode($result));
		else return(json_decode($result->data[0]->status));
	}

	// ---------------------------------------------------------------------------
	// Get Status of the support tunnel
	// ---------------------------------------------------------------------------
 
 	function rkGetSupportTunnel($clusterConnect)
 	{
		$API="/api/internal/cluster/me/node";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);

		if(isset($result)) return $result;
		else return(FALSE);
		
 	}

	// ---------------------------------------------------------------------------
	// Get Snapshots sizes (ingested, logical and physical) in the entire cluster
	// ---------------------------------------------------------------------------
 
 	function rkGetAllSnapshotInfo($clusterConnect)
 	{
		$snapshots=array();
		// 3 Steps 	

 		// Step 1 : Get ingested snapshots size -> /api/internal/stats/snapshot_storage/ingested

		$API="/api/internal/stats/snapshot_storage/ingested";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);

		$snapshots["Ingested"]=formatBytes(json_decode($result)->value);

 		// Step 2 : Get logical snapshots size -> /api/internal/stats/snapshot_storage/logical
		
		$API="/api/internal/stats/snapshot_storage/logical";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);

		$snapshots["Logical"]=formatBytes(json_decode($result)->value);

 		// Step 3 : Get physical snapshots size -> /api/internal/stats/snapshot_storage/physical

		$API="/api/internal/stats/snapshot_storage/physical";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);

		$snapshots["Physical"]=formatBytes(json_decode($result)->value);
						
 		return($snapshots);
 	}
	
	// ---------------------------------------------------------------------------
	// Get list of unmanaged objects
	// ---------------------------------------------------------------------------
 
 	function rkGetUnmanaged($clusterConnect)
 	{
		$API="/api/internal/unmanaged_object";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);

		if(isset($result)) return $result;
		else return(FALSE);
		
 	}

	// ---------------------------------------------------------------------------
	// Delete specific unmanaged snapshot
	// ---------------------------------------------------------------------------
 
 	function rkDeleteUnmanaged($clusterConnect,$ObjID)
 	{
		$API="/api/internal/unmanaged_object/snapshot/bulk_delete";
		$config_params="
		{
  			\"objectDefinitions\": [
    					{
      						\"objectId\": \"".$ObjID."\"
    					}
  			]
		}";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS,$config_params);
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: '.strlen($config_params),'Accept: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		$result = json_decode(curl_exec($curl));
		$info=curl_getinfo($curl,CURLINFO_HTTP_CODE);
		curl_close($curl);
		
		return $result;
 	
 	}

	// ---------------------------------------------------------
	// Get number of failed backup event occurence for an object
	// ---------------------------------------------------------
 
 	function rkGetFailedAmount($clusterConnect,$objectName)
 	{
		$API="/api/internal/event?status=Failure&event_type=Backup&object_name=".urlencode($objectName)."&show_only_latest=true&filter_only_on_latest=true";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);

		return json_decode($result);
		
 	}

	// ---------------------------------------------------------------------------
	// Get total number of snapshots in cluster
	// ---------------------------------------------------------------------------
 
 	function rkGetSnapshotCount($clusterConnect)
 	{
		$API="/api/internal/vmware/vm/snapshot/count";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);

		if(isset($result))
		{
			// cleanup result by removing unwanted characters
			$tmp=explode(":", $result);
			$res=$tmp[1];
			$res=str_replace('}', '', $res);
			return $res;
		} 
		else return(FALSE);
 	}

	// ------------------------------------------------------------------------------
	// Keep last $keepAmount number of snapshot for $objName in the unmanaged section
	// ------------------------------------------------------------------------------
	
	function rkDelUnmanagedObject($clusterConnect,$objName,$keepAmount)
	{
		// Step 1 : Get object ID
	
		$API="/api/internal/unmanaged_object?search_value=".$objName;

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = json_decode(curl_exec($curl))->data[0]->id;
		$objectID=$result;
		curl_close($curl);	

		// Step 2 : Get all associated snapshots
		
		$API="/api/internal/unmanaged_object/".urlencode($objectID)."/snapshot";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = json_decode(curl_exec($curl));
		curl_close($curl);	
			
		// Step 3 : identify snapshot ID of selected jobs
		
		$snapshots=array();
		
		for($i=0;$i<count($result->data);$i++)
		{
					$snapshots[$i]["date"]=$result->data[$i]->date;
					$snapshots[$i]["id"]=$result->data[$i]->id;
		}
		
		// Sort array to have them in chronological order
		sort($snapshots);
		
		// Step 4 : select last 3. If snapshot count less or equal to 3 keep them all -> do nothing

		$toDel=array();

		for($i=0;($i<count($snapshots)) && (count($snapshots)-$i>$keepAmount);$i++)
		{
// 			print("Delete : ".$snapshots[$i]["id"]." - taken on : ".$snapshots[$i]["date"]."\n");
			$toDel[]=$snapshots[$i]["id"];
		}

		// If we have items to delete, let's delete them

		if(count($toDel))
		{
			// Step 4 : delete : api/internal/unmanaged_object/Fileset%3A%3A%3A0f41fdb9-2dbf-4d75-bfcd-98ad46a0514c/snapshot/bulk_delete
			// If result = 204 : it worked !

			$API="/api/internal/unmanaged_object/".urlencode($objectID)."/snapshot/bulk_delete";

			if(count($toDel)==1)
			{
					$config_params="
						{
							\"snapshotIds\": [
									\"".$toDel[0]."\"
											]
						}";
			}
			else
			{
					$config_params="
						{
							\"snapshotIds\": [";
					for($i=0;$i<count($toDel)-1;$i++)
					{
						$config_params.=								"\"".$toDel[$i]."\",";
					}
					$config_params.="\"".$toDel[count($toDel)-1]."\"";
					$config_params.="		
								
											]
						}";
			}

			$curl = curl_init();
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS,$config_params);
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: '.strlen($config_params),'Accept: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

			$result = json_decode(curl_exec($curl));
			$info=curl_getinfo($curl,CURLINFO_HTTP_CODE);
			curl_close($curl);

			if($info==204) return TRUE;
			else return FALSE;
		}
		else
		{
			// Nothing to del, just return "nothing to do"";
			return "nothing to do";
		}
	}
		
	// ---------------------------------------------------------------------------
	// Create report based on specifications
	// ---------------------------------------------------------------------------
 
 	function rkCreateReport($clusterConnect,$rptName,$rptSpecs)
 	{
		$API="/api/internal/report";
		
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS,$rptSpecs);
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: '.strlen($rptSpecs),'Accept: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		$result = json_decode(curl_exec($curl));
		
		$info=curl_getinfo($curl,CURLINFO_HTTP_CODE);
		curl_close($curl);
		
		// if return 201 all is ok
		return $info;
 	}
 	
	// ---------------------------------------------------------------------------
	// Return report ID based on report name
	// ---------------------------------------------------------------------------

 	function rkGetReportID($clusterConnect,$reportName)
 	{
		$API="/api/internal/report?name=".urlencode($reportName)."&sort_by=name&sort_order=asc";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result=curl_exec($curl);
		$result=json_decode($result);
		curl_close($curl);

		return $result->data[0]->id;
 	}

	// ---------------------------------------------------------------------------
	// Apply a schedule on a report
	// ---------------------------------------------------------------------------

	function rkCreateReportSchedule($clusterConnect,$rptID,$scheduleDefinition)
	{
		$API="/api/internal/report/".urlencode($rptID)."/email_subscription";
		
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS,$scheduleDefinition);
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: '.strlen($scheduleDefinition),'Accept: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		$result = json_decode(curl_exec($curl));
		
		$info=curl_getinfo($curl,CURLINFO_HTTP_CODE);
		curl_close($curl);
		
		// if return 200 all is ok
		return $info;
	}

	// ---------------------------------------------------------------------------
	// Refresh rerpot data
	// ---------------------------------------------------------------------------

	function rkRefreshReport($clusterConnect,$rptID)
	{
		$API="/api/internal/report/".urlencode($rptID)."/refresh";
		
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS,array());
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Accept: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		$result = json_decode(curl_exec($curl));
		
		$info=curl_getinfo($curl,CURLINFO_HTTP_CODE);
		curl_close($curl);
		
		// if return 202 all is ok
		return $info;
	}


	// ---------------------------------------------------------------------------
	// Display a string in Rubrik Cyan!!!
	// ---------------------------------------------------------------------------
	
	function rkColorOutput($string)
	{
		return ("\e[1;36m".$string."\033[0m");
	}
	
	// ---------------------------------------------------------------------------
	// Display a string in red
	// ---------------------------------------------------------------------------
	
	function rkColorRed($string)
	{
		return ("\e[1;31m".$string."\033[0m");
	}
		
	// ---------------------------------------------------------------------------
	// Display size (bytes) in human redable format
	// ---------------------------------------------------------------------------
	
	function rkFormatBytes($bytes, $decimals = 2, $system = 'metric')
	{
		$mod = ($system === 'binary') ? 1024 : 1000;
		$units = array(
			'binary' => array('B','KiB','MiB','GiB','TiB','PiB','EiB','ZiB','YiB',
			),
			'metric' => array('B','KB','MB','GB','TB','PB','EB','ZB','YB',	
			),
		);

		$factor = floor((strlen($bytes) - 1) / 3);
		return sprintf("%.{$decimals}f %s", $bytes / pow($mod, $factor), $units[$system][$factor]);
	}

?>
