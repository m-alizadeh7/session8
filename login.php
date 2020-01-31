<?php session_start();
	  include "./funcs.php";
	  include "./header.php";
?>
<title>پنل مدیریت </title>
</head>
<!-- end head-->
<body>
<?php	  include "./menu.php"; ?>
<div >
<ul><h1>به صفحه ورود به پنل ادمین خوش آمدید</h1></ul>
</div>

<div class="form-control">

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


<form class="form-signin">
      <div class="text-center mb-4">
        <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Floating labels</h1>
        <p>Build form controls with floating labels via the <code>:placeholder-shown</code> pseudo-element. <a href="https://caniuse.com/#feat=css-placeholder-shown">Works in latest Chrome, Safari, and Firefox.</a></p>
      </div>

      <div class="form-label-group">
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputEmail">Email address</label>
      </div>

      <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <label for="inputPassword">Password</label>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2018</p>
    </form>





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
		<div class="form-control">
		<form name="frm" method="post" action="">
			<input type="text" name="txtu" id="txtu" required placeholder="نام کاربری" size="30%"><br>
			<input type="password" name="txtp" id="txtp" placeholder="کلمه عبور" size="30%"><br>
			<input type="submit" value="ورود" name="send" width="100%">


		</form>
			</div>
	</div>
<?php include "./footer.php" ?>
