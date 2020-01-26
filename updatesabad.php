<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	$sid=$_SESSION["sid"];
	if(isset($_POST["sabt"]))
	{
		$q=$_POST["txtq"];
		$sid=$_POST["txtid"];
		$r=rand();
		for($i=0;$i<=count($id);$i++)
			$sql="update tbl_order set qty='$q[$i]' where id='$id[$i]' and sid='$sid'";
		$result=mysqli_query($connect,$sql);
		if($result)
		{
			echo 'فاکتور با موفقیت ثبت شد';
		}
	}
	?>
</body>
</html>