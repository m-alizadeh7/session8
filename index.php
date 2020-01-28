<?php 
session_start();
if(isset($_GET["msg"]))
{
	unset($_SESSION["sid"]);
}
if(isset($_SESSION["sid"]))
{
	$_SESSION["sid"]=session_id();
}
	?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<script language="javascript" src="func.js"></script>
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
	<link rel="stylesheet" type="text/css" href="js/calcatur.js">
</head>

<body>
	<?php include "funcs.php" ?>
	<?php include "header.php" ?>
	<?php include "menu.php" ?>
	
	<!-- start content -->
	<div class="content">
	<span class="kala">
		<?php
	if(isset($_GET["idc"]))
	{
		$idc=$_GET["idc"];
		$sql="select * from tbl_kala where idc='$idc'";
	}
	else
	{
	$sql="select * from tbl_kala";
	}
	$res=mysqli_query($connect,$sql);
	while($rows1=mysqli_fetch_array($res))
	{
		$rows2=mysqli_fetch_array($res);  
		if($rows1["id"])
		{ ?>	
		
		<span class="aks">
			<img src="images/product/<?php echo $rows1["aks"];?>" width="300px" height="200px"><br>
			نام محصول:<?php echo $rows1["name"];?>
		<br>
			قیمت محصول:<?php echo $rows1["price"];?>			
		</br>
		<a href="addsabad.php?id=<?php echo $rows1['id']; ?> ">افزودن به سبد خرید</a>		
		</span>
				
	<?php } // if rows1
		
		if($rows2["id"])
		{ ?>	
		
		<span class="aks">
			<img src="images/product/<?php echo $rows2["aks"];?>" width="300px" height="200px"><br>
			نام محصول:<?php echo $rows2["name"];?>
		<br>
			قیمت محصول:<?php echo $rows2["price"];?>
			<br>
					
		<a href="addsabad.php?id=<?php echo $rows2['id']; ?>">افزودن به سبد خرید</a>		
		</span>
	<?php } ?>
		<?php } //while ?>				
	</span>
<!--<span class="worod">-->
	<span class="sabad">
		
		<table border="1" width="30%">
			<tr><th colspan="3">سبد سفارش شما</th></tr>
			<tr>
				<td>کد</td>
				<td>نام کالا</td>
				<td>حذف</td>
			</tr>
		
		<?php
		$sid=$_SESSION["sid"];
		$sql="select tbl_kala.id ,name, tbl_order.id as id1 , status ,idk from tbl_order,tbl_kala where (sid='$sid' and tbl_order.idk=tbl_kala.id and status=0)";
		$result=mysqli_query($connect,$sql);
		while($rows=mysqli_fetch_array($result))
		{ ?>
		<tr>
			<td><?php echo $rows["id1"]; ?></td>
			<td><?php echo $rows["name"]; ?></td>
			<td><a href="delsabad.php?id=<?php echo $rows['id1'];?>">حذف</a></td>
		</tr>
			
			<?php } ?>
			<tr>
			<td><a href="showfactor.php?sid=<?php echo $sid; ?>">نهایی کردن سفارش</a></td>
		</tr>
	</table>
		
		<span ><a href=""><img src="images/کد-تخفیف-1.gif" width="30%" height="200px"></a></span> 
		<span ><a href=""><img src="images/مناطق-تحت-پوشش2.jpg" width="30%" height="200px"></a></span>
	</span>
	
		
	</div>
	<!-- end content -->
	<?php include "footer.php" ?>

</body>
</html>