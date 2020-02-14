<?php
@session_start();
include('../../server/koneksi.php');
include('session.php');

$sql1 = mysqli_query($connect, "select *, count(tb_calon.id_calon) as jml_calon from tb_calon");
$a = mysqli_fetch_array($sql1);
$jml_calon = $a['jml_calon'];

$sql2 = mysqli_query($connect, "select *, count(tb_pemilih.id_pemilih) as jml_pemilih from tb_pemilih");
$a = mysqli_fetch_array($sql2);
$jml_pemilih = $a['jml_pemilih'];

$query = "SELECT nama_calon, count(*) as jumlah_vote FROM tb_pilih GROUP BY nama_calon";  
$result = mysqli_query($connect, $query); 

$sql_b=mysqli_query($connect,"SELECT * from tb_pemilih where status=0");
$jumlah_b=mysqli_num_rows($sql_b);
$sql_i=mysqli_query($connect, "SELECT * from tb_pilih where nama_calon='Tidak Hadir'");
$ccc=mysqli_num_rows($sql_i);
if($ccc==0){
    mysqli_query($connect, "insert into tb_pilih(nama_calon, jumlah_vote, id_calon) values ('Tidak Hadir','$jumlah_b','0')");
}else {
    mysqli_query($connect,"UPDATE tb_pilih set jumlah_vote='$jumlah_b' where nama_calon='Tidak Hadir'");
}

?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  
<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/vertical-modern-menu-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Feb 2019 00:36:40 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Hasil Pilkades - Pemilihan Kepala Desa</title>
    <?php include "../../include/admin/css.php" ?>
    <!-- END Custom CSS-->

        <link rel="stylesheet" href="../../assets/amcharts/samples/style.css" type="text/css">
        <script src="../../assets/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="../../assets/amcharts/amcharts/pie.js" type="text/javascript"></script>
        <script src="../../assets/amcharts/dataLoader.min.js" type="text/javascript"></script>

        <script>

            AmCharts.makeChart("chartdiv1", {
                "type": "pie",
                "dataLoader":
                {
                    "url": "../../assets/amcharts/data1.php",
                    "format": "json"
                },
                "titleField": "nama_calon",
                "valueField": "jumlah_vote",
                "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
                "legend": {
                    "align": "center",
                    "markerType": "circle"
                }

            });

        </script>

        <script>

        AmCharts.makeChart("chartdiv2", {
            "type": "pie",
            "dataLoader":
            {
                "url": "../../assets/amcharts/data2.php",
                "format": "json"
            },
            "titleField": "nama_calon",
            "valueField": "jumlah_vote",
            "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
            "legend": {
                "align": "center",
                "markerType": "circle"
            }

        });

        </script>
        <script>

        AmCharts.makeChart("chartdiv3", {
            "type": "pie",
            "dataLoader":
            {
                "url": "../../assets/amcharts/data3.php",
                "format": "json"
            },
            "titleField": "nama_calon",
            "valueField": "jumlah_vote",
            "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
            "legend": {
                "align": "center",
                "markerType": "circle"
            }

        });

        </script>
        <script>

        AmCharts.makeChart("chartdiv4", {
            "type": "pie",
            "dataLoader":
            {
                "url": "../../assets/amcharts/data4.php",
                "format": "json"
            },
            "titleField": "nama_calon",
            "valueField": "jumlah_vote",
            "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
            "legend": {
                "align": "center",
                "markerType": "circle"
            }

        });

        </script>
        <script>

        AmCharts.makeChart("chartdiv5", {
            "type": "pie",
            "dataLoader":
            {
                "url": "../../assets/amcharts/data5.php",
                "format": "json"
            },
            "titleField": "nama_calon",
            "valueField": "jumlah_vote",
            "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
            "legend": {
                "align": "center",
                "markerType": "circle"
            }

        });

        </script>
        <script>

        AmCharts.makeChart("chartdiv6", {
            "type": "pie",
            "dataLoader":
            {
                "url": "../../assets/amcharts/data6.php",
                "format": "json"
            },
            "titleField": "nama_calon",
            "valueField": "jumlah_vote",
            "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
            "legend": {
                "align": "center",
                "markerType": "circle"
            }

        });

        </script>
  </head>
  <body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
  <?php include "../../include/admin/header.php" ?>
  <?php include "../../include/admin/sidebar.php" ?>

    <!----- --->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Stats -->
<section id="chartjs-pie-charts">
    <div class="row">
        <!-- Simple Pie Chart -->
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">RW 01</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">                       
                        <div id="chartdiv1" style="width: 100%; height: 400px;"></div> 
                    </div> 
                </div>
            </div>
        </div>
    </div>
</section>
<section id="chartjs-pie-charts">
    <div class="row">
        <!-- Simple Pie Chart -->
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">RW 02</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">                       
                        <div id="chartdiv2" style="width: 100%; height: 400px;"></div>            
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="chartjs-pie-charts">
    <div class="row">
        <!-- Simple Pie Chart -->
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">RW 03</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">                       
                    <div id="chartdiv3" style="width: 100%; height: 400px;"></div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="chartjs-pie-charts">
    <div class="row">
        <!-- Simple Pie Chart -->
       <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">RW 04</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                       
                    <div id="chartdiv4" style="width: 100%; height: 400px;"></div> 
           </div> 
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<section id="chartjs-pie-charts">
    <div class="row">
        <!-- Simple Pie Chart -->
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">RW 05</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">                       
                    <div id="chartdiv5" style="width: 100%; height: 400px;"></div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="chartjs-pie-charts">
    <div class="row">
        <!-- Simple Pie Chart -->
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">RW 06</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">                       
                    <div id="chartdiv6" style="width: 100%; height: 400px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
</div>
  <?php include "../../include/admin/javascript.php" ?>
  </body>

<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/vertical-modern-menu-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Feb 2019 00:38:38 GMT -->
</html>