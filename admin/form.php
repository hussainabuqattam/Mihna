
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
			<!--upload--file-->
		   <div>
			  <div class="col-md-8">
				<div class="upload-add" id="upload-add-serves">
					<img src="https://placehold.co/300x300" alt="img-upload" class="rounded imguploadserves" id="imguploadserves">
				</div>
				<input name="image" type="file" onchange="readUrl(this)" class="inpfile" id="inpfile" style="display:none;">
				<label for="inpfile"class="input-files"><i class="fas fa-upload"></i>&nbsp;اضافة صورة</label>
		       </div>
			</div>
			<!--upload--file-->
			<!--img--form-->
			<div class="col-md-4">
               <div class="form-img-container">
				   <img src="../img/pexels-flora-westbrook-4191618.jpg" alt="">
			   </div>
		    </div>
			<!--img--form-->
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-center">
					<button type="button" id="submit" name="submit" class="btn btn-success" style="width:190px;border-radius:15px;font-weight:500;">إضافة</button>
				</div>
			</div>
			
			</form>
		</div>
	</div>
</div>

<?php include "include/footer.php"; ?>
