<?php 
      include "include/header.php";
      include "include/nav.php";
?>
<div class="container" style="margin-top:50px;">
    <figure class="snip1573">
      <img src="layout/img/pexels-anna-shvets-5711901.jpg" alt="نجار"/>
      <figcaption>
        <h3><a href="#">حرفة النجارة</a></h3>
      </figcaption>
    </figure>
    <figure class="snip1573 hover"><img src="layout/img/pexels-luis-quintero-1659748.jpg" alt="حداد"/>
      <figcaption>
        <h3><a href="#">حرفة الحدادة</a></h3>
      </figcaption>
    </figure>
    <figure class="snip1573"><img src="layout/img/pexels-luis-gomes-546819.jpg" alt="مبرمج"/>
      <figcaption>
        <h3><a href="#">مبرمج</a></h3>
      </figcaption>
    </figure>
    <figure class="snip1573"><img src="layout/img/pexels-andrea-piacquadio-3769740.jpg" alt="عامل منازل"/>
      <figcaption>
        <h3><a href="#">عامل منازل</a></h3>
      </figcaption>
    </figure>
    <figure class="snip1573"><img src="layout/img/pexels-pavel-danilyuk-7937299.jpg" alt="سباك"/>
      <figcaption>
        <h3><a href="#">حرفة السباكة</a></h3>
      </figcaption>
    </figure>
    <figure class="snip1573"><img src="layout/img/pexels-flora-westbrook-4191618.jpg" alt="حرف منزلية"/>
      <figcaption>
        <h3><a href="#">حرف منزلية</a></h3>
      </figcaption>
    </figure>
</div>
<?php include "include/footer.php"; ?>
<script>
  $(".hover").mouseleave(
  function () {
    $(this).removeClass("hover");
  }
);
</script>
