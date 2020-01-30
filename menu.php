<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	
</head>
	<body>
		<?php include "funcs.php"; ?>
	
		
	<!-- start menu -->
	<div class="menu">
		<span>
		<ul>
			
			<li>
				<a href="index.php">صفحه اصلی</a></li>
			
			<?php /*?><li><a href="">محصولات </a>
				<ul>
					<?php 
					$sql="select * from tbl_cat";
					$result=mysqli_query($connect,$sql);
					while($rows=mysqli_fetch_array($result))
					{?>
					<li><a href=""><?php echo $rows["catname"]; ?></a></li>
				
						<?php }?>
						</ul>
			</li><?php */?>
			<li><a href="">محصولات </a>
				<ul>
					<?php 
					$sql="select * from tbl_cat";
					$result=mysqli_query($connect,$sql);
					while($rows=mysqli_fetch_array($result))
					{?>
					<li><a href="index.php?idc=<?php echo $rows['id'];?>"><?php echo $rows["catname"]; ?></a></li>
				
						<?php }?>
						</ul>
			</li>
			<ul>
				<li></li>
			<!--<li><a href="text/darbare.html"> آموزش php </a></li>
			<li><a href="text/darbare.html"> آموزش Css</a></li>
			<li><a href="text/darbare.html">آموزش JavaScript </a></li>	
			<li><a href="text/darbare.html"> آموزش Html</a></li>-->
				
			<li><a href="text/darbare.html">درباره ما</a></li>
			<li><a href="#footer">تماس با ما</a></li>
			
				</ul>
			</span>
			
			<!--<span class="menuh">
				<li><a href="register user/index.php"><input type="submit" name="loginUser" id="loginUser" value="ثبت نام" class="regestermenu" width=""></a></li>
				<li><a href="admin/index.php"><input type="submit" name="loginUser" id="loginUser" value="ورود " class="singin"></a></li>
			</span>	-->
		
	</div>
			<!--<li><a href="">نوشیدنی </a>
				<ul>
					<li>نوشابه<a href=""></li>
					<li><a href=""> دلستر </li>
					<li><a href="">اب معدنی</li>
					<li><a href="">انرژی زا</li>
				</ul>
			</li>
			<li><a href="">مواد شوینده</a>
				<ul>
					<li><a href="">پودر لباس شویی</li>
					<li><a href="">مایع ظرف شویی  </li>
					<li><a href="">مایع دستشویی </li>
					<li><a href="">سایر </li>
				</ul>
			</li>
			<li><a href="">ارایشی و بهداشتی </a>
				<ul>
					<li><a href="">آقایان</li>
					<li><a href="">بانوان  </li>
					<li><a href="">سایر </li>
				</ul>
			</li>
			
				<!--</span>-->
			
		
	<!--</div>-->
	<!-- end menu -->


	
</body>
</html>