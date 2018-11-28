# Rubrik API Framework (written in Php)

```
This documentation is under review and considered as draft!
```
![rubrik_logo](http://rubrik.com/wp-content/uploads/2014/10/logo-large-gray.png)       ![php_logo](https://7php.com/pimg/2014/01/elephpant_281_193.png)


## Background

This project's goal is to provide anyone who needs to script automation, a collection of functions that call Rubrik's APIs. I was facing some challenges around MS SQL DR and I had to start writing some functions to make a good use of what Rubrik is offering out of the box.

## Getting Started

In order to make a good use of the provided framework, you first need to have php-cli installed. This is very easy and a lot of documentation on how to set it up on various platform (Windows, Linux & Mac OS) is widely available. The most common way to deploy php-cli is using your prefered package manager. Within the Linux world, just use : 
```
yum install php-cli -y.
````

## File Listing

* rkFramework.php -> the list of functions used to query the Rubrik cluster using APIs;
* rkGetinfo.php -> an example of simple code that shows how to use the framework


## Prerequisites

Before continuing you need to have some basic information about your environment like Rubrik credentials and IP/Hostname. Once you have them, simply create a file called credentials.php and set the following variable : 

```
<?PHP
	$clusterConnect=array(
		"username" => "username",
		"password" => "password",
		"ip" => "0.0.0.0"
	);

?>
```

## Functions Documentation

> _getRubrikClusterDetails($clusterConnect)_

This function returns basic detais about the cluster

  - Input : `$ClusterConnect` -> array containing connection detail to the Rubrik cluster.
  - Output : a json decodable string with all the relevant Rubrik cluster details.
  - Usage : 
  
```
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

> _getRubrikSLAs($clusterConnect)_

This function returns details about configured SLAs in the cluster.

  - Input : `$ClusterConnect` -> array containing connection detail to the Rubrik cluster.
  - Output : a json string with all details regarding SLA
  - Usage : 
  
```
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
  
  ```
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
```
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
```
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
  
  ```
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
  
```
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

```
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

> _rkGetMSSQLid($clusterConnect,$dbName,$dbHost)_

> _getRubrikSLAname($clusterConnect,$SLAid)_

> _rkMSSQLgetFiles($clusterConnect,$dbSourceID,$dbRecoveryTime)_

> _rkMSSQLRestore($clusterConnect,$dbSourceID,$dbTargetInstance,$dbTargetName,$timeStamp,$dbFilePath)_

> _rkGetMSSQLSnapshotSize($clusterConnect,$dbID,$DateTime_

> _rkGetHostID($clusterConnect,$hostName)_

> _rkRefreshHost($clusterConnect,$hostName)_

> _rkGetEpoch($dateString)_

> _rkColorOutput($string)_

> _rkColorRed($string)_

> _formatBytes($bytes, $decimals = 2, $system = 'metric')_

## Versioning

The first version of this framework has been published the 23rd of Nov 2018 as verion 0.5.

## Todo List

- [ ] Cleanup the naming convention of the functions
- [ ] Add more functions (about other environments like AHV, vmware, ...)
- [ ] Add more contols on error

## Authors

Frederic Lhoest - *@flhoest*
Big thanks to Rubrik Support team - very special thanks to *Przemek Sliwa*
