<?php session_start();
	  include "./funcs.php";
	  include "./header.php";
?>
<title>نمایش دسته</title>
</head>
<!-- end head-->
<body>
<?php	  include "./menu.php"; ?>

	<script language="javascript" src="func.js"></script>
	 <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
</head>
<body>


	<?php
	if (isset($_POST["add"]))
	{
		$n=$_POST["txtn"];
		$sql="insert into tbl_cat (catname) value ('$n')";
		$result=mysqli_query($connect,$sql);
		if($result)
		{
			echo 'نام دسته با مئوفقیت ثبت گردید';
		}
		else
		{
			echo 'خطا در ثبت دسته';
		}
	}
	if(isset($_POST["edit"]))
	{
		$id=$_POST["txtid"];
		$n=$_POST["txtn"];

	    $sql=" update tbl_cat set catname='$n' where id='$id' ";
		$result=mysqli_query($connect,$sql);
		if($result)
		{
			echo 'رکورد با موفقیت ویرایش گردید';
		}

		else
		{
			echo 'خطا در ثبت ویرایش';
		}

	}


		if(isset($_GET["idd"]))  //delete
		  {
			$id=$_GET["idd"];
			$sql="delete from tbl_cat where id='$id'";
			$result=mysqli_query($connect,$sql);
			if ($result)
			{
				echo '<div style="color:red; text-align:center;">رکورد با موفقیت حذف شد</div>';
			}
			else
			{
				echo '<div style="color:red; text-align:center;">خطا در حذف رکورد</div>';
			}
		}
	if (isset($_GET["ide"]))
	{
		$id=$_GET["ide"];
		$sql="select * from tbl_cat where id='$id'";
		$result=mysqli_query($connect,$sql);
		$rows=mysqli_fetch_array($result);



	?>
	<form name="fmr" action="showcat.php" method="post">
		<table dir="rtl" align="center" width="50%">
			<tr>
				<td></td>
				<td><input type=hidden name="txtid" id="txtid" value="<?php echo $rows["id"];?>"></td>
			</tr>

			<tr>
				<td>نام</td>
				<td><input type="text" name="txtn" id="txtn" value="<?php echo $rows["catname"];?>"></td>
			</tr>

			<tr>
				<th colspan="2"><input type="submit" value="ویرایش" name="edit"></th>
			</tr>
		</table>
	</form>

	<?php }
		 else {

	?>

	<form name="fmr" action="showcat.php" method="post" >
		<table dir="rtl" align="center" width="50%">
			<tr>
				<td>نام</td>
				<td><input type="text" name="txtn" id="txtn"></td>
			</tr>

			<tr>
				<th colspan="2"><input type="submit" value="ثبت" name="add"></th>
			</tr>
		</table>

	</form>
		 <?php } //else edit?>

	<hr><hr>
	<table dir="rtl" align="center" width="100%" border="1">
		<tr>
			<th colspan="9">عنوان دسته </th>
		</tr>
		<tr>
			<th>کد</th>
			<th>نام</th>

			<th>ویرایش</th>
			<th>حذف</th>
		</tr>

	<?php
		$sql="select*from tbl_cat";
	$result=mysqli_query($connect,$sql);
	while($rows=mysqli_fetch_array($result))
	{ ?>
	<tr>
		<td><?php echo $rows["id"];?></td>
		<td><?php echo $rows["catname"];?></td>

		<td><a href="showcat.php?ide=<?php echo $rows['id'];?>">ویرایش</a></td>
		<td><a href="showcat.php?idd=<?php echo $rows['id'];?>">حذف</a></td>
	</tr>
	<?php }
		?>
</table>
<?php include "./footer.php"?>
