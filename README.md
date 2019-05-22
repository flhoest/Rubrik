# Rubrik API Framework (written in Php)

```
This documentation is under review and considered as draft!
```
![rubrik_logo](http://rubrik.com/wp-content/uploads/2014/10/logo-large-gray.png)       ![php_logo](https://7php.com/pimg/2014/01/elephpant_281_193.png)

## Background

This project's goal is to provide anyone who needs to script automation, a collection of functions that call Rubrik's APIs. I was facing some challenges around MS SQL DR and I had to start writing some functions to make a good use of what Rubrik is offering out of the box. I have tested this framework with Rubrik CDM release 4.2 and 5.0. So far, so good ;)

## Getting Started

In order to make a good use of the provided framework, you first need to have php-cli installed. This is very easy and a lot of documentation on how to set it up on various platform (Windows, Linux & Mac OS) is widely available. The most common way to deploy php-cli is using your prefered package manager. Within the Linux world, just use : 
```
yum install php-cli -y
````

## File Listing

* rkFramework.php -> the list of functions used to query the Rubrik cluster using APIs;
* rkGetinfo.php -> an example of simple code that shows how to use the framework

## Prerequisites

Before continuing you need to have some basic information about your environment like Rubrik credentials and IP/Hostname. Once you have them, simply create a file called credentials.php and set the following variable : 

```php 
<?php
	$clusterConnect=array(
		"username" => "username",
		"password" => "password",
		"ip" => "0.0.0.0"
	);
