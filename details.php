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

    if(isset($_SESSION['ID'])){
        $stmt2 = $connect->prepare("SELECT * FROM rating WHERE craft_id = ? AND user_id = ?");
        $stmt2->execute([$id, $_SESSION['ID']]);
        $rating = $stmt2->fetch();
    }
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
                                <?php if(isset($_SESSION['ID']) && $_SESSION['type'] == "مواطن"): ?>
                                <div class="name">
                                    <div id="<?= $id ?>" class="rating rating2"><!--
                                        --><a id="5" class="ratingJS <?= $rating['number_ratings'] == 5 ? "select" : "" ?>"  title="Give 5 stars">★</a><!--
                                        --><a id="4" class="ratingJS <?= $rating['number_ratings'] == 4 ? "select" : "" ?>" ij title="Give 4 stars">★</a><!--
                                        --><a id="3" class="ratingJS <?= $rating['number_ratings'] == 3 ? "select" : "" ?>" ij title="Give 3 stars">★</a><!--
                                        --><a id="2" class="ratingJS <?= $rating['number_ratings'] == 2 ? "select" : "" ?>" ij title="Give 2 stars">★</a><!--
                                        --><a id="1" class="ratingJS <?= $rating['number_ratings'] == 1 ? "select" : "" ?>" ij title="Give 1 stars">★</a>
                                            <p dir="ltr" class="rating-text"></p>
                                    </div>
                                    <h3 class="title"><?= $crafts['name'] ?></h3>
                                </div>
                                <?php endif; ?>
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