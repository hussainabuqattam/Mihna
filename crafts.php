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
                <div class="col-md-4">
                    <div class="card box-mihna-user">
                        <img src="img/<?= $craft['image'] ?>" class="card-img-top img-mihna-user">
                        <div class="card-body">
                            <h5 class="card-title"><?= $craft['name'] ?></h5>
                            <p class="card-text"><?= $craft['notes'] ?></p>	
                            <a href="details.php?id=<?= $craft['id'] ?>" class="details-section-btn">التفاصيل</a>
                            <div class="rating rating2"><!--
                                --><a href="#5" title="Give 5 stars">★</a><!--
                                --><a href="#4" title="Give 4 stars">★</a><!--
                                --><a href="#3" title="Give 3 stars">★</a><!--
                                --><a href="#2" title="Give 2 stars">★</a><!--
                                --><a href="#1" title="Give 1 star">★</a>
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