?>
```

## Function's Reference

The below section is a list of all existing functions in this framework.

### Index
````
getRubrikAvailableStorage($clusterConnect)
getRubrikClusterID($clusterConnect)
getRubrikEvents($clusterConnect,$numEvents,$eventType="Backup",$objectType,$objectName)
getRubrikNodeCount($clusterConnect)
getRubrikRunway($clusterConnect)
getRubrikSLAs($clusterConnect)
getRubrikTotalStorage($clusterConnect)
rkCheckAccess($clusterConnect)
rkColorOutput($string)
rkColorRed($string)
rkCreateReport($clusterConnect,$rptName,$rptSpecs)
rkCreateReportSchedule($clusterConnect,$rptID,$scheduleDefinition)
rkCreateSLA($clusterConnect,$slaName,$HFreq,$HRet,$DFreq,$DRet,$MFreq,$MRet,$YFreq,$YRet)
rkDelUnmanagedObject($clusterConnect,$objName,$keepAmount)
rkDeleteUnmanaged($clusterConnect,$ObjID)
rkEpochToSQL($EpochTime)
rkFileSetBackup($clusterConnect,$filesetId)
rkFileSetExport($clusterConnect,$snapshotID,$targetHostID,$sourcePath,$targetPath)
rkFormatBytes($bytes,$decimals=2,$system='metric')
rkGetAgentConnectivity($clusterConnect,$hostName)
rkGetAllSnapshotInfo($clusterConnect)
rkGetClusterDetails($clusterConnect)
rkGetClusterVersion($clusterConnect)
rkGetEpoch($dateString)
rkGetEpoch2($dateString)
rkGetFailedAmount($clusterConnect,$objectName)
rkGetFileSet($clusterConnect)
rkGetFileSetSnapshotsDetails($clusterConnect,$ID)
rkGetFileURLfromSnap($clusterConnect,$snapshotID,$fileName)
rkGetFilesetID($clusterConnect,$host,$fileSetName)
rkGetFilesetSnaps($clusterConnect,$filesetID)
rkGetHostID($clusterConnect,$hostName)
rkGetHumanTime($timeStamp)
rkGetHypervVM($clusterConnect)
rkGetMSSQL($clusterConnect)
rkGetMSSQLInstanceID($clusterConnect,$dbName,$dbHost)
rkGetMSSQLSnapshotSize($clusterConnect,$dbID,$DateTime)
rkGetMSSQLid($clusterConnect,$dbName,$dbHost)
rkGetNutanixVM($clusterConnect)
rkGetObjectStatus($clusterConnect,$objectName)
rkGetRecoveryStatus($clusterConnect,$object,$jobID)
rkGetReportID($clusterConnect,$reportName)
rkGetSLAid($clusterConnect,$SLAname)
rkGetSLAname($clusterConnect,$SLAid)
rkGetSnapshotCount($clusterConnect)
rkGetSnapshotFromFilesetID($clusterConnect,$filesetID)
rkGetSpecificMSSQL($clusterConnect,$sqlID)
rkGetSupportToken($clusterConnect)
rkGetSupportTunnel($clusterConnect)
rkGetTimeStamp($dateString)
rkGetUnmanaged($clusterConnect)
rkGetUnmanagedSnapshots($clusterConnect,$ID)
rkGetUserDetails($clusterConnect,$userID)
rkGetUserID($clusterConnect,$userName)
rkGetUserName($clusterConnect,$userID)
rkGetUsers($clusterConnect)
rkGetWindowsFilesets($clusterConnect)
rkGetmssqlSnapshot($clusterConnect,$mssqlID)
rkGetvmwareVM($clusterConnect)
rkMSSQLRestore($clusterConnect,$dbSourceID,$dbTargetInstanceID,$dbTargetName,$timeStamp,$overwrite=false,$targetPaths="")
rkMSSQLgetFiles($clusterConnect,$dbSourceID,$dbRecoveryTime)
rkRefreshHost($clusterConnect,$hostName)
rkRefreshReport($clusterConnect,$rptID)
````

### Explanation

> _getRubrikClusterDetails($clusterConnect)_

This function returns basic detais about the cluster

  - Input : `$ClusterConnect` -> array containing connection detail to the Rubrik cluster.
  - Output : a json decodable string with all the relevant Rubrik cluster details.
  - Usage sample : 
  
```php
$cluster=getRubrikClusterDetails($clusterConnect)
var_dump($cluster)
```
The above will display :

```
{
  "id": "25c9e332-8b42-4b1d-8c6f-32e03cec349a",
  "version": "4.2.0-p5-1383",
  "apiVersion": "1",
  "name": "MyClusterHostName",
  "timezone": {
    "timezone": "Europe/Amsterdam"
  },
  "geolocation": {
    "address": "Somewhere on earth"
  },
  "acceptedEulaVersion": "1.0",
  "latestEulaVersion": "1.0"
}
```

> _rkGetClusterVersion($clusterConnect)_

  - Input : `$ClusterConnect` -> array containing connection detail to the Rubrik cluster.
  - Output : a string with the running version installed on the cluster.
  - Usage sample : 
```php
var_dump(rkGetClusterVersion($clusterConnect));
```

The above will display : 

```
string(10) "4.2.1-1417"
```

> _getRubrikSLAs($clusterConnect)_

This function returns details about configured SLAs in the cluster.

  - Input : `$ClusterConnect` -> array containing connection detail to the Rubrik cluster.
  - Output : a json string with all details regarding SLA
  - Usage sample : 
  
```php
$SLA=json_decode(getRubrikSLAs($clusterConnect));
var_dump($SLA);
```
The above will display :

```
object(stdClass)#4 (3) {
  ["hasMore"]=>
  bool(false)
  ["data"]=>
  array(8) {
    [0]=>
    object(stdClass)#5 (24) {
      ["id"]=>
      string(36) "18b8afe1-e6e4-4da1-a1a1-5ae6ebd2c2f6"
      ["primaryClusterId"]=>
      string(36) "25c9d124-8b42-4b1c-8c6f-63e03cec349a"
      ["name"]=>
      string(14) "My SLA"
      ["frequencies"]=>
      array(1) {
        [0]=>
        object(stdClass)#6 (3) {
          ["timeUnit"]=>
          string(6) "Hourly"
          ["frequency"]=>
          int(6)
          ["retention"]=>
          int(168)
        }
      }
      ["allowedBackupWindows"]=>
      array(0) {
      }
      ["firstFullAllowedBackupWindows"]=>
      array(0) {
      }
      ["maxLocalRetentionLimit"]=>
      int(604800)
      ["archivalSpecs"]=>
      array(0) {
      }
      ["replicationSpecs"]=>
      array(0) {
      }
      ["numDbs"]=>
      int(58)
      ["numFilesets"]=>
      int(0)
      ["numHypervVms"]=>
      int(0)
      ["numNutanixVms"]=>
      int(0)
      ["numManagedVolumes"]=>
      int(0)
      ["numStorageArrayVolumeGroups"]=>
      int(0)
      ["numWindowsVolumeGroups"]=>
      int(0)
      ["numLinuxHosts"]=>
      int(0)
      ["numShares"]=>
      int(0)
      ["numWindowsHosts"]=>
      int(0)
      ["numVms"]=>
      int(0)
      ["numEc2Instances"]=>
      int(0)
      ["numVcdVapps"]=>
      int(0)
      ["isDefault"]=>
      bool(false)
      ["uiColor"]=>
      string(7) "#aed23e"
    }
    [...]
