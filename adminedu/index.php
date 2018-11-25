<?php
    session_start();

    if (empty($_SESSION['username'])) {
        header("location:login.php");
    }else{
    if (isset($_SESSION['username'])) {
        $user = trim($_SESSION['username']);
    }
    if (isset($_SESSION['authorization'])) {
        $authorization = trim($_SESSION['authorization']);
    }
    require_once('include/config.php');
    $base_url = ('http://'.$_SERVER['HTTP_HOST'].'/mart212/index.php');

    isset ($_GET['page']) ? $page = $_GET['page'] : $page = 'home';
?>

<!DOCTYPE html>
<html lang="en-us">

<head>
    <title>Menu Utama</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico" />

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700italic,700,900,900italic" rel="stylesheet">
    
    <link type="text/css" rel="stylesheet" href="assets/icons/fuse-icon-font/style.css">
    <link type="text/css" rel="stylesheet" href="assets/vendor/animate.css/animate.min.css">
    <link type="text/css" rel="stylesheet" href="assets/vendor/pnotify/pnotify.custom.min.css">
    <link type="text/css" rel="stylesheet" href="assets/vendor/nvd3/build/nv.d3.min.css" />
    <link type="text/css" rel="stylesheet" href="assets/vendor/perfect-scrollbar/css/perfect-scrollbar.min.css" />
    <link type="text/css" rel="stylesheet" href="assets/vendor/fuse-html/fuse-html.min.css" />
    <link type="text/css" rel="stylesheet" href="assets/css/main.css">

    <script type="text/javascript" src="assets/vendor/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="assets/vendor/mobile-detect/mobile-detect.min.js"></script>
    <!-- <script type="text/javascript" src="assets/vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script> -->
    <script type="text/javascript" src="assets/vendor/popper.js/index.js"></script>
    <!-- <script type="text/javascript" src="assets/vendor/bootstrap/bootstrap.min.js"></script> -->
    <script type="text/javascript" src="assets/vendor/d3/d3.min.js"></script>
    <script type="text/javascript" src="assets/vendor/nvd3/build/nv.d3.min.js"></script>
    <!-- <script type="text/javascript" src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/vendor/datatables-responsive/js/dataTables.responsive.js"></script> -->
    <script type="text/javascript" src="assets/vendor/pnotify/pnotify.custom.min.js"></script>
    <script type="text/javascript" src="assets/vendor/fuse-html/fuse-html.min.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
</head>

<body class="layout layout-vertical layout-left-navigation layout-above-toolbar">
    <main>

        <!-- PHP HEADER -->
        <?php
            include ('include/header.php')
        ?>

        <div id="wrapper">
            
            <!-- PHP SIDEBAR -->
            <?php
                include ('include/sidebar.php')
            ?>

            <div class="content-wrapper">

                <!-- PHP CONTENT -->
                <?php

                    if(isset($_SESSION['pesan'])){echo $_SESSION['pesan']; unset($_SESSION['pesan']);}

                    if(file_exists('page/'.$page.'.php')){
                        include ('page/'.$page.'.php');
                    }else{
                        include ('page/error-404.php');
                    }

                ?>
                
            </div>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
  	<script src="assets/js/jquery-ui.js"></script>

    <script type="text/javascript" src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/vendor/datatables-responsive/js/dataTables.responsive.js"></script>
    <script type="text/javascript" src="assets/vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
    <script type="text/javascript" src="assets/vendor/bootstrap/bootstrap.min.js"></script>

    <!-- Javascript -->
    <script type="text/javascript">
        // DataTable
        $('#sample-data-table').DataTable({
            dom       : 'rt<"dataTables_footer"ip>',
            lengthMenu    : [10, 20, 30, 50, 100],
            pageLength    : 10,
            scrollY       : 'auto',
            scrollX       : false,
            responsive    : true,
            autoWidth     : false,
            scrollCollapse: true,

            initComplete  : function () {
                    var api = this.api(),
                        searchBox = $('#search-input');

                    // Bind an external input as a table wide search box
                    if ( searchBox.length > 0 )
                    {
                        searchBox.on('keyup', function (event) {
                            api.search(event.target.value).draw();
                        });
                    }
                },
        });

        // Autocomplete
        $(function() {
            $( "#id_barang" ).autocomplete({
                source: 'controller/act-autocomplete-barang.php'
            });
        });

        $(function() {
            $( "#kode_bm" ).autocomplete({
                source: 'controller/act-autocomplete-barang-masuk.php'
            });
        });

        $(function() {
            $( "#kode_p" ).autocomplete({
                source: 'controller/act-autocomplete-penjualan.php'
            });
        });

        $(function() {
            $( "#kode_rp" ).autocomplete({
                source: 'controller/act-autocomplete-retur-penjualan.php'
            });
        });

        // Autoview
        function isi_otomatis_barang(){
            var id_barang = $("#id_barang").val();
            $.ajax({
                url: 'controller/act-autoview-barang.php',
                data:"id_barang="+id_barang ,
            }).success(function (data) {
                var json = data,
                obj = JSON.parse(json);
                $('#nama_barang').val(obj.nama_barang);
                $('#harga_jual').val(obj.harga_jual);
                $('#stock_barang').val(obj.stock_barang);
            });
        }

        function isi_otomatis_bayar(){
            var bayar = $("#bayar").val();
            $.ajax({
                url: 'controller/act-autoview-bayar.php',
                data:"bayar="+bayar ,
            }).success(function (data) {
                var json = data,
                obj = JSON.parse(json);
                $('#kembalian').val(obj.kembalian);
            });
        }

        function isi_otomatis_barangretur(){
            var kode_penjualan = $("#kode_penjualan").val();
            var id_barang = $("#id_barang").val();
            $.ajax({
                url: 'controller/act-autoview-returbarang.php',
                data:"kode_penjualan="+kode_penjualan+"&id_barang="+id_barang,
            }).success(function (data) {
                var json = data,
                obj = JSON.parse(json);
                $('#nama_barang').val(obj.nama_barang);
                $('#harga_jual').val(obj.harga_jual);
                $('#qty_barang').val(obj.qty_barang);
            });
        }

        // Inputan hanya angka
        function OnlyNumber(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))

                return false;
            return true;
        }
    </script>

</body>

</html>

<?php
    }
?>