<?php
    $titlePage = "تواصل معنا";
    include "include/init.php";
    include "include/header.php";
    include "include/nav.php";

    if(!isset($_SESSION['admin-ID']))
        Redirect("login.php");

    $stmt = $connect->prepare("SELECT * FROM contact");
    $stmt->execute();
    $contacts = $stmt->fetchAll();
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
                        <th scope="col">الاسم</th>
                        <th scope="col">البريد الالكتروني</th>
                        <th scope="col">الرسالة</th>
                        <th scope="col">التحكم</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php if(!empty($contacts)): ?>
                            <?php foreach($contacts as $contact): ?>
                                <tr>
                                    <th scope="row"><?= $contact['id'] ?></th>
                                    <td><?= $contact['name'] ?></td>
                                    <td><?= $contact['email'] ?></td>
                                    <td><?= $contact['message'] ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-danger" href="action_contact.php?action=delete&id=<?= $contact['id'] ?>"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                                <td colspan="5" class="text-center">لا يوجد رسائل</td>
                        <?php endif; ?>
                    </tbody>
            </table>
        </div>
	</div>
</div>

<?php include "include/footer.php"; ?>
