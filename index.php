<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<script language="javascript" src="func.js"></script>
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
</head>

<body>
	<?php include "funcs.php" ?>
	<?php include "header.php" ?>
	<?php include "menu.php" ?>
	
	<!-- start content -->
	<div class="content">
	<span class="kala">
		<?php
	$sql="select * from tbl_kala";
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
		<a href="">افزودن به سبد خرید</a>		
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
					
		<a href="">افزودن به سبد خرید</a>		
		</span>
	<?php } ?>
		<?php } //while ?>			
	
		
		
	
	
 			
	</span>
<span class="worod">
	<span class="sabad">sabad</span>
	 <span class="aks"><img src="images/کد-تخفیف-1.gif" width="200px" height="200px"></span> 
			 <span class="aks"><img src="images/مناطق-تحت-پوشش2.jpg" width="200px" height="200px"></span>
		
	</span>
		
	</div>

	<!-- end content -->
	<?php include "footer.php" ?>
</body>
</html>