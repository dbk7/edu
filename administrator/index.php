<?php
session_start();

if (empty($_SESSION['email'])) {
    header("location:login.php");
  }else{
    if (isset($_SESSION['id'])) {
        $id = trim($_SESSION['id']);
    }
    if (isset($_SESSION['email'])) {
        $id = trim($_SESSION['email']);
    }
    if (isset($_SESSION['photo'])) {
        $photo = trim($_SESSION['photo']);
    }
    if (isset($_SESSION['fullname'])) {
        $fullname = trim($_SESSION['fullname']);
    }
    if (isset($_SESSION['otorisasi'])) {
        $otorisasi = trim($_SESSION['otorisasi']);
    }
    require_once('includes/config.php');
    isset ($_GET['pages']) ? $pages = $_GET['pages'] : $pages = 'home';
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Meta-Information -->
    <title>Back Office Educode</title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Vendor: Bootstrap 4 Stylesheets  -->
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">

    <!-- Our Website CSS Styles -->
    <link rel="stylesheet" href="assets/css/icons.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/main.css" type="text/css">
    <link rel="stylesheet" href="assets/css/responsive.css" type="text/css">

    <!-- Color Scheme -->
    <link rel="stylesheet" href="assets/css/color-schemes/color.css" type="text/css" title="color3">
    <link rel="alternate stylesheet" href="assets/css/color-schemes/color1.css" title="color1">
    <link rel="alternate stylesheet" href="assets/css/color-schemes/color2.css" title="color2">
    <link rel="alternate stylesheet" href="assets/css/color-schemes/color4.css" title="color4">
    <link rel="alternate stylesheet" href="assets/css/color-schemes/color5.css" title="color5">
</head>
<body class="expand-data panel-data">

<!-- header -->
    <?php
            include 'includes/header.php';
    ?>
<!-- header -->

<!-- sidebar -->
    <?php
            include 'includes/sidebar.php';
    ?>
<!-- sidebar -->

<!-- semua isi -->

    <?php

        // if(isset($_SESSION['pesan'])){echo $_SESSION['pesan']; 
        //     unset($_SESSION['pesan']);}

        if(file_exists('pages/'.$pages.'.php')){
            include ('pages/'.$pages.'.php');
        }else{
            include ('pages/404.php');
        }

        // include ('pages/'.$pages.'.php');
    ?>

<!-- semua isi -->

<!-- footer -->
    <?php
            include 'includes/footer.php';
    ?>
<!-- footer -->

<!-- Vendor: Javascripts -->
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<!-- Vendor: Followed by our custom Javascripts -->
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="assets/js/select2.min.js" type="text/javascript"></script>
<script src="assets/js/slick.min.js" type="text/javascript"></script>

<!-- Our Website Javascripts -->
<script src="assets/js/isotope.min.js" type="text/javascript"></script>
<script src="assets/js/isotope-int.js" type="text/javascript"></script>
<script src="assets/js/jquery.counterup.js" type="text/javascript"></script>
<script src="assets/js/waypoints.min.js" type="text/javascript"></script>
<script src="assets/js/highcharts.js" type="text/javascript"></script>
<script src="assets/js/exporting.js" type="text/javascript"></script>
<script src="assets/js/highcharts-more.js" type="text/javascript"></script>
<script src="assets/js/moment.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.circliful.min.js" type="text/javascript"></script>
<script src="assets/js/fullcalendar.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.downCount.js" type="text/javascript"></script>
<script src="assets/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.formtowizard.js" type="text/javascript"></script>
<script src="assets/js/form-validator.min.js" type="text/javascript"></script>
<script src="assets/js/form-validator-lang-en.min.js" type="text/javascript"></script>
<script src="assets/js/cropbox-min.js" type="text/javascript"></script>
<script src="assets/js/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/js/ion.rangeSlider.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.poptrox.min.js" type="text/javascript"></script>
<script src="assets/js/styleswitcher.js" type="text/javascript"></script>
<script src="assets/js/main.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function () {
        'use strict';

        Highcharts.chart('chrt1', {
            colors: ['#dadada','#67ba5f'],
            chart: {
                type: 'area',
                backgroundColor: "#FFFFFF",
                borderColor: "#335cad"
            },
            legend: {
                enabled: false
            },
            title: {
                text: 'Active users in current month (December)',
                style: { "color": "#444444", "fontSize": "12px" }
            },
            xAxis: {
                categories: ['1', '2', '3', '4', '5', '6', '7']
            },
            credits: {
                enabled: false
            },
            tooltip: {
                pointFormat: '{series.name} produced <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
            },      
            plotOptions: {
                area: {
                    categories: ['1', '2', '3', '4', '5', '6', '7'],
                    marker: {
                        enabled: false,
                        symbol: 'circle',
                        radius: 2,
                        states: {
                            hover: {
                                enabled: true
                            }
                        }
                    }
                }
            },
            series: [{
                data: [18,45,35,10,85,25,90]
            }, {
                data: [45,50,25,85,55,65,70]
            }]
        });

        Highcharts.chart('chrt2', {
            colors: ['#dadada','#f89898'],
            chart: {
                type: 'area',
                backgroundColor: "#FFFFFF",
                borderColor: "#335cad"
            },
            legend: {
                enabled: false
            },
            title: {
                style: {
                    display: 'none'
                }
            },
            xAxis: {
                categories: ['1', '2', '3', '4', '5', '6', '7']
            },
            credits: {
                enabled: false
            },
            tooltip: {
                pointFormat: '{series.name} produced <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
            },      
            plotOptions: {
                area: {
                    categories: ['1', '2', '3', '4', '5', '6', '7'],
                    marker: {
                        enabled: false,
                        symbol: 'circle',
                        radius: 2,
                        states: {
                            hover: {
                                enabled: true
                            }
                        }
                    }
                }
            },
            series: [{
                data: [18,45,35,10,85,25,90]
            }, {
                data: [45,50,25,85,55,65,70]
            }]
        });

        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $('#chrt3').highcharts({
                colors: ['#dadada','#f89898'],
                chart: {
                    type: 'area',
                    backgroundColor: "#FFFFFF",
                    borderColor: "#335cad"
                },
                legend: {
                    enabled: false
                },
                title: {
                    style: {
                        display: 'none'
                    }
                },
                xAxis: {
                    categories: ['1', '2', '3', '4', '5', '6', '7']
                },
                credits: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: '{series.name} produced <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
                },      
                plotOptions: {
                    area: {
                        categories: ['1', '2', '3', '4', '5', '6', '7'],
                        marker: {
                            enabled: false,
                            symbol: 'circle',
                            radius: 2,
                            states: {
                                hover: {
                                    enabled: true
                                }
                            }
                        }
                    }
                },
                series: [{
                    data: [18,45,35,10,85,25,90]
                }, {
                    data: [45,50,25,85,55,65,70]
                }]
            });
        });

        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $('#chrt4').highcharts({
                colors: ['#dadada','#f89898'],
                chart: {
                    type: 'area',
                    backgroundColor: "#FFFFFF",
                    borderColor: "#335cad"
                },
                legend: {
                    enabled: false
                },
                title: {
                    style: {
                        display: 'none'
                    }
                },
                xAxis: {
                    categories: ['1', '2', '3', '4', '5', '6', '7']
                },
                credits: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: '{series.name} produced <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
                },      
                plotOptions: {
                    area: {
                        categories: ['1', '2', '3', '4', '5', '6', '7'],
                        marker: {
                            enabled: false,
                            symbol: 'circle',
                            radius: 2,
                            states: {
                                hover: {
                                    enabled: true
                                }
                            }
                        }
                    }
                },
                series: [{
                    data: [18,45,35,10,85,25,90]
                }, {
                    data: [45,50,25,85,55,65,70]
                }]
            });
        });

        Highcharts.chart('chart5', {
            colors: ['#fc4b6c', '#26c6da', '#1e88e5'],
            chart: {type: 'column'},
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec']
            },
            title: {text: null},
            yAxis: {min: 0},
            tooltip: {
                pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
                shared: true
            },
            plotOptions: {
                column: {stacking: 'percent'}

            },
            legend: {
              align: 'right',
              verticalAlign: 'top',
              symbolRadius: 0,
              itemStyle: {
                color: '#555555',
                fontSize: '13px',
                fontWeight: '300'
            },
        },
        series: [{
            name: '2017',
            data: [500, 750, 1000, 1250, 1500, 1750, 2000, 2250, 1700, 2100, 900, 800,]
        }, {
            name: '2016',
            data: [1500, 1750, 2000, 2250, 500, 750, 1000, 1250, 1700, 2100, 900, 800,]
        }, {
            name: '2015',
            data: [1700, 2100, 900, 800, 500, 750, 1000, 1250, 1500, 1750, 2000, 2250,]
        }]
    });

    //===== ToolTip =====//
    if ($.isFunction($.fn.tooltip)) {
        $('[data-toggle="tooltip"]').tooltip();
    }

    $('.grid-item').draggable();
});
</script>
</body>
</html>

<?php
    }
?>