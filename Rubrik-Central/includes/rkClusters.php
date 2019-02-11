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
