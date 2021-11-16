<?php 

    $titlePage = "Add Craft";
    include "include/init.php";
    include "include/header.php";

    include "include/nav.php";

    if(!isset($_SESSION['ID']) || $_SESSION['type'] != "مقدم حرفة") {
        Redirect("index.php");
    }

    $stmt = $connect->prepare("SELECT * FROM crafts WHERE user_id = ?");
    $stmt->execute([$_SESSION['ID']]);
    $craft = $stmt->rowCount();

    if($craft > 0) {
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
        $image = $_FILES['image']['name'];
        $IDcategory = $_POST['category']; 

        $validation = validationCraft($_POST, $_FILES);

        if($validation === true) {
            move_uploaded_file($_FILES['image']['tmp_name'], "img/$image");
            $stmt = $connect->prepare("INSERT INTO crafts SET name = ?, experience = ?, start_work = ?, 
                                            end_work = ?, address = ?, previous_jobs = ?, notes = ?, 
                                            phone_number = ?, email = ?, category_id = ?, user_id = ?, 
                                            image = ?");

            $result = $stmt->execute([$name, $experience, $start_work, $end_work, $address, $previous_jobs, $notes, $phone_number, $email, $IDcategory, $_SESSION['ID'], $image]);

            if($result == true) {
                Redirect("index.php");
            }

        }
    }

    include "include/array.php"

?>
    <div class="testbox">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="banner">
              <h1>أضافة حرفة</h1>
            </div>
            <div class="item">
                <label for="name">اسم الحرفة المقدمة :</label>
                <input id="name" type="text" name="name" required />
                <?php if(isset($error['name'])): ?>
                    <span class="error-validation"><?= $error['name'] ?></span>
                <?php endif; ?>
            </div>
            <div class="item">
                <label>نوع الحرفة المقدمة :</label>
                <select class="custom-select" id="validationTooltip04"  style="width:99%" required name="category">
                    <option selected value="" disabled selected>نوع الحرفة</option>
                    <?php if(!empty($categories)): foreach($categories as $category): ?>
                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                    <?php endforeach; endif; ?>
                </select>
            </div>
            <div class="item">
                <label for="email">الخبرة :</label>
                <input id="email" type="text" name="experience" required/>
                <?php if(isset($error['experience'])): ?>
                    <span class="error-validation"><?= $error['experience'] ?></span>
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
                            <option value="<?= $time ?>"><?= $time ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if(isset($error['start_work'])): ?>
                        <span class="error-validation"><?= $error['start_work'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="item">
                    <p>انتهاء الدوام</p>
                    <select name="end_work">
                        <option selected value="" disabled selected></option>
                        <?php foreach($times as $time): ?>
                            <option value="<?= $time ?>"><?= $time ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if(isset($error['end_work'])): ?>
                        <span class="error-validation"><?= $error['end_work'] ?></span>
                    <?php endif; ?>
                </div>
            </div>
            </div>
            <div class="item">
                <label for="position">الموقع/العنوان :</label>
                <input id="position" type="text" name="address" required />
                <?php if(isset($error['address'])): ?>
                    <span class="error-validation"><?= $error['address'] ?></span>
                <?php endif; ?>
            </div>
            <div class="item">
                <label for="department">اعمال سابقة :</label>
                <input id="department" type="text" name="previous_jobs" />
            </div>
            <div class="item">
                <label for="department">الملاحظات :</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="notes" rows="3"></textarea>
            </div>
            <div class="item">
                <label for="phone">رقم الهاتف :</label>
                <input id="phone" type="text" name="phone_number" required class="inputdirection" />
                <?php if(isset($error['phone_number'])): ?>
                    <span class="error-validation"><?= $error['phone_number'] ?></span>
                <?php endif; ?>
            </div>
            <div class="item">
                <label for="email">البريد الالكنروني :</label>
                <input id="email" type="email" name="email" required  class="inputdirection"/>
                <?php if(isset($error['email'])): ?>
                    <span class="error-validation"><?= $error['email'] ?></span>
                <?php endif; ?>
            </div>
            <label for="exampleFormControlFile1">صورة الحرفة :</label>
                <div>
                    <div class="upload-add" id="upload-add-serves">
                        <img src="https://placehold.co/300x300" alt="img-upload" class="rounded imguploadserves" id="imguploadserves">
                    </div>
                    <input name="image" type="file" onchange="readUrl(this)" class="inpfile" id="inpfile" style="display:none;">
                    <label for="inpfile"class="input-files"><i class="fas fa-upload"></i>&nbsp;اضافة صورة</label>
                </div>
                <?php if(isset($error['image'])): ?>
                    <span class="error-validation"><?= $error['image'] ?></span>
                <?php endif; ?>
                <hr>
            <div class="btn-block">
              <button type="submit" name="Save">اضافة الحرفة</button>
            </div>
        </form>
    </div>
<?php include "include/footer.php";?>
