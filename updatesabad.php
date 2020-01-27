
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	include "funcs.php";
	$sid=$_SESSION["sid"];
	if(isset($_POST["sabt"]))
	{
		$q=$_POST["txtq"];
		$sid=$_POST["txtid"];
		$r=rand();
		$d=jdate();
		for($i=0;$i<=count($id);$i++)
		{
			$sql="update tbl_order set qty='$q[$i]' where (id='$id[$i]' and sid='$sid')";
		$result=mysqli_query($connect,$sql);
		}
		if($result)
		{
			$sql2="update tbl_order set status=1 where sid='$sid'";
			$res=mysqli_query($connect,$sql2);
			echo 'فاکتور با موفقیت ثبت شد';
			$sql1="insert into tbl_factor (coder,sid,dateins) value ('$r','$sid','$d')";
			$result=mysqli_query($connect,$sql1);
			unset($_SESSION["sid"]);
			header("location:index.php?msg=1");
		}
	}
	?>
</body>
</html>