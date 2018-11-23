<?PHP

	//////////////////////////////////////////////////////////////////////////////
	//                   Rubrik Php Framework version 0.5                       //
	//                  (c) 2018 - F. Lhoest -                                  //
	//////////////////////////////////////////////////////////////////////////////
	
	// Function Inventory
	// ------------------
	
	// getRubrikClusterDetails($clusterConnect)
	// getRubrikSLAs($clusterConnect)
	// getRubrikClusterID($clusterConnect)
	// getRubrikEvents($clusterConnect,$numEvents,$eventType="Backup",$objectType,$objectName)
	// getRubrikTotalStorage($clusterConnect)
	// getRubrikRunway($clusterConnect)
	// getRubrikNodeCount($clusterConnect)
	// rkGetMSSQL($clusterConnect)
	// rkGetSpecificMSSQL($clusterConnect,$sqlID)
	// rkGetMSSQLid($clusterConnect,$dbName,$dbHost)	
	// getRubrikSLAname($clusterConnect,$SLAid)
	// rkMSSQLRestore($clusterConnect,$dbSourceID,$dbTargetInstance,$dbTargetName,$timeStamp,$dbFilePath)	
	// rkGetEpoch($dateString)
	// rkColorOutput($string)
	
	// ---------------------------------------------------------------------------
	// Function to populate a return variable (JSON text) with all cluster details
	// ---------------------------------------------------------------------------
	
	function getRubrikClusterDetails($clusterConnect)
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
		
	// ----------------------------------------------------------------------------
	// Function to populate a return variable (JSON text) with all SLA's configured
	// ----------------------------------------------------------------------------

	function getRubrikSLAs($clusterConnect)
	{
		$API="/api/v1/sla_domain?sort_order=asc";

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

		return $result;
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

		return $result;
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

		return $result;
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
			if($result[$i]->name==$dbName && $result[$i]->rootProperties->rootName==$dbHost)
			{
// 				print("id : \t\t\t\t".rkColorOutput($result[$i]->id)."\n");     		
// 				print("Host : \t\t\t\t".rkColorOutput($result[$i]->rootProperties->rootName)."\n");
				$dbID=$result[$i]->id;
			}
		}
		return $dbID;
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
	
	function rkMSSQLRestore($clusterConnect,$dbSourceID,$dbTargetInstanceID,$dbTargetName,$timeStamp,$dbFilePath)
	{
		$path=addslashes($dbFilePath);
		
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
		
		// Challenge, the source DB snapshot contains path data for datafile and log file. They need to either match the target env or be changed.
		
		$config_params=
// 		"{
// 			\"recoveryPoint\": 
// 			{
// 				\"timestampMs\": ".$timeStamp."
//   			},
//   			\"targetInstanceId\": \"".$dbTargetInstanceID."\",
//   			\"targetDatabaseName\": \"".$dbTargetName."\",
//   			\"targetFilePaths\": 
//   			[
//     			{
//       				\"logicalName\": \"".$logicalName."\",
//       				\"newlogicalName\": \"".$dbTargetName."_Data\",
//       				\"exportPath\": \"".$path."\",
//       				\"newFilename\": \"".$dbTargetName.".mdf\"
//     			},
//     			{
//       				\"logicalName\": \"".$logicalName."_B\",
//       				\"newlogicalName\": \"".$dbTargetName."_LOG\",
//       				\"exportPath\": \"".$path."\",
//       				\"newFilename\": \"".$dbTargetName.".ldf\"
//     			}
//   			],
//   			\"finishRecovery\": true,
//   			\"maxDataStreams\": 1
// 		}";

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

// 		var_dump($config_params);
// 		exit();

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
	// Convert Rubrik human readable time to EPOCH time used in APIs
	// ---------------------------------------------------------------------------
	
	function rkGetEpoch($dateString)
	{
		$epoch=DateTime::createFromFormat("D M d H:i:s e Y",$dateString);
		return date_format($epoch,'U')."000";
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
	
	function formatBytes($bytes, $decimals = 2, $system = 'metric')
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
