# Rubrik API Framework (written in Php)

```
This documentation is under review and considered as draft!
```

## Background

This project's goal is to provide anyone who needs to script automation, a collection of functions that call Rubrik's API. I was facing some challenges around MS SQL DR and I had to start writing some functions to make a good use of what Rubrik is offering.

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
  - Usage : 

> _getRubrikEvents($clusterConnect,$numEvents,$eventType="Backup",$objectType,$objectName)_
> _getRubrikTotalStorage($clusterConnect)_
> _getRubrikRunway($clusterConnect)_
> _getRubrikNodeCount($clusterConnect)_
> _rkGetMSSQL($clusterConnect)_
> _rkGetSpecificMSSQL($clusterConnect,$sqlID)_
> _rkGetMSSQLid($clusterConnect,$dbName,$dbHost)_
> _getRubrikSLAname($clusterConnect,$SLAid)_
> _rkMSSQLgetFiles($clusterConnect,$dbSourceID,$dbRecoveryTime)_
> _rkMSSQLRestore($clusterConnect,$dbSourceID,$dbTargetInstance,$dbTargetName,$timeStamp,$dbFilePath)_
> _rkGetMSSQLSnapshotSize($clusterConnect,$dbID,$DateTime_
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
