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

	
	
		
		if(isset($_GET["idd"]))  //delete
		  {
			$id=$_GET["idd"];
			$sql="delete from tbl_factor where id='$id'";
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
	if(isset($_GET["sid"]))
	{
		$sid=$_GET["sid"];
		?>
		<table dir="rtl" border="1" align="center" width="50%">
			<tr>
				<th colspan="5">فاکتور سفارش شما</th>
			</tr>
			<tr>
				<td>ردیف</td>
				<td>نام کالا</td>
				<td>تعداد</td>
				<td>قیمت</td>
				<td> قیمت کل</td>
			</tr>
			<?php 
				$sql="select tbl_kala.id as id1,name,price,tbl_order.id as id2,tbl_order.qty as q,idk from tbl_order,tbl_kala where (sid='$sid' and idk=tbl_kala.id)";
		$result=mysqli_query($connect,$sql);
		$i=1;
		$sum=0;
		while($rows=mysqli_fetch_array($result));
		{
			$sum=$_sum+$rows["q"]*$rows["price"];
			?>
		<tr>
			<td><?php echo $i++; ?></td>
			<td><?php echo $rows["name"];?></td>
			<td><?php echo $rows["q"];?></td>
			<td><?php echo $rows["price"];?></td>
			<td><?php echo $rows["price"]*$rows["q"];?></td>
			
		</tr>	
		<?php } ?>
			<tr>
				<td colspan="2">جمع کل:</td><td colspan="3"><?php echo $sum;?></td>
			</tr>
			
		</table>
	<?php } ?>
	
		
		
	
	
	<hr><hr>
	<table dir="rtl" align="center" width="100%" border="1">
		<tr>
			<th colspan="9">لیست فاکتور ها </th>
		</tr>
		<tr>
			<th>کد</th>
			<th>کد رهگیری </th>
			<th>sid </th>
			<th>تاریخ </th>
			<th>جزئیات فاکتور</th>
			<th>حذف</th>
		</tr>
	
	<?php 
		$sql="select * from tbl_factor";
	$result=mysqli_query($connect,$sql);
	while($rows=mysqli_fetch_array($result))
	{ ?>
	<tr>
		<td><?php echo $rows["id"];?></td>
		<td><?php echo $rows["coder"];?></td>
		<td><?php echo $rows["sid"];?></td>
		<td><?php echo $rows["dateins"];?></td>
		
		
		
		<td><a href="showorder.php?sid=<?php echo $rows['sid'];?>">جزئیات</a></td>
		<td><a href="showproduct.php?idd=<?php echo $rows['id'];?>">حذف</a></td>
	</tr>
	<?php }?>
</table>
</body>
</html>