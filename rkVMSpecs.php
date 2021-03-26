<?php
		
	/*				__________        ___.            .__  __    
					\______   \ __ __ \_ |__  _______ |__||  | __
					 |       _/|  |  \ | __ \ \_  __ \|  ||  |/ /
					 |    |   \|  |  / | \_\ \ |  | \/|  ||    < 
					 |____|_  /|____/  |___  / |__|   |__||__|_ \
				    		\/             \/                  \/ Php Framework
	*/

	// Include section
	include_once "rkFramework.php";

	// User credentials	
	$clusterConnect=array(
				"username" => "username",
				"password" => "password",
				"ip" => "192.168.1.1"
				
				);

  // Entry Point

  $VMname="vmName";
	$vmSpecs=rkGetESXVMConfig($clusterConnect,$VMname);

	print("\nMachine ".rkColorOutput($VMname)." in snapshot ".rkColorOutput($vmSpecs["snapID"])." has the following specs :\n");
	print("\t".rkColorOutput($vmSpecs["cpu"])." vCPU\n");
	print("\t".rkColorOutput($vmSpecs["memory"]." GB")." RAM\n");
	print("\t".rkColorOutput(rkformatBytes($vmSpecs["disk"]))." HDD\n");
	print("\n");

?>
