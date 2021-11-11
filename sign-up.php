<?php
$login = true;
    $titlePage = "Signup";
    include "include/init.php";
    include "include/header.php";

	if(isset($_POST['signup'])) {
		$error = [];
		$first_name  = $_POST['Fname'];
		$last_name = $_POST['Lname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirmPassword = $_POST['confirm_password'];
		$image = "user.png";
		$type_user = $_POST['type_user'];


		$validation = validationUser($_POST);

		if($validation === true){
			$stmt = $connect->prepare("INSERT INTO users SET password = ?, email = ?, first_name = ?, last_name = ?, type_user = ?, image = ?");
			$result = $stmt ->execute([$password, $email, $first_name, $last_name, $type_user, $image]);
	
			if($result == true) {
				$_SESSION['message_success'] = "User Add successfully";
				Redirect("login.php");
			}
	
		}
	}

?>


<!--start login-->
<div class="login-wrap" style="min-height: 1000px;">
	<div class="login-html">
        <a class="navbar-brand logo logo-login" href="index.php"><span>M</span>IHNA</a>
        <hr class="hr">
        <div class="container-signbtn">
         <a href="Login.php" class="sign-btns">تسجيل الدخول</a>
         <a href="sign-up.php" class="sign-btns">حساب جديد</a>
        </div>
		<div class="login-form">
			<form class="sign-up-htm" method="POST">
				<div class="group">
					<label for="user" class="label">الاسم الاول</label>
					<input id="user" type="text" class="input" name="Fname">
					<?php if(isset($validation['FirstName'])): ?>
						<span class="error-validation"><?= $validation['FirstName'] ?></span>
					<?php endif; ?>
				</div>
                <div class="group">
					<label for="user" class="label">الاسم الثاني</label>
					<input id="user" type="text" class="input" name="Lname">
					<?php if(isset($validation['LastName'])): ?>
						<span class="error-validation"><?= $validation['LastName'] ?></span>
					<?php endif; ?>
				</div>
                <div class="group">
					<label for="pass" class="label">ألبريد الالكنروني</label>
					<input id="pass" type="email" class="input" name="email">
					<?php if(isset($validation['Email'])): ?>
						<span class="error-validation"><?= $validation['Email'] ?></span>
					<?php endif; ?>
				</div>
				<div class="group">
					<label class="label" for="inputState">حالة المستخدم</label>
					<select id="inputState" class="input" style="color:#aaa;" name="type_user">
						<option selected value="craft presenter">مقدم حرفة </option>
						<option value="user">مستخدم عادي</option>
					</select>
				</div>
				<div class="group">
					<label for="pass" class="label">كلمة السر </label>
					<input id="pass" type="password" class="input" data-type="password" name="password">
					<?php if(isset($validation['Password'])): ?>
						<span class="error-validation"><?= $validation['Password'] ?></span>
					<?php endif; ?>
				</div>
				<div class="group">
					<label for="pass" class="label">تأكيد كلمة السر</label>
					<input id="pass" type="password" class="input" data-type="password" name="confirm_password">
				</div>
				<div class="group">
					<input type="submit" class="button" value="حساب جديد" name="signup">
				</div>
				<div class="hr"></div>
             </form>
		</div>
	</div>
</div>
<!--end login-->
<?php include ("include/footer.php");?>