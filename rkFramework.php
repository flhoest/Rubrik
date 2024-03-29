<?php

	//////////////////////////////////////////////////////////////////////////////
	//                     Rubrik Php Framework version 2.1                     //
	//                        (c) 2018-2023 - F. Lhoest                         //
	//////////////////////////////////////////////////////////////////////////////
	//                       Created on macOS with BBEdit                       //
	//////////////////////////////////////////////////////////////////////////////
		
	/*				__________        ___.            .__  __    
					\______   \ __ __ \_ |__  _______ |__||  | __
					 |       _/|  |  \ | __ \ \_  __ \|  ||  |/ /
					 |    |   \|  |  / | \_\ \ |  | \/|  ||    < 
					 |____|_  /|____/  |___  / |__|   |__||__|_ \
						\/             \/                  \/ Php Framework
	*/

	// Function index in alphabetical order (total 114)
	//------------------------------------------------

	// day2text($days)
	// getRubrikAvailableStorage($clusterConnect)
	// getRubrikClusterID($clusterConnect)
	// getRubrikEvents($clusterConnect,$numEvents,$eventType,$objectType,$objectName)
	// getRubrikNodeCount($clusterConnect)
	// getRubrikSLAs($clusterConnect)
	// getRubrikTotalStorage($clusterConnect)
	// inColor($colorName,$string)
	// printReport($data)
	// rkAddAdminRoleLDAP($clusterConnect,$principalName)
	// rkAddLDAP($clusterConnect,$LDAP)
	// rkAddNutanix($clusterConnect,$nutanixCluster)
	// rkCheckAccess($clusterConnect)
	// rkColorBold($string)
	// rkColorOutput($string)
	// rkColorRed($string)
	// rkCreateReport($clusterConnect,$rptName,$rptSpecs)
	// rkCreateReportSchedule($clusterConnect,$rptID,$scheduleDefinition)
	// rkCreateSLA($clusterConnect,$slaName,$HFreq,$HRet,$DFreq,$DRet,$MFreq,$MRet,$YFreq,$YRet)
	// rkCreateUser($clusterConnect,$userName,$Password)
	// rkDelNutanix($clusterConnect,$clusterID)
	// rkDelServiceAccountToken($clusterConnect)
	// rkDelUnmanagedObject($clusterConnect,$objName,$keepAmount)
	// rkDeleteUnmanaged($clusterConnect,$ObjID)
	// rkDeleteUser($clusterConnect,$userID)
	// rkEpochToSQL($EpochTime)
	// rkFileSetBackup($clusterConnect,$filesetId)
	// rkFileSetExport($clusterConnect,$snapshotID,$targetHostID,$sourcePath,$targetPath)
	// rkFormatBytes($bytes,$decimals=2,$system='metric')
	// rkGetAgentConnectivity($clusterConnect,$hostName)
	// rkGetAllSnapshotInfo($clusterConnect)
	// rkGetAllVMs($clusterConnect)
	// rkGetBlackout($clusterConnect)
	// rkGetClusterDetails($clusterConnect)
	// rkGetClusterVersion($clusterConnect)
	// rkGetDataReport($clusterConnect,$rptID)
	// rkGetESXVMConfig($clusterConnect,$vmName)
	// rkGetEpoch($dateString)
	// rkGetEpoch2($dateString)
	// rkGetExecSum($clusterConnect)
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
	// rkGetNutanixCluster($clusterConnect,$clusterID)
	// rkGetNutanixClusters($clusterConnect)
	// rkGetNutanixVM($clusterConnect)
	// rkGetNutanixVMName($clusterConnect,$vmID)
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
	// rkGetServiceAccountToken($clusterConnect)
	// rkGetSnappable($clusterConnect,$slaID)
	// rkGetSnapshotCount($clusterConnect)
	// rkGetSnapshotFromFilesetID($clusterConnect,$filesetID)
	// rkGetSnapshotSize($clusterConnect,$vmID,$snapID)
	// rkGetSpecificMSSQL($clusterConnect,$sqlID)
	// rkGetSupportToken($clusterConnect)
	// rkGetSupportTunnel($clusterConnect)
	// rkGetTimeStamp($dateString)
	// rkGetUnmanaged($clusterConnect)
	// rkGetUnmanagedSnapshots($clusterConnect,$ID)
	// rkGetUpgradeHistory($clusterConnect)
	// rkGetUserDetails($clusterConnect,$userID)
	// rkGetUserID($clusterConnect,$userName)
	// rkGetUserName($clusterConnect,$userID)
	// rkGetUserPriviledges($clusterConnect,$userID)
	// rkGetUsers($clusterConnect)
	// rkGetWindowsFilesets($clusterConnect)
	// rkGetfileSetName($clusterConnect,$filesetID)
	// rkGetmssqlSnapshot($clusterConnect,$mssqlID)
	// rkGetvmwareVM($clusterConnect)
	// rkGetvmwareVMId($clusterConnect,$vmName)
	// rkGetvmwareVMName($clusterConnect,$vmID)
	// rkGetvmwareVMSnaps($clusterConnect,$vmwareVMID)
	// rkGraphQL($clusterConnect,$query)
	// rkIntegrityResult($clusterConnect,$eventID)
	// rkMSSQLRestore($clusterConnect,$dbSourceID,$dbTargetInstanceID,$dbTargetName,$timeStamp,$overwrite=false,$targetPaths="")
	// rkMSSQLgetFiles($clusterConnect,$dbSourceID,$dbRecoveryTime)
	// rkMakeAdminUser($clusterConnect,$userID)
	// rkModifyUser($clusterConnect,$userID,$firstName,$lastName,$eMail)
	// rkNutanixAddStatus($clusterConnect,$taskID)
	// rkNutanixDelStatus($clusterConnect,$taskID)
	// rkObjectNametoID($clusterConnect,$name)
	// rkPolGetToken($clientID,$clientSecret,$tenant)
	// rkPolGraphQL($polarisConnect,$query)
	// rkRefreshHost($clusterConnect,$hostName)
	// rkRefreshReport($clusterConnect,$rptID)
	// rkRemoveSLA($clusterConnect,$vmID)
	// rkSetBanner($clusterConnect,$bannerText)
	// rkSetSLA($clusterConnect,$vmID,$slaID)
	// rkStartIntegrityChk($clusterConnect,$objectID,$snapID="")
																					
	// ==========================================================================
	//                           Generic functions
	// ==========================================================================

	// ----------------------------------------------------------
	// Function who creates a token based on service account creds
	// ----------------------------------------------------------
	
	function rkGetServiceAccountToken($clusterConnect)
	{
		$API="/api/v1/service_account/session";

		$config_params="
		{
  			\"serviceAccountId\": \"".$clusterConnect["username"]."\", 
  			\"secret\": \"".$clusterConnect["password"]."\"
  		}
		";

		$curl = curl_init();
   		
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS,$config_params);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($config_params),'Accept: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		$result = json_decode(curl_exec($curl));
		curl_close($curl);
		
		if(isset($result->message)) return FALSE;
		else return($result->token);

	}


	// ----------------------------------------------------------------
	// Function who deletes the secure token session from the appliance
	// ----------------------------------------------------------------

	// /!\ Note : $clusterConnect must containe a "token" dimention in this case /!\

	function rkDelServiceAccountToken($clusterConnect)
	{
		$API="/api/v1/session/me";

		$curl = curl_init();
   		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$clusterConnect["token"]));

		$result = json_decode(curl_exec($curl));
		$info=curl_getinfo($curl,CURLINFO_HTTP_CODE);

		curl_close($curl);

		// Return code wheen successful is 204
		if($info==204) return TRUE;
		else return FALSE;
	}

	// ---------------------------------------------------------------------------
	// Function to populate a return variable (JSON text) with all cluster details
	// ---------------------------------------------------------------------------
	
	function rkGetClusterDetails($clusterConnect)
	{
		$API="/api/v1/cluster/me";

		$curl = curl_init();
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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

		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

		$result = json_decode(curl_exec($curl));
		curl_close($curl);	

		return($result);
	}

	// ---------------------------------------------------------------
	// Function to add new Nutanix cluster to the Rubrik configuration
	// ---------------------------------------------------------------

	function rkAddNutanix($clusterConnect,$nutanixCluster)
	{
		$API="/api/internal/nutanix/cluster";

		// Transform Certificate string to have the right carriage returns
		$rawCert=str_replace("\n","\\n",$nutanixCluster["caCerts"]);

		$config_params="{\"hostname\": \"".$nutanixCluster["hostname"]."\",
				  \"nutanixClusterUuid\": \"".$nutanixCluster["nutanixClusterUuid"]."\",
				  \"username\": \"".$nutanixCluster["username"]."\",
				  \"password\": \"".$nutanixCluster["password"]."\",
				  \"caCerts\": \"".$rawCert."\"}";
				
		$curl = curl_init();

		if(isset($clusterConnect["token"]))
		{
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS,$config_params);
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($config_params),'Authorization: Bearer '.$clusterConnect["token"]));
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        }
        else
        {
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
        }

		$result = curl_exec($curl);
		curl_close($curl);
		
		// If task submitted, return task ID either return error
		$result=json_decode($result);
		if(isset($result->id)) return $result->id;
		else return $result;
	}
	
	// -----------------------------------------
	// Function to retrieve the cluster add logs
	// -----------------------------------------
	
	function rkNutanixAddStatus($clusterConnect,$taskID)
	{
		// 2 different API calls are required in this case 
		// /api/v1/event/latest?limit=1&object_type=NutanixCluster&order_by_time=desc;
		// /api/v1/event_series/

		$API="/api/v1/event/latest?limit=1&object_type=NutanixCluster&order_by_time=desc";

		$curl = curl_init();
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

		$result = curl_exec($curl);
		$result=json_decode($result);

		curl_close($curl);
		
		$seriesID=$result->data[0]->latestEvent->eventSeriesId;
		
		// Second API call with all details about the add job

		$API="/api/v1/event_series/".$seriesID;

		$curl = curl_init();

		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

		$result = curl_exec($curl);
		$result=json_decode($result);

		curl_close($curl);
		return($result);
	}

	// ---------------------------------------------------------------
	// Function returning all Nutanix clusters ID configured on Rubrik
	// ---------------------------------------------------------------

	function rkGetNutanixClusters($clusterConnect)
	{
		$API="/api/internal/nutanix/cluster";

		$curl = curl_init();
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

		$result = curl_exec($curl);
		curl_close($curl);
		$result=json_decode($result);
		
		$ids=array();
		
		for($i=0;$i<count($result->data);$i++)
		{
			$ids[]=$result->data[$i]->id;
		}
		
		return $ids;
	}

	// ---------------------------------------------------------------
	// Function returning all details for specific Nutanix clusters ID
	// ---------------------------------------------------------------

	function rkGetNutanixCluster($clusterConnect,$clusterID)
	{
		$API="/api/internal/nutanix/cluster/".urlencode($clusterID);

		$curl = curl_init();

		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

		$result = curl_exec($curl);
		curl_close($curl);
		$result=json_decode($result);

		return($result);
	}

	// ---------------------------------------------------------------
	// Function deleting a Nutanix cluster from Rubrik configuration
	// ---------------------------------------------------------------

	function rkDelNutanix($clusterConnect,$clusterID)
 	{
		$API="/api/internal/nutanix/cluster/".urlencode($clusterID);

		$curl = curl_init();
		
		if(isset($clusterConnect["token"]))
		{
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($config_params),'Authorization: Bearer '.$clusterConnect["token"]));
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        }
        else
        {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
            curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        }

		$result = json_decode(curl_exec($curl));
		$info=curl_getinfo($curl,CURLINFO_HTTP_CODE);
		curl_close($curl);

		return $result;
 	}

	// -----------------------------------------
	// Function to retrieve the cluster del logs
	// -----------------------------------------

	function rkNutanixDelStatus($clusterConnect,$taskID)
	{
		// 2 different API calls are required in this case 
		// /api/v1/event/latest?limit=1&object_type=NutanixCluster&order_by_time=desc;
		// /api/v1/event_series/

		$API="/api/v1/event/latest?limit=1&object_type=NutanixCluster&order_by_time=desc";

		$curl = curl_init();
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

		$result = curl_exec($curl);
		$result=json_decode($result);

		curl_close($curl);
		
		$seriesID=$result->data[0]->latestEvent->eventSeriesId;
		
		// Second API call with all details about the add job

		$API="/api/v1/event_series/".$seriesID;

		$curl = curl_init();

		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

		$result = curl_exec($curl);
		$result=json_decode($result);

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

		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

		$result = curl_exec($curl);
		curl_close($curl);
		return json_decode($result);
	}

	// --------------------------------------------------------
	// Function returning Nutanix VM name from ID
	// --------------------------------------------------------

	function rkGetNutanixVMName($clusterConnect,$vmID)
	{
		$API="/api/internal/nutanix/vm/".$vmID;

		$curl = curl_init();
   		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

		$result = json_decode(curl_exec($curl));
		curl_close($curl);

		return($result)->name;
	}	
		
	// -----------------------------------------------
	// Function who returns Nutanix VM id from VM name
	// -----------------------------------------------

	function rkGetNutanixVMiD($clusterConnect,$NutanixVMName)
	{
		$API="/api/internal/nutanix/vm?limit=1&name=".urlencode($NutanixVMName)."&sort_by=name";

		$curl = curl_init();
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

		$result = curl_exec($curl);
		curl_close($curl);

		return json_decode($result);
	}
	
	// --------------------------------------------------------
	// Function returning vmware VM name from ID
	// --------------------------------------------------------

	function rkGetvmwareVMName($clusterConnect,$vmID)
	{
		$API="/api/v1/vmware/vm/".$vmID;

		$curl = curl_init();
   		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

		$result = json_decode(curl_exec($curl));
		return($result)->name;
	}	
	
	// ----------------------------------------------
	// Function who returns vmware VM ID from VM name
	// ----------------------------------------------

	function rkGetvmwareVMId($clusterConnect,$vmName)
	{
		$API="/api/v1/vmware/vm?name=".urlencode($vmName);

		$curl = curl_init();

		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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

		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

		$result = curl_exec($curl);
		curl_close($curl);
		
		return json_decode($result)->snapshots;
	}

	// -----------------------------------------------------------
	// Function getting vmware VM specifications
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

		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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

		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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
   		
		if(isset($clusterConnect["token"]))
		{
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS,$config_params);
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($config_params),'Authorization: Bearer '.$clusterConnect["token"]));
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        }
        else
        {
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
        }

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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

		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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

		if(isset($clusterConnect["token"]))
		{
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS,$config_params);
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($config_params),'Authorization: Bearer '.$clusterConnect["token"]));
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        }
        else
        {
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
        }

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

			if(isset($clusterConnect["token"]))
			{
				curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
				curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
			}
			else
			{
				curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
				curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
				curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

			}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

		$result = curl_exec($curl);
		curl_close($curl);

		return json_decode($result);
	}

	// --------------------------------------------------------
	// Function returning fileSet name from ID
	// --------------------------------------------------------

	function rkGetfileSetName($clusterConnect,$filesetID)
	{
		$API="/api/v1/fileset/".$filesetID;

		$curl = curl_init();
   		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

		$result = json_decode(curl_exec($curl));

		return($result)->name;
	}
		
	// --------------------------------------------------
	// Function to initiate a fileset protection
	// --------------------------------------------------
	
	function rkFileSetBackup($clusterConnect,$filesetId)
	{
		$API="/api/v1/fileset/".urlencode($filesetId)."/snapshot";
				
		$curl = curl_init();
		
		if(isset($clusterConnect["token"]))
		{
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS,$config_params);
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($config_params),'Authorization: Bearer '.$clusterConnect["token"]));
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        }
        else
        {
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
        }

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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

		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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

		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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

		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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

		if(isset($clusterConnect["token"]))
		{
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS,$config_params);
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($config_params),'Authorization: Bearer '.$clusterConnect["token"]));
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        }
        else
        {
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
        }

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

		$result = curl_exec($curl);
		curl_close($curl);

		return $result;	
	}

	// --------------------------------------------------------
	// Function returning all vmware and Nutanix VMs in a array
	// --------------------------------------------------------

	function rkGetAllVMs($clusterConnect)
	{
		// -------------------------------------------------------
		// Function to sort array according to specified dimension
		// -------------------------------------------------------
	
		function columnSort($unsorted, $column) 
		{ 
			$sorted = $unsorted; 
			for ($i=0; $i < sizeof($sorted)-1; $i++) 
			{ 
				for ($j=0; $j<sizeof($sorted)-1-$i; $j++) 
				if ($sorted[$j][$column] > $sorted[$j+1][$column]) 
				{ 
					$tmp = $sorted[$j]; 
					$sorted[$j] = $sorted[$j+1]; 
					$sorted[$j+1] = $tmp; 
				}	 
			} 
			return $sorted; 
		}

		$VMs=array();

		// List vmware vms and get their applied SLA
		$vmware=rkGetvmwareVM($clusterConnect);
	
		for($i=0;$i<count($vmware->data);$i++)
		{
			$VMs[$i]["name"]=$vmware->data[$i]->name;
			$VMs[$i]["hypervisor"]="vmware";
			$VMs[$i]["sla"]=$vmware->data[$i]->effectiveSlaDomainName;
			$VMs[$i]["vmid"]=$vmware->data[$i]->id;
		}

		// List Nutanix vms and get their applied SLA
		$nutanix=rkGetNutanixVM($clusterConnect);

		// start adding VMs after vmware vms in previously populated array
		$start=count($VMs);
	
		for($i=$start;$i<count($nutanix->data);$i++)
		{
			$VMs[$i]["name"]=$nutanix->data[$i]->name;
			$VMs[$i]["hypervisor"]="nutanix";
			$VMs[$i]["sla"]=$nutanix->data[$i]->effectiveSlaDomainName;
			$VMs[$i]["vmid"]=$nutanix->data[$i]->id;
		}
		
		$VMs=columnSort($VMs,"name");
		return ($VMs);
	}
	
	// -------------------------------------------------------
	// Function who returns the last num events in the Cluster
	// -------------------------------------------------------
 
 	// Possible values for $eventType are :
	//
	// Archive, Audit, AuthDomain, Backup, CloudNativeSource, Configuration, Diagnostic, Instanciate, Maintenance, 
	// NutanixCluster, Recovery, Replication, StorageArray, System, Vcd, VCenter
	
	function getRubrikEvents($clusterConnect,$numEvents,$eventType,$objectType,$objectName)
	{
		$API="/api/internal/event?limit=".$numEvents."&event_type=".$eventType;

		if($objectType!="") $API=$API."&object_type=".$objectType;
		if($objectName!="") $API=$API."&object_name=".$objectName;

		$curl = curl_init();
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

		$result = curl_exec($curl);
		curl_close($curl);

		return json_decode($result)->days;
	}
	
	// -------------------------------------------------
	// Get cluster upgrade history date time and version
	// -------------------------------------------------

	function rkGetUpgradeHistory($clusterConnect)
	{
		$API="/api/v1/config/history/list_updates?namespace=local_atlas&source=Upgrade";

		$curl = curl_init();

		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

		$result=curl_exec($curl);
		$result=json_decode($result);
		curl_close($curl);

		$history=$result;

		$upgradesHistory=array();
		for($i=0;$i<count($history->data);$i++)
		{
			// cleanup date/time format
			$dateTime=$history->data[$i]->modifiedDateTime;
			// Remove last 7 characters -> 2021-06-30T10:08:12.269Z and add 00 sec
			$dateTime=substr($dateTime, 0, -7);
			$dateTime=$dateTime."00";
			$dateTime=rkGetHumanTime($dateTime);
	
			// cleanup version number
			$version=$history->data[$i]->configChangeMetadata;
			$version=substr($version,strpos($version,"tarball_version")+18,strlen($version));
			$version=str_replace(array("\"","}"),"",$version);
	
			$upgradesHistory[$i]=$dateTime."|".$version;
		}

		return(array_values(array_unique($upgradesHistory)));	
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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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

		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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

		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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

		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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

		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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

		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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

		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

		$result = curl_exec($curl);
		curl_close($curl);
		
 		// Step 2 : Get snapable_id /api/internal/mssql/db/<id>/snappable_id

		$snapshotID=json_decode($result)->data[0]->id;
		
		$API="/api/internal/mssql/db/".$dbID."/snappable_id";

		$curl = curl_init();

		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

		$result = curl_exec($curl);
		curl_close($curl);

		$snappableID=json_decode($result)->snappableId;

 		// Step 3 : Get size of object /api/internal/snapshot/<id>/storage/stats?snappable_id=<id>

		$API="/api/internal/snapshot/".$snapshotID."/storage/stats?snappable_id=".$snappableID;

		$curl = curl_init();

		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

		$result = curl_exec($curl);
		curl_close($curl);

		return(json_decode($result)->logicalBytes);
		
 	}

	// ==========================================================================
	//                           SLA related functions
	// ==========================================================================
	
	// --------------------------------------------------------
	// Function returning all protected snappables from SLA ID
	// --------------------------------------------------------

	function rkGetSnappable($clusterConnect,$slaID)
	{
		$API="/api/internal/sla_domain/".$slaID."/protected_objects";

		$curl = curl_init();
   		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

		$result = json_decode(curl_exec($curl));
		$result=$result->data;

		curl_close($curl);

		// Cleanup output for nice return values()
		
		$niceOutput=array();
		
		for($i=0;$i<count($result);$i++)
		{
			$niceOutput[]=$result[$i]->managedId;	
		}

		return($niceOutput);
	}	

	// -------------------------------------
	// Function who assigns SLA to an Object
	// -------------------------------------

	function rkSetSLA($clusterConnect,$vmID, $slaID)
	{
		$API="/api/v2/sla_domain/".$slaID."/assign";	
		$config_params="
						{
  							\"managedIds\": [
    						\"".$vmID."\"
  							]
						}";
	
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS,$config_params);
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($config_params),'Accept: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($curl);
		curl_close($curl);

		return json_decode($result);
	}
	
	// ------------------------------------------------------
	// Function who removes any SLA assignations to an Object
	// ------------------------------------------------------
	
	function rkRemoveSLA($clusterConnect,$vmID)
	{
		$API="/api/v2/sla_domain/UNPROTECTED/assign";
		$config_params="
						{
  							\"managedIds\": [
    						\"".$vmID."\"
  							]
						}";
	
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS,$config_params);
		curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($config_params),'Accept: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($curl);
		curl_close($curl);

		return json_decode($result);
	}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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

		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}
		
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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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
			
			if(isset($clusterConnect["token"]))
			{
				curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
				curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
			}
			else
			{
				curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
				curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
				curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

			}
			
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
			
			if(isset($clusterConnect["token"]))
			{
				curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
				curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
			}
			else
			{
				curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
				curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
				curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

			}

			$result = curl_exec($curl);
			$result=json_decode($result);

			curl_close($curl);
			
			$seriesID=$result->data[0]->latestEvent->eventSeriesId;
			
			// Second API call with all details about the backup job

			$API="/api/v1/event_series/".$seriesID;

			$curl = curl_init();

			if(isset($clusterConnect["token"]))
			{
				curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
				curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
			}
			else
			{
				curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
				curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
				curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

			}

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

		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

		$result = curl_exec($curl);
		curl_close($curl);

		$snapshots["Ingested"]=json_decode($result)->value;

 		// Step 2 : Get logical snapshots size -> /api/internal/stats/snapshot_storage/logical
		
		$API="/api/internal/stats/snapshot_storage/logical";

		$curl = curl_init();
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

		$result = curl_exec($curl);
		curl_close($curl);

		$snapshots["Logical"]=json_decode($result)->value;

 		// Step 3 : Get physical snapshots size -> /api/internal/stats/snapshot_storage/physical

		$API="/api/internal/stats/snapshot_storage/physical";

		$curl = curl_init();
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}
		
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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

		$result = json_decode(curl_exec($curl))->data[0]->id;
		$objectID=$result;
		curl_close($curl);	

		// Step 2 : Get all associated snapshots
		
		$API="/api/internal/unmanaged_object/".urlencode($objectID)."/snapshot";

		$curl = curl_init();
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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
		
// 		var_dump($rptName);
// 		var_dump($rptSpecs);
// 		exit();
		
		$curl = curl_init();

		if(isset($clusterConnect["token"]))
		{
            curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS,$rptSpecs);
		    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($rptSpecs),'Authorization: Bearer '.$clusterConnect["token"]));
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        }
        else
        {
            curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS,$rptSpecs);
		    curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($rptSpecs),'Accept: application/json'));
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        }
        
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

		if(isset($clusterConnect["token"]))
		{
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($rptID),'Authorization: Bearer '.$clusterConnect["token"]));
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        }
        else
        {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
            curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        }

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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

		if(isset($clusterConnect["token"]))
		{
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS,$config_params);
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($config_params),'Authorization: Bearer '.$clusterConnect["token"]));
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        }
        else
        {
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
        }
		$result = json_decode(curl_exec($curl));
		
		
		$info=curl_getinfo($curl,CURLINFO_HTTP_CODE);
		curl_close($curl);

		var_dump($info);
		exit();

		
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

		if(isset($clusterConnect["token"]))
		{
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS,$config_params);
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($config_params),'Authorization: Bearer '.$clusterConnect["token"]));
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        }
        else
        {
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
        }

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}
		
		$result=curl_exec($curl);
		$result=json_decode($result);
		curl_close($curl);

		$res["status"]=$result->data[0]->updateStatus;
		if(isset($result->data[0]->updatedTime)) $res["dataTime"]=$result->data[0]->updatedTime;
		else $res["dataTime"]="";

		return($res);	
	}

	// ----------------------------------------------------------------------------
	// Function who returns total storage for an object
	// ----------------------------------------------------------------------------

	function rkGetObjectStorage($clusterConnect,$vmName,$type)
	{
		/*
			1) Get object id
			2) Get all snapshots ID 
			3) use rkGetSnapshotSize to retrieve size of each snapshot IDs
			4) make sum of all physicalBytes field and send it as return value
			
			$type can be any type from "nutanix", "vmware" or "fileset"
			
		*/

		$vmID=rkObjectNametoID($clusterConnect,$vmName);
		$snapsID=array();
		
		// Case for Nutanix VMs

		if($type=="nutanix")
		{
			$API="/api/internal/nutanix/vm/".$vmID."/snapshot";
			$curl = curl_init();
		
			if(isset($clusterConnect["token"]))
			{
				curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
				curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
			}
			else
			{
				curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
				curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
				curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

			}

			$result = json_decode(curl_exec($curl))->data;
			
			// get all snapIDs 
			
			for($i=0;$i<count($result);$i++)
			{
				$snapsID[]=$result[$i]->id;
			}

			// get size for all snaps 

			$snapsStorage=array("storage" => 0, "snapCount" => 0);
			for($i=0;$i<count($snapsID);$i++)
			{
				$snapsStorage["storage"]+=rkGetSnapshotSize($clusterConnect,$vmID,$snapsID[$i])->ingestedBytes;
			}			
			$snapsStorage["snapCount"]=$i;
		}
		
		// Case for vmware VMs
		
		if($type=="vmware")
		{
			$API="/api/v1/vmware/vm/".$vmID."/snapshot";
			$curl = curl_init();
		
			if(isset($clusterConnect["token"]))
			{
				curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
				curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
			}
			else
			{
				curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
				curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
				curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

			}

			$result = json_decode(curl_exec($curl))->data;
			
			// get all snapIDs 

			for($i=0;$i<count($result);$i++)
			{
				$snapsID[]=$result[$i]->id;
			}

			// get size for all snaps 

			$snapsStorage=array("storage" => 0, "snapCount" => 0);
			for($i=0;$i<count($snapsID);$i++)
			{
				$snapsStorage["storage"]+=rkGetSnapshotSize($clusterConnect,$vmID,$snapsID[$i])->ingestedBytes;
			}			
			$snapsStorage["snapCount"]=$i;
		}
		
		// Case for fileset
		
		if($type=="fileset")
		{
			$API="/api/v1/fileset/".$vmID;
			$curl = curl_init();
		
			if(isset($clusterConnect["token"]))
			{
				curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
				curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
			}
			else
			{
				curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
				curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
				curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

			}

			$result = json_decode(curl_exec($curl))->snapshots;
			
			// get all snapIDs 
			
			for($i=0;$i<count($result);$i++)
			{
				$snapsID[]=$result[$i]->id;
			}

			// get size for all snaps 

			$snapsStorage=array("storage" => 0, "snapCount" => 0);
			for($i=0;$i<count($snapsID);$i++)
			{
				$snapsStorage["storage"]+=rkGetSnapshotSize($clusterConnect,$vmID,$snapsID[$i])->ingestedBytes;
			}			
			$snapsStorage["snapCount"]=$i;

		}
		
		return $snapsStorage;
	}
	
	// --------------------------------------------------------------
	// Function returning key cluster statistics into an array
	// --------------------------------------------------------------

	function rkGetExecSum($clusterConnect)
	{
		// $clusterConnect must be provided as an array of credentials

		//	Sample format : 
	
		// 		$clusterConnect=array(
		// 				0 => array(
		// 					"cluster" => "Cluster 1",
		// 					"username" => "username",
		// 					"password" => "70617373776f7264",
		// 					"ip" => "192.168.1.1"
		// 				),
		// 				1 => array(
		// 					"cluster" => "Cluster 2",
		// 					"username" => "username",
		// 					"password" => "70617373776f7264",
		// 					"ip" => "192.168.1.2"
		// 				));
	
		$rptName="tmpReportScriptGenerated_WillBeRemoved";
		$rptSpecs="
			{
			  \"reportType\": \"Custom\",
			  \"chart1\": {
				\"id\": \"chart1\",
				\"name\": \"Local Storage By Object Type\",
				\"chartType\": \"VerticalBar\",
				\"attribute\": \"ObjectType\",
				\"measure\": \"LocalStorage\"
			  },
			  \"chart0\": {
				\"id\": \"chart0\",
				\"name\": \"dummyChart\",
				\"chartType\": \"VerticalBar\",
				\"attribute\": \"ObjectType\",
				\"measure\": \"TotalSnapshots\"
			  },
			  \"updateStatus\": \"Ready\",
			  \"name\": \"".$rptName."\",
			  \"filters\": {
				\"clusterLocation\": [
				  \"Local\"
				]
			  },
			  \"reportTemplate\": \"ObjectProtectionSummary\",
			  \"table\": {
				\"columns\": [
				  \"ObjectName\",
				  \"ObjectType\",
				  \"SlaDomain\",
				  \"ArchivalTarget\",
				  \"TotalSnapshots\",
				  \"LocalSnapshots\",
				  \"ReplicaSnapshots\",
				  \"ArchiveSnapshots\",
				  \"LocalStorage\",
				  \"ArchiveStorage\",
				  \"ReplicaStorage\",
				  \"LocalStorageGrowth\",
				  \"ReplicaStorageGrowth\",
				  \"ArchiveStorageGrowth\"
				]
			  }
			}
			";
	
		// Get cluster details

		$totalStorage=json_decode(getRubrikTotalStorage($clusterConnect))->bytes;
		$nodes=getRubrikNodeCount($clusterConnect);
		$nodeCount=count($nodes->data);
		$availStorage=getRubrikAvailableStorage($clusterConnect);
		$details=json_decode(rkGetClusterDetails($clusterConnect));
		
		print(inColor("Gre","(i) DEBUG")." -- Gettings basic cluster details for ".rkColorOutput($details->name));

		$snapNum=rkGetSnapshotCount($clusterConnect);
		$allSnaps=rkGetAllSnapshotInfo($clusterConnect);
		$ingested=$allSnaps["Ingested"];
		$stored=$allSnaps["Physical"];
		$efficiency=100-($stored/$ingested*100);
		$name=$details->name;
		$location=$details->geolocation->address;
		$version=$details->version;

		// Get details for each nodes
		$nodeDetails=array();
		for($i=0;$i<$nodeCount;$i++)
		{
			$nodeDetails[$i]["ip"]=$nodes->data[$i]->ipAddress;
			$nodeDetails[$i]["id"]=$nodes->data[$i]->id;
			$nodeDetails[$i]["status"]=$nodes->data[$i]->status;
		}

		// Populate all results into return variable
		$data["name"]=$name;
		$data["location"]=$location;
		$data["version"]=$version;
		$data["nodeCount"]=$nodeCount;
		$data["nodeDetails"]=$nodeDetails;
		$data["totalStorage"]=$totalStorage;
		$data["availableStorage"]=$availStorage;
		$data["snaps"]=$snapNum;
		$data["dataIngested"]=$ingested;
		$data["dataStored"]=$stored;
		$data["storageEfficiency"]=$efficiency;
		
		// Get all storage usage per SLA
		$SLAs=rkGetSLAs($clusterConnect);
		$SLASize=array();

		for($j=0;$j<count($SLAs);$j++)
		{
			$SLASize[$j]["name"]=$SLAs[$j]["name"];
			$SLASize[$j]["size"]=rkGetSLAStorage($clusterConnect,$SLAs[$j]["id"]);
		}

		$data["sla_storage"]=$SLASize;	
		$data["runway"]=rkGetRunway($clusterConnect);
		
		// Snapshot breakdown using a tmp report 
		// Step 1 - Create Report, if it already exists, refresh it

		$rptID=rkGetReportID($clusterConnect,$rptName);
		// If report does not exists, create one
		if(!$rptID)
		{
			print("\n".inColor("Yel","/!\ DEBUG")." -- Report does not exist, creating...\n");

			$res=rkCreateReport($clusterConnect,$rptName,$rptSpecs);
			
			print(inColor("Gre","(i) DEBUG")." -- Report Created : ".$res."\n");
		}
		else
		{
			// If report exist -> delete it to create it and create it again 
			$res=rkDeleteReport($clusterConnect,$rptID);
			print("\n".inColor("Yel","/!\ DEBUG")." -- Report Deleted : ".rkColorOutput($res)."\n");
			$res=rkCreateReport($clusterConnect,$rptName,$rptSpecs);
			print(inColor("Gre","(i) DEBUG")." -- Report Created : ".$res."\n");
		}
	
		// Check if report data have been generated : "updateStatus": "Ready"

		print(inColor("Gre","(i) DEBUG")." -- Generating object details : ");

		$exit="no";
		while ($exit!="yes")
		{
			$status=rkGetReportStatus($clusterConnect,$rptName);
			if($status["status"]=="Ready") $exit="yes";

			print(".");
			sleep(15);
		}

		$dateTime=str_replace("T", " ", $status["dataTime"]);
		print("\n".inColor("Gre","(i) DEBUG")." -- Data generated!, displaying results...\n");
		print(inColor("Gre","(i) DEBUG")." -- Data have been generated on ".rkColorOutput($dateTime)."\n");

		// Step 2 - Get Report results

		$rptID=rkGetReportID($clusterConnect,$rptName);
		$data2=rkGetDataReport($clusterConnect,$rptID);


		// Step 3 - Delete report to cleanup cluster

		print(inColor("Gre","(i) DEBUG")." -- Deleting temporary report from cluster...\n\n");
		$res=rkDeleteReport($clusterConnect,$rptID);

		$data["storageBreakdown"]=$data2;

		return $data;
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
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

		$result=curl_exec($curl);
		$result=json_decode($result);
		curl_close($curl);

		$principalId=$result->data[0]->id;

		// Next Get the role ID

		$API="/api/v1/role?limit=1&sort_by=Name&sort_order=asc&name=AdministratorRole";

		$curl = curl_init();
		
		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

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

		if(isset($clusterConnect["token"]))
		{
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS,$config_params);
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($config_params),'Authorization: Bearer '.$clusterConnect["token"]));
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        }
        else
        {
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
        }

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

		if(isset($clusterConnect["token"]))
		{
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$clusterConnect["token"]));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		}
		else
		{
			curl_setopt($curl, CURLOPT_USERPWD, $clusterConnect["username"].":".$clusterConnect["password"]);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_URL, "https://".$clusterConnect["ip"].$API);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		}

		$result = json_decode(curl_exec($curl));
		curl_close($curl);

		return $result;
	}
	
	// ==========================================================================
	//         Sending GraphQL queries
	// ==========================================================================

	// ---------------------------------------
	// Function retieving Polaris secret token
	// ---------------------------------------

	function rkPolGetToken($clientID,$clientSecret,$tenant)
	{
		$API="/api/client_token";
		
		// Query must be encapsulated into a valid JSON string. {"query": "$query"}
		$config_params="{\"client_id\":\"".$clientID."\",\"client_secret\":\"".$clientSecret."\",\"grant_type\":\"client_credentials\"}";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS,$config_params);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$tenant.".my.rubrik.com".$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($curl);
		
		curl_close($curl);

		return(json_decode($result)->access_token);
	}

	// -----------------------------------------------
	// Function sending GraphQL queries to on-prem CDM
	// -----------------------------------------------

	function rkGraphQL($clusterConnect,$query)
	{
		$API="/api/internal/graphql";

		// Query must be encapsulated into a valid JSON string. {"query": "$query"}
		$config_params="{\"query\":\"".$query."\"}";
				
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS,$config_params);
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
		
	// -------------------------------------------
	// Function sending GraphQL queries to Polaris
	// -------------------------------------------

	function rkPolGraphQL($polarisConnect,$query)
	{
		$API="/api/graphql";
		
		// Query must be encapsulated into a valid JSON string. {"query": "$query"}
		$config_params="{\"query\":\"".$query."\"}";
				
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS,$config_params);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$polarisConnect["token"],'Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, "https://".$polarisConnect["tenant"].".my.rubrik.com".$API);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($curl);
		
		curl_close($curl);

		return(json_decode($result));
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
	// Display a string in bold white
	// ---------------------------------------------------------------------------

	function rkColorBold($string)
	{
			return ("\e[1;37m".$string."\033[0m");
	}
		
	// ---------------------------------------------------------------------------
	// Function which display a string in a given color
	// ---------------------------------------------------------------------------

	function inColor($colorName,$string)
	{
		$colors=array( 	0 =>
					array( "codeName" => "Bla",
							"codeValue" => "\e[0;30m"),
						1 =>
					array( "codeName" => "Red",
							"codeValue" => "\e[0;31m"),						
						2 =>
					array( "codeName" => "Gre",
							"codeValue" => "\e[0;32m"),						
						3 =>
					array( "codeName" => "Yel",
							"codeValue" => "\e[0;33m"),						
						4 =>
					array( "codeName" => "Blu",
							"codeValue" => "\e[0;34m"),						
						5 =>
					array( "codeName" => "Pur",
							"codeValue" => "\e[0;35m"),						
						6 =>
					array( "codeName" => "Cya",
							"codeValue" => "\e[0;36m"),						
						7 =>
					array( "codeName" => "Whi",
							"codeValue" => "\e[0;37m"),						

						8 =>
					array( "codeName" => "BBlack",
							"codeValue" => "\e[1;30m"),						
						9 =>
					array( "codeName" => "BRed",
							"codeValue" => "\e[1;31m"),						
						10 =>
					array( "codeName" => "BGre",
							"codeValue" => "\e[1;32m"),						
						11 =>
					array( "codeName" => "BYel",
							"codeValue" => "\e[1;33m"),						
						12 =>
					array( "codeName" => "BBlu",
							"codeValue" => "\e[1;34m"),						
						13 =>
					array( "codeName" => "BPur",
							"codeValue" => "\e[1;35m"),						
						14 =>
					array( "codeName" => "BCya",
							"codeValue" => "\e[1;36m"),						
						15 =>
					array( "codeName" => "BWhi",
							"codeValue" => "\e[1;37m"),						
						16 =>
					array( "codeName" => "UBlack",
							"codeValue" => "\e[4;30m"),						
						17 =>
					array( "codeName" => "URed",
							"codeValue" => "\e[4;31m"),						
						18 =>
					array( "codeName" => "UGre",
							"codeValue" => "\e[4;32m"),						
						19 =>
					array( "codeName" => "UYel",
							"codeValue" => "\e[4;33m"),						
						20 =>
					array( "codeName" => "UBlu",
							"codeValue" => "\e[4;34m"),						
						21 =>
					array( "codeName" => "UPur",
							"codeValue" => "\e[4;35m"),						
						22 =>
					array( "codeName" => "UCya",
							"codeValue" => "\e[4;36m"),						
						23 =>
					array( "codeName" => "UWhi",
							"codeValue" => "\e[4;37m"),						

						24 =>
					array( "codeName" => "IBlack",
							"codeValue" => "\e[0;90m"),						
						25 =>
					array( "codeName" => "IRed",
							"codeValue" => "\e[0;91m"),						
						26 =>
					array( "codeName" => "IGre",
							"codeValue" => "\e[0;92m"),						
						27 =>
					array( "codeName" => "IYel",
							"codeValue" => "\e[0;93m"),						
						28 =>
					array( "codeName" => "IBlu",
							"codeValue" => "\e[0;94m"),						
						29 =>
					array( "codeName" => "IPur",
							"codeValue" => "\e[0;95m"),						
						30 =>
					array( "codeName" => "ICya",
							"codeValue" => "\e[0;96m"),						
						31 =>
					array( "codeName" => "IWhi",
							"codeValue" => "\e[0;97m"),						


						32 =>
					array( "codeName" => "BIBlack",
							"codeValue" => "\e[1;90m"),						
						33 =>
					array( "codeName" => "BIRed",
							"codeValue" => "\e[1;91m"),						
						34 =>
					array( "codeName" => "BIGre",
							"codeValue" => "\e[1;92m"),						
						35 =>
					array( "codeName" => "BIYel",
							"codeValue" => "\e[1;93m"),						
						36 =>
					array( "codeName" => "BIBlu",
							"codeValue" => "\e[1;94m"),						
						37 =>
					array( "codeName" => "BIPur",
							"codeValue" => "\e[1;95m"),						
						38 =>
					array( "codeName" => "BICya",
							"codeValue" => "\e[1;96m"),						
						39 =>
					array( "codeName" => "BIWhi",
							"codeValue" => "\e[1;97m"),						

						40 =>
					array( "codeName" => "On_Black",
							"codeValue" => "\e[40m"),						
						41 =>
					array( "codeName" => "On_Red",
							"codeValue" => "\e[41m"),						
						42 =>
					array( "codeName" => "On_Gre",
							"codeValue" => "\e[42m"),						
						43 =>
					array( "codeName" => "On_Yel",
							"codeValue" => "\e[43m"),						
						44 =>
					array( "codeName" => "On_Blu",
							"codeValue" => "\e[44m"),						
						45 =>
					array( "codeName" => "On_Pur",
							"codeValue" => "\e[45m"),						
						46 =>
					array( "codeName" => "On_Cya",
							"codeValue" => "\e[46m"),						
						47 =>
					array( "codeName" => "On_Whi",
							"codeValue" => "\e[47m"),						

						48 =>
					array( "codeName" => "On_IBlack",
							"codeValue" => "\e[0;100m"),						
						49 =>
					array( "codeName" => "On_IRed",
							"codeValue" => "\e[0;101m"),						
						50 =>
					array( "codeName" => "On_IGre",
							"codeValue" => "\e[0;102m"),						
						51 =>
					array( "codeName" => "On_IYel",
							"codeValue" => "\e[0;103m"),						
						52 =>
					array( "codeName" => "On_IBlu",
							"codeValue" => "\e[0;104m"),						
						53 =>
					array( "codeName" => "On_IPur",
							"codeValue" => "\e[0;105m"),						
						54 =>
					array( "codeName" => "On_ICya",
							"codeValue" => "\e[0;106m"),						
						55 =>
					array( "codeName" => "On_IWhi",
							"codeValue" => "\e[0;107m"),						
	
				);

		// Step 1 : search for color
		$found=0;
		$c=0;
		
		while ($found==0 && $c<count($colors))
		{
			if($colorName==$colors[$c]["codeName"])
			{
				$found=1;
				$code=$colors[$c]["codeValue"];	
			} 
			$c++;	
		}

		if($found) return ($code.$string."\033[0m");
		else return ($string);

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
