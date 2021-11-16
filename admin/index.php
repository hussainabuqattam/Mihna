<?php
    $titlePage = "لوحة التحكم";
    include "include/init.php";
    include "include/header.php";
    include "include/nav.php";

    if(!isset($_SESSION['admin-ID']))
        Redirect("login.php");

    $stmt = $connect->prepare("SELECT * FROM users");
    $stmt->execute();
    $users = $stmt->rowCount();

    $stmt2 = $connect->prepare("SELECT * FROM categories");
    $stmt2->execute();
    $categories = $stmt2->rowCount();

    $stmt3 = $connect->prepare("SELECT * FROM crafts");
    $stmt3->execute();
    $crafts = $stmt3->rowCount();

    $stmt4 = $connect->prepare("SELECT * FROM contact");
    $stmt4->execute();
    $contacts = $stmt4->rowCount();
?>
 <div class="wraper">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="widget navy-bg">
                    <div class="row-fluid">
                        <div class="span4">
                            <i class="icon icon-search icon-white"></i>
                        </div>
                        <div class="span8 text-right">
                            <span>المستخدمين</span>
                            <h2 class="font-bold"><?= $users ?></h2>
                        </div>
                    </div>  
                </div>
            </div>
            <div class="col-md-3">
                <div class="widget lazur-bg">
                    <div class="row-fluid">
                        <div class="span4">
                            <i class="icon icon-search icon-white"></i>
                        </div>
                        <div class="span8 text-right">
                            <span>الحرف المقدمة</span>
                            <h2 class="font-bold"><?= $categories ?></h2>
                        </div>
                    </div>  
                </div>
            </div>
            <div class="col-md-3">
                <div class="widget yellow-bg">
                    <div class="row-fluid">
                        <div class="span4">
                            <i class="icon icon-search icon-white"></i>
                        </div>
                        <div class="span8 text-right">
                            <span>الحرف في الموقق</span>
                            <h2 class="font-bold"><?= $crafts ?></h2>
                        </div>
                    </div>  
                </div>
            </div>
            <div class="col-md-3">
                <div class="widget bg-danger">
                    <div class="row-fluid">
                        <div class="span4">
                            <i class="icon icon-search icon-white"></i>
                        </div>
                        <div class="span8 text-right">
                            <span>الرسائل</span>
                            <h2 class="font-bold"><?= $contacts ?></h2>
                        </div>
                    </div>  
                </div>
            </div>
            <div class="col-md-12">
                <div id="piechart" style="margin:auto; width: 900px; height: 500px;"></div>
            </div>
        </div>
    </div>
</div>
<?php include "include/footer.php"; ?>
<script>

//chart
google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Language', 'Speakers (in millions)'],
          ['German',  5.85],
          ['French',  1.66],
          ['Italian', 0.316],
          ['Romansh', 0.0791]
        ]);

      var options = {
        legend: 'none',
        pieSliceText: 'label',
        title: 'Swiss Language Use (100 degree rotation)',
        pieStartAngle: 100,
      };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }

</script>
