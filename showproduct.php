<?php
	  include "./funcs.php";
	  include "./header.php";
?>
<title> مدیریت</title>
</head>
<!-- end head-->
<body>
<?php	  include "./menu.php"; ?>

	<?php
	if (isset($_POST["add"]))
	{
		$idc=$_POST["cat"];
		$n=$_POST["txtn"];
		$p=$_POST["txtp"];
		$q=$_POST["txtq"];
		$f=$_FILES["aks"]["name"];
		$type=$_FILES["aks"]["type"];
		$password=array("image/jpeg","image/gif","image/png","image/jpg");
		if(in_array($type,$password))
		{
		$aksh=md5($f.microtime()).substr($f,-5,5);
		$sql="insert into tbl_kala(idc,name,price,qty,aks) values ('$idc','$n','$p','$q','$aksh')";
		$result=mysqli_query($connect,$sql);
		if($result)
		  {

			move_uploaded_file($_FILES['aks']['tmp_name'],"../images/product/".$aksh) or die ("cannot move picture");

				echo 'اطلاعات کالا با مئوفقیت ثبت گردید';
			}
		else
			{
			echo 'خطا در درج کالا';
			}
		}
		else
			{
			echo 'عکس از نوع استاندارد وارد کنید';
			}

	}

	if(isset($_POST["edit"]))
	{
		$id=$_POST["txtid"];
		$aksold=$_POST["aksold"];
		$idc=$_POST["cat"];
		$n=$_POST["txtn"];
		$p=$_POST["txtp"];
		$q=$_POST["txtq"];
		$f=$_FILES["aks"]["name"];
		$type=$_FILES["aks"]["type"];
		$passvand=array("image/jpeg","image/gif","image/png","image/jpg");
		if(!empty($f))
		{
		if(in_array($type,$password))
		{
			$aksh=md5($f.microtime()).substr($f,-5,5);
			$sql="update tbl_kala set idc='$idc,name='$n',price='$p',qty='$q',aks='$aksh' where id ='$id'";
			$res=mysqli_query($connect,$sql);
			if($res)
			{
					move_uploaded_file($_FILES['aks']['tmp_name'],"../images/product/".$aksh) or die ("cannot move picture");
				unlink("../images/product/".$aksold);
				echo 'رکورد شما با موفقیت ویرایش شد';
			}
			else
			{
				echo 'خطا در ویرایش رکورد';
			}
		}

		$password=array("image/jpeg","image/gif","image/png","image/jpg");

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
		else
		{
			$sql="update tbl_kala set idc='$idc,name='$n',price='$p',qty='$q' where id ='$id'";
			$res=mysqli_query($connect,$sql);
			if($res)
			{

				unlink("../images/product/".$aksold);
				echo 'رکورد شما با موفقیت ویرایش شد';
			}
			else
			{
				echo 'خطا در ویرایش رکورد';
			}
		}
	}


		if(isset($_GET["idd"]))  //delete
		  {
			$id=$_GET["idd"];
			$aks=$_GET["aks"];
			$sql="delete from tbl_kala where id='$id'";
			$result=mysqli_query($connect,$sql);
			if ($result)
			{
				unlink("../images/product/".$aks);
				echo '<div style="color:red; text-align:center;">رکورد با موفقیت حذف شد</div>';
			}
			else
			{
				echo '<div style="color:red; text-align:center;">خطا در حذف رکورد</div>';
			}
		}
	if (isset($_GET["ide"]))
	{
		$id=$_GET['ide'];
		$aksold=$_GET["ide"];
		$sql="select * from tbl_kala where id='$id'";
		$result=mysqli_query($connect,$sql);
		$rows=mysqli_fetch_array($result);
		$idc=$row['idc'];
		/*معمم*/

	?>
	<form name="fmr" action="showproduct.php" method="post" enctype="multipart/form-data">
		<table dir="rtl" align="center" width="50%">
			<tr>
				<td></td>
				<td><input type="hidden" name="aksold" id="aksold" value="<?php echo $aksold ?>"></td>
				<td><input type="hidden" name="txtid" id="txtid" value="<?php echo $id; ?>"> " " </td>
			</tr>

			<tr>
				<td>نام دسته</td>
				<td>
				<select name="cat" id="cat">
					<option value="0">لطفا انتخاب کنید</option>


					<?php
			 			$sql="select * from tbl_cat";
			 			$result=mysqli_query($connect,$sql)	;
			 			while($rows=mysqli_fetch_array($result))
			 {?>

					<option value="<?php echo $rows["id"];?>"><?php echo $rows['catname'];?>
					</option>


			<?php }?>
					</select>
					<script language="javascript">
						var element=document.getElementById("cat");
						var n=element.length;
						for(var i=1; i<n; i++)
							if(element[i].value==<?php echo $id;?>)
							   document.getElementById("cat").selectedIndex=i;
					</script>
				</td>
			</tr>

			<tr>
				<td>نام کالا</td>
				<td><input type="text" name="txtn" id="txtn" value="<?php echo $row["name"];?>"></td>
			</tr>
			<tr>
				<td>قیمت</td>
				<td><input type="text" name="txtp" id="txtp" value="<?php echo $row["price"];?>"></td>
			</tr>
			<tr>
				<td>تعداد کالا </td>
				<td><input type="text" name="txtq" id="txtq" value="<?php echo $row["qty"];?>"></td>
			</tr>
			<tr>
				<td>عکس </td>
				<td><input type="file" name="aks" id="aks" ></td>
			</tr>

			<tr>
				<th colspan="2"><input type="submit" value="ثبت" name="add"></th>
			</tr
			<tr>
				<th colspan="2"><input type="submit" value="ویرایش" name="edit"></th>
			</tr>
		</table>
	</form>

	<?php }
		 else {

	?>

	<form name="fmr" action="showproduct.php" method="post" enctype="multipart/form-data" >
		<table dir="rtl" align="center" width="50%">
			<tr>
				<td>نام دسته</td>
				<td>
				<select name="cat" id="cat">
					<option value="0">لطفا انتخاب کنید</option>


					<?php
			 			$sql="select * from tbl_cat";
			 			$result=mysqli_query($connect,$sql)	;
			 			while($rows=mysqli_fetch_array($result))
			 {?>

					<option value="<?php echo $rows['id'];?>">
						<?php echo $rows['catname'];?>
					</option>


			<?php }?>
					</select>
				</td>
			</tr>

			<tr>
				<td>نام کالا</td>
				<td><input type="text" name="txtn" id="txtn"></td>
			</tr>
			<tr>
				<td>قیمت</td>
				<td><input type="text" name="txtp" id="txtp"></td>
			</tr>
			<tr>
				<td>تعداد کالا </td>
				<td><input type="text" name="txtq" id="txtq"></td>
			</tr>
			<tr>
				<td>عکس </td>
				<td><input type="file" name="aks" id="aks"></td>
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
			<th colspan="9">لیست کالاها </th>
		</tr>
		<tr>
			<th>کد</th>
			<th>عنوان دسته</th>
			<th>نام کالا</th>
			<th>قیمت </th>
			<th>تعداد </th>
			<th>عکس </th>
			<th>ویرایش</th>
			<th>حذف</th>
		</tr>

	<?php
		$sql="select tbl_cat.id as 'id1',tbl_kala.id as 'id2',idc,catname,name,price,qty,aks from tbl_cat,tbl_kala where tbl_cat.id=idc";
	$result=mysqli_query($connect,$sql);
	while($rows=mysqli_fetch_array($result))
	{ ?>
	<tr>
		<td><?php echo $rows["id1"];?></td>
		<td><?php echo $rows["catname"];?></td>
		<td><?php echo $rows["name"];?></td>
		<td><?php echo $rows["price"];?></td>
		<td><?php echo $rows["qty"];?></td>
		<td><?php echo $rows["aks"];?></td>

		<td><a href="showproduct.php?ide=<?php echo $rows['id2'];?>&aksold=<?php echo $rows['aks'];?>">ویرایش</a></td>
		<td><a href="showproduct.php?idd=<?php echo $rows['id2'];?>&aks=<?php echo $rows['aks'];?>">حذف</a></td>
	</tr>
	<?php }
		?>
</table>
<?php include "./footer.php"?>
