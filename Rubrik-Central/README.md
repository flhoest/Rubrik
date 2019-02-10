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

## It is composed of 3 main files : 

- rkClusters.php

This file is a definition of your various Rubrik clusters, either virtual or physical.

```php
<?php

	$clusterConnect=array(
			0 => array(
				"cluster" => "Cluster 1",
				"username" => "username",
				"password" => "password",
				"ip" => "192.168.1.1"
			),
			1 => array(
				"cluster" => "Cluster 2",
				"username" => "username",
				"password" => "password",
				"ip" => "192.168.1.2"
			),
			2 => array(
				"cluster" => "Cluster 3",
				"username" => "username",
				"password" => "password",
				"ip" => "192.168.1.3"
			)
		);

?>
```

Is is composed of an array with the various parameters that allow accessing the clusters you need to display in the portal itself.

- rkRubrikCentral.php

This file is the main file, you can create a symlink to it called index.php 

- rkFramework.php

This is the list of functions required to runthe API calls. Located [here](https://github.com/flhoest/Rubrik/blob/master/rkFramework.php).

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

```
 more to come, stay tuned ! I'm almost ready to ship the code to the masses ;)
```
