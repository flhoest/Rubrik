<?php

	//////////////////////////////////////////////////////////////////////////////
	//                   Rubrik Php Framework version 1.52                      //
	//                     (c) 2018-2021 - F. Lhoest                            //
	//////////////////////////////////////////////////////////////////////////////
	//                     Created on macOS with BBEdit                         //
	//////////////////////////////////////////////////////////////////////////////
		
	/*				__________        ___.            .__  __    
					\______   \ __ __ \_ |__  _______ |__||  | __
					 |       _/|  |  \ | __ \ \_  __ \|  ||  |/ /
					 |    |   \|  |  / | \_\ \ |  | \/|  ||    < 
					 |____|_  /|____/  |___  / |__|   |__||__|_ \
						\/             \/                  \/ Php Framework
	*/

	// Function index in alphabetical order (total 92)
	//------------------------------------------------

	// day2text($days)
	// getRubrikAvailableStorage($clusterConnect)
	// getRubrikClusterID($clusterConnect)
	// getRubrikEvents($clusterConnect,$numEvents,$eventType="Backup",$objectType,$objectName)
	// getRubrikNodeCount($clusterConnect)
	// getRubrikSLAs($clusterConnect)
	// getRubrikTotalStorage($clusterConnect)
	// printReport($data)
	// rkAddAdminRoleLDAP($clusterConnect,$principalName)
	// rkAddLDAP($clusterConnect,$LDAP)
	// rkCheckAccess($clusterConnect)
	// rkColorOutput($string)
	// rkColorRed($string)
	// rkCreateReport($clusterConnect,$rptName,$rptSpecs)
	// rkCreateReportSchedule($clusterConnect,$rptID,$scheduleDefinition)
	// rkCreateSLA($clusterConnect,$slaName,$HFreq,$HRet,$DFreq,$DRet,$MFreq,$MRet,$YFreq,$YRet)
	// rkCreateUser($clusterConnect,$userName,$Password)
	// rkDelUnmanagedObject($clusterConnect,$objName,$keepAmount)
	// rkDeleteUnmanaged($clusterConnect,$ObjID)
	// rkDeleteUser($clusterConnect,$userID)
	// rkEpochToSQL($EpochTime)
	// rkFileSetBackup($clusterConnect,$filesetId)
	// rkFileSetExport($clusterConnect,$snapshotID,$targetHostID,$sourcePath,$targetPath)
	// rkFormatBytes($bytes,$decimals=2,$system='metric')
	// rkGetAgentConnectivity($clusterConnect,$hostName)
	// rkGetAllSnapshotInfo($clusterConnect)
	// rkGetBlackout($clusterConnect)
	// rkGetClusterDetails($clusterConnect)
	// rkGetClusterVersion($clusterConnect)
	// rkGetDataReport($clusterConnect,$rptID)
	// rkGetESXVMConfig($clusterConnect,$vmName)
	// rkGetEpoch($dateString)
	// rkGetEpoch2($dateString)
	// rkGetFailedAmount($clusterConnect,$objectName)
	// rkGetFileSet($clusterConnect)
	// rkGetFileSetSnapSize($clusterConnect,$snapshotID,$absolutePath)
	// rkGetFileSetSnapshotsDetails($clusterConnect,$ID)
	// rkGetFileURLfromSnap($clusterConnect,$snapshotID,$fileName)
	// rkGetFilesetID($clusterConnect,$host,$fileSetName)
	// rkGetFilesetSnaps($clusterConnect,$filesetID)
	// rkGetHostID($clusterConnect,$hostName)
	// rkGetHumanTime($timeStamp)
	// rkGetHypervVM($clusterConnect)
	// rkGetLastSnapDuration($clusterConnect,$vmName)
	// rkGetMSSQL($clusterConnect)
	// rkGetMSSQLInstanceID($clusterConnect,$dbName,$dbHost)
	// rkGetMSSQLLastRecoveryPoint($clusterConnect,$msSQLID)
	// rkGetMSSQLRecoveryStatus($clusterConnect,$requestID)
	// rkGetMSSQLSnapshotSize($clusterConnect,$dbID,$DateTime)
	// rkGetMSSQLdbID($clusterConnect,$sqlInstanceID,$sqlDBName)
	// rkGetMSSQLid($clusterConnect,$dbName,$dbHost)
	// rkGetNutanixVM($clusterConnect)
	// rkGetNutanixVMSnaps($clusterConnect,$NutanixVMID)
	// rkGetNutanixVMiD($clusterConnect,$NutanixVMName)
	// rkGetObjectStatus($clusterConnect,$objectName)
	// rkGetRecoveryStatus($clusterConnect,$object,$jobID)
	// rkGetReportID($clusterConnect,$reportName)
	// rkGetReportStatus($clusterConnect,$reportName)
	// rkGetRunway($clusterConnect)
	// rkGetSLAStorage($clusterConnect,$SLAid)
	// rkGetSLAid($clusterConnect,$SLAname)
	// rkGetSLAname($clusterConnect,$SLAid)
	// rkGetSLAs($clusterConnect)
	// rkGetSnapshotCount($clusterConnect)
	// rkGetSnapshotFromFilesetID($clusterConnect,$filesetID)
	// rkGetSnapshotSize($clusterConnect,$vmID,$snapID)
	// rkGetSpecificMSSQL($clusterConnect,$sqlID)
	// rkGetSupportToken($clusterConnect)
	// rkGetSupportTunnel($clusterConnect)
	// rkGetTimeStamp($dateString)
	// rkGetUnmanaged($clusterConnect)
	// rkGetUnmanagedSnapshots($clusterConnect,$ID)
	// rkGetUserDetails($clusterConnect,$userID)
	// rkGetUserID($clusterConnect,$userName)
	// rkGetUserName($clusterConnect,$userID)
	// rkGetUserPriviledges($clusterConnect,$userID)
	// rkGetUsers($clusterConnect)
	// rkGetWindowsFilesets($clusterConnect)
	// rkGetmssqlSnapshot($clusterConnect,$mssqlID)
	// rkGetvmwareVM($clusterConnect)
	// rkGetvmwareVMId($clusterConnect,$vmName)
	// rkGetvmwareVMSnaps($clusterConnect,$vmwareVMID)
	// rkIntegrityResult($clusterConnect,$eventID)
	// rkMSSQLRestore($clusterConnect,$dbSourceID,$dbTargetInstanceID,$dbTargetName,$timeStamp,$overwrite=false,$targetPaths="")
	// rkMSSQLgetFiles($clusterConnect,$dbSourceID,$dbRecoveryTime)
	// rkMakeAdminUser($clusterConnect,$userID)
	// rkModifyUser($clusterConnect,$userID,$firstName,$lastName,$eMail)
	// rkObjectNametoID($clusterConnect,$name)
	// rkRefreshHost($clusterConnect,$hostName)
	// rkRefreshReport($clusterConnect,$rptID)
	// rkSetBanner($clusterConnect,$bannerText)
	// rkStartIntegrityChk($clusterConnect,$objectID,$snapID="")
														
	// ==========================================================================
	//                           Generic functions
	// ==========================================================================

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

	// ----------------------------------------------------------------------------------------------------------
	// Function that return TRUE is the protection has been disabled and FALSE if no protection has been disabled
	// This is AKA "Black Out Window"
	// ----------------------------------------------------------------------------------------------------------

	function rkGetBlackout($clusterConnect)
	{
		$API="/api/internal/blackout_window";

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

		if(strpos($result, "true" )) return TRUE;
		else return FALSE;
		
	}

	// ---------------------------------------------------------------------------------
	// Function to check if you have sufficient rights or correct credentials to connect
	// ---------------------------------------------------------------------------------
	
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

		return json_decode($result);
	}

	// --------------------------------------------------
	// Function who returns a list of unmanaged snapshots
	// --------------------------------------------------

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
	
	// -----------------------------------------------
	// Function who returns Nutanix VM id from VM name
	// -----------------------------------------------

	function rkGetNutanixVMiD($clusterConnect,$NutanixVMName)
	{
		$API="/api/internal/nutanix/vm?limit=1&name=".urlencode($NutanixVMName)."&sort_by=name";

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
		
		$id=json_decode($result);
		$id=$id->data[0]->id;

		return $id;
	}

	// ----------------------------------------------------
	// Function who returns Nutanix VM snapshots from VM id
	// ----------------------------------------------------

	function rkGetNutanixVMSnaps($clusterConnect,$NutanixVMID)
	{
		$API="/api/internal/nutanix/vm/".urlencode($NutanixVMID)."/snapshot";

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

		return json_decode($result)->data;
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
	
	
	// ----------------------------------------------
	// Function who returns vmware VM ID from VM name
	// ----------------------------------------------

	function rkGetvmwareVMId($clusterConnect,$vmName)
	{
		$API="/api/v1/vmware/vm?name=".urlencode($vmName);

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

		return json_decode($result)->data[0]->id;
	}
	
	// ----------------------------------------------------
	// Function who returns vmware VM snapshots from VM id
	// ----------------------------------------------------

	function rkGetvmwareVMSnaps($clusterConnect,$vmwareVMID)
	{
		$API="/api/v1/vmware/vm/".urlencode($vmwareVMID);

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
		
		return json_decode($result)->snapshots;
	}

	// -----------------------------------------------------------
	// Function getting ESXi VM specifications
	// -----------------------------------------------------------

	function rkGetESXVMConfig($clusterConnect,$vmName)
	{
		$vmConfig=array();

		// Get the vmname -> vmid conversion
		// Get the list of snapshots

		$vmId=rkGetvmwareVMId($clusterConnect,$vmName);
		$snaps=rkGetvmwareVMSnaps($clusterConnect,$vmId);

		if(!$snaps)
		{
			print(rkColorRed("No spanshots found!\nExiting.\n\n"));
			exit();
		}

		// take latest snapID 
		$snapID=$snaps[0]->id;
		$vmConfig["snapID"]=$snapID;
		
		$API="/api/v1/vmware/vm/snapshot/".urlencode($snapID);

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

		$config=json_decode($result)->config;
		$tmp=explode(",",$config);
		
		for($i=0;$i<count($tmp);$i++)
		{
			// Search VM name
			if(strpos($tmp[$i],"name\":"))
			{
				$tmp2=explode(":",$tmp[$i]);
				$vmConfig["name"]=$tmp2[1];
			}

			// Search for CPU count
			if(strpos($tmp[$i],"numCPUs"))
			{
				$tmp2=explode(":",$tmp[$i]);
				$vmConfig["cpu"]=$tmp2[1];
			}
			
			// Search for RAM amount
			if(strpos($tmp[$i],"memoryMB"))
			{
				$tmp2=explode(":",$tmp[$i]);
				$vmConfig["memory"]=$tmp2[1]/1024;
			}

			// Search for disks
			if(strpos($tmp[$i],"capacityInBytes"))
			{
				$tmp2=explode(":",$tmp[$i]);
				$vmConfig["disk"]=$tmp2[1];
			}

		}
		return $vmConfig;
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
	
	// -------------------------------------------------------------------
	// Function who sets the login message. Pass empty string to remove it
	// -------------------------------------------------------------------

	function rkSetBanner($clusterConnect,$bannerText)
	{
		$API="/api/internal/cluster/me/login_banner";

		$config_params="
				{
				  \"loginBanner\": \"".$bannerText."\"
				}			
				";

		$curl = curl_init();
   		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
   		
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

		$result = curl_exec($curl);
		curl_close($curl);

		return($result);
	}

	// ==========================================================================
	//                           Fileset related functions
	// ==========================================================================

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

	// ---------------------------------------------------
	// Function who returns the size of a fileset snapshot
	// ---------------------------------------------------

	function rkGetFileSetSnapSize($clusterConnect,$snapshotID,$absolutePath)
	{
		$API="/api/internal/storage/array/volume/group/snapshot/".urlencode($snapshotID)."/browse?path=".urldecode($absolutePath);

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
		
		$size=0;
		for($i=0;$i<count($result);$i++)
		{
			$size+=$result[$i]->size;
		}

		return($size);
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
	
	// ------------------------------------
	// Function to retrieve ID of a fileset
	// ------------------------------------
	
	function rkGetFilesetID($clusterConnect,$host,$fileSetName)
	{
		$API="/api/internal/host_fileset?hostname=".urlencode($host);
		
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
		curl_close($curl);

		$filesetFound=json_decode($result)->data[0]->filesets;
		
		$found=FALSE;
		if(count($filesetFound))
		{
			for($i=0;$i<count($filesetFound);$i++)
			{
				if($filesetFound[$i]->name==$fileSetName)
				{
					$found=TRUE;
					$id=$filesetFound[$i]->id;;
				} 
			}
		}

		if($found) return $id;
		else return FALSE;
	}

	// ------------------------------------------------------
	// Function to retrieve latest snapshot ID from a fileset
	// ------------------------------------------------------
	
	function rkGetSnapshotFromFilesetID($clusterConnect,$filesetID)
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
		$result=curl_exec($curl);
		curl_close($curl);
		
		$snaps=json_decode($result)->snapshots;
		
		// return the latest snapshot ID
		return $snaps[count($snaps)-1]->id;
	}
	
	// -----------------------------------------------------------
	// Function who export files from a FileSet snapshot
	// Note : until 5.2 the symlink are not supported for export. 
	// So, to avoid error, just exclude them from the fileset
	// -----------------------------------------------------------

	function rkFileSetExport($clusterConnect,$snapshotID,$targetHostID,$sourcePath,$targetPath)
	{
		$API="/api/v1/fileset/snapshot/".urlencode($snapshotID)."/export_file";

		$config_params="
			{
				\"sourceDir\": \"".addslashes($sourcePath)."\",
				\"destinationDir\": \"".addslashes($targetPath)."\",
				\"IgnoreErrors\" : true,
				\"hostId\": \"".$targetHostID."\"
			}";

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
		$result = curl_exec($curl);
		curl_close($curl);

		return json_decode($result);
	}
			
	// ----------------------------------------------------------------------------
	// Function to populate a return variable (JSON text) with all SLA's configured
	// ----------------------------------------------------------------------------

	function getRubrikSLAs($clusterConnect)
	{
		// Check if cluster is running v 5.0.0-p1-827 in this case, need to invoke api v2 call
		$ver=rkGetClusterVersion($clusterConnect);

		if($ver>="5") $API="/api/v2/sla_domain?sort_order=asc";
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
	
		$API="/api/internal/event?&object_name=".$objectName."&show_only_latest=true&filter_only_on_latest=true&event_type=Backup";

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
	
	// ---------------------------------------------
	// Function who returns ID of a given object
	// ---------------------------------------------

	function rkObjectNametoID($clusterConnect,$name)
	{
		// Parse Nutanix objects

		$nutanixVMs=rkGetNutanixVM($clusterConnect);
		for($i=0;$i<count($nutanixVMs->data);$i++)
		{
// 			print("VM name : ".$nutanixVMs->data[$i]->name." -> ID : ".$nutanixVMs->data[$i]->id."\n");
			if($name==$nutanixVMs->data[$i]->name)
			{
				return $nutanixVMs->data[$i]->id;
			}
		}

		// Parse vmware objects

		$vmwareVMs=rkGetvmwareVM($clusterConnect);
		for($i=0;$i<count($vmwareVMs->data);$i++)
		{
// 			print("VM name : ".$vmwareVMs->data[$i]->name." -> ID : ".$vmwareVMs->data[$i]->id."\n");
			if($name==$vmwareVMs->data[$i]->name)
			{
				return $vmwareVMs->data[$i]->id;
			}
		}

		// Parse MS SQL 

		$mssqlDB=json_decode(rkGetMSSQL($clusterConnect));
		for($i=0;$i<count($mssqlDB->data);$i++)
		{
// 			print("SQL DB name : ".$mssqlDB->data[$i]->name." -> ID : ".$mssqlDB->data[$i]->id."\n");
			if($name==$mssqlDB->data[$i]->name)
			{
				return $mssqlDB->data[$i]->id;
			}
		}
		
		// Parse FileSets
		
		$fileSets=rkGetFileSet($clusterConnect);
		for($i=0;$i<count($fileSets->data);$i++)
		{
// 			print("File Set name : ".$fileSets->data[$i]->name." -> ID : ".$fileSets->data[$i]->id."\n");
			if($name==$fileSets->data[$i]->name)
			{
				return $fileSets->data[$i]->id;
			}
		}

		// If not found, return bool(false)
		return FALSE;
	}
	
	
	// ==========================================================================
	//                           Storage related functions
	// ==========================================================================

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

	function rkGetRunway($clusterConnect)
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
	
	// ==========================================================================
	//                           MS SQL related functions
	// ==========================================================================

	// ---------------------------------------------------
	// Function who returns The lastest snapshot details
	// ---------------------------------------------------

	function rkGetMSSQLLastRecoveryPoint($clusterConnect,$msSQLID)
	{
		$API="/api/v1/mssql/db/".urldecode($msSQLID)."/snapshot";

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

		$result = json_decode($result)->data[0];
		curl_close($curl);

		return($result);
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
		
	// -----------------------------------------------------
	// Function who returns status of recovery for MS SQL DB
	// -----------------------------------------------------

	function rkGetMSSQLRecoveryStatus($clusterConnect,$requestID)
	{
			$API="/api/v1/mssql/request/".urlencode($requestID);
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

			return($result);
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
// 			print($result[$i]->name." --> ".$result[$i]->rootProperties->rootName."\n");
			if(($result[$i]->name==$dbName || $result[$i]->InstanceName==$dbName) && $result[$i]->rootProperties->rootName==$dbHost)
			{
// 				print("id : \t\t\t\t".rkColorOutput($result[$i]->id)."\n");     		
// 				print("Host : \t\t\t\t".rkColorOutput($result[$i]->rootProperties->rootName)."\n");
				$dbID=$result[$i]->id;
			}
		}
		return($dbID);
	}

	// ---------------------------------------------------
	// Function who returns MS SQL DB ID from instance ID
	// ---------------------------------------------------
	
	function rkGetMSSQLdbID($clusterConnect,$sqlInstanceID,$sqlDBName)
	{
		$API="/api/v1/mssql/db?instance_id=".urlencode($sqlInstanceID)."&name=".$sqlDBName;

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

		return($result[0]->id);		
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
// 			print("-> ".$i." <-\n");
// 			var_dump($result[$i]);
// 			print("===\n");
			if($result[$i]->name==$dbName && $result[$i]->rootProperties->rootName==$dbHost)
			{
				$instanceID=$result[$i]->id;
			}
		}
		return $instanceID;
	}

	// ---------------------------------------------------------------------------
	// Restore MS SQL DB at a given time
	// ---------------------------------------------------------------------------
	
	function rkMSSQLRestore($clusterConnect,$dbSourceID,$dbTargetInstanceID,$dbTargetName,$timeStamp,$overwrite=false,$targetPaths="")
	{
		// If specific path have been defined, add them in the specification, otherwise source path will be used on target machine

		if($targetPaths)
		{
			$logFilePath=addslashes($targetPaths["log"]);
			$dataFilePath=addslashes($targetPaths["data"]);
		}
		
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
		
		if($v5)
		{
			print("CDM Version above 5.\n");
			$overwrite=var_export($overwrite,true);
			$config_params=
				"{
					\"recoveryPoint\": 
					{
						\"timestampMs\": ".$timeStamp."
					},
					\"targetInstanceId\": \"".$dbTargetInstanceID."\",
					\"targetDatabaseName\": \"".$dbTargetName."\", ";
				
			if(isset($logFilePath))
			{
				$config_params.="
					\"targetDataFilePath\": \"".$dataFilePath."\",
					\"targetLogFilePath\": \"".$logFilePath."\",";
			}		
			
			$config_params.="		
			
					\"finishRecovery\": true,
					\"maxDataStreams\": 6,
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
					\"targetDatabaseName\": \"".$dbTargetName."\", ";
				
			if(isset($logFilePath))
			{
				$config_params.="
					\"targetDataFilePath\": \"".$dataFilePath."\",
					\"targetLogFilePath\": \"".$logFilePath."\",";
			}		
			
			$config_params.="		
			
					\"finishRecovery\": true,
					\"maxDataStreams\": 6,
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
	// Get physical size of a MS SQL snapshot (for restoration purpose)
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

	// ==========================================================================
	//                           SLA related functions
	// ==========================================================================
	
	// ---------------------------------------------------
	// Function converts SLA ID to SLA Name
	// ---------------------------------------------------

	function rkGetSLAname($clusterConnect,$SLAid)
	{
		// Starting with version 5, the way we are getting SLAs is different. Rubrik introduced a new API call for getting customs SLAs
		$cdmver=rkGetClusterVersion($clusterConnect);
		
		if($cdmver[0]>="5")
		{
			$API="/api/v2/sla_domain";
		}
		else
		{
			$API="/api/v1/sla_domain";
		}
		
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
// 			print($result[$i]."\n");
			if($result[$i]->id == $SLAid) $myName=$result[$i]->name;
		}
		return($myName);		
	}

	// ---------------------------------------------------
	// Funtion that return SLA total storage usage in bytes
	// ---------------------------------------------------

	function rkGetSLAStorage($clusterConnect,$SLAid)
	{
		$API="/api/internal/stats/sla_domain_storage/".$SLAid;

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
		
		$result=json_decode($result)->value;
		return($result);
	}

	// ----------------------------------------
	// Funtion that return all SLAs and SLA IDs
	// ----------------------------------------

	function rkGetSLAs($clusterConnect)
	{
		$API="/api/v2/sla_domain?sort_by=name&sort_order=asc";

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
		$return_value=array();

		// Parse result to get ID and Name
		
		for($i=0;$i<count($result);$i++)
		{
			$return_value[$i]["id"]=$result[$i]->id;
			$return_value[$i]["name"]=$result[$i]->name;	
		}
		
		return($return_value);
	}

	// ---------------------------------------------------
	// Function converts SLA Name to SLA ID
	// ---------------------------------------------------

	function rkGetSLAid($clusterConnect,$SLAname)
	{
		// Starting with version 5, the way we are getting SLAs is different. Rubrik introduced a new API call for getting customs SLAs
		$cdmver=rkGetClusterVersion($clusterConnect);
		
		if($cdmver[0]>="5")
		{
			$API="/api/v2/sla_domain";
		}
		else
		{
			$API="/api/v1/sla_domain";
		}
		
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
		
		$myID='';
		for($i=0;$i<count($result);$i++)
		{
// 			var_dump($result[$i]);
			if($result[$i]->name == $SLAname) $myID=$result[$i]->id;
		}
		return($myID);		
	}
	
	// ---------------------------------------------------------------------------
	// Function that creates SLA 
	// ---------------------------------------------------------------------------

	function rkCreateSLA($clusterConnect,$slaName,$HFreq,$HRet,$DFreq,$DRet,$MFreq,$MRet,$YFreq,$YRet)
	{
		$API="/api/v1/sla_domain";

		$config_params="
			{
				\"name\": \"".$slaName."\",
				\"frequencies\": 
				[
					{
						\"timeUnit\": \"Minute\",
						\"frequency\": ".$HFreq.",
						\"retention\": ".$HRet."
					},
					{
						\"timeUnit\": \"Hourly\",
						\"frequency\": ".$HFreq.",
						\"retention\": ".$HRet."
					},
					{
						\"timeUnit\": \"Daily\",
						\"frequency\": ".$DFreq.",
						\"retention\": ".$DRet."
					},
					{
						\"timeUnit\": \"Monthly\",
						\"frequency\": ".$MFreq.",
						\"retention\": ".$MRet."
					},
					{
						\"timeUnit\": \"Yearly\",
						\"frequency\": ".$YFreq.",
						\"retention\": ".$YRet."
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
			
		if($info==201) return TRUE;
		else return FALSE;
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
				
				//Not clean, I know ... looking for other solution, maybe a while loop
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

	// ==========================================================================
	//                           Users related functions
	// ==========================================================================

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

	// ---------------------------------------------------
	// Function get locally defined users
	// ---------------------------------------------------

	// This function is deprecated in CDM > 5.2, users have been moved to principals instead

	function rkGetUsers($clusterConnect)
	{
		$cdm_version=rkGetClusterVersion($clusterConnect);

		$API="/api/internal/user";
		
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
		var_dump($result);
		return(json_decode($result));
	}

	// -----------------------------------
	// Function get user ID from user Name
	// -----------------------------------

	function rkGetUserID($clusterConnect,$userName)
	{
		$API="/api/internal/user";
		
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
		$result=json_decode($result);

		curl_close($curl);

		$found=FALSE;

		foreach($result as $item) 
		{
			if($item->username==$userName)
			{
				$id=$item->id;
				$found=TRUE;
			}
		}
		
		if ($found) return $id;
		else return $found;
	}

	// -----------------------------------
	// Function get user name from user ID
	// -----------------------------------

	function rkGetUserName($clusterConnect,$userID)
	{
		$API="/api/internal/user";
		
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
		$result=json_decode($result);
		curl_close($curl);

		$found=FALSE;
		
		foreach($result as $item) 
		{
			if($item->id==$userID)
			{
				$username=$item->username;
				$found=TRUE;
			}
		}

		if ($found) return $username;
		else return $found;
	}

	// -----------------------------------
	// Function get user details
	// -----------------------------------

	function rkGetUserDetails($clusterConnect,$userID)
	{
		$API="/api/internal/user/".urlencode($userID);
		
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
		$result=json_decode($result);
		curl_close($curl);

		return $result;
	}
	
	// -----------------------
	// Function to create user
	// -----------------------

	function rkCreateUser($clusterConnect,$userName,$Password)
	{
		$API="/api/internal/user";

		$config_params="
			{
				  \"username\": \"".$userName."\",
				  \"password\": \"".$Password."\"
			}
		";

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

	// ---------------------------------------------
	// Function to promote a userID as cluster admin
	// ---------------------------------------------

	function rkMakeAdminUser($clusterConnect,$userID)
	{
	
		$API="/api/internal/authorization/role/admin";

		$config_params="
			{
				\"principals\": 
				[
					\"".$userID."\"
				],
				\"privileges\": 
				{
					\"fullAdmin\": 
					[
						\"Global:::All\"
					]
				}
			}
		";

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
	
	// ---------------------------
	// Function to delete a userID
	// ---------------------------

	function rkDeleteUser($clusterConnect,$userID)
 	{
		$API="/api/internal/user/".urlencode($userID);

		$curl = curl_init();
   		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		$result = json_decode(curl_exec($curl));
		$info=curl_getinfo($curl,CURLINFO_HTTP_CODE);
		curl_close($curl);

		return $result;
 	}

	// --------------------------------------------------------------------------------------
	// Function to modify a userID
	// --------------------------------------------------------------------------------------
	// Note : all parameters are mandatory and email address must comply with email standards
	// --------------------------------------------------------------------------------------
 	
	function rkModifyUser($clusterConnect,$userID,$firstName,$lastName,$eMail)
	{
		$API="/api/internal/user/".urldecode($userID);

		$config_params="
			{
			  \"firstName\": \"".$firstName."\",
			  \"lastName\": \"".$lastName."\",
			  \"emailAddress\": \"".$eMail."\"
				}
			";

		$curl = curl_init();
   		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PATCH");
   		
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

		$result = curl_exec($curl);
		curl_close($curl);

		return($result);
	}

	// -------------------------------------------------------------------------------
	// Function to get user priviledges. 3 possibilities : Admin, EndUser and NoAccess
	// -------------------------------------------------------------------------------

	function rkGetUserPriviledges($clusterConnect,$userID)
	{
		$API="/api/internal/authorization?principals=".urlencode($userID);
		
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
		$result=json_decode($result);
		curl_close($curl);

		// If admin role is detected, return Admin
		if($result->data[0]->admin->fullAdmin[0]=="Global:::All")
		{
			return "Admin";
		} 
		
		// If not able to restore, no access detected, return NoAccess
		if($result->data[0]->endUser->restore==NULL)
		{
			return "NoAccess";
			
		}
		
		// Otherwise, user is end user, return EndUser
		else return "EndUser";
	}

 	
	// ==========================================================================
	//                           Date & Time related functions
	// ==========================================================================
					
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
	
	function rkGetHumanTime($timeStamp)
	{
		$time=DateTime::createFromFormat("Y-m-d\TH:i:s",$timeStamp);
		return date_format($time,'D M d H:i:s e Y');
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
 	
	// ---------------------------------------------------------------------------------
	// Get size of specific Snapshot (ingested, logical and physical) from a specific vm
	// tested with vmware and Nutanix VMs
	// Note : you cannot get the storage info for an archived object ! be sure cloudStorage is set to 0
	// ---------------------------------------------------------------------------------

	function rkGetSnapshotSize($clusterConnect,$vmID,$snapID)
	{
		$API="/api/internal/snapshot/".urlencode($snapID)."/storage/stats?snappable_id=".urlencode($vmID);

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

	// -----------------------------------------------------------------------------------
	// Get last snapshot duration from an object name. Taken from event log of the cluster 	
	// -----------------------------------------------------------------------------------

	function rkGetLastSnapDuration($clusterConnect,$vmName)
	{
	
		// Since CDM 5.2, this API has been changed. Need to test version to call relevant API 
		
		$cdm_version=rkGetClusterVersion($clusterConnect);

		if($cdm_version<"5.2")
		{
			$API="/api/internal/event_series?status=Success&event_type=Backup&object_name=".urlencode($vmName);

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
			return json_decode($result)->data;	
		}
		else
		{
			// 2 different API calls are required in this case 
			// /api/v1/event/latest?event_status=Success&order_by_time=desc&event_type=Backup&object_name=".urlencode($vmName);
			// /api/v1/event_series/

			$API="/api/v1/event/latest?event_status=Success&order_by_time=desc&event_type=Backup&object_name=".urlencode($vmName);

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
			$result=json_decode($result);

			curl_close($curl);
			
			$seriesID=$result->data[0]->latestEvent->eventSeriesId;
			
			// Second API call with all details about the backup job

			$API="/api/v1/event_series/".$seriesID;

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
			$result=json_decode($result);

			curl_close($curl);
			return($result);
		}

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

		$snapshots["Ingested"]=json_decode($result)->value;

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

		$snapshots["Logical"]=json_decode($result)->value;

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

		$snapshots["Physical"]=json_decode($result)->value;
						
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

	// ==========================================================================
	//                           Reports related functions
	// ==========================================================================

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
	// Delete report based on report ID
	// ---------------------------------------------------------------------------

 	function rkDeleteReport($clusterConnect,$rptID)
 	{
		$API="/api/internal/report/".urlencode($rptID);

		$curl = curl_init();
   		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
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

		if(isset($result->data[0]->id)) return $result->data[0]->id;
		else return FALSE;
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
	// Refresh rerpot data to current state
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
	// Refresh rerpot data to current state
	// ---------------------------------------------------------------------------

	function rkGetDataReport($clusterConnect,$rptID)
	{
		$API="/api/internal/report/".urlencode($rptID)."/table";
		
		$dataReportDefinition="
			{
			  	\"limit\": 1000,
			  	\"sortOrder\": \"asc\"
			}";
			
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS,$dataReportDefinition);
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: '.strlen($dataReportDefinition),'Accept: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		$result = json_decode(curl_exec($curl));
// 		$info=curl_getinfo($curl,CURLINFO_HTTP_CODE);
		curl_close($curl);
		
		return $result;
	}
	
	// ---------------------------------------------------------------------------
	// Get report state + last data time of data
	// ---------------------------------------------------------------------------
	
	function rkGetReportStatus($clusterConnect,$reportName)
	{
		$API="/api/internal/report?name=".urlencode($reportName);

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

		$res["status"]=$result->data[0]->updateStatus;
		if(isset($result->data[0]->updatedTime)) $res["dataTime"]=$result->data[0]->updatedTime;
		else $res["dataTime"]="";

		return($res);	
	}

	// ==========================================================================
	//                       LDAP related functions
	// ==========================================================================
	
	// ----------------------------------------------------------
	// Function who's creating an LDAP auth source in the cluster
	// ----------------------------------------------------------

	function rkAddLDAP($clusterConnect,$LDAP)
	{
		/*
			The $LDAP variable must have the following format : 

			$LDAP=array(
			"bindUserName" => "CN=My Service Account,OU=My OU,DC=my,DC=domain,DC=com",
			"bindUserPassword" => "ServiceAccountPassword",
			"authServer" => "DC_IP1,DC_IP2",    <- moultiple DCs IPs/Names separated by ","
			"name" => "My AD"
			);
		*/

		// Construct authServer variable 
		
		$authServer=$LDAP["authServer"];
		$servers='';

		if(strpos($authServer,","))
		{
			$servTMP=explode(",",$authServer);
			$numItems=count($servTMP);
			$i=0;
	
			while ($i<$numItems-1)
			{
				$servers.="\"ldap://".$servTMP[$i].":636\", \n";
				$i++;
			}
			$servers.="\"ldap://".$servTMP[$i].":636\"\n";
		}
		else $servers="\"ldap://".$authServer.":636\"\n";

		// Prepare the payload with the correct syntax
		$postPayload=
			"{
			  \"bindUserName\": \"".$LDAP["bindUserName"]."\",
			  \"bindUserPassword\": \"".$LDAP["bindUserPassword"]."\",
			  \"authServers\": [";
		$postPayload.=$servers;
		$postPayload.="		
			  ],
			  \"name\": \"".$LDAP["name"]."\",
			  \"advancedOptions\": {
				\"groupSearchFilter\": \"(&(objectcategory=group))\",
				\"groupMemberAttribute\": \"member\",
				\"groupMembershipAttribute\": \"memberOf\",
				\"userSearchFilter\": \"(&(objectcategory=person)(objectclass=user)(!(useraccountcontrol:1.2.840.113556.1.4.803:=2)))\",
				\"userNameSearchAttribute\": \"sAMAccountName\"
			  }
			}";
			// Parameters above are Rubrik's recommanded settings (groupSearchFilter, userSearchFilter)

 		$API="/api/v1/ldap_service";

		$curl = curl_init();
   		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS,$postPayload);
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($postPayload),'Accept: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = json_decode(curl_exec($curl));
		$info=curl_getinfo($curl,CURLINFO_HTTP_CODE);
		$error=curl_errno($curl);
		curl_close($curl);

		// This function is doing a lot of background checks while running and can take some time to complete (sometimes 5 mins).
		// The return code when successful is 201. Returning "TRUE" if successful.
		
		if($info==201) return "TRUE";
		else return $result;
	}
	
	// ---------------------------------------------------------
	// Function who's adding a LDAP user or group as local admin
	// It returns 200 is everything went right.
	// ---------------------------------------------------------

	function rkAddAdminRoleLDAP($clusterConnect,$principalName)
	{
		// First, get principalName ID
		$API="/api/v1/principal?limit=1&name=".urlencode($principalName);

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

		$principalId=$result->data[0]->id;

		// Next Get the role ID

		$API="/api/v1/role?limit=1&sort_by=Name&sort_order=asc&name=AdministratorRole";

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

		$roleID=$result->data[0]->roleId;
		
		// Lastly push the new rolID for principalID

		$API="/api/v1/principal/role";

		$config_params="
			{
			  \"principals\": [
				\"".$principalId."\"
			  ],
			  \"roles\": [
				\"".$roleID."\"
			  ]
			}		
			";

		$curl = curl_init();
   		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
   		
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
		$result = curl_exec($curl);
		$info=curl_getinfo($curl,CURLINFO_HTTP_CODE);
		curl_close($curl);
		
		return $info;
	}	

	// ==========================================================================
	//                       Verification related functions
	// ==========================================================================
	
	// -----------------------------------------------------------
	// Function who's verifying backup integrity of a given object
	// -----------------------------------------------------------
	
	function rkStartIntegrityChk($clusterConnect,$objectID,$snapID="")
	{
		// **** W A R N I N G : this function is only supported from CDM 5.3 and above **** //
		// Note : this activity is CPU intensive and can take long time to complete. 

 		$API="/api/v1/backup/verify";

		// if snapid has been passed, use it
		if($snapID)
		{
			$config_params="
					{
					  \"objectId\": \"".$objectID."\",
					  \"snapshotIdsOpt\": [
						\"".$snapID."\"
					  ]
				}";
		}
		
		// Else the system will use the last one taken and available
		else
		{
					$config_params="
					{
					  \"objectId\": \"".$objectID."\"
				}";
		}
		
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
		$info=curl_getinfo($curl,CURLINFO_HTTP_CODE);
		$error=curl_errno($curl);
		curl_close($curl);

		return $result;
	}

	// ---------------------------------------------------------------------
	// Function who's returning the verification status (progress or result)
	// ---------------------------------------------------------------------
	
	function rkIntegrityResult($clusterConnect,$eventID)
	{	
		// **** W A R N I N G : this function is only supported from CDM 5.3 and above **** //
		$API="/api/v1/backup/verify/".urlencode($eventID);

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

		return $result;
	}
	
	// ==========================================================================
	//                           Non-Rubrik related functions
	// ==========================================================================

	// ---------------------------------------------------------
	// Function to nicely display the results of integrity check
	// ---------------------------------------------------------
	
	/*	
	Format for $data must be an array with the following syntax :
	
	$result=array(0 =>
				array(	"objectName" => "string",
						"objectID" => "string",
						"objectSnapID" => "string",
						"processDuration" => "string",
						"integrityStatus" => "string"
						"size" => "string",
						"duration" => "string",
						"recoveryPoint" => "string"
						)
					);
	
	Sample data : 
	
	$result=array(0 =>
				array(	"objectName" => "GOLD - CentOS 7.6",
						"objectID" => "NutanixVirtualMachine:::86be7f0c-2b98-4e03-93d9-57f06e419eb7-vm-c1dd1716-7d54-4121-9434-1a12ea0fb37e",
						"objectSnapID" => "6c47a493-60b8-4b13-9787-92e0066ccad6",
						"processDuration" => "00:07:29",
						"integrityStatus" => "PASSED",
						"size" => "85899345920",
						"duration" => "07:53:27",
						"recoveryPoint" => "Thu Nov 26 00:00:02 UTC 2020"
						)
					);
						
	Note : processDuration is using hh:mm:ss
	
	Usually, this array is filled in by a succcessive calls to rkStartIntegrityChk($clusterConnect,$objectID)
	and rkIntegrityResult($clusterConnect,$eventID)

	Sample output : 
	
	/========== Object Name ==========|============= Snapshot ID =============|=== Size ===|======== Recovery Point =======|= Duration (hh:mm:ss) =|== Integrity ==\
	| Administrator                   | e4af21af-8d72-4a93-8cec-48afe8378a27  |  909.03 MB |  Tue Dec 01 11:02:56 UTC 2020 |        00:01:15       |     PASSED    |
	| All Files                       | c70b7639-a008-4e97-ad5f-35141cff073b  |  32.38 GB  |  Mon Nov 30 23:00:01 UTC 2020 |        00:08:18       |     PASSED    |
	| BE-INTRANODE2                   | fc177929-3345-4c1a-9521-a4b83c38fa17  |  21.47 GB  |  Tue Dec 01 14:12:43 UTC 2020 |        00:12:14       |     PASSED    |
	| Era                             | 33eb5672-908e-472b-8f5d-1d57f85f1fd3  |  53.69 GB  |  Mon Nov 30 23:02:07 UTC 2020 |        00:05:25       |     PASSED    |
	| Gustavo - CentOS                | 0c747086-7d34-41dd-b466-7e7ef55ed676  |  32.21 GB  |  Mon Nov 30 23:04:31 UTC 2020 |        00:03:21       |     PASSED    |
	| MSDS-IPAM                       | bceff719-b8eb-4959-9d7c-f35d837d214b  |  32.21 GB  |  Mon Nov 30 23:03:49 UTC 2020 |        00:08:18       |     PASSED    |
	| Win2019                         | 3bda0eb1-e667-41c7-af69-a710ff8221ac  |  48.25 GB  |  Mon Nov 30 23:00:03 UTC 2020 |        00:07:34       |     PASSED    |
	| be-ntnx-pc.it.pccwglobal.com    | 991b97aa-13fc-448d-adb5-b240b00d9ccc  |  689.46 GB |  Tue Dec 01 15:05:09 UTC 2020 |        00:55:27       |     PASSED    |
	| rsync-server                    | 2905d02e-216f-4c96-90d9-69f02d5c43aa  |  118.11 GB |  Mon Nov 30 23:00:02 UTC 2020 |        00:19:52       |     PASSED    |
	|==============================================================================================================================================================|
	|                                                                                                Total processing time |        02:01:44       |               |
	\==============================================================================================================================================================/	*/
	
	function printReport($data)
	{
		// Init total timestap to zero
		$totalTime=0;

		print("\n");
		print("/========== ".rkColorOutput("Object Name")." ==========|============= ".rkColorOutput("Snapshot ID")." =============|");
		print("=== ".rkColorOutput("Size")." ===|======== ".rkColorOutput("Recovery Point")." =======|= ".rkColorOutput("Duration (hh:mm:ss)")." =|== ".rkColorOutput("Integrity")." ==\\\n");

		for($i=0;$i<count($data);$i++)
		{
			$totalTime+=strtotime($data[$i]["processDuration"]);	
	
			print("| ");
			print(str_pad($data[$i]["objectName"], 32," ", STR_PAD_RIGHT));
			print("| ");
			print(str_pad($data[$i]["objectSnapID"], 38," ", STR_PAD_RIGHT));
			print("| ");
			print(str_pad(rkFormatBytes($data[$i]["size"]), 11," ", STR_PAD_BOTH));
			print("| ");
			print(str_pad($data[$i]["recoveryPoint"], 30," ", STR_PAD_BOTH));
			print("| ");
			print(str_pad($data[$i]["processDuration"], 22," ", STR_PAD_BOTH));
			print("| ");
			print(str_pad($data[$i]["integrityStatus"], 14," ", STR_PAD_BOTH));
			print("|\n");
		}	
// 		print("|=================================|=======================================|============|===============================|===========================|===============|\n");
		print("|==============================================================================================================================================================|\n");
		print("|");
		print(str_pad(" ".rkColorOutput("Total processing time")." ",129," ",STR_PAD_LEFT));
		print("| ");
		print(str_pad(rkColorOutput(date('H:i:s',$totalTime)),33," ",STR_PAD_BOTH));
		print("|               |\n");
// 		print("\=================================|=======================================|============|===============================|===========================|===============/\n");
		print("\==============================================================================================================================================================/\n");
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

	// ---------------------------------------------------------------------------
	// Convert number of days into years/months/days
	// ---------------------------------------------------------------------------

	function day2text($days)
	{
		$start_date = new DateTime();
		$end_date = (new $start_date)->add(new DateInterval("P{$days}D") );
		$dd = date_diff($start_date,$end_date);

		$data="";
		if($dd->y) $data=$dd->y." years ";
		if($dd->m) $data.=$dd->m." months ";
		if($dd->d) $data.=$dd->d." days";
		return $data;
	}

?>
