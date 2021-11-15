 <?php
   $titlePage = "details";
   include "include/init.php";
   include "include/header.php";
   include "include/nav.php";

   if(!isset($_GET['id']) || empty($_GET['id']))
        Redirect("index.php");


    $id = $_GET['id'];
    $stmt = $connect->prepare("SELECT crafts.*, categories.name as categoryName FROM crafts INNER JOIN categories ON categories.id = crafts.category_id WHERE crafts.id = ?");
    $stmt->execute([$id]);
    $crafts = $stmt->fetch();

 ?>
    <div class="profile-page">
        <div class="page-header header-filter" style="background-color:#cccccc87;"></div>
        <div class="main main-raised">
            <div class="profile-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 ml-auto mr-auto">
                           <div class="profile">
                                <div class="container-img-details">
                                    <img src="img/<?= $crafts['image'] ?>" alt="Circle Image" class="img-raised">
                                </div>
                                <div class="name">
                                    <div class="rating rating2"><!--
                                        --><a href="#5" title="Give 5 stars">★</a><!--
                                        --><a href="#4" title="Give 4 stars">★</a><!--
                                        --><a href="#3" title="Give 3 stars">★</a><!--
                                        --><a href="#2" title="Give 2 stars">★</a><!--
                                        --><a href="#1" title="Give 1 star">★</a>
                                    </div>
                                    <h3 class="title"><?= $crafts['name'] ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="description text-center">
                        <p><?= $crafts['notes'] ?></p>
                    </div>
                      <!--details box-->
                       <div class="container">
                           <div class="row">
                           <div class="col-md-3">
                                   <div class="card details-containers">
                                     <div class="card-header details-header">الحرفة المقدمة</div>
                                            <div class="card-body details-body">
                                                <p class="card-text"><?= $crafts['categoryName'] ?></p>
                                            </div>
                                     </div>
                               </div>
                               <div class="col-md-3">
                                   <div class="card details-containers">
                                     <div class="card-header details-header">الموقع/العنوان</div>
                                            <div class="card-body details-body">
                                                <p class="card-text"><?= $crafts['address'] ?></p>
                                            </div>
                                     </div>
                               </div>
                               <div class="col-md-3">
                                   <div class="card  details-containers">
                                     <div class="card-header details-header">ساعات الدوام</div>
                                            <div class="card-body details-body">
                                                <p class="card-text inputdirection text-center">(<?= $crafts['start_work'] ?> - <?= $crafts['end_work'] ?>)</p>
                                            </div>
                                     </div>
                               </div>
                               <div class="col-md-3">
                                   <div class="card  details-containers">
                                     <div class="card-header details-header">اعمال سابقة</div>
                                            <div class="card-body details-body">
                                                <p class="card-text"><?= empty($crafts['previous_jobs']) ? "لا يوجد" : $crafts['previous_jobs'] ?></p>
                                            </div>
                                     </div>
                               </div>
                               <div class="col-md-3">
                                   <div class="card  details-containers">
                                     <div class="card-header details-header">الخبرة</div>
                                            <div class="card-body details-body">
                                                <p class="card-text"><?= $crafts['experience'] ?></p>
                                            </div>
                                     </div>
                               </div>
                               <div class="col-md-3">
                                   <div class="card  details-containers">
                                     <div class="card-header details-header">البريد ألكتروني</div>
                                            <div class="card-body details-body">
                                                <p class="card-text"><?= $crafts['email'] ?></p>
                                            </div>
                                     </div>
                               </div>
                               <div class="col-md-3">
                                   <div class="card  details-containers">
                                     <div class="card-header details-header">رقم الهاتف</div>
                                            <div class="card-body details-body">
                                                <p class="card-text"><?= $crafts['phone_number'] ?></p>
                                            </div>
                                     </div>
                               </div>
                           </div>
                       </div>
                      <!-- details box-->
                    <?php if(isset($_SESSION['ID']) && $crafts['user_id'] == $_SESSION['ID']): ?>
                        <div class="edit-profile-details">
                            <a href="delete-craft.php?id=<?= $crafts['id'] ?>" type="button" class="btn btn-danger">حذف الحرفة</a>
                            <a href="edit-craft.php?id=<?= $crafts['id'] ?>" type="button" class="btn btn-success">تعديل الحرفة</a>
                        </div>
                    <?php endif; ?>
           </div>
     </div>
</div>
  
<?php include "include/footer.php"; ?>