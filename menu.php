<!--start menu-->
	<div class="menu">
		<span>
			<ul>
				
				<li>
						<a href="index.php">صفحه اصلی
						</a>
					</li>
					<li>
						<a href="">محصولات 
						</a>
					<ul>
								<?php 
								$sql="select * from tbl_cat";
								$result=mysqli_query($connect,$sql);
								while($rows=mysqli_fetch_array($result))
								{?>
						<li>
							<a href="index.php?idc=<?php echo $rows['id'];?>"><?php echo $rows["catname"]; ?>
							</a>
						</li>
							
									<?php }?>
					</ul>
				</li>
				<ul>
					<li>
						<a href="text/darbare.html">درباره ما
						</a>
					</li>
					<li>
						<a href="#footer">تماس با ما
						</a>
					</li>
				
				</ul>
					<span class="menuh">
				<li><a href="regusr/index.php"><input type="submit" name="loginUser" id="loginUser" value="ثبت نام" class="regestermenu"></a></li>
				<li><a href="regusr/showregister.php"><input type="submit" name="loginUser" id="loginUser" value="ورود " class="singin"></a></li>
				</span>
		</span>
				
	</div>
<!--End menu-->
