<?php
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

		
		if(empty($first_name)) {
			$error['FirstName'] = "First Name can't be empty";
		}else if(strlen($first_name) < 3) {
			$error['FirstName'] = "First Name must contain at least 3 characters";
		}
	
		if(empty($last_name)) {
			$error['LastName'] = "Last Name can't be empty";
		}else if(strlen($last_name) < 3) {
			$error['LastName'] = "Last Name must contain at least 3 characters";
		}
	
		if(empty($email)) {
			$error['Email'] = "Email can't be empty";
		}else if(!preg_match("/^([\w0-9_\-\.]+)@([\w\-]+\.)+[\w]{2,6}$/", $email)) {
			$error['Email'] = "Email is not Correct , Must Be Like this Pattern (example@example.com)";
		}
	
		if(empty($password)){
			$error['Password'] = "Password can't be empty";
		}else if($confirmPassword !== $password){
			$error['Password'] = "Password and confirm password are not Match";
		}



		if(empty($error)){
			$stmt = $connect->prepare("INSERT INTO users SET password = ?, email = ?, first_name = ?, last_name = ?, image = ?");
			$result = $stmt ->execute([$password, $email, $first_name, $last_name, $image]);
	
			if($result == true) {
				$_SESSION['message_success'] = "User Add successfully";
				Redirect("login.php");
			}
	
		}
	}

?>


<!--start login-->
<div class="login-wrap" style="min-height: 950px;">
	<div class="login-html">
        <a class="navbar-brand logo logo-login" href="#"><span>M</span>IHNA</a>
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
					<span style="color:#ff0000a3;">erorr</span>
				</div>
                <div class="group">
					<label for="user" class="label">الاسم الثاني</label>
					<input id="user" type="text" class="input" name="Lname">
				</div>
                <div class="group">
					<label for="pass" class="label">ألبريد الالكنروني</label>
					<input id="pass" type="email" class="input" name="email">
				</div>
				<div class="group">
					<label for="pass" class="label">كلمة السر </label>
					<input id="pass" type="password" class="input" data-type="password" name="password">
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