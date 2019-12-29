<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<script language="javascript" src="func.js"></script>
	 <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
</head>
	<?php
		include "../funcs.php";
		
	?>
	
<body>
	

	<?php
	if (isset($_POST["add"]))
	{
		$idc=$_POST["cat"];
		$n=$_POST["txtn"];
		$p=$_POST["txtp"];
		$q=$_POST["txtq"];
		$f=$_FILES["aks"]["name"];
		$type=$_FILES["aks"]["type"];
		$password=array("image/jpeg","image/gif","image/png");
		if(in_array($type,$password))
		{
		$sql="insert into tbl_kala (idc,name,price,qty,aks) value ('$idc','$n','$p','$q','$aksh')";
		$result=mysqli_query($connect,$sql);
		if($result)
		{
			$aksh=md5($f.microtime()).substr($f,-5,5);
			move_uploaded_file($_FILES['aks']['tmp_name'],"../images/product".$aksh) or die ("cannot move picture");
			echo 'اطلاعات کالا با مئوفقیت ثبت گردید';
		}
		else
		{
			echo 'خطا در درج کالا';
		}
		}
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
			 			while($rows=mysqli_fetch_array($result));
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
				<td>نام کالا</td>
				<td><input type="text" name="txtp" id="txtp"></td>
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
			<th>نام کالا</th>
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
		
		<td><a href="showproduct.php?ide=<?php echo $rows['id2'];?>">ویرایش</a></td>
		<td><a href="showproduct.php?idd=<?php echo $rows['id2'];?>&aks=<?php echo $rows['aks'];?>">حذف</a></td>
	</tr>
	<?php }
		?>
</table>
</body>
</html>