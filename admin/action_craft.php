<?php
include "include/init.php";

if(!isset($_SESSION['admin-ID']))
        Redirect("login.php");

$action = (isset($_GET['action']) && !empty($_GET['action'])) ? $_GET['action'] : Redirect("users.php");

    if($action == "add") {
        $titlePage = "إضافة حرفة في الموقع";
        include "include/header.php";
        include "include/nav.php";
        include "include/array.php";

        $stmtCateg = $connect->prepare("SELECT * FROM categories");
        $stmtCateg->execute();
        $categories = $stmtCateg->fetchAll();

        $stmtUser = $connect->prepare("SELECT * FROM `users` WHERE type_user = 'مقدم حرفة'");
        $stmtUser->execute();
        $users = $stmtUser->fetchAll();

        if(isset($_POST['Save'])) {
            $name = $_POST['name'];
            $experience = $_POST['experience'];
            $start_work = isset($_POST['start_work']) ? $_POST['start_work'] : "";
            $end_work = isset($_POST['end_work']) ? $_POST['end_work'] : "";
            $address = $_POST['address'];
            $previous_jobs = $_POST['previous_jobs'];
            $phone_number = $_POST['phone_number'];
            $email = $_POST['email'];
            $notes = $_POST['notes'];
            $category = isset($_POST['category']) ? $_POST['category'] : "";
            $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : "";
            $image = $_FILES['image']['name'];
            
            $validation = validationCraft($_POST, $_FILES);

            if($validation === true) {
                move_uploaded_file($_FILES['image']['tmp_name'], "../img/$image");
                $stmt = $connect->prepare("INSERT INTO crafts SET name = ?, experience = ?, start_work = ?, end_work = ?, address = ?, previous_jobs = ?, notes = ?, phone_number = ?, email = ?, category_id  = ?, user_id = ?, image = ?");
                $result = $stmt->execute([$name, $experience, $start_work, $end_work, $address, $previous_jobs, $notes, $phone_number, $email, $category, $user_id, $image]);
                
                if($result == true) {
                    $_SESSION['message'] = "تمت إضافة الحرفة بنجاح";
                    Redirect("crafts.php");
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
                                        <label for="nameCraft">اسم الحرفة المقدمة</label>
                                        <input type="text" class="form-control" id="nameCraft" name="name">
                                        <?php if(isset($validation['name'])): ?>
                                            <p class="error-message"><?= $validation['name'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="category">نوع الحرفة</label>
                                        <select name="category" id="category" class="form-control">
                                            <option value="" disabled selected></option>
                                            <?php if(!empty($categories)): foreach($categories as $category): ?>
                                                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                            <?php endforeach; endif; ?>
                                        </select>
                                        <?php if(isset($validation['category'])): ?>
                                            <p class="error-message"><?= $validation['category'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="experience">الخبرة</label>
                                        <input type="text" class="form-control" id="experience" name="experience">
                                        <?php if(isset($validation['experience'])): ?>
                                            <p class="error-message"><?= $validation['experience'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="previous_jobs">اعمال سابقة</label>
                                        <input type="text" class="form-control" id="previous_jobs" name="previous_jobs">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="start_work">بدء الدوام</label>
                                        <select name="start_work" id="start_work" class="form-control">
                                            <option value="" disabled selected></option>
                                            <?php foreach($times as $time): ?>
                                                <option value="<?= $time ?>"><?= $time ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php if(isset($validation['start_work'])): ?>
                                            <p class="error-message"><?= $validation['start_work'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="end_work">انتهاء الدوام</label>
                                        <select name="end_work" id="end_work" class="form-control">
                                            <option value="" disabled selected></option>
                                            <?php foreach($times as $time): ?>
                                                <option value="<?= $time ?>"><?= $time ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php if(isset($validation['end_work'])): ?>
                                            <p class="error-message"><?= $validation['end_work'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="address">الموقع/العنوان</label>
                                        <input type="text" name="address" class="form-control" id="address">
                                        <?php if(isset($validation['address'])): ?>
                                            <p class="error-message"><?= $validation['address'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="user_id">صاحب الحرفة</label>
                                        <select name="user_id" id="user_id" class="form-control">
                                            <option value="" disabled selected></option>
                                            <?php if(!empty($users)): foreach($users as $user): $checkUser = $connect->prepare("SELECT * FROM crafts WHERE user_id = ?"); $checkUser->execute([$user['id']]); if(empty($checkUser->rowCount())): ?>
                                                <option value="<?= $user['id'] ?>"><?= $user['first_name'] ?></option>
                                            <?php endif; endforeach; endif; ?>
                                        </select>
                                        <?php if(isset($validation['user_id'])): ?>
                                            <p class="error-message"><?= $validation['user_id'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="phone_number">رقم الهاتف</label>
                                        <input type="text" name="phone_number" class="form-control" id="phone_number">
                                        <?php if(isset($validation['phone_number'])): ?>
                                            <p class="error-message"><?= $validation['phone_number'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="email">البريد الالكنروني</label>
                                        <input type="email" name="email" class="form-control" id="email">
                                        <?php if(isset($validation['email'])): ?>
                                            <p class="error-message"><?= $validation['email'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="notes">الملاحظات</label>
                                        <textarea  name="notes" class="form-control" id="notes"></textarea>
                                    </div>
                                </div>
                                <div>
                                    <div class="col-md-8">
                                        <div class="upload-add" id="upload-add-serves">
                                            <img src="https://placehold.co/300x300" alt="img-upload" class="rounded imguploadserves" id="imguploadserves">
                                        </div>
                                        <input name="image" type="file" onchange="readUrl(this)" class="inpfile" id="inpfile" style="display:none;">
                                        <label for="inpfile"class="input-files"><i class="fas fa-upload"></i>&nbsp;اضافة صورة</label>
                                        <?php if(isset($validation['image'])): ?>
                                            <p class="error-message"><?= $validation['image'] ?></p>
                                        <?php endif; ?>
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
        $titlePage = "تعديل الحرفة";
        include "include/header.php";
        include "include/nav.php";
        include "include/array.php";

        if(!isset($_GET['id']) && empty($_GET['id']))
            Redirect("users.php");

        $id = $_GET['id'];

        $stmt = $connect->prepare("SELECT * FROM crafts WHERE id = ?");
        $stmt->execute([$id]);
        $crafts = $stmt->fetch();

        if($user == false)
            Redirect("crafts.php");

            $stmtCateg = $connect->prepare("SELECT * FROM categories");
            $stmtCateg->execute();
            $categories = $stmtCateg->fetchAll();
    
            $stmtUser = $connect->prepare("SELECT * FROM `users` WHERE type_user = 'مقدم حرفة'");
            $stmtUser->execute();
            $users = $stmtUser->fetchAll();
    
            if(isset($_POST['Save'])) {
                $name = $_POST['name'];
                $experience = $_POST['experience'];
                $start_work = isset($_POST['start_work']) ? $_POST['start_work'] : "";
                $end_work = isset($_POST['end_work']) ? $_POST['end_work'] : "";
                $address = $_POST['address'];
                $previous_jobs = $_POST['previous_jobs'];
                $phone_number = $_POST['phone_number'];
                $email = $_POST['email'];
                $notes = $_POST['notes'];
                $category = isset($_POST['category']) ? $_POST['category'] : "";
                $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : "";
                $image = empty($_FILES['image']['name']) ? $crafts['image'] : $_FILES['image']['name'];
                
                $validation = validationCraft($_POST, $_FILES);

                if($validation === true) {
                    if($crafts['image'] != $image) {
                        move_uploaded_file($_FILES['image']['tmp_name'], "../img/$image");
                    }
                    $stmt = $connect->prepare("UPDATE crafts SET name = ?, experience = ?, start_work = ?, end_work = ?, address = ?, previous_jobs = ?, notes = ?, phone_number = ?, email = ?, category_id  = ?, user_id = ?, image = ? WHERE id = ?");
                    $result = $stmt->execute([$name, $experience, $start_work, $end_work, $address, $previous_jobs, $notes, $phone_number, $email, $category, $user_id, $image, $id]);
                    
                    if($result == true) {
                        $_SESSION['message'] = "تمت تعديل الحرفة بنجاح";
                        Redirect("crafts.php");
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
                                        <label for="nameCraft">اسم الحرفة المقدمة</label>
                                        <input type="text" class="form-control" id="nameCraft" name="name" value="<?= $crafts['name'] ?>">
                                        <?php if(isset($validation['name'])): ?>
                                            <p class="error-message"><?= $validation['name'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="category">نوع الحرفة</label>
                                        <select name="category" id="category" class="form-control">
                                            <?php if(!empty($categories)): foreach($categories as $category): ?>
                                                <option <?= $crafts['category_id'] == $category['id'] ? "selected" : "" ?> value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                            <?php endforeach; endif; ?>
                                        </select>
                                        <?php if(isset($validation['category'])): ?>
                                            <p class="error-message"><?= $validation['category'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="experience">الخبرة</label>
                                        <input type="text" class="form-control" id="experience" name="experience" value="<?= $crafts['experience'] ?>">
                                        <?php if(isset($validation['experience'])): ?>
                                            <p class="error-message"><?= $validation['experience'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="previous_jobs">اعمال سابقة</label>
                                        <input type="text" class="form-control" id="previous_jobs" name="previous_jobs" value="<?= $crafts['previous_jobs'] ?>">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="start_work">بدء الدوام</label>
                                        <select name="start_work" id="start_work" class="form-control">
                                            <?php foreach($times as $time): ?>
                                                <option <?= $crafts['start_work'] == $time ? "selected" : "" ?> value="<?= $time ?>"><?= $time ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php if(isset($validation['start_work'])): ?>
                                            <p class="error-message"><?= $validation['start_work'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="end_work">انتهاء الدوام</label>
                                        <select name="end_work" id="end_work" class="form-control">
                                            <?php foreach($times as $time): ?>
                                                <option <?= $crafts['end_work'] == $time ? "selected" : "" ?> value="<?= $time ?>"><?= $time ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php if(isset($validation['end_work'])): ?>
                                            <p class="error-message"><?= $validation['end_work'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="address">الموقع/العنوان</label>
                                        <input type="text" name="address" class="form-control" id="address" value="<?= $crafts['address'] ?>">
                                        <?php if(isset($validation['address'])): ?>
                                            <p class="error-message"><?= $validation['address'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="user_id">صاحب الحرفة</label>
                                        <select name="user_id" id="user_id" class="form-control">
                                            <?php if(!empty($users)): foreach($users as $user): $checkUser = $connect->prepare("SELECT * FROM crafts WHERE user_id = ?"); $checkUser->execute([$user['id']]); if(empty($checkUser->rowCount()) || $crafts['user_id'] == $user['id']): ?>
                                                <option <?= $crafts['user_id'] == $user['id'] ? "selected" : "" ?> value="<?= $user['id'] ?>"><?= $user['first_name'] ?></option>
                                            <?php endif; endforeach; endif; ?>
                                        </select>
                                        <?php if(isset($validation['user_id'])): ?>
                                            <p class="error-message"><?= $validation['user_id'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="phone_number">رقم الهاتف</label>
                                        <input type="text" name="phone_number" class="form-control" id="phone_number" value="<?= $crafts['phone_number'] ?>">
                                        <?php if(isset($validation['phone_number'])): ?>
                                            <p class="error-message"><?= $validation['phone_number'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="email">البريد الالكنروني</label>
                                        <input type="email" name="email" class="form-control" id="email" value="<?= $crafts['email'] ?>">
                                        <?php if(isset($validation['email'])): ?>
                                            <p class="error-message"><?= $validation['email'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="notes">الملاحظات</label>
                                        <textarea  name="notes" class="form-control" id="notes"><?= $crafts['notes'] ?></textarea>
                                    </div>
                                </div>
                                <div>
                                    <div class="col-md-8">
                                        <div class="upload-add" id="upload-add-serves">
                                            <img src="../img/<?= $crafts['image'] ?>" alt="img-upload" class="rounded imguploadserves" id="imguploadserves">
                                        </div>
                                        <input name="image" type="file" onchange="readUrl(this)" class="inpfile" id="inpfile" style="display:none;">
                                        <label for="inpfile"class="input-files"><i class="fas fa-upload"></i>&nbsp;اضافة صورة</label>
                                        <?php if(isset($validation['image'])): ?>
                                            <p class="error-message"><?= $validation['image'] ?></p>
                                        <?php endif; ?>
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
            Redirect("crafts.php");

        $id = $_GET['id'];
        
        $stmt = $connect->prepare("SELECT * from crafts WHERE id = ?");
        $stmt->execute(array($id));
        $getUsers = $stmt->fetch();

        if($getUsers == false)
            Redirect("crafts.php");

        $stmt = $connect->prepare("DELETE FROM crafts WHERE id = ? LIMIT 1");
        $result = $stmt->execute(array($id));

        if($result == true) {
            $_SESSION['message'] = "تم حذف الحرفة بنجاح";
            Redirect("crafts.php");
        }

    }else{
        Redirect("crafts.php");
    }

?>


<?php include "include/footer.php"; ?>