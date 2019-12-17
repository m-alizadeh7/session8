<?php 
	if(isset($_POST["add"]))
{
	$n=$_POST["txtn"];
	$f=$_POST["txtf"];
	$u=$_POST["txtu"];
	$p=$_POST["txtp"];
	$j=$_POST["j"];
	$c=$_POST["city"];
	
	include "../funcs.php";
		connect();
	
	$sql1="select * from tbl_user where Username='$u'";
	$res=mysql_query($sql1);
	$num=mysql_num_rows($res);
	if($num==0)
	{
	$sql="insert into tbl_user(Fname,Lname,Username,Password,Gender,City) value ('$n','$f','$u','$p','$j','$c')";
	$result=mysql_query($sql);
	}
	if($result)
	{
		header("location:showuser.php?msg=1");
	}
	else 
	{
		header("location:showuser.php?msg=0");
	}
	}
else
{
	header("location:showuser.php?msg=2");
}
	
?>