```

> _getRubrikClusterID($clusterConnect)_

  - Input : `$ClusterConnect` -> array containing connection detail to the Rubrik cluster.
  - Output : a json string with 
  - Usage sample : 
  
```php
var_dump(getRubrikClusterID($clusterConnect));
```

The above will display :

```
string(36) "25c3c362-8b42-4b1c-128f-63e03cec349a"
```

> _getRubrikEvents($clusterConnect,$numEvents,$eventType="Backup",$objectType,$objectName)_

  - Inputs : `$ClusterConnect` -> array containing connection detail to the Rubrik cluster.
    - $numEvents -> integer containing the number of event that you would like to retrieve
    - $eventType -> a string containing the type of event that you would like to retrieve. By default this is "Backup". Possible values are : Archive, Audit, AuthDomain, Backup, CloudNativeSource, Configuration, Diagnostic, Instanciate, Maintenance, NutanixCluster, Recovery, Replication, StorageArray, System, Vcd, VCenter
    - $objectType -> a string containing the type of object that you would like to retrieve. Possible values are : VmwareVm, Mssql, LinuxFileset, WindowsFileset, WindowsHost, LinuxHost, StorageArrayVolumeGroup, VolumeGroup, NutanixVm, AwsAccount, and Ec2Instance.
    - $objectName -> a string containing a search filter within the event. Can be whatever.
  - Output : a json string with all details regarding SLA
  - Usage sample : 
```php
$events=json_decode(getRubrikEvents($clusterConnect,$lastEventCount,"Backup","",""));
	
