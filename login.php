<?php
	$login = true;
    $titlePage = "Login";
    include "include/init.php";
    include "include/header.php";

	if(isset($_POST['Login'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		$stmt = $connect->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $stmt->execute(array($email, $password));

        $getUser = $stmt->fetch();

        $count = $stmt->rowCount();

        if ($count > 0) {
            $_SESSION['Email'] = $email;
            $_SESSION['ID'] = $getUser['id'];
			$_SESSION['type'] = $getUser['type_user'];
            Redirect("index.php");
            exit();
        }else {
            $_SESSION['message'] = "الايميل او الرقم السري غير صحيح";
        }
	}


?>


<!--start login-->
<div class="login-wrap">
	<div class="login-html">
        <a class="navbar-brand logo logo-login" href="index.php"><span>M</span>IHNA</a>
        <hr class="hr">
		<div class="container-signbtn">
         <a href="Login.php" class="sign-btns"style="color:#fff;">تسجيل الدخول</a>
         <a href="sign-up.php" class="sign-btns" >حساب جديد</a>
        </div>
		<?php if(isset($_SESSION['message'])): ?>
			<div class="alert alert-danger" role="alert">
				<?= $_SESSION['message']; ?>
			</div>
		<?php  unset($_SESSION['message']); endif; ?>
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
<?php include ("include/footer.php");?>