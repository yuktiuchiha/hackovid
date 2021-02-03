<?php

	$db=mysqli_connect("localhost","root","","hackovid"); 
					/* server name, username, password, database name*/
	//	$conn=mysqli_connect('localhost','ritik','ritik123','hackovid');

	if(!$db){
		echo 'Connection error...'.mysqli_connect_error();
	}

?>