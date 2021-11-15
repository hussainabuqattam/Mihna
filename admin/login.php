<?php
    include "include/init.php";
    include "include/header.php";
?>

<!--start login-->
<div class="login-wrap">
	<div class="login-html">
        <a class="navbar-brand logo logo-login" href="index.php"><span>M</span>IHNA<span style="font-size:15px;font-family: unset;margin-left:3px;color:#fff;">admin</span></a>
        <hr class="hr">
		<div class="login-form">
			<div class="sign-in-htm">
				<form action="" method="POST">
					<div class="group">
						<label for="user" class="label">ألبريد الالكتروني</label>    
						<input id="user" type="email" class="input" name="email">
					</div>
					<div class="group">
						<label for="pass" class="label">كلمة السر</label>
						<input id="pass" type="password" class="input" data-type="password" name="password">
					</div>
					<div class="group">
						<input type="submit" class="button" name="Login" value="تسجيل الدخول">
					</div>
					<div class="hr"></div>
				</form>
			</div>
		</div>
	</div>
</div>
<!--end login-->
<?php include "include/footer.php"; ?>

