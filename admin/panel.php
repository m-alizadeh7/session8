<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
</head>

<body>
	<?php 
		if (isset($_SESSION["login"]))
		{?>
	
	<div class="welcome">
		<span class="user">کاربر محترم: <?php echo $_SESSION["user"];?>خوش آمدید</span>
		<span class="exit"><a href="exit.php"><img src="../images/کتاب.jpg"></a></span>
	</div>
	<div class="menu">
		<ul>
			<li><a href="showuser.php" target="myframe">مدیریت کاربران</a></li>
			<li><a href="showcat.php" target="myframe">دسته بدی کالا </a></li>
			<li><a href="showproduct.php" target="myframe">مدیریت کالا </a></li>
			
			
		</ul>
	</div>
	<iframe name="myframe" id="myframe" class="myframe"></iframe>
	<?php
		}
	else
	{
		echo 'شما کاربر مجاز نیستید';
	}
	?>
</body>
</html>