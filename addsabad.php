<?php 
include "funcs.php";
session_start();

$sid=$_SESSION["sid"];
$idk=$_GET["id"];
$d=jdate();
$sql="insert into tbl_order (idk,dateins,sid) value ('$idk','$d','$sid')";
$result=mysqli_query($connect,$sql);
if($result)
{
	header("location:index.php");
}
?>  
