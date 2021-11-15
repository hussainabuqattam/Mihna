
<?php
    include "include/init.php";
    include "include/header.php";
    include "include/nav.php";
?>


<div class="wraper">
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
					<label for="eMail">البريد الالكتروني</label>
					<input type="email" class="form-control" id="eMail" placeholder="البريد الالكتروني">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="phone">رقم الهاتف</label>
					<input type="text" class="form-control" id="phone" placeholder="رقم الهاتف">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="website">موقع الويب</label>
					<input type="url" class="form-control" id="website" placeholder="موقع الويب">
				</div>
			</div>
		</div>
		<div class="row gutters">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="Street">الشارع</label>
					<input type="name" class="form-control" id="Street" placeholder="الشارع">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="ciTy">المدينة</label>
					<input type="name" class="form-control" id="ciTy" placeholder="المدينة">
				</div>
			</div>
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-center">
					<button type="button" id="submit" name="submit" class="btn btn-success">اضافة</button>
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
