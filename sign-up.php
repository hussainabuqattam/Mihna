<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= @$titlePage ?></title>
    <link rel="stylesheet" href="layout/css/bootstrap.css">
    <link rel="stylesheet" href="layout/css/fontawesome.css">
    <link rel="stylesheet" href="layout/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Harmattan&display=swap" rel="stylesheet">
</head>
</head>
<body class="login-page">

<!--start login-->
<div class="login-wrap" style="min-height: 950px;">
	<div class="login-html">
        <a class="navbar-brand logo logo-login" href="#"><span>M</span>IHNA</a>
        <hr class="hr">
        <div class="container-signbtn">
         <a href="#" class="sign-btns">تسجيل الدخول</a>
         <a href="#" class="sign-btns">حساب جديد</a>
        </div>
		<div class="login-form">
			<form class="sign-up-htm">
				<div class="group">
					<label for="user" class="label">الاسم الاول</label>
					<input id="user" type="text" class="input">
				</div>
                <div class="group">
					<label for="user" class="label">الاسم الثاني</label>
					<input id="user" type="text" class="input">
				</div>
                <div class="group">
					<label for="pass" class="label">ألبريد الالكنروني</label>
					<input id="pass" type="email" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">كلمة السر </label>
					<input id="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label">تأكيد كلمة السر</label>
					<input id="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<input type="submit" class="button" value="حساب جديد">
				</div>
				<div class="hr"></div>
             </form>
		</div>
	</div>
</div>
<!--end login-->
<?php include ("include/footer.php");?>