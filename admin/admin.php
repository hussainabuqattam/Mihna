<?php
    $titlePage = "مشرف النظام";
    include "include/init.php";
    include "include/header.php";
    include "include/nav.php";

    if(!isset($_SESSION['admin-ID']))
        Redirect("login.php");

    $stmt = $connect->prepare("SELECT * FROM admin");
    $stmt->execute();
    $admins = $stmt->fetchAll();
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
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">الاسم الاول</th>
                        <th scope="col">الاسم الاخير</th>
                        <th scope="col">البريد الالكتروني</th>
                        <th scope="col">نوع المستخدم</th>
                        <th scope="col">التحكم</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php if(!empty($admins)): ?>
                            <?php foreach($admins as $admin): ?>
                                <tr>
                                    <th scope="row"><?= $admin['id'] ?></th>
                                    <td><?= $admin['first_name'] ?></td>
                                    <td><?= $admin['last_name'] ?></td>
                                    <td><?= $admin['email'] ?></td>
                                    <td><?= $admin['type_user'] ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-danger" href="action_admin.php?action=delete&id=<?= $admin['id'] ?>"><i class="far fa-trash-alt"></i></a>
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
