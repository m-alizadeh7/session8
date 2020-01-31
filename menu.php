<!--start menu-->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="">علیزاده مارکت 💸 <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./">صفحه اصلی</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown08" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">محصولات ما</a>
            <div class="dropdown-menu" aria-labelledby="dropdown08">
              <?php
              $sql="select * from tbl_cat";
              $result=mysqli_query($connect,$sql);
              while($rows=mysqli_fetch_array($result))
              {?>
              <a class="dropdown-item" href="index.php?idc=<?php echo $rows['id'];?>"><?php echo $rows["catname"]; ?></a>
              <?php }?>

            <li class="nav-item">
                <a class="nav-link disabled" href="#">کلوب مشتریان</a>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="./register.php"><input type="submit" name="loginUser" id="loginUser" value="ثبت نام" class="regestermenu"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./showregister.php"><input type="submit" name="loginUser" id="loginUser" value="ورود " class="singin"></a>
          </li>
            </div>
          </li>
        </ul>
      </div>
    </nav>
