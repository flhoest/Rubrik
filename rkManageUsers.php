<?php

	///////////////////////////////////////////////////////////////////
	// Includes section
	///////////////////////////////////////////////////////////////////
	
	include_once "rkFramework.php";

	$bulkUsers=array(
			0 => array(
					"username" => "user1",
					"password" => "P@ss_0rd123!",
					"firstName" => "First",
					"lastName" => "Last",
					"emailAddress" => "me@local.com"
					),
			1 => array(
					"username" => "user2",
					"password" => "P@ss_0rd123!",
					"firstName" => "First",
					"lastName" => "Last",
					"emailAddress" => "me@local.com"
					),
			2 => array(
					"username" => "user3",
					"password" => "P@ss_0rd123!",
					"firstName" => "First",
					"lastName" => "Last",
					"emailAddress" => "me@local.com"
					)
				);
				
	$clusterConnect=array(
			0 => array(
				"username" => "username",
				"password" => "password",
				"ip" => "rubrik_ip_1"
			),
			1 => array(
				"username" => "username",
				"password" => "password",
				"ip" => "rubrik_ip_2"
			)
               );

	//////////////////////////
	//  Create users
	//////////////////////////
	
	// Go through all clusters
	
	print("\nCreating ".rkColorOutput(count($bulkUsers))." user(s) on ".rkColorOutput(count($clusterConnect))." cluster(s) ...\n\n");

	for($i=0;$i<count($clusterConnect);$i++)
	{
		print("Creating users in ".rkColorOutput($clusterConnect[$i]["ip"])."\n");
		for($j=0;$j<count($bulkUsers);$j++)
		{
			$return=rkCreateUser($clusterConnect[$i],$bulkUsers[$j]["username"],$bulkUsers[$j]["password"]);
			$id=rkGetUserID($clusterConnect[$i],$bulkUsers[$j]["username"]);
			rkMakeAdminUser($clusterConnect[$i],$id);
			if(isset($return->message)) print("-> ".rkColorOutput($return->message)."\n");
			else print("-> ".rkColorOutput($return->username)." created.\n");
		}
	}
	
	print("\nUsers have been created, waiting 10 seconds ....");
	
	//  Wait 10 sec

	sleep(10);
	
	//////////////////////////
	//  Delete users
	//////////////////////////

	print("\n\nDeleting ".rkColorOutput(count($bulkUsers))." user(s) on ".rkColorOutput(count($clusterConnect))." cluster(s) ...\n\n");

	for($i=0;$i<count($clusterConnect);$i++)
	{
		print("Deleting users in ".rkColorOutput($clusterConnect[$i]["ip"])."\n");
		for($j=0;$j<count($bulkUsers);$j++)
		{
			$id=rkGetUserID($clusterConnect[$i],$bulkUsers[$j]["username"]);
			print("-> Deleting ".rkColorOutput($bulkUsers[$j]["username"])." : ");
			$result=rkDeleteUser($clusterConnect[$i],$id);
			print(rkColorOutput($result)."\n");
		}
	}

	print("\nScript ended.\n");
?>