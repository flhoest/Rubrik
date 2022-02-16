<?php
	// Include section
	include_once "rkFramework.php";
	
	// Rubrik Cluster

	$clusterConnect=array(
		"username" => "username",
		"password" => "supersecretaswell",
		"ip" => "192.168.1.20"
	);	
	
	$rawCert="-----BEGIN CERTIFICATE-----
MIIDvzCCAqegAwIBAgIJAO4jof8scPpJMA0GCSqGSIb3DQEBCwUAMHYxCzAJBgNV
BAYTAlVTMQswCQYDVQQIDAJDQTERMA8GA1UEBwwIU2FuIEpvc2UxFTATBgNVBAoM
DE51dGFuaXggSW5jLjEWMBQGA1UECwwNTWFuYWdlYWJpbGl0eTEYMBYGA1UEAwwP
Ki5udXRhbml4LmxvY2FsMB4XDTE1MDQwMjAzNTIxMloXDTI1MDMzMDAzNTIxMlow
djELMAkGA1UEBhMCVVMxCzAJBgNVBAgMAkNBMREwDwYDVQQHDAhTYW4gSm9zZTEV
MBMGA1UECgwMTnV0YW5peCBJbmMuMRYwFAYDVQQLDA1NYW5hZ2VhYmlsaXR5MRgw
FgYDVQQDDA8qLm51dGFuaXgubG9jYWwwggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAw
ggEKAoIBAQCRECynQq/wGWOO4Y1a/pZu2Hbh0WT2mWZCgczaJ7PSnsHhIMsQAgdR
Eoj85ZEMg86VTPBFFPHq6dOkoz6tnlY7423BWvFQh1UYrEmkoD6n+2C6Huea7B0r
7rBebYTTqM8sIiFB4hFs8aQxaw+h7UGtljJahVCO1IbfEnsQXLqixEqg9TRNSt7M
TjQWkQdin6782PlvFuKo/8icynIOEfzem/DfsYBMQi+DlFAoXoQ2prcsEnmNcDOX
pym+Ycu/Wc59xdfrWmWSmBNngGRgTGImYXryWSvWctWPKkR/F4kOWb3Qg8qCE01e
uGh+QIT/mYU0lgw6sJnas6gjUU5LVyn7AgMBAAGjUDBOMB0GA1UdDgQWBBSR9agN
AlWWTfQw0P50SM7ftWhTETAfBgNVHSMEGDAWgBSR9agNAlWWTfQw0P50SM7ftWhT
ETAMBgNVHRMEBTADAQH/MA0GCSqGSIb3DQEBCwUAA4IBAQBJF38QZVHoPrRUr4ra
CUgmXOgZ4rXxXxXxXxXxXxXxX37tOIcEbQXuBPvn50aFybWghlF+YT3pNcBN4r7y
zQfkU042tPEVPi80wqyo+TTaPkvsObvpyvYqcFjZizOdCYgWODhA3xESC7yVJXiy
G4Gos4DorX4UEqiCLrQpVPPfhP1U9876543234zeoRRSNReIOA6jXWXrE4dMxbG1
n/xXS7jWtMk58MnzLGcnlnXZlS4xLUSRtBRB6CC7His/PQVe+HrjcvwYn+DhPiDE
SITehvlhX1H6iYXdxzRIhiLC6fLST5Q+Lq4ZxkP9/KiIlIuOVTj/DH+fdmDDUkWj
z5J4
-----END CERTIFICATE-----";

	$nutanixCluster=array(
  		"hostname" => "192.168.1.2",
  		"nutanixClusterUuid" => "000512b5-c10d-f000-0000-000000005f0a",
  		"username" => "username",
  		"password" => "supersecretpassword",
  		"caCerts" => $rawCert
	);

	// ===============================================================
	// M A I N     E N T R Y     P O I N T 
	// ===============================================================

	// 1) Add Nutanix Cluster (job ID returned)

	print("		__________        ___.            .__  __      \n");
	print("		\______   \ __ __ \_ |__  _______ |__||  | __  \n");
	print("		 |       _/|  |  \ | __ \ \_  __ \|  ||  |/ /  \n");
	print("		 |    |   \|  |  / | \_\ \ |  | \/|  ||    <   \n");
	print("		 |____|_  /|____/  |___  / |__|   |__||__|_ \  \n");
	print("			\/             \/                  \/      \n");
	print("\n\n");

	print("Nutanix AHV Cluster management with Rubrik\n");
	print("------------------------------------------\n\n");
	$result=rkAddNutanix($clusterConnect,$nutanixCluster);

	// 2) Get cluster addition status
	
	print("Adding Nutanix cluster...");

	$done='';

	while ($done!="Success")
	{
		$status=rkNutanixAddStatus($clusterConnect,$result);
		$done=$status->status;
	}

	print("\nNutanix Cluster added !\n\n");
	
	// 3) Get newly added cluster details
	
 	$nutanixClusters=rkGetNutanixClusters($clusterConnect);
 	
	print("\nCluster details from Rubrik side ...\n\n");

	// In our case, only one cluster, so looking at element 0
	$clusterID=$nutanixClusters[0];
	$clusterDetails=rkGetNutanixCluster($clusterConnect,$clusterID);

	print("Cluster Name : ".rkColorOutput($clusterDetails->name)."\n");
	print("Cluster IP : ".rkColorOutput($clusterDetails->hostname)."\n");
	print("Cluster ID : ".rkColorOutput($clusterDetails->id)."\n");
	print("Cluster admin user : ".rkColorOutput($clusterDetails->username)."\n");
	print("Cluster status : ".rkColorOutput($clusterDetails->connectionStatus->status)."\n");

	// 4) Remove the Nutanix cluster from configuration

	print("\nIt is now time to remove this cluster...");

	$result=rkDelNutanix($clusterConnect,$clusterDetails->id);

	$done='';
	while ($done!="Success")
	{
		$status=rkNutanixDelStatus($clusterConnect,$result);
		$done=$status->status;
	}

	print("\nNutanix Cluster removed !\n\n");

?>
