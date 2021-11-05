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
                            <a href="#" class="btn btn-primary">التفاصيل</a>
                        </div>
                    </div>
                </div>
            <?php  endforeach; else: ?>
                
            <?php endif; ?>
        </div>
    </div> 
</div>


<?php include "include/footer.php"; ?>
