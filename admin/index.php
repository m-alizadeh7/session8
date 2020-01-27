<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> مدیریت پنل</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div class=welcome>
<ul><h1>به صفحه ورود به پنل ادمین خوش آمدید</h1></ul>
	</div>
	
	<div class="login">
		<?php 
			include "../funcs.php";
			
		if (isset($_POST["send"]))
		{
			$u=$_POST["txtu"];
			$p=$_POST["txtp"];
			$sql= "select * from tbl_user where (username='$u' and password='$p')";
			$result=mysqli_query($connect,$sql);
			$num=mysqli_num_rows($result);
			if ($num>0)
			{
				$row=mysqli_fetch_array($result);
				$_SESSION["user"]=$row["Fname"];
				$_SESSION["login"]=1;
				header("location:panel.php");
			}
			else
			{
				echo 'نام کاربری و کلمه عبور اشتباه است';
			}
		}
		?>
		<div class="myfrom">
		<form name="frm" method="post" action="">
			<input type="text" name="txtu" id="txtu" required placeholder="نام کاربری" size="30%"><br>
			<input type="password" name="txtp" id="txtp" placeholder="کلمه عبور" size="30%"><br>
			<input type="submit" value="ورود" name="send" width="100%">
			
			
		</form>
			</div>
	</div>
</body>
</html>