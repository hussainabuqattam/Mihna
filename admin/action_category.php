<?php
include "include/init.php";

if(!isset($_SESSION['admin-ID']))
        Redirect("login.php");

$action = (isset($_GET['action']) && !empty($_GET['action'])) ? $_GET['action'] : Redirect("users.php");

    if($action == "add") {
        $titlePage = "إضافة حرفة مقدمة";
        include "include/header.php";
        include "include/nav.php";

        if(isset($_POST['Save'])) {
            $name = $_POST['name'];
            $image = "user.png";
            
            $validation = validateCategory($_POST);

            if($validation == true) {
                $stmt = $connect->prepare("INSERT INTO categories SET name = ?, image = ?");
                $result = $stmt->execute([$name, $image]);
                
                if($result == true) {
                    $_SESSION['message'] = "تمت إضافة الحرفة المقدمة بنجاح";
                    Redirect("categories.php");
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
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="fullName">اسم الحرفة المقدمة</label>
                                        <input type="text" class="form-control" id="fullName" name="name">
                                        <?php if(isset($validation['name'])): ?>
                                            <p class="error-message"><?= $validation['name'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-center">
                                        <button type="submit" id="submit" name="Save" class="btn btn-success">اضافة</button>
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
        $titlePage = "تعديل الحرفة المقدمة";
        include "include/header.php";
        include "include/nav.php";

        if(!isset($_GET['id']) && empty($_GET['id']))
            Redirect("categories.php");

        $id = $_GET['id'];

        $stmt = $connect->prepare("SELECT * FROM categories WHERE id = ?");
        $stmt->execute([$id]);
        $category = $stmt->fetch();

        if($user == false)
            Redirect("categories.php");

        if(isset($_POST['Save'])) {
            $name = $_POST['name'];
            $image = "user.png";
            
            $validation = validateCategory($_POST);

            if($validation === true) {
                $stmt = $connect->prepare("UPDATE categories SET name = ?, image = ? WHERE id = ?");
                $result = $stmt->execute([$name, $image, $id]);
                
                if($result == true) {
                    $_SESSION['message'] = "تمت تعديل الحرفة المقدمة بنجاح";
                    Redirect("categories.php");
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
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="fullName">اسم الحرفة المقدمة</label>
                                        <input type="text" class="form-control" id="fullName" name="name" value="<?= $category['name'] ?>">
                                        <?php if(isset($validation['name'])): ?>
                                            <p class="error-message"><?= $validation['name'] ?></p>
                                        <?php endif; ?> 
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-center">
                                        <button type="submit" id="submit" name="Save" class="btn btn-success">حفظ</button>
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
            Redirect("categories.php");

        $id = $_GET['id'];
        
        $stmt = $connect->prepare("SELECT * from categories WHERE id = ?");
        $stmt->execute(array($id));
        $getCategory = $stmt->fetch();

        if($getCategory == false)
            Redirect("categories.php");

        $stmt = $connect->prepare("DELETE FROM categories WHERE id = ? LIMIT 1");
        $result = $stmt->execute(array($id));

        if($result == true) {
            $_SESSION['message'] = "تم حذف الحرفة المقدمة بنجاح";
            Redirect("categories.php");
        }

    }else{
        Redirect("categories.php");
    }

?>










<?php include "include/footer.php"; ?>