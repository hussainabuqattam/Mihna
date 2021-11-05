<?php 
      $titlePage = "Categories";
      include "include/init.php";
      include "include/header.php";
      include "include/nav.php";

      $stmt = $connect->prepare("SELECT * FROM categories");
      $stmt->execute([]);
      $categories = $stmt->fetchAll();

?>
<div class="container" style="margin-top:50px;">
    <?php if(!empty($categories)): foreach($categories as $category): ?>
      <figure class="snip1573"><img src="img/<?= $category['image'] ?>" alt="حرف منزلية"/>
        <figcaption>
          <h3><a href="crafts.php?id=<?= $category['id'] ?>"><?= $category['name'] ?></a></h3>
        </figcaption>
      </figure>
    <?php endforeach; endif; ?>
</div>
<?php include "include/footer.php"; ?>
<script>
  $(".hover").mouseleave(
  function () {
    $(this).removeClass("hover");
  }
);
</script>
