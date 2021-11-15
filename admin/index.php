<?php
    include "include/init.php";
    include "include/header.php";
    include "include/nav.php";
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
                        <span>Test 1</span>
                        <h2 class="font-bold">
                        0
                        </h2>
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
                        <span>Test 1</span>
                        <h2 class="font-bold">
                        0
                        </h2>
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
                        <span>Test 1</span>
                        <h2 class="font-bold">
                        0
                        </h2>
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
                        <span>Test 1</span>
                        <h2 class="font-bold">
                        1231
                        </h2>
                    </div>
                    </div>  
                </div>
                </div>
                <!--tabel-->
                <div class="col-md-12">
                    <div class="tabels-admin">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        </tr>
                                        <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                        </tr>
                                        <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                        </tr>
                                        <tr>
                                        <th scope="row">4</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                        </tr>
                                        <tr>
                                        <th scope="row">5</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                        </tr>
                                    </tbody>
                            </table>
                       </div>
                 </div>
            <!--tabel-->
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
