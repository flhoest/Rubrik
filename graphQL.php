<?php

	include_once "rkFramework.php";

	// Local CLuster credentials
	$clusterConnect=array(
		"username" => "username",
		"password" => "password",
		"ip" => "cdm_ip"
		);
		

	$clientID="client|xxxxxxxxx";
	$clientSecret="xxxxxxxxxxxxxxxxxxxxxx";
	$tenant="my_tenant";
	
	// Polaris credenditals		
	$polarisConnect=array(
		"token" => rkpolGetToken($clientID,$clientSecret,$tenant),
		"tenant" => $tenant
		);

	$cdmQuery="{\"query\":\"query Cluster{cluster(id:\\\"me\\\"){version id brikCount isSingle isBootstrapped}}\"}";
	$polarisQuery="query DataSitesMapQuery {clusterConnection(filter: {type: [OnPrem]}) { nodes { id name version estimatedRunway status geoLocation { address latitude longitude }}}}";
					
	// Polaris call
	$res=rkPolGraphQL($polarisConnect,$polarisQuery);
	print("\nPolaris query result : \n");
	print("--------------------\n\n");
	var_dump($res);
	
	print("\n");

	// CDM call
	$res=rkGraphQL($clusterConnect,$cdmQuery);
	print("CDM query result : \n");
	print("----------------\n\n");
		
	var_dump($res);

	print("\n");
?>
