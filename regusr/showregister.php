<?php session_start(); ?>
<?php include "header.php"; ?>
<!--<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> پنل کاربری شما</title>
	<link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
</head>

<body>-->
	<div class="LoginUser">
		<?php 
			include "../funcs.php";
			
		if (isset($_POST["send"]))
		{
			$u=$_POST["txtu"];
			$p=$_POST["txtp"];
			$sql= "select * from tbl_karbar where (username='$u' and password='$p')";
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
		<div class="UserPanel">
		<form name="frm" method="post" action="edituser.php">
			<input type="text" name="txtu" id="txtu" required placeholder="نام کاربری مجدد" size="50%"><br>
			<input type="password" name="txtp" id="txtp" placeholder="اصلاح کلمه عبور " size="50%"><br>
			<input type="submit" value="ورود" name="send" width="100%">
			
			
		</form>
			</div>
	</div>
<?php include "footer.php"; ?>
</body>
</html>