foreach ($events->data as $item) 
{
	print("Time : ".$item->time."\n");
	print("Message : ".json_decode($item->eventInfo)->message."\n");
	print("---------\n");
}
```

The above will display : 

```
Time : Tue Nov 27 19:54:03 UTC 2018
Message : Completed backup of the transaction log for SQL Server database 'Test' from '192.168.34.10\SQLEXPRESS'
---------
Time : Tue Nov 27 19:55:30 UTC 2018
Message : Completed  backup of Microsoft SQL Server Database 'Test' from '192.168.34.10\MSSQLSERVER'
---------
Time : Tue Nov 27 19:55:32 UTC 2018
Message : Initializing SQL Server full backup for 192.168.34.10\MSSQLSERVER\Test
---------
```

> _getRubrikTotalStorage($clusterConnect)_

  - Inputs : `$ClusterConnect` -> array containing connection detail to the Rubrik cluster.
  - Output : an Integer with the total capacity of the Rubrik cluster
  - Usage sample : 
```php
var_dump(json_decode(getRubrikTotalStorage($clusterConnect))->bytes);
```

The above will display : 

```
int(5454107680768)
```

or using formatBytes() function : 

```
string(7) "5.45 TB"
```
  
> _getRubrikRunway($clusterConnect)_

  - Inputs : `$ClusterConnect` -> array containing connection detail to the Rubrik cluster.
  - Output : an Integer representing the number of days the cluster will continue to perform backups without the need to add more storage. This value is important for capacity planning.
  - Usage sample : 
  
  ```php
  var_dump(json_decode(getRubrikRunway($clusterConnect))->days);
  ```

The above will display : 

```
int(263)
```

> _getRubrikNodeCount($clusterConnect)_

  - Inputs : `$ClusterConnect` -> array containing connection detail to the Rubrik cluster.
  - Output : an Integer with the number of physical node in the cluster. Always return `1`for Rubrik EDGE appliances.
  - Usage sample : 
  
```php
var_dump(json_decode(getRubrikNodeCount($clusterConnect))->total);
```

The above will display : 

```
int(1)
```

> _rkGetMSSQL($clusterConnect)_

  - Inputs : `$ClusterConnect` -> array containing connection detail to the Rubrik cluster.
  - Output : a json string with all information related to MS SQL DB configured in the Rubrik cluster (protected or not).
  - Usage smaple : 

```php
$msSQL=json_decode(rkGetMSSQL($clusterConnect))->data;
var_dump($msSQL);
```

The above will display (output truncated) :

```
array(66) {
  [0]=>
  object(stdClass)#5 (24) {
    ["hasPermissions"]=>
    bool(true)
    ["effectiveSlaDomainId"]=>
    string(36) "18b8afe1-e6e4-4da1-a1a1-5ae6ebd2c2f6"
    ["primaryClusterId"]=>
    string(36) "25c9d362-8b42-4b1c-8c6f-63e03cec349a"
    ["instanceName"]=>
    string(11) "MSSQLSERVER"
    ["effectiveSlaSourceObjectId"]=>
    string(52) "MssqlDatabase:::0066defc-f758-405a-b8c0-2ddf74a26cd8"
    ["effectiveSlaSourceObjectName"]=>
    string(6) "Test"
    ["configuredSlaDomainId"]=>
    string(36) "18b8afe1-e6e4-4da1-a1a1-5ae6ebd2c2f6"
    ["isLogShippingSecondary"]=>
    bool(false)
    ["effectiveSlaDomainName"]=>
    string(14) "MS SQL Backup"
    ["instanceId"]=>
    string(52) "MssqlInstance:::41b70765-3eee-4eab-a4df-c21275107f65"
    ["copyOnly"]=>
    bool(false)
    ["recoveryModel"]=>
    string(6) "SIMPLE"
    ["id"]=>
    string(52) "MssqlDatabase:::0066defc-f758-405a-b8c0-2ddf74a26cd8"
    ["state"]=>
    string(6) "ONLINE"
    ["isInAvailabilityGroup"]=>
    bool(false)
    ["isLiveMount"]=>
    bool(false)
    ["configuredSlaDomainName"]=>
    string(14) "MS SQL Backup"
    ["replicas"]=>
    array(1) {
      [0]=>
      object(stdClass)#6 (9) {
        ["instanceId"]=>
        string(52) "MssqlInstance:::41b70765-3eee-4eab-a4df-c21275107f65"
        ["instanceName"]=>
        string(11) "MSSQLSERVER"
        ["recoveryModel"]=>
        string(6) "SIMPLE"
        ["state"]=>
        string(6) "ONLINE"
        ["hasPermissions"]=>
        bool(true)
        ["isStandby"]=>
        bool(false)
        ["recoveryForkGuid"]=>
        string(36) "203DBD74-E684-4A01-AF74-311BC2273D59"
        ["isArchived"]=>
        bool(false)
        ["rootProperties"]=>
        object(stdClass)#7 (3) {
          ["rootType"]=>
          string(4) "Host"
          ["rootId"]=>
          string(43) "Host:::546dcc03-74e5-4524-b648-13f583f39827"
          ["rootName"]=>
          string(13) "192.168.10.10"
        }
      }
    }
    ["slaAssignment"]=>
    string(6) "Direct"
    ["rootProperties"]=>
    object(stdClass)#8 (3) {
      ["rootType"]=>
      string(4) "Host"
      ["rootId"]=>
      string(43) "Host:::546dcc03-74e5-4524-b648-13f583f39827"
      ["rootName"]=>
      string(13) "192.168.10.10"
    }
    ["logBackupRetentionHours"]=>
    int(120)
    ["isRelic"]=>
    bool(false)
    ["name"]=>
    string(6) "Test"
    ["logBackupFrequencyInSeconds"]=>
    int(900)
  }
  [...]
