# Rubrik API Framework (in php!)

```
* This documentation is under reviewing and considered as draft!!! *
```

## Background

This project's goal is to provide anyone wo need to script automation a collection of functions that call Rubrik's API. I was facing some challenges around MS SQL DR and I had to start writing some functions to make a good use of what Rubrik is offering.

## Getting Started

In order to make a good use of the provided framework, you first need to have php-cli installed. This is very easy and a lot of documentation on how to set it up on various platform (Windows, Linux & Mac OS) is widely available. THe most common way to deploy php-cli is using your prefered package manager. Within the Linux world, just use : 
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

* getRubrikClusterDetails($clusterConnect)

Input : $ClusterConnect -> array containing connection detail to the Rubrik cluster.
Output : a json decodable string with all the relevant Rubrik cluster details.
Usage : 

```
$cluster=getRubrikClusterDetails($clusterConnect)
var_dump($cluster)
```
The above will display all possible values.

* getRubrikSLAs($clusterConnect)
* getRubrikClusterID($clusterConnect)
* getRubrikEvents($clusterConnect,$numEvents,$eventType="Backup",$objectType,$objectName)
* getRubrikTotalStorage($clusterConnect)
* getRubrikRunway($clusterConnect)
* getRubrikNodeCount($clusterConnect)
* rkGetMSSQL($clusterConnect)
* rkGetSpecificMSSQL($clusterConnect,$sqlID)
* rkGetMSSQLid($clusterConnect,$dbName,$dbHost)	
* getRubrikSLAname($clusterConnect,$SLAid)
* rkMSSQLgetFiles($clusterConnect,$dbSourceID,$dbRecoveryTime)
* rkMSSQLRestore($clusterConnect,$dbSourceID,$dbTargetInstance,$dbTargetName,$timeStamp,$dbFilePath)	
* rkGetEpoch($dateString)
* rkColorOutput($string)
* rkColorRed($string)
* formatBytes($bytes, $decimals = 2, $system = 'metric')	

## Versioning

The first version of this framework has been published the 23rd of Nov 2018.

## Authors

Frederic Lhoest - *@flhoest*
Big thanks to Rubrik Support team - very special thanks to *Przemek Sliwa*
