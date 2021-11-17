<?php
	$titlePage = "تسجيل الدخول";
    include "include/init.php";
    include "include/header.php";

	if(isset($_POST['Login'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		$stmt = $connect->prepare("SELECT * FROM admin WHERE email = ? AND password = ?");
        $stmt->execute(array($email, $password));

        $getUser = $stmt->fetch();

        $count = $stmt->rowCount();

        if ($count > 0) {
            $_SESSION['admin-Email'] = $email;
            $_SESSION['admin-ID'] = $getUser['id'];
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
        <a class="navbar-brand logo logo-login" href="/Mihna"><span>M</span>IHNA<span style="font-size:15px;font-family: unset;margin-left:3px;color:#fff;">admin</span></a>
        <hr class="hr">
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
<?php include "include/footer.php"; ?>

