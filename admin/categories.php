<?php
    $titlePage = "الحرف المقدمة";
    include "include/init.php";
    include "include/header.php";
    include "include/nav.php";

    if(!isset($_SESSION['admin-ID']))
        Redirect("login.php");

    $stmt = $connect->prepare("SELECT * FROM categories");
    $stmt->execute();
    $categories = $stmt->fetchAll();
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
                    <a href="action_category.php?action=add" class="btn app-btn mt-3 mb-3"><i class="fas fa-plus"></i> إضافة حرفة مقدمة</a>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">الاسم</th>
                        <th scope="col">التحكم</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php if(!empty($categories)): ?>
                            <?php foreach($categories as $category): ?>
                                <tr>
                                    <th scope="row"><?= $category['id'] ?></th>
                                    <td><?= $category['name'] ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-danger" href="action_category.php?action=delete&id=<?= $category['id'] ?>"><i class="far fa-trash-alt"></i></a>
                                        <a class="btn btn-sm btn-success" href="action_category.php?action=edit&id=<?= $category['id'] ?>"><i class="far fa-edit"></i></a>
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
