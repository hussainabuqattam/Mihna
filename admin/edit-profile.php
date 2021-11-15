
<?php
    include "include/init.php";
    include "include/header.php";
    include "include/nav.php";
?>


<div class="wraper">
    <h1 class="title-page-admin">الصفحة الشخصية</h1>
<div class="container">
<div class="card admin-form h-100">
	<form class="card-body">
		<div class="row gutters">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="fullName">الاسم الاول</label>
					<input type="text" class="form-control" id="fullName" placeholder="الاسم الاول">
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="fullName">الاسم الاخير</label>
					<input type="text" class="form-control" id="fullName" placeholder="الاسم الاخير">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="eMail">البريد الالكتروني</label>
					<input type="email" class="form-control" id="eMail" placeholder="البريد الالكتروني">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label>كلمة السر القديمة</label>
					<input type="password" class="form-control" placeholder="كلمة السر القديمة">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label>كلمة السر الجديدة</label>
					<input type="password" class="form-control" placeholder="كلمة السر الجديدة">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label>تأكيد كلمة السر</label>
					<input type="password" class="form-control" placeholder="تأكيد كلمة السر">
				</div>
			</div>
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-center">
					<button type="button" id="submit" name="submit" class="btn btn-primary">تعديل </button>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</form>
</div>

<?php include "include/footer.php"; ?>
