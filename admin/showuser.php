<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<script language="javascript" src="func.js"></script>
	
</head>
	<?php
		include "../funcs.php";
	?>
	

</script>
<body>
	

	<?php
	if(isset($_GET["msg"]))
	{
		$msg=$_GET["msg"];
		if($msg==1)
		echo ' ثبت نام با موفقیت انجام شد';
	   else if($msg==2)
			echo 'نام کاربری قبلا ثبت شده';
		else 
		echo ' خطا در ثبت نام';
	}
	if(isset($_POST["edit"]))
	{
		$id=$_POST["txtid"];
		$n=$_POST["txtn"];
		$f=$_POST["txtf"];
		$p=$_POST["txtp"];
		$j=$_POST["j"];
		$c=$_POST["city"];
	    $sql=" update tbl_user set Fname='$n', Lname='$f', Password='$p', Gender='$j', City='$c' where id='$id' ";
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
			$sql="delete from tbl_user where id='$id'";
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
		$sql="select * from tbl_user where id='$id'";
		$result=mysqli_query($connect,$sql);
		$rows=mysqli_fetch_array($result);
		$idCity=$rows["City"];
		
	 
	?>
	<form name="fmr" action="index.php" method="post" onSubmit=" return Cheack_Data()">
		<table dir="rtl" align="center" width="50%">
			<tr>
				<td></td>
				<td><input type=hidden name="txtid" id="txtid" value="<?php echo $rows["id"];?>"></td>
			</tr>
			
			<tr>
				<td>نام</td>
				<td><input type="text" name="txtn" id="txtn" value="<?php echo $rows["Fname"];?>"></td>
			</tr>
			<tr>
				<td> نام خانوادگی</td>
				<td><input type="text" name="txtf" id="txtf" value="<?php echo $rows["Lname"];?>"></td>
			</tr>
			<!--<tr>
				<td>نام کاربری</td>
				<td><input type="text" name="txtu" id="txtu"></td>
			</tr>-->
			<tr>
				<td>پسورد</td>
				<td><input type="text" name="txtp" id="txtp" value="<?php echo $rows["Password"];?>"></td>
			</tr>
			 <tr>
           		<td>جنسیت</td>
                <td>
                <?php
					if($rows["Gender"]==0)
					{
					?>
                    	<input type="radio"  id="j1" name="j" checked value="0"> مرد
                    	<input type="radio" id="j2" name="j" value="1" > زن
					<?php } 
					else
					{ ?>
						<input type="radio"  id="j1" name="j" value="0"> مرد
                    	<input type="radio" id="j2" name="j" value="1" checked > زن
					
                	<?php } ?>
                </td>
             </tr>
			<tr>
				<td>محل تولد</td>
				<td>
					<select name="city" id="city">
						<option value="0">لطفا انتخاب کنید </option>
						<option value="1">تهران</option>
						<option value="2">مشهد</option>
						<option value="3">اردبیل</option>
						<option value="4">قم</option>
						<option value="5">شیراز</option>
					</select>
					<script language="javascript">
						var element= document.getElementById("City");
						var n=element.length;
						for (var i=1;i<n;i++)
							if(element[i].value==<?php echo $idCity; ?>)
							   document.getElementById("City").selectedIndex=i;
					</script>
				</td>
			</tr>
			<tr>
				<th colspan="2"><input type="submit" value="ویرایش" name="edit"></th>
			</tr>
		</table>	   
	</form>
		
	<?php }
		 else {
	
	?>
	
	<form name="fmr" action="add.php" method="post" onSubmit=" return Cheack_Data()">
		<table dir="rtl" align="center" width="50%">
			<tr>
				<td>نام</td>
				<td><input type="text" name="txtn" id="txtn"></td>
			</tr>
			<tr>
				<td> نام خانوادگی</td>
				<td><input type="text" name="txtf" id="txtf"></td>
			</tr>
			<tr>
				<td>نام کاربری</td>
				<td><input type="text" name="txtu" id="txtu"></td>
			</tr>
			<tr>
				<td>پسورد</td>
				<td><input type="text" name="txtp" id="txtp"></td>
			</tr>
			<tr>
           		<td>جنسیت</td>
                <td>
                	<input type="radio"  id="j1" name="j" checked value="0"> مرد
                    <input type="radio" id="j2" name="j" value="1" > زن
                </td>
             </tr>
			
			<tr>
				<td>محل تولد</td>
				<td>
					<select name="city" id="city">
						<option value="0">لطفا انتخاب کنید </option>
						<option value="1">تهران</option>
						<option value="2">مشهد</option>
						<option value="3">اردبیل</option>
						<option value="4">قم</option>
						<option value="5">شیراز</option>
					</select>
				</td>
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
			<th colspan="9">لیست کاربران</th>
		</tr>
		<tr>
			<th>کد</th>
			<th>نام</th>
			<th>نام خانوادگی</th>
			<th>نام کاربری</th>
			<th>کلمه عبور</th>
			<th>جنسیت</th>
			<th>محل تولد</th>
			<th>ویرایش</th>
			<th>حذف</th>
		</tr>
	
	<?php 
		$sql="select*from tbl_user";
	$result = mysqli_query($connect ,$sql);
	while($rows=mysqli_fetch_array($result))
	{ ?>
	<tr>
		<td><?php echo $rows["id"];?></td>
		<td><?php echo $rows["Fname"];?></td>
		<td><?php echo $rows["Lname"];?></td>
		<td><?php echo $rows["Username"];?></td>
		<td><?php echo $rows["Password"];?></td>
		<td>
			<?php 
			if($rows["Gender"]==0)
				echo 'مرد';
				else echo 'زن';
			?>
		</td>
		<td><?php echo $rows["City"];?></td>
		<td><a href="showuser.php?ide=<?php echo $rows['id'];?>">ویرایش</a></td>
		<td><a href="showuser.php?idd=<?php echo $rows['id'];?>">حذف</a></td>
	</tr>
	<?php }
		?>
</table>
</body>
</html>