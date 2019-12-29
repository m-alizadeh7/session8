<?php 
	/*function connect()
	{
		mysql_connect("localhost","root","") or die("can not connect to server...!");
	mysql_query("SET NAMES 'utf8'");
	mysql_select_db("jafary") or die("can not open database...!");
		
	*/
		$connect = mysqli_connect("localhost","cp34008_jafary","jafary73845","cp34008_jafary");
		MySQLi_query($connect,"SET CHARACTER SET utf8");
/*mysqli_query($connect ,"SET NAMES 'utf8'");*/

?>