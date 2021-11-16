<?php
    $titlePage = "المستخدمين";
    include "include/init.php";
    include "include/header.php";
    include "include/nav.php";

    if(!isset($_SESSION['admin-ID']))
        Redirect("login.php");

    $stmt = $connect->prepare("SELECT * FROM users");
    $stmt->execute();
    $users = $stmt->fetchAll();
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
                    <a href="action_user.php?action=add" class="btn app-btn mt-3 mb-3"><i class="fas fa-plus"></i> إضافة مستخدم</a>
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
                        <?php if(!empty($users)): ?>
                            <?php foreach($users as $user): ?>
                                <tr>
                                    <th scope="row"><?= $user['id'] ?></th>
                                    <td><?= $user['first_name'] ?></td>
                                    <td><?= $user['last_name'] ?></td>
                                    <td><?= $user['email'] ?></td>
                                    <td><?= $user['type_user'] ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-danger" href="action_user.php?action=delete&id=<?= $user['id'] ?>"><i class="far fa-trash-alt"></i></a>
                                        <a class="btn btn-sm btn-success" href="action_user.php?action=edit&id=<?= $user['id'] ?>"><i class="far fa-edit"></i></a>
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
