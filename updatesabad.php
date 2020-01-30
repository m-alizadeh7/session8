<?php session_start();
	  include "./funcs.php";
	  include "./header.php";
?>
<title>به روز رسانی</title>
</head>
<!-- end head-->
<body>
<?php	  include "./menu.php"; ?>


<?php
    include "funcs.php";
	$sid=$_SESSION["sid"];
	if(isset($_POST["sabt"]))
	{
		$q=$_POST["txtq"];
		$id=$_POST["txtid"];
		$r=rand();
		$d="00/00/00";
    	for($i=0;$i<=count($id);$i++)
		{
			$sql="update tbl_order set qty='$q[$i]' where (id='$id[$i]' and sid='$sid')";
			$result=mysqli_query($connect,$sql);
		}
		if($result)
		{
			$sql2="update tbl_order set status=1 where sid='$sid'";
			$res=mysqli_query($connect,$sql2);
			$sql1="insert into tbl_factor (coder,sid,dateins)values('$r','$sid','$d')";
			$result1=mysqli_query($connect,$sql1);

			unset($_SESSION["sid"]);
			header("location:index.php?msg=1");

		}
	}
?>
<?php include "./footer.php"?>
