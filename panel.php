<?php session_start();64_l
	  include "./funcs.php";
	  include "./header.php";
?>
<title>پنل مدیریت</title>
</head>
<!-- end head-->
<body>
<?php	  include "./menu.php"; ?>
	<?php
		if (isset($_SESSION["login"]))
		{?>

	<div class="welcome">
		<span class="user">کاربر محترم:&nbsp; <?php echo $_SESSION["user"];?>&nbsp; خوش آمدید</span>
		<span class="exit"><a href="exit.php"><img src="./images/64_logout.png"></a></span>
	</div>
	<div class="menu">
		<ul>
			<li><a href="showuser.php" target="myframe">مدیریت کاربران</a></li>
			<li><a href="showcat.php" target="myframe">دسته بدی کالا </a></li>
			<li><a href="showproduct.php" target="myframe">مدیریت کالا </a></li>
			<li><a href="showorder.php" target="myframe"> مدیریت سفارشات </a></li>
			 <li><a href="showorderb.php" target="myframe">سفارشات بایگانی شده</a></li>


		</ul>
	</div>
	<iframe name="myframe" id="myframe" class="myframe"></iframe>
	<?php
		}
	else
	{
		echo '<h1 >شما اجازه دسترسی به این صفحه را ندارید</h1>';
	}
	?>
</body>
</html>
