<?php 
include "sqli.php";
	
		$connect = mysqli_connect($adddb,$dbuser,$dbpass,$dbname);
		MySQLi_query($connect,"SET CHARACTER SET utf8");
/*mysqli_query($connect ,"SET NAMES 'utf8'");*/

?>