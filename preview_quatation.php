<?php
	session_start();
	if($_SESSION['u_id'] == "")
	{
		echo "Please Login!";
		header("location:index.php");
	}

		ini_set('display_errors', 0);
	  error_reporting(~0);



  if(isset($_POST["strdate"]))
  {
    $_POST['strdate'] = $_POST["strdate"];
  }
	if(isset($_POST["lastdate"]))
  {
    $_POST['lastdate'] = $_POST["lastdate"];
  }
	if(isset($_POST['name']))
	{
		$_POST['name'] = $_POST['name'];
	}


include 'connect.php';
	$strSQL = "SELECT * FROM member WHERE u_id = '".$_SESSION['u_id']."' ";
	$objQuery = mysqli_query($objCon,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
?>

  <center><h1>Welcome to Sec Page!</h1> <br>
  <table border="0" style="width: 200px">
    <tbody>

      <tr>

        <td><h3 class="text-success"><?php echo $objResult["name"];?></h3></td>
		<td><h3 class="text-success"><?php echo $objResult["surname"];?></h3></td>
	</tr>



    </tbody>
  </table>
  </center>
   </div>
  </div>
</div>
</body>
</html>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sale Support NutritionSc</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="fullcalendar/fullcalendar.min.css" />
		<script src="fullcalendar/lib/jquery.min.js"></script>
		<script src="fullcalendar/lib/moment.min.js"></script>
		<script src="fullcalendar/fullcalendar.min.js"></script>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />


   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
</head>

<body>
    <!-- Left Panel -->
		<?php
	 include "check_level.php";
		?>
        </header>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">

                <!--  Traffic  -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">รายการพบลูกค้า</h4>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">

																			<?php
																			if($_SESSION['username']=="chana"){
																			$strSQL10 = "SELECT * FROM member where leader = 'chana' or leader2 = 'chana'  order by username asc";
																			$objQuery10 = mysqli_query($objCon,$strSQL10);
																			?>
																			<form name="frmSearch" method="post" action="<?=$_SERVER['SCRIPT_NAME'];?>">
																			<center><div class="form-group col-md-9">
																			<label for="district">เลือกรายชื่อ</label>
																			<select name="forname" id="forname" class="form-control">
																			<option value="">-</option>
																			<?php while($objResult10 = mysqli_fetch_assoc($objQuery10)): ?>

																			<option value="<?=$objResult10['username'];?>"><?=$objResult10['username'];?></option>
																			<?php endwhile; ?>
																			</select>
																			</div></center>
																			<?php
																		}else{
																			$strSQL10 = "SELECT * FROM member where section = '".$_SESSION['section']."'  order by username asc";
																			$objQuery10 = mysqli_query($objCon,$strSQL10);
																			 ?>
																			 <form name="frmSearch" method="post" action="<?=$_SERVER['SCRIPT_NAME'];?>">
 																			<center><div class="form-group col-md-9">
 																			<label for="district">เลือกรายชื่อ</label>
 																			<select name="forname" id="forname" class="form-control">
 																			<option value="">-</option>
 																			<?php while($objResult10 = mysqli_fetch_assoc($objQuery10)): ?>

 																			<option value="<?=$objResult10['username'];?>"><?=$objResult10['username'];?></option>
 																			<?php endwhile; ?>
 																			</select>
 																			</div></center>
																			<?php
																		}
																			 ?>
																			<center><label>วันที่เริ่ม</label>
																			<div class="col-4">
																			<input class="form-control" type="date" name="strdate" id="strdate">
																			</div></center>



																			<center><label>วันสุดท้าย</label>
																			<div class="col-4">
																			<input class="form-control" type="date" name="lastdate" id="lastdate">
																			</div></center>
																			</br>
																			<div>
																			<center>  <button type="submit" class="btn btn-success">search</button></Center>

																			</div>
																			<br>
																			</form>

																			<?php
																				if($_POST['strdate']=='' && $_POST['lastdate']=='' && $_POST['forname']!=''){
																					echo  $sql = "SELECT * FROM qutation WHERE username =  '".$_POST['forname']."' and 	status = 'approve' and section = '".$_SESSION['section']."' order by qu_id desc  ";

																					 $query = mysqli_query($objCon, $sql);
																					 ?>
																					 <table class="table">
																						<thead class="thead-dark">
																							<tr>
																								<th scope="col">qu_id</th>
																								<th scope="col">attm</th>
																								<th scope="col">username</th>
																								<th scope="col">Company name</th>
																								<th scope="col">section</th>
																								<th scope="col">strdate</th>
																								<th scope="col">Email</th>
																								<th scope="col">fax</th>
																								<th scope="col">edit</th>

																							</tr>

																							<?php
																							while ($objResult= mysqli_fetch_assoc($query))
																							{
																							?>
																						</thead>
																						<tbody>
																							<tr>
																								<th scope="row"><?php echo $objResult["qu_id"];?></th>
																								<td><?php echo $objResult["attn"];?></td>
																								<td><?php echo $objResult["username"];?></td>
																								<td><?php echo $objResult["company"];?></td>
																								<td><?php echo $objResult["section"];?></td>
																								<td><?php echo $objResult["strdate"];?></td>

																								<td><?php echo $objResult["Email"];?></td>
																								<td><?php echo $objResult["Fax"];?></td>

																								<td><a href="edit_quatation.php?qu_id=<?php echo $objResult['qu_id'];?>">edit</a></td>

																							</tr>
																				<?php

																			}
																				?>
																				</table>
																			<?php
																		}elseif($_POST['strdate']!='' && $_POST['lastdate']!='' && $_POST['forname']==''){
																				echo  $sql = "SELECT * FROM qutation WHERE  strdate between '".$_POST['strdate']."' and  '".$_POST['lastdate']."' and status = 'approve' order by qu_id desc ";
																				 $query = mysqli_query($objCon, $sql);
																				 ?>
																				 <table class="table">
																					<thead class="thead-dark">
																						<tr>
																							<th scope="col">qu_id</th>
																							<th scope="col">attm</th>
																							<th scope="col">username</th>
																							<th scope="col">Company name</th>
																							<th scope="col">section</th>
																							<th scope="col">strdate</th>
																							<th scope="col">Email</th>
																							<th scope="col">fax</th>
																							<th scope="col">edit</th>

																						</tr>

																						<?php
																						while ($objResult= mysqli_fetch_assoc($query))
																						{
																						?>
																					</thead>
																					<tbody>
																						<tr>
																							<th scope="row"><?php echo $objResult["qu_id"];?></th>
																							<td><?php echo $objResult["attn"];?></td>
																							<td><?php echo $objResult["username"];?></td>
																							<td><?php echo $objResult["company"];?></td>
																							<td><?php echo $objResult["section"];?></td>
																							<td><?php echo $objResult["strdate"];?></td>

																							<td><?php echo $objResult["Email"];?></td>
																							<td><?php echo $objResult["Fax"];?></td>

																							<td><a href="edit_quatation.php?qu_id=<?php echo $objResult['qu_id'];?>">edit</a></td>

																						</tr>
																			<?php
																			}
																			}else{
																			echo	$strSQL10 = "SELECT *	 FROM qutation where section = '".$_SESSION['section']."' and status = 'approve'";
																				$objQuery = mysqli_query($objCon,$strSQL10);
																				?>
																				<table class="table">
																			 	<thead class="thead-dark">
																			 		<tr>
																			 			<th scope="col">qu_id</th>
																			 			<th scope="col">attm</th>
																			 			<th scope="col">username</th>
																			 			<th scope="col">Company name</th>
																			 			<th scope="col">section</th>
																			 			<th scope="col">strdate</th>
																			 			<th scope="col">Email</th>
																			 			<th scope="col">fax</th>
																			 			<th scope="col">edit</th>

																			 		</tr>

																			 		<?php
																			 		while ($objResult= mysqli_fetch_assoc($objQuery))
																			 		{
																			 		?>
																			 	</thead>
																			 	<tbody>
																			 		<tr>
																			 			<th scope="row"><?php echo $objResult["qu_id"];?></th>
																			 			<td><?php echo $objResult["attn"];?></td>
																			 			<td><?php echo $objResult["username"];?></td>
																			 			<td><?php echo $objResult["company"];?></td>
																			 			<td><?php echo $objResult["section"];?></td>
																			 			<td><?php echo $objResult["strdate"];?></td>

																			 			<td><?php echo $objResult["Email"];?></td>
																			 			<td><?php echo $objResult["Fax"];?></td>

																			 			<td><a href="edit_quatation.php?qu_id=<?php echo $objResult['qu_id'];?>">edit</a></td>

																			 		</tr>


																			<?php
																			}

																			?>
																			</table>

																			<?php
																			}
																					?>


                                </div>
                            </div> <!-- /.row -->

                        </div>
                    </div><!-- /# column -->
                </div>
                <!--  /Traffic -->
                <div class="clearfix"></div>





								<!--  Form Report  -->

								<div class="clearfix"></div>















                <!-- Calender Chart Weather  -->
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card">

                                <!-- <h4 class="box-title">Chandler</h4> -->

        <!-- Footer -->

        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>

    <!--Local Stuff-->
    <script>
        jQuery(document).ready(function($) {
            "use strict";

            // Pie chart flotPie1
            var piedata = [
                { label: "Desktop visits", data: [[1,32]], color: '#5c6bc0'},
                { label: "Tab visits", data: [[1,33]], color: '#ef5350'},
                { label: "Mobile visits", data: [[1,35]], color: '#66bb6a'}
            ];

            $.plot('#flotPie1', piedata, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        innerRadius: 0.65,
                        label: {
                            show: true,
                            radius: 2/3,
                            threshold: 1
                        },
                        stroke: {
                            width: 0
                        }
                    }
                },
                grid: {
                    hoverable: true,
                    clickable: true
                }
            });
            // Pie chart flotPie1  End
            // cellPaiChart
            var cellPaiChart = [
                { label: "Direct Sell", data: [[1,65]], color: '#5b83de'},
                { label: "Channel Sell", data: [[1,35]], color: '#00bfa5'}
            ];
            $.plot('#cellPaiChart', cellPaiChart, {
                series: {
                    pie: {
                        show: true,
                        stroke: {
                            width: 0
                        }
                    }
                },
                legend: {
                    show: false
                },grid: {
                    hoverable: true,
                    clickable: true
                }

            });
            // cellPaiChart End
            // Line Chart  #flotLine5
            var newCust = [[0, 3], [1, 5], [2,4], [3, 7], [4, 9], [5, 3], [6, 6], [7, 4], [8, 10]];

            var plot = $.plot($('#flotLine5'),[{
                data: newCust,
                label: 'New Data Flow',
                color: '#fff'
            }],
            {
                series: {
                    lines: {
                        show: true,
                        lineColor: '#fff',
                        lineWidth: 2
                    },
                    points: {
                        show: true,
                        fill: true,
                        fillColor: "#ffffff",
                        symbol: "circle",
                        radius: 3
                    },
                    shadowSize: 0
                },
                points: {
                    show: true,
                },
                legend: {
                    show: false
                },
                grid: {
                    show: false
                }
            });
            // Line Chart  #flotLine5 End
            // Traffic Chart using chartist
            if ($('#traffic-chart').length) {
                var chart = new Chartist.Line('#traffic-chart', {
                  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                  series: [
                  [0, 18000, 35000,  25000,  22000,  0],
                  [0, 33000, 15000,  20000,  15000,  300],
                  [0, 15000, 28000,  15000,  30000,  5000]
                  ]
              }, {
                  low: 0,
                  showArea: true,
                  showLine: false,
                  showPoint: false,
                  fullWidth: true,
                  axisX: {
                    showGrid: true
                }
            });

                chart.on('draw', function(data) {
                    if(data.type === 'line' || data.type === 'area') {
                        data.element.animate({
                            d: {
                                begin: 2000 * data.index,
                                dur: 2000,
                                from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                to: data.path.clone().stringify(),
                                easing: Chartist.Svg.Easing.easeOutQuint
                            }
                        });
                    }
                });
            }
            // Traffic Chart using chartist End
            //Traffic chart chart-js
            if ($('#TrafficChart').length) {
                var ctx = document.getElementById( "TrafficChart" );
                ctx.height = 150;
                var myChart = new Chart( ctx, {
                    type: 'line',
                    data: {
                        labels: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul" ],
                        datasets: [
                        {
                            label: "Visit",
                            borderColor: "rgba(4, 73, 203,.09)",
                            borderWidth: "1",
                            backgroundColor: "rgba(4, 73, 203,.5)",
                            data: [ 0, 2900, 5000, 3300, 6000, 3250, 0 ]
                        },
                        {
                            label: "Bounce",
                            borderColor: "rgba(245, 23, 66, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(245, 23, 66,.5)",
                            pointHighlightStroke: "rgba(245, 23, 66,.5)",
                            data: [ 0, 4200, 4500, 1600, 4200, 1500, 4000 ]
                        },
                        {
                            label: "Targeted",
                            borderColor: "rgba(40, 169, 46, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(40, 169, 46, .5)",
                            pointHighlightStroke: "rgba(40, 169, 46,.5)",
                            data: [1000, 5200, 3600, 2600, 4200, 5300, 0 ]
                        }
                        ]
                    },
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        }

                    }
                } );
            }
            //Traffic chart chart-js  End
            // Bar Chart #flotBarChart
            $.plot("#flotBarChart", [{
                data: [[0, 18], [2, 8], [4, 5], [6, 13],[8,5], [10,7],[12,4], [14,6],[16,15], [18, 9],[20,17], [22,7],[24,4], [26,9],[28,11]],
                bars: {
                    show: true,
                    lineWidth: 0,
                    fillColor: '#ffffff8a'
                }
            }], {
                grid: {
                    show: false
                }
            });
            // Bar Chart #flotBarChart End
        });
    </script>
</body>
</html>
