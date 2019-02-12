# Rubrik Central
## Introduction
Rubrik Central is a portal that provides easy view on each clusters in an organisation. If you are Nutanix customer, this is the same philosophy as Prism Central. This is not linked to [Rubrik Inc.](http://www.rubrik.com) in any ways, this is purely my own code using Rubrik Rest-API's framework. There is a lot of possibilities our of the box, this is only a matter of putting things together. Since our second Rubrik cluster implementation I new that a portal showing a global view of our deployment wille a nice to have. Rubrik provides this feature with their [Polaris](https://www.rubrik.com/product/polaris-overview/) SaaS offering, but I found two issues - from my own point of view : 
* Polaris requires cloud account and separate license;
* Polaris is much more than only providing global view (currently not a requirement in our actual deployment)

## At a glance

Rubrik Central provides an overview of all your running cluster in an easy and simple way. All the key items are displayed in an easy click and go interface all based on the famous [Bootstrap CSS library](https://getbootstrap.com/).

_The following functions are available :_

* Global info
  - running version;
  - number of nodes;
  - available storage
* Basic info
  - cluster name;
  - location;
  - time zone;
  - support tunnel status (and port)
* Storage info
  - total storage;
  - available storage;
  - %age used;
  - runway;
  - number of snapshots
* SLA
  - name;
  - frequencies and retentions;
  - number of objects;
  - drill down to the object level inside SLA
* Unmanaged objects
  - object name;
  - object Type;
  - status;
  - size;
  - source
  - ability to delete specific unmanaged objects 
* Last x backup events

## Application structure

It is composed of 3 main files : 

- rkClusters.php

This file is a definition of your various Rubrik clusters, either virtual or physical.

```php
<?php
	
	// Note : password must be encrypted using bin2hex. This way, this is more safe in case of 
	// somebody see it and still want protect your safety.
	// Simply uncomment the below block and run this script using php -f adding the clear text password in the cleartext zone below.

/*
// 	$cleartext="password"; <- 70617373776f7264
	$crypted_1=bin2hex($cleartext);
	print("Encrypted password is  : ".$crypted_1."\n");
	$decrypted=hex2bin($crypted_1);
	print("Decrypted : ".$decrypted."\n");
	print("\nCopy / Paste the encrypted password above into the credential file.\n");
 */	
	
	$clusterConnect=array(
			0 => array(
				"cluster" => "Cluster 1",
				"username" => "username",
				"password" => "70617373776f7264",
				"ip" => "192.168.1.1"
			),
			1 => array(
				"cluster" => "Cluster 2",
				"username" => "username",
				"password" => "70617373776f7264",
				"ip" => "192.168.1.2"
			),
			2 => array(
				"cluster" => "Cluster 3",
				"username" => "username",
				"password" => "70617373776f7264",
				"ip" => "192.168.1.3"
			),
			3 => array(
				"cluster" => "Cluster 4",
				"username" => "username",
				"password" => "70617373776f7264",
				"ip" => "192.168.1.4"
			)
		);
?>
```

Is is composed of an array with the various parameters that allow accessing the clusters you need to display in the portal itself.

- rkRubrikCentral.php

This file is the main file, you can create a symlink to it called index.php 

- rkFramework.php

This is the list of functions required to runthe API calls. The source code can be found [here](https://github.com/flhoest/Rubrik/blob/master/rkFramework.php).

## Folder Structure

```
/
index.php -> rkCentral.php
rkCentral.php
includes/
	rkFramework.php
	rkClusters.php
	rubrik.ico
	logo.png
```

> Note : platform running the script must have access to Internet to fetch the various CSS and JS provided in the html <head> section. You can remove this constraint by downloading the CSS and JS. Full URL are in the main code.
	
> Note 2 : Supporting blog post is [here](https://flhoest.blogspot.com/2019/02/php-welcome-to-rubrik-central.html).
	
```
Please note that the delete function for unamanaged objects does not work - for now !
```
