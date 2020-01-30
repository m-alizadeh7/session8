<?php session_start();
	  include "./funcs.php";
	  include "./header.php"; 
?>
<title>پنل مدیریت </title>
</head>
<!-- end head-->
<body>
<?php	  include "./menu.php"; ?>

<body>
	<div class=welcome>
	<ul><h1>به صفحه ورود به پنل ادمین خوش آمدید</h1></ul>
	</div>
	
	<div class="login">
		<?php 
		
			
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
				$_SESSION["user"]=$row["Fname"].' '.$row["family"];
				$_SESSION["login"]=1;
				header("location:panel.php");
			}
			else
			{
				echo'<div style="color:red; text-align:center;"><h1>نام کاربری و کلمه عبور اشتباه است</h1></div>';
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
<?php include "../footer.php" ?>
