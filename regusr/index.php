<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<script language="javascript" src="../func.js"></script>
	 <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
</head>
	
	<?php
		include "../funcs.php";
	?>
	
	
<body>
	<div class="header">
		<!--<span class="title">-->
			<img src="../images/همه چی کالا.gif">
			<!--</span>-->
			
		<!--<span class="service"><h3>ارایه کننده محصولات فناوری اطلاعات</h3></span>
		<span class="logo"><img src="images/Untitled-1.png"</span>-->
	</div>
	
<div class="karbar">
	<?php
	if(isset($_GET["msg"]))
	{
		$msg=$_GET["msg"];
		if($msg==1)
			echo'<div style="color:red; text-align:center;"><h1>ثبت نام با موفقیت انجام شد</h1></div>';
	   else if($msg==2)
		   echo'<div style="color:red; text-align:center;"><h1>نام کاربری قبلا ثبت شده</h1></div>';
		else 
		echo ' خطا در ثبت نام';
	}
 

	if(isset($_POST["add"]))
{
	$n=$_POST["txtn"];
	$f=$_POST["txtf"];
	$u=$_POST["txtu"];
	$p=$_POST["txtp"];
	$j=$_POST["j"];
	$c=$_POST["city"];
	
	$sql1="select * from tbl_karbar where Username='$u'";
	$res=mysqli_query($connect,$sql1);
	$num=mysqli_num_rows($res);
	if($num==0)
	{
	$sql="insert into tbl_karbar(Fname,Lname,Username,Password,Gender,City) value ('$n','$f','$u','$p','$j','$c')";
	$result=mysqli_query($connect,$sql);
	}
	if($result)
	{
		 header("location:index.php?msg=1"); 
		
	}
	else 
	{
		/*header("location:index.php?msg=0");*/
	}
	}
else
{
/*	header("location:index.php?msg=2");*/
}

	
	if(isset($_POST["edit"]))
	{
		$id=$_POST["txtid"];
		$n=$_POST["txtn"];
		$f=$_POST["txtf"];
		$p=$_POST["txtp"];
		$j=$_POST["j"];
		$c=$_POST["city"];
	    $sql=" update tbl_karbar set Fname='$n', Lname='$f', Password='$p', Gender='$j', City='$c' where id='$id' ";
		$result=mysqli_query($connect,$sql);
		if($result)
		{
			echo'<div style="color:red; text-align:center;"><h1>رکورد با موفقیت ویرایش گردید</h1></div>';
		}
		
		else
		{
			echo'<div style="color:red; text-align:center;"><h1>خطا در ثبت ویرایش</h1></div>';
		}
		
	}
	
		
		if(isset($_GET["idd"]))  //delete
		  {
			$id=$_GET["idd"];
			$sql="delete from tbl_karbar where id='$id'";
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
		$sql="select * from tbl_karbar where id='$id'";
		$result=mysqli_query($connect,$sql);
		$rows=mysqli_fetch_array($result);
		$idCity=$rows["City"];
		
	 
	?>
	<form name="fmr" action="index.php" method="post" onSubmit=" return Cheack_Data()" class="karbar">
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
	
	<form name="fmr" action="" method="post" onSubmit=" return Cheack_Data()" class="karbar">
		<table dir="rtl" align="center" width="50%">
			<tr>
				<td>نام</td>
				<td><input type="text" name="txtn" id="txtn" class="box"></td>
			</tr>
			<tr>
				<td> نام خانوادگی</td>
				<td><input type="text" name="txtf" id="txtf" class="box"></td>
			</tr>
			<tr>
				<td>نام کاربری</td>
				<td><input type="text" name="txtu" id="txtu" class="box"></td>
			</tr>
			<tr>
				<td>پسورد</td>
				<td><input type="text" name="txtp" id="txtp" class="box"></td>
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
					<select name="city" id="city" class="box">
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
		 <?php } //else edit
	?>
	
	
	
		
	
	
	<?php 
		$sql="select*from tbl_karbar";
	$result=mysqli_query($connect,$sql);
	while($rows=mysqli_fetch_array($result))
	{ ?>
	
			<?php 
			
			?>
		</td>
		<td><?php echo $rows["City"];?></td>
		
		
	</tr>
	<?php }
		?>
</table>
</div>
<?php include "../footer.php"; ?>
</body>
</html>