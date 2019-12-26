<?php 
	if(isset($_POST["add"]))
{
	$n=$_POST["txtn"];
	$f=$_POST["txtf"];
	$u=$_POST["txtu"];
	$p=$_POST["txtp"];
	$j=$_POST["j"];
	$c=$_POST["city"];
	
	include "funcs.php";
	$sql1="select * from tbl_user where Username='$u'";
	$res=mysqli_query($connect,$sql1);
	$num=mysqli_num_rows($res);
	if($num==0)
	{
	$sql="insert into tbl_user(Fname,Lname,Username,Password,Gender,City) value ('$n','$f','$u','$p','$j','$c')";
	$result=mysqli_query($connect,$sql);
	}
	if($result)
	{
		header("location:index.php?msg=1");
	}
	else 
	{
		header("location:index.php?msg=0");
	}
	}
else
{
	header("location:index.php?msg=2");
}
	
?>