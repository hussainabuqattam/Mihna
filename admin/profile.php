<?php
    $titlePage = "الصفحة الشخصية";
    include "include/init.php";
    include "include/header.php";
    include "include/nav.php";

    if(!isset($_SESSION['admin-ID']))
        Redirect("login.php");

    $stmt = $connect->prepare("SELECT * FROM admin WHERE id = ?");
    $stmt->execute([$_SESSION['admin-ID']]);
    $user = $stmt->fetch();

    if(isset($_POST['save'])){
        $error = [];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $old_pass = empty($_POST['old_password']) ? $user['password'] : $_POST['old_password'];
        $new_pass =  empty($_POST['password']) ? $user['password'] : $_POST['password'];
        $confirm_passs = empty($_POST['confirm_password']) ? $user['password'] : $_POST['confirm_password'];
        $image = empty($_FILES['image']['name']) ? $user['image'] : $_FILES['image']['name'];

        if($image != $user['image']){
            move_uploaded_file($_FILES['image']['tmp_name'], "img/$image");
        }

        if(!empty($_POST['password']) && !empty($_POST['confirm_password']) && empty($_POST['old_password'])) {
            $old_pass = "";
        }

        if(empty($first_name)) {
            $error['FirstName'] = "لا يجوز أن يكون الاسم الأول فارغًا";
        }else if(strlen($first_name) < 3) {
            $error['FirstName'] = "يجب أن يحتوي الاسم الأول على 3 أحرف على الأقل";
        }

        if(empty($last_name)) {
            $error['LastName'] = "لا يجوز أن يكون الاسم الأخير فارغًا";
        }else if(strlen($last_name) < 3) {
            $error['LastName'] = "يجب أن يحتوي اسم العائلة على 3 أحرف على الأقل";
        }

        if(empty($email)) {
            $error['Email'] = "لا يجوز أن يكون البريد الإلكتروني فارغًا";
        }else if(!preg_match("/^([\w0-9_\-\.]+)@([\w\-]+\.)+[\w]{2,6}$/", $email)) {
            $error['Email'] = "البريد الإلكتروني غير صحيح ، يجب أن يكون مثل هذا النمط (example@example.com)";
        }

        if($old_pass != $user['password']){
            $error['old_paassword'] = "كلمة المرور القديمة ليست صحيحة";
        }

        if($confirm_passs !== $new_pass){
            $error['Password'] = "كلمة المرور وتأكيد كلمة المرور غير متطابقتين";
        }

        if(empty($error)){
            $stmt = $connect->prepare("UPDATE admin SET email = ?, first_name = ?, last_name = ?, password = ?, image = ?  WHERE id = ?");
            $result = $stmt ->execute([$email, $first_name, $last_name, $new_pass, $image,  $user['id']]);

            if($result == true) {
                $_SESSION['message'] = "تحديث المعلومات بنجاح";
            }

        }


    }
 ?>
?>
<div class="wraper">
    <div class="container">
    <?php if(isset($_SESSION['message'])): ?>
        <div class="alert alert-success">
            <?= $_SESSION['message'] ?>
        </div>
    <?php unset($_SESSION['message']); endif; ?>
        <form class="edit-profile-form" method="POST" enctype="multipart/form-data">
                <div class="profile-edit text-center">
                <div class="profile-upload">
                <div class="avatar-edit">
                    <input type='file' name="image" id="imageUpload" accept=".png, .jpg, .jpeg" />
                    <label for="imageUpload"><i class="fas fa-pen" style="margin-top:7px"></i></label>
                </div>
                <div class="avatar-preview">
                    <div id="imagePreview" style="background-image: url(../img/<?= $user['image'] ?>);">
                    </div>
                </div>
            </div>
            </div>
            <div class="form-informayion text-center">
                <div class="container">
                    <div class="form-edit">
                            <div class="form-row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="mr-form text-right mb-3">
                                        <label class="text-form ">الأسم الاول</label>
                                        <input type="text" class="form-control form-input" name="first_name" value="<?= $user['first_name'] ?>">
                                        <?php if(isset($error['FirstName'])): ?>
                                        <span class="error-validation"><?= $error['FirstName'] ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="mr-form text-right mb-3">
                                        <label class="text-form">الأسم الأخير</label>
                                        <input type="text" class="form-control form-input" name="last_name" value="<?= $user['last_name'] ?>">
                                        <?php if(isset($error['LastName'])): ?>
                                        <span class="error-validation"><?= $error['LastName'] ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="mr-form text-right mb-3">
                                        <label class="text-form " for="inputState">البريد الالكتروني</label>
                                        <input type="email" class="form-control form-input" name="email" value="<?= $user['email'] ?>">
                                        <?php if(isset($error['Email'])): ?>
                                        <span class="error-validation"><?= $error['Email'] ?></span>
                                        <?php endif; ?>                         
                                    </div>
                                </div>
                                <div class=" col-lg-4  col-md-6">
                                    <div class="mr-form text-right mb-3">   
                                        <label  class="text-form">كلمة المرور القديمة</label>
                                        <input type="password" class="form-control form-input" name="old_password">
                                        <?php if(isset($error['old_paassword'])): ?>
                                        <span class="error-validation"><?= $error['old_paassword'] ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>  
                                <div class=" col-lg-4  col-md-6">
                                    <div class="mr-form text-right mb-3">   
                                        <label  class="text-form">كلمة المرور الجديدة</label>
                                        <input type="password"  class="form-control form-input" name="password">
                                        <?php if(isset($error['Password'])): ?>
                                        <span class="error-validation"><?= $error['Password'] ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class=" col-lg-4  col-md-6">
                                    <div class="mr-form text-right mb-3">
                                        <label  class="text-form">تاكيد كلمة المرور</label>
                                        <input  type="password"  class="form-control form-input" name="confirm_password">
                                    </div>
                                </div>
                            </div>
                        <button type="submit" name="save" class="btn btn-outline-light" style="margin:25px;">حفظ التعديلات</button>
                    </div>
                </div>
            </div>
        </form>   
    </div>
</div>
<?php include "include/footer.php"; ?>