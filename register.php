<?php
	  include "./funcs.php";
	  include "./header.php";
	  include "./menu.php";
?>
<body>



	<body class="bg-light">
		<form name="fmr" action="register.php" method="post" onSubmit=" return Cheack_Data()" >

	    <div class="container">
	      <div class="py-5 text-center">
	        <img class="d-block mx-auto mb-4" src="img/logo.png" alt="" width="72" height="72">
	        <h2>فرم ثبت نام </h2>
	        <p class="lead">بشمار 3 فرم رو تکمیل کن وقت کمه</p>
	      </div>

	            <div class="mb-3">
	              <label for="text">نام  <span class="text-muted"></span></label>
	              <input type="twxt" class="form-control" id="txtn" name="txtn" placeholder="غلام">
	            </div>
	            <div class="mb-3">
	              <label for="text">نام خانوادگی  <span class="text-muted"></span></label>
	              <input type="text" class="form-control" id="txtf" name="txtf" placeholder="دشت چمنی ">
	            </div>
	            <div class="mb-3"  >
	              <label for="username">نام کاربری</label>
	              <div class="input-group">
	                <div class="input-group-prepend">
	                  <span class="input-group-text">@</span>
	                </div>
	                <input type="text" class="form-control" id="username" placeholder="Batman_Chamani" required="">

	              </div>
								<div class="mb-3">
									<label for="Password">پسورد<span class="text-muted"></span></label>
									<input type="password" class="form-control" id="txtp" name="txtp" placeholder="">
								</div>
	            </div>
	            <div class="row">
	              <div class="col-md-5 mb-3">
	                <label for="country" >شهر</label>
	                <select class="custom-select d-block w-100" id="city" required="">
	                  <option value="" selected="selected">تکمیل کنید ...</option>
	                  <option value ="0">&#128580 تهران </option>
	                  <option value ="1">&#129332 شایر</option>
	                  <option value ="2">&#129501 روندل</option>
	                  <option value ="3">&#129497 گاندولین</option>
	                  <option value ="4">&#128110 شیکاگو</option>
	                </select>

	              </div>
	              <div class="col-md-4 mb-3">



	              </div>

	            </div>
	            <hr class="mb-4">

	            <h4 class="mb-3"><span style='font-size:35px;'>&#128699;</span></h4>

	            <div class="d-block my-3" >
	              <div class="custom-control custom-radio">
	                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="checked" required="">
	                <label class="custom-control-label" for="credit"><span style='font-size:25px;'>&#128697;  ..</span></label>
	              </div>
	              <div class="custom-control custom-radio">
	                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
	                <label class="custom-control-label" for="debit"><span style='font-size:25px;'>&#128698;  ..</span></label>
	              </div>
	            </div>
	            <hr class="mb-4">
	            <input class="btn btn-primary btn-lg btn-block" type="submit" value="ثبت" name="add">
	          </form>
	        </div>
	      </div>

	      <footer class="my-5 pt-5 text-muted text-center text-small">

<div class="karbar">
	<?php
	if(isset($_GET["msg"]))
	{
		$msg=$_GET["msg"];
		if($msg==1)
			echo'<div style="color:red; text-align:center;"><h1>ثبت نام با موفقیت انجام شد</h1></div>';
	   else if($msg==2)
		   echo'<div style="color:red; text-align:center;"><h1>نام کاربری قبلا ثبت شده</h1></div>';
		else
		echo ' خطا در ثبت نام';
	}


	if(isset($_POST["add"]))
{
	$n=$_POST["txtn"];
	$f=$_POST["txtf"];
	$u=$_POST["txtu"];
	$p=$_POST["txtp"];
	$j=$_POST["j"];
	$c=$_POST["city"];

	$sql1="select * from tbl_karbar where Username='$u'";
	$res=mysqli_query($connect,$sql1);
	$num=mysqli_num_rows($res);
	if($num==0)
	{
	$sql="insert into tbl_karbar(Fname,Lname,Username,Password,Gender,City) value ('$n','$f','$u','$p','$j','$c')";
	$result=mysqli_query($connect,$sql);
	}
	if($result)
	{
		 header("location:index.php?msg=1");

	}
	else
	{
		/*header("location:index.php?msg=0");*/
	}
	}
else
{
/*	header("location:index.php?msg=2");*/
}
?>


</table>
</div>
<?php include "./footer.php"; ?>