```

> _rkGetSpecificMSSQL($clusterConnect,$sqlID)_
  - Inputs : 
    - `$ClusterConnect` -> array containing connection detail to the Rubrik cluster.
    - `$sqlID` -> SQL ID of the MS SQL database we are getting details from
  - Output : a jason sting containing all details about the Database
  - Usage sample : 
```php
$id=rkGetMSSQLid($clusterConnect,"MyDB","192.168.1.1");
var_dump(json_decode(rkGetSpecificMSSQL($clusterConnect,$id)));
```

The above will display :
```
object(stdClass)#282 (33) {
  ["hasPermissions"]=>
  bool(true)
  ["effectiveSlaDomainId"]=>
  string(36) "18b8afe1-e6e4-4da1-a1a1-5ae6ebd2c2f6"
  ["oldestRecoveryPoint"]=>
  string(24) "2018-11-23T18:11:45.000Z"
  ["primaryClusterId"]=>
  string(36) "25c9d362-8b42-4b1c-8c6f-63e03cec349a"
  ["instanceName"]=>
  string(11) "MSSQLSERVER"
  ["effectiveSlaSourceObjectId"]=>
  string(52) "MssqlDatabase:::ade1f958-8edc-4953-9d43-97a591b2ad3b"
  ["localStorage"]=>
  int(1045838)
  ["effectiveSlaSourceObjectName"]=>
  string(12) "MyDB"
  ["configuredSlaDomainId"]=>
  string(36) "18b8afe1-e6e4-4da1-a1a1-5ae6ebd2c2f6"
  ["isLogShippingSecondary"]=>
  bool(false)
  ["effectiveSlaDomainName"]=>
  string(14) "SQL Backup"
  ["instanceId"]=>
  string(52) "MssqlInstance:::41b70765-3eee-4eab-a4df-c21275107f65"
  ["copyOnly"]=>
  bool(false)
  ["recoveryModel"]=>
  string(6) "SIMPLE"
  ["recoveryForkGuid"]=>
  string(36) "462A4379-0AB7-4119-9CD7-B0AF6351B221"
  ["id"]=>
  string(52) "MssqlDatabase:::ade1f958-8edc-4953-9d43-97a591b2ad3b"
  ["state"]=>
  string(6) "ONLINE"
  ["isInAvailabilityGroup"]=>
  bool(false)
  ["isLiveMount"]=>
  bool(false)
  ["configuredSlaDomainName"]=>
  string(14) "SQL Backup"
  ["replicas"]=>
  array(1) {
    [0]=>
    object(stdClass)#285 (9) {
      ["instanceId"]=>
      string(52) "MssqlInstance:::41b70765-3eee-4eab-a4df-c21275107f65"
      ["instanceName"]=>
      string(11) "MSSQLSERVER"
      ["recoveryModel"]=>
      string(6) "SIMPLE"
      ["state"]=>
      string(6) "ONLINE"
      ["hasPermissions"]=>
      bool(true)
      ["isStandby"]=>
      bool(false)
      ["recoveryForkGuid"]=>
      string(36) "462A4379-0AB7-4119-9CD7-B0AF6351B221"
      ["isArchived"]=>
      bool(false)
      ["rootProperties"]=>
      object(stdClass)#283 (3) {
        ["rootType"]=>
        string(4) "Host"
        ["rootId"]=>
        string(43) "Host:::546dcc03-74e5-4524-b648-13f583f39827"
        ["rootName"]=>
        string(13) "192.168.1.1"
      }
    }
  }
  ["latestRecoveryPoint"]=>
  string(24) "2018-11-29T06:45:10.000Z"
  ["slaAssignment"]=>
  string(6) "Direct"
  ["rootProperties"]=>
  object(stdClass)#284 (3) {
    ["rootType"]=>
    string(4) "Host"
    ["rootId"]=>
    string(43) "Host:::546dcc03-74e5-4524-b648-13f583f39827"
    ["rootName"]=>
    string(13) "192.168.1.1"
  }
  ["isLocal"]=>
  bool(true)
  ["protectionDate"]=>
  string(24) "2018-11-22T13:59:28.807Z"
  ["logBackupRetentionHours"]=>
  int(120)
  ["isRelic"]=>
  bool(false)
  ["snapshotCount"]=>
  int(17)
  ["name"]=>
  string(12) "MyDB"
  ["isStandby"]=>
  bool(false)
  ["archiveStorage"]=>
  int(0)
  ["logBackupFrequencyInSeconds"]=>
  int(900)
}
```

> _rkGetMSSQLid($clusterConnect,$dbName,$dbHost)_

  - Inputs : 
    - `$ClusterConnect` -> array containing connection detail to the Rubrik cluster;
    - `$dbName` -> string containing the name of the Database;
    - `$dbHost` -> string containing the name of the host where the DB is sitting 
  - Output : string with the corresponding database ID
  - Usage sample : 
```php
$id=rkGetMSSQLid($clusterConnect,"MyDB","192.168.1.1");
var_dump($id);
```
The above will display :

```
string(52) "MssqlDatabase:::ade1f958-8edc-4953-9d43-97a591b2ad3b"
```

> _getRubrikSLAname($clusterConnect,$SLAid)_

  - Inputs : 
    - `$ClusterConnect` -> array containing connection detail to the Rubrik cluster;
    - `$SLAid` -> string containing the SLA ID
  - Output : string with the corresponding SLA name
  - Usage sample : 
```php
$SLA=json_decode(getRubrikSLAs($clusterConnect));
foreach ($SLA->data as $item) 
{
   	print($item -> name." \n");
}
  ```
The above will display :
```
Bronze
Silver
Gold
```

> _rkMSSQLgetFiles($clusterConnect,$dbSourceID,$dbRecoveryTime)_

> _rkMSSQLRestore($clusterConnect,$dbSourceID,$dbTargetInstance,$dbTargetName,$timeStamp,$dbFilePath,$overwrite=false)_

> _rkGetMSSQLSnapshotSize($clusterConnect,$dbID,$DateTime)_

> _rkGetSupportTunnel($clusterConnect)_

  - Inputs : `$ClusterConnect` -> array containing connection detail to the Rubrik cluster.
  - Output : a json string with all information related to the status of the support tunnel.
  - Usage sample : 
```php	
$supportTunnel=json_decode(rkGetSupportTunnel($clusterConnect));
var_dump($supportTunnel);
```

The above will display : 
```
object(stdClass)#34 (3) {
  ["hasMore"]=>
  bool(false)
  ["data"]=>
  array(1) {
    [0]=>
    object(stdClass)#35 (5) {
      ["id"]=>
      string(13) "VRVW499E3Y64F"
      ["brikId"]=>
      string(6) "RUBRIK"
      ["status"]=>
      string(2) "OK"
      ["ipAddress"]=>
      string(13) "192.168.x.x"
      ["supportTunnel"]=>
      object(stdClass)#36 (5) {
        ["isTunnelEnabled"]=>
        bool(true)
        ["port"]=>
        int(90729)
        ["enabledTime"]=>
        string(24) "2018-11-30T10:12:18.000Z"
        ["lastActivityTime"]=>
        string(24) "2018-11-28T15:05:52.000Z"
        ["inactivityTimeoutInSeconds"]=>
        int(345600)
      }
    }
  }
  ["total"]=>
  int(1)
}
```

> _rkGetHostID($clusterConnect,$hostName)_

> _rkRefreshHost($clusterConnect,$hostName)_

> _rkGetUnmanaged($clusterConnect)_

  - Inputs : `$ClusterConnect` -> array containing connection detail to the Rubrik cluster.
  - Output : a json string with all information related to _Unmanaged objects_.
  - Usage sample : 
```php
$unmanaged=json_decode(rkGetUnmanaged($clusterConnect));
	
