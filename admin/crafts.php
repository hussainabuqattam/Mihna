<?php
    $titlePage = "الحرف في الموقع";
    include "include/init.php";
    include "include/header.php";
    include "include/nav.php";

    if(!isset($_SESSION['admin-ID']))
        Redirect("login.php");

    $stmt = $connect->prepare("SELECT crafts.*, users.first_name as NameOwner FROM crafts INNER JOIN users ON users.id = crafts.user_id");
    $stmt->execute();
    $crafts = $stmt->fetchAll();
?>


<div class="wraper">
	<div class="container">
        <?php if(isset($_SESSION['message'])): ?>
            <p class="alert alert-success mt-4"><strong><?= $_SESSION['message'] ?></strong></p>
        <?php unset($_SESSION['message']); endif; ?>
        <div class="tabels-admin">
            <div class="row ml-4 pr-4">
                <div class="col-6 pt-3">
                    <strong class="title-page"><?= $titlePage ?></strong>
                </div>
                <div class="col-6 text-left">
                    <a href="action_craft.php?action=add" class="btn app-btn mt-3 mb-3"><i class="fas fa-plus"></i> إضافة حرفة</a>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">اسم الحرفة</th>
                        <th scope="col">وقت العمل</th>
                        <th scope="col">عنوان العمل</th>
                        <th scope="col">البريد الالكتروني</th>
                        <th scope="col">رقم الهاتف</th>
                        <th scope="col">اسم المالك</th>
                        <th scope="col">التحكم</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php if(!empty($crafts)): ?>
                            <?php foreach($crafts as $craft): ?>
                                <tr>
                                    <th scope="row"><?= $craft['id'] ?></th>
                                    <td><?= $craft['name'] ?></td>
                                    <td style="direction: ltr;"><?= $craft['start_work'] . " - " . $craft['end_work'] ?></td>
                                    <td><?= $craft['address'] ?></td>
                                    <td><?= $craft['email'] ?></td>
                                    <td><?= $craft['phone_number'] ?></td>
                                    <td><?= $craft['NameOwner'] ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-danger" href="action_craft.php?action=delete&id=<?= $craft['id'] ?>"><i class="far fa-trash-alt"></i></a>
                                        <a class="btn btn-sm btn-success" href="action_craft.php?action=edit&id=<?= $craft['id'] ?>"><i class="far fa-edit"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
            </table>
        </div>
	</div>
</div>

<?php include "include/footer.php"; ?>
