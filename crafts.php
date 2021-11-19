<?php 
        $titlePage = "Crafts";
        include "include/init.php";
        include "include/header.php";
        include "include/nav.php";

        if(!isset($_GET['id']) || empty($_GET['id']))
            Redirect("categories.php");

        $id = $_GET['id'];

        $stmt = $connect->prepare("SELECT * FROM categories WHERE id = ?");
        $result = $stmt->execute([$id]);
        $category = $stmt->fetch();

        if($category == false) {
            Redirect("categories.php");
        }



        $stmt = $connect->prepare("SELECT * FROM crafts WHERE category_id = ?");
        $stmt->execute([$id]);
        $crafts = $stmt->fetchAll();

?>

<div class="container sections-craft">
      <h1 class="title-sections-craft"><?= $category['name'] ?></h1>
      <hr class="hr">
       <div class="mihna-user">
        <div class="row">
            <?php if(!empty($crafts)): foreach($crafts as $craft): ?>
                <?php   $stmt2 = $connect->prepare("SELECT * FROM rating WHERE craft_id = ?");
                        $stmt2->execute([$craft['id']]);
                        $ratings = $stmt2->fetchAll();
                        $sumRating = 0;
                        foreach($ratings as $rating) {
                            $sumRating += $rating['number_ratings'];
                        }
                        
                        $numberpeople = count($ratings);
                        $avarage = $numberpeople != 0 ?  floor($sumRating / count($ratings)) : $sumRating;
                ?>
                <div class="col-md-4">
                    <div class="card box-mihna-user">
                        <img src="img/<?= $craft['image'] ?>" class="card-img-top img-mihna-user">
                        <div class="card-body pt-0" style="padding-top: 9px !important ;">
                            <h5 class="card-title"><?= $craft['name'] ?></h5>
                            <p class="card-text"><?= $craft['notes'] ?></p>
                            <div class="row">
                                <div class="col-3">
                                    <a href="details.php?id=<?= $craft['id'] ?>" class="details-section-btn">التفاصيل</a>
                                </div>
                                <div class="col-9">
                                    <div class="rating col-12 pl-0 rating-show"><!--
                                    --><a href="details.php?id=<?= $craft['id'] ?>" class="<?= $avarage == 5 ? "select" : "" ?>" title="Give 5 stars">★</a><!--
                                    --><a href="details.php?id=<?= $craft['id'] ?>" class="<?= $avarage == 4 ? "select" : "" ?>" title="Give 4 stars">★</a><!--
                                    --><a href="details.php?id=<?= $craft['id'] ?>" class="<?= $avarage == 3 ? "select" : "" ?>" title="Give 3 stars">★</a><!--
                                    --><a href="details.php?id=<?= $craft['id'] ?>" class="<?= $avarage == 2 ? "select" : "" ?>" title="Give 2 stars">★</a><!--
                                    --><a href="details.php?id=<?= $craft['id'] ?>" class="<?= $avarage == 1 ? "select" : "" ?>" title="Give 1 star">★</a>
                                    </div>
                                    <div class="col-12 text-left float-left pl-2 numberRating">(<?= $numberpeople ?>)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php  endforeach; else: ?>
               <span style="width:100%;text-align:center;font-size:20px;font-family: inherit;font-weight: 600;color: #aaa;"><i class="fas fa-exclamation-triangle" style="margin-left: 10px;color: #ff0000b5;"></i>لا يوجد اي حرفة مقدمة</span>
            <?php endif; ?>
        </div>
    </div> 
</div>


<?php include "include/footer.php"; ?>