foreach ($unmanaged->data as $item) 
{
	print("Object ID : ".$item->id."\n");
	print("Object Name : ".$item->name."\n");
	print("Object located on : ".$item->physicalLocation[0]->name."\n");
	print("Objedt is : ".$item->unmanagedStatus."\n");
	print("Size on disk : ".formatBytes($item->localStorage)."\n");
	print("---------\n");
}
```

The above will display (output truncated) :

```
Object ID : MssqlDatabase:::2dba6a59-c423-4f31-b067-4a200b856ab2
Object Name : MainDB-Test
Object located on : 192.168.8.100
Objedt is : Relic
Size on disk : 592.84 KB
---------
Object ID : MssqlDatabase:::1a425be6-3fc6-4681-93f4-7b8e63d60c31
Object Name : master
Object located on : 192.168.8.100
Objedt is : Relic
Size on disk : 1.37 MB
---------
Object ID : MssqlDatabase:::5e2987fe-87e2-4edd-946b-c44c5d01044c
Object Name : model
Object located on : 192.168.8.100
Objedt is : Relic
Size on disk : 359.27 KB
---------
Object ID : MssqlDatabase:::8e746f72-3e6f-4bc2-8df1-eb9f6e310c7a
Object Name : msdb
Object located on : 192.168.8.100
Objedt is : Relic
Size on disk : 9.67 MB
```

This could be usefull to get the potential savings on a cluster. Indeed, those objects could be flushed in most of the cases.

> _rkGetSnapshotCount($clusterConnect)_

> _rkGetEpoch($dateString)_

> _rkColorOutput($string)_

> _rkColorRed($string)_

> _formatBytes($bytes, $decimals = 2, $system = 'metric')_

- Inputs : an integer representing a size in bytes
- Output : a human readable size ineither KB, MB, GB, TB. There is the choice to round the metric way (power of 10) or the binary way (power of 2)
- Usage sample :
```php
	var_dump(formatBytes(64647383746));
	var_dump(formatBytes(64647383));
	var_dump(formatBytes(64647));
	var_dump(formatBytes(643));
```
The above will return :
```
string(8) "64.65 GB"
string(8) "64.65 MB"
string(8) "64.65 KB"
string(8) "643.00 B"
```

## Versioning

The first version of this framework has been published the 23rd of Nov 2018 as verion 0.5.

## Todo List

- [X] Cleanup the naming convention of the functions;
- [ ] Add more functions (about other environments like AHV, vmware, ...);
- [ ] Add more contols on error;
- [ ] Provide usable documentation to the masses

## Authors

Frederic Lhoest - *@flhoest*
Big thanks to Rubrik Support team - very special thanks to *Przemek Sliwa*
