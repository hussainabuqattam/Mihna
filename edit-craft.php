<?php 

    $titlePage = "Edit Craft";
    include "include/init.php";
    include "include/header.php";

    include "include/nav.php";

    if(!isset($_SESSION['ID']) || $_SESSION['type'] != "craft presenter") {
        Redirect("index.php");
    }

    if(!isset($_GET['id']) || empty($_GET['id'])) {
        Redirect("index.php");
    }

    $id = $_GET['id'];

    $stmt = $connect->prepare("SELECT * FROM crafts WHERE id = ?");
    $stmt->execute([$id]);
    $craft = $stmt->fetch();

    if($craft['user_id'] != $_SESSION['ID']) {
        Redirect("index.php");
    }

    $stmt1 = $connect->prepare("SELECT * FROM categories");
    $stmt1->execute([]);
    $categories = $stmt1->fetchAll();

    if(isset($_POST['Save'])) {
        $name = $_POST['name'];
        $experience = $_POST['experience'];
        $start_work = $_POST['start_work'];
        $end_work = $_POST['end_work'];
        $address = $_POST['address'];
        $previous_jobs = $_POST['previous_jobs'];
        $notes = $_POST['notes'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['email'];
        $image = empty($_FILES['image']['name']) ? $craft['image'] : $_FILES['image']['name'];
        $IDcategory = $_POST['category']; 

        $validation = validationCraft($_POST);

        

        if($validation === true) {
            move_uploaded_file($_FILES['image']['tmp_name'], "img/$image");
            $stmt = $connect->prepare("UPDATE crafts SET name = ?, experience = ?, start_work = ?, 
                                            end_work = ?, address = ?, previous_jobs = ?, notes = ?, 
                                            phone_number = ?, email = ?, category_id = ?, user_id = ?, 
                                            image = ? WHERE id = ?");

            $result = $stmt->execute([$name, $experience, $start_work, $end_work, $address, $previous_jobs, $notes, $phone_number, $email, $IDcategory, $_SESSION['ID'], $image, $id]);

            if($result == true) {
                Redirect("details.php?id=" . $id);
            }

        }
    }

    include "include/array.php"

?>
    <div class="testbox">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="banner">
              <h1>تعديل حرفة</h1>
            </div>
            <div class="item">
                <label for="name">اسم الحرفة المقدمة :</label>
                <input id="name" type="text" name="name" required value="<?= $craft['name'] ?>" />
                <?php if(isset($validation['name'])): ?>
                    <span class="error-validation"><?= $validation['name'] ?></span>
                <?php endif; ?>
            </div>
            <div class="item">
                <label>نوع الحرفة المقدمة :</label>
                <select class="custom-select" id="validationTooltip04"  style="width:99%" required name="category">
                    <option selected value="" disabled selected>نوع الحرفة</option>
                    <?php if(!empty($categories)): foreach($categories as $category): ?>
                        <option value="<?= $category['id'] ?>" <?= $category['id'] == $craft['category_id'] ? "selected" : "" ?> ><?= $category['name'] ?></option>
                    <?php endforeach; endif; ?>
                </select>
            </div>
            <div class="item">
                <label for="email">الخبرة :</label>
                <input id="email" type="text" name="experience" required value="<?= $craft['experience'] ?>"/>
                <?php if(isset($validation['experience'])): ?>
                    <span class="error-validation"><?= $validation['experience'] ?></span>
                <?php endif; ?>
            </div>
            <div class="item">
                <label for="attendees">ساعات الدوام:</label>
                <div class="flax">
                <div class="item">
                    <p>بدء الدوام</p>
                    <select name="start_work">
                        <option selected value="" disabled selected></option>
                        <?php foreach($times as $time): ?>
                            <option <?= $time == $craft['start_work'] ? "selected" : "" ?> value="<?= $time ?>"><?= $time ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if(isset($validation['start_work'])): ?>
                        <span class="error-validation"><?= $validation['start_work'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="item">
                    <p>انتهاء الدوام</p>
                    <select name="end_work">
                        <option selected value="" disabled selected></option>
                        <?php foreach($times as $time): ?>
                            <option <?= $time == $craft['end_work'] ? "selected" : "" ?> value="<?= $time ?>"><?= $time ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if(isset($validation['end_work'])): ?>
                        <span class="error-validation"><?= $validation['end_work'] ?></span>
                    <?php endif; ?>
                </div>
            </div>
            </div>
            <div class="item">
                <label for="position">الموقع/العنوان :</label>
                <input id="position" type="text" name="address" required value="<?= $craft['address'] ?>" />
                <?php if(isset($validation['address'])): ?>
                    <span class="error-validation"><?= $validation['address'] ?></span>
                <?php endif; ?>
            </div>
            <div class="item">
                <label for="department">اعمال سابقة :</label>
                <input id="department" type="text" name="previous_jobs" value="<?= $craft['previous_jobs'] ?>" />
            </div>
            <div class="item">
                <label for="department">الملاحظات :</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="notes" rows="3"><?= $craft['notes'] ?></textarea>
            </div>
            <div class="item">
                <label for="phone">رقم الهاتف :</label>
                <input id="phone" type="text" name="phone_number" required class="inputdirection" value="<?= $craft['phone_number'] ?>"/>
                <?php if(isset($validation['phone_number'])): ?>
                    <span class="error-validation"><?= $validation['phone_number'] ?></span>
                <?php endif; ?>
            </div>
            <div class="item">
                <label for="email">البريد الالكنروني :</label>
                <input id="email" type="email" name="email" required  class="inputdirection" value="<?= $craft['email'] ?>"/>
                <?php if(isset($validation['email'])): ?>
                    <span class="error-validation"><?= $validation['email'] ?></span>
                <?php endif; ?>
            </div>
            <label for="exampleFormControlFile1">صورة الحرفة :</label>
                <div>
                    <div class="upload-add" id="upload-add-serves">
                        <img src="img/<?= $craft['image'] ?>" alt="img-upload" class="rounded imguploadserves" id="imguploadserves">
                    </div>
                    <input name="image" type="file" onchange="readUrl(this)" class="inpfile" id="inpfile" style="display:none;">
                    <label for="inpfile"class="input-files"><i class="fas fa-upload"></i>&nbsp;اضافة صورة</label>
                </div>
                <?php if(isset($validation['image'])): ?>
                    <span class="error-validation"><?= $validation['image'] ?></span>
                <?php endif; ?>
                <hr>
            <div class="btn-block">
              <button type="submit" name="Save">تعديل الحرفة</button>
            </div>
        </form>
    </div>
<?php include "include/footer.php";?>
