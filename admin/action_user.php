<?php
include "include/init.php";

if(!isset($_SESSION['admin-ID']))
        Redirect("login.php");

$action = (isset($_GET['action']) && !empty($_GET['action'])) ? $_GET['action'] : Redirect("users.php");

    if($action == "add") {
        $titlePage = "إضافة المستخدم";
        include "include/header.php";
        include "include/nav.php";

        if(isset($_POST['Save'])) {
            $firstName = $_POST['first_name'];
            $lastName = $_POST['last_name'];
            $email = $_POST['email'];
            $typeUser = isset($_POST['type_user']) ? $_POST['type_user'] : "";
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];
            $image = "user.png";
            
            $validation = validateUser($_POST);

            if($validation === true) {
                $stmt = $connect->prepare("INSERT INTO users SET first_name = ?, last_name = ?, email = ?, type_user = ?, password = ?, image = ?");
                $result = $stmt->execute([$firstName, $lastName, $email, $typeUser, $password, $image]);
                
                if($result == true) {
                    $_SESSION['message'] = "تمت إضافة المستخدم بنجاح";
                    Redirect("users.php");
                }
            }

        }
        ?>
        <div class="wraper">
            <div class="container">
                <div class="card admin-form h-100">
                    <form class="card-body" method="POST" enctype="multipart/form-data">
                        <fieldset>
                            <legend class="title-page"><?= $titlePage ?></legend>
                            <div class="row gutters">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="fullName">الاسم الاول</label>
                                        <input type="text" class="form-control" id="fullName" name="first_name">
                                        <?php if(isset($validation['FirstName'])): ?>
                                            <p class="error-message"><?= $validation['FirstName'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="lastName">الاسم الاخير</label>
                                        <input type="text" class="form-control" id="lastName" name="last_name">
                                        <?php if(isset($validation['LastName'])): ?>
                                            <p class="error-message"><?= $validation['LastName'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="eMail">البريد الالكتروني</label>
                                        <input type="email" class="form-control" id="eMail" name="email">
                                        <?php if(isset($validation['Email'])): ?>
                                            <p class="error-message"><?= $validation['Email'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="Type">نوع المستخدم</label>
                                        <select name="type_user" id="Type" class="form-control">
                                            <option value="" disabled selected></option>
                                            <option value="مقدم خدمة">مقدم خدمة</option>
                                            <option value="مواطن">مواطن</option>
                                        </select>
                                        <?php if(isset($validation['TypeUser'])): ?>
                                            <p class="error-message"><?= $validation['TypeUser'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="Street">رقم السري</label>
                                        <input type="password" name="password" class="form-control" id="Street">
                                        <?php if(isset($validation['Password'])): ?>
                                            <p class="error-message"><?= $validation['Password'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="ciTy">تأكيد الرقم السري</label>
                                        <input type="password" name="confirm_password" class="form-control" id="ciTy">
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-center">
                                        <button type="submit" id="submit" name="Save" class="btn btn-success app_btn_form">اضافة</button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }elseif($action == "edit"){
        $titlePage = "تعديل المستخدم";
        include "include/header.php";
        include "include/nav.php";

        if(!isset($_GET['id']) && empty($_GET['id']))
            Redirect("users.php");

        $id = $_GET['id'];

        $stmt = $connect->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        $user = $stmt->fetch();

        if($user == false)
            Redirect("users.php");

        if(isset($_POST['Save'])) {
            $firstName = $_POST['first_name'];
            $lastName = $_POST['last_name'];
            $email = $_POST['email'];
            $typeUser = $_POST['type_user'];
            $password = empty($_POST['password']) ? $user['password'] : $_POST['password'];
            $ConfirmPassword = empty($_POST['confirm_password']) ? $user['password'] : $_POST['confirm_password'];
            $image = "user.png";
            
            $validation = validateUser($_POST);

            if($validation == true) {
                $stmt = $connect->prepare("UPDATE users SET first_name = ?, last_name = ?, email = ?, type_user = ?, password = ?, image = ? WHERE id = ?");
                $result = $stmt->execute([$firstName, $lastName, $email, $typeUser, $password, $image, $id]);
                
                if($result == true) {
                    $_SESSION['message'] = "تمت تعديل المستخدم بنجاح";
                    Redirect("users.php");
                }
            }

        }
        ?>
        <div class="wraper">
            <div class="container">
                <div class="card admin-form h-100">
                    <form class="card-body" method="POST" enctype="multipart/form-data">
                        <fieldset>
                            <legend class="title-page"><?= $titlePage ?></legend>
                            <div class="row gutters">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="fullName">الاسم الاول</label>
                                        <input type="text" class="form-control" id="fullName" name="first_name" value="<?= $user['first_name'] ?>">
                                        <?php if(isset($validation['FirstName'])): ?>
                                            <p class="error-message"><?= $validation['FirstName'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="lastName">الاسم الاخير</label>
                                        <input type="text" class="form-control" id="lastName" name="last_name"  value="<?= $user['last_name'] ?>">
                                        <?php if(isset($validation['LastName'])): ?>
                                            <p class="error-message"><?= $validation['LastName'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="eMail">البريد الالكتروني</label>
                                        <input type="email" class="form-control" id="eMail" name="email"  value="<?= $user['email'] ?>">
                                        <?php if(isset($validation['Email'])): ?>
                                            <p class="error-message"><?= $validation['Email'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="Type">نوع المستخدم</label>
                                        <select name="type_user" id="Type" class="form-control">
                                            <option <?= $user['type_user'] == "مقدم حرفة" ? "selected" : "" ?> value="مقدم حرفة">مقدم خدمة</option>
                                            <option <?= $user['type_user'] == "مواطن" ? "selected" : "" ?> value="مواطن">مواطن</option>
                                        </select>
                                        <?php if(isset($validation['TypeUser'])): ?>
                                            <p class="error-message"><?= $validation['TypeUser'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="Street">رقم السري</label>
                                        <input type="password" name="password" class="form-control" id="Street">
                                        <?php if(isset($validation['Password'])): ?>
                                            <p class="error-message"><?= $validation['Password'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="ciTy">تأكيد الرقم السري</label>
                                        <input type="password" name="confirm_password" class="form-control" id="ciTy">
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-center">
                                        <button type="submit" id="submit" name="Save" class="btn btn-success app_btn_form">حفظ</button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }elseif($action == "delete"){
        if(empty($_GET['id']) || !isset($_GET['id']))
            Redirect("users.php");

        $id = $_GET['id'];
        
        $stmt = $connect->prepare("SELECT * from users WHERE id = ?");
        $stmt->execute(array($id));
        $getUsers = $stmt->fetch();

        if($getUsers == false)
            Redirect("users.php");

        $stmt = $connect->prepare("DELETE FROM users WHERE id = ? LIMIT 1");
        $result = $stmt->execute(array($id));

        if($result == true) {
            $_SESSION['message'] = "تم حذف المستخدم بنجاح";
            Redirect("users.php");
        }

    }else{
        Redirect("users.php");
    }

?>










<?php include "include/footer.php"; ?>