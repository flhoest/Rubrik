# Rubrik API Framework (in php!)

```
*This documentation is under reviewing and considered as draft!!!
```

## Background

This project's goal is to provide anyone wo need to script automation a collection of functions that call Rubrik's API. I was facing some challenges around MS SQL DR and I had to start writing some functions to make a good use of what Rubrik is offering.

## Getting Started

In order to make a good use of the provided framework, you first need to have php-cli installed. This is very easy and a lot of documentation on how to set it up on various platform (Windows, Linux & Mac OS) is widely available. The most common way to deploy php-cli is using your prefered package manager. Within the Linux world, just use : 
```
yum install php-cli -y.
````

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

-_getRubrikClusterDetails($clusterConnect)

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

-_getRubrikSLAs($clusterConnect)_

This function returns details about configured SLAs in the cluster.

  - Input : `$ClusterConnect` -> array containing connection detail to the Rubrik cluster.
  - Output : a json string with all details regarding SLA
  - Usage : 
  
```
$SLA=json_decode(getRubrikSLAs($clusterConnect));
var_dump($SLA);
```

-_getRubrikClusterID($clusterConnect)
-_getRubrikEvents($clusterConnect,$numEvents,$eventType="Backup",$objectType,$objectName)
-_getRubrikTotalStorage($clusterConnect)
-_getRubrikRunway($clusterConnect)
-_getRubrikNodeCount($clusterConnect)
-_rkGetMSSQL($clusterConnect)
-_rkGetSpecificMSSQL($clusterConnect,$sqlID)
-_rkGetMSSQLid($clusterConnect,$dbName,$dbHost)	
-_getRubrikSLAname($clusterConnect,$SLAid)
-_rkMSSQLgetFiles($clusterConnect,$dbSourceID,$dbRecoveryTime)
-_rkMSSQLRestore($clusterConnect,$dbSourceID,$dbTargetInstance,$dbTargetName,$timeStamp,$dbFilePath)	
-_rkGetEpoch($dateString)
-_rkColorOutput($string)
-_rkColorRed($string)
-_formatBytes($bytes, $decimals = 2, $system = 'metric')	

## Versioning

The first version of this framework has been published the 23rd of Nov 2018 as verion 0.5.

## Todo List

- [ ] Cleanup the naming convention of the functions
- [ ] Add more functions (about other environments like AHV, vmware, ...)
- [ ] Add more contols on error

## Authors

Frederic Lhoest - *@flhoest*
Big thanks to Rubrik Support team - very special thanks to *Przemek Sliwa*
