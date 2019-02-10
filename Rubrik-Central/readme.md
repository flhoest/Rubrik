# Rubrik Central
## Introduction
Rubrik Central is a portal that provides easy view on each clusters in an organisation. If you are Nutanix customer, this is the same philosophy as Prism Central.This is not link to Rubrik Inc. in any ways, this is purely my own code using Rubrik Rest-API's framework. There is a lot of possibilities our of the box, this is only a matter of putting things together. Since our second Rubrik cluster implementation I new that a portal showing a global view of our deployment wille a nice to have. Rubrik provides this feature with their Polaris SaaS offering, but I found two issues - from my own point of view : 
* Polaris requires cloud account and separate license
* Polaris is much more than only providing global view (currently not a requirement in our actual deployment)

## At a glance

It gives an overview of all your running cluster in an easy and simple way.
* Global info like
  - running version;
  - number of nodes;
  - available storage
* Basic info
  - Cluster name;
  - location;
  - time zone;
  - support tunnel status (and port)
* Storage info
  - Total storage;
  - Available storage;
  - %age used;
  - Runway;
  - Number of snapshots
* SLA
  - Name;
  - Frequencies and retentions;
  - Number of objects;
  - Drill down to the object level inside SLA
* Unmanaged objects
  - Object name;
  - Object Type;
  - Status;
  - Size;
  - Source
  - Ability to delete specific unmanaged objects 
* Last x backup events

## It is composed of 3 files : 

- rkClusters.php
````rkLogin.php
- rkRubrikCentral.php


```
 more to come, stay tuned !
```
