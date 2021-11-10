<?php
   $titlePage = "edit-profile";
   include "include/init.php";
   include "include/header.php";
   include "include/nav.php";
 ?>

<form class="edit-profile-form">
          <div class="profile-edit text-center">
          <div class="profile-upload">
            <div class="avatar-edit">
                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                <label for="imageUpload"><i class="fas fa-pen" style="margin-top:7px"></i></label>
            </div>
            <div class="avatar-preview">
                <div id="imagePreview" style="background-image: url(img/pexels-stefan-stefancik-91227.jpg);">
                </div>
            </div>
        </div>
      </div>
      <div class="form-informayion text-center">
          <div class="container">
              <div class="form-edit">
                      <div class="form-row">
                          <div class="col-lg-4 col-md-6">
                              <div class="mr-form">
                                  <label class="text-form ">الأسم الاول</label>
                                  <input type="text" class="form-control form-input"  placeholder=" الأسم الاول">
                              </div>
                          </div>
                          <div class="col-lg-4 col-md-6">
                              <div class="mr-form">
                                  <label class="text-form">الأسم الأخير</label>
                                  <input type="text" class="form-control form-input"  placeholder=" ألاسم الأخير">
                              </div>
                          </div>
                          <div class="col-lg-4 col-md-6">
                              <div class="mr-form">
                                  <label class="text-form " for="inputState">البريد الالكتروني</label>
                                  <input type="email" class="form-control form-input"  placeholder="expe@gmail.com">                              
                              </div>
                          </div>
                          <div class=" col-lg-4  col-md-6">
                              <div class="mr-form">   
                                  <label  class="text-form">كلمة المرور القديمة</label>
                                  <input type="password" class="form-control form-input" placeholder="********"   aria-describedby="passwordHelpInline">
                              </div>
                          </div>  
                          <div class=" col-lg-4  col-md-6">
                              <div class="mr-form">   
                                  <label  class="text-form">كلمة المرور الجديدة</label>
                                  <input type="password"  class="form-control form-input" placeholder="********"   aria-describedby="passwordHelpInline">
                              </div>
                          </div>
                          <div class=" col-lg-4  col-md-6">
                              <div class="mr-form">
                                  <label  class="text-form">تاكيد كلمة المرور</label>
                                  <input  type="password"  class="form-control form-input" placeholder="********" aria-describedby="passwordHelpInline">
                              </div>
                          </div>
                      </div>
                    <button type="submit" class="btn btn-outline-light" style="margin:25px;">حفظ التعديلات</button>
              </div>
          </div>
      </div>
</form>   
<?php include "include/footer.php"; ?>

<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
</script>