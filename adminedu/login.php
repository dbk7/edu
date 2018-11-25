<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en-us">

<head>
    <title>EDUCODE - ADMIN</title>
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
    <script type="text/javascript" src="assets/vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
    <script type="text/javascript" src="assets/vendor/popper.js/index.js"></script>
    <script type="text/javascript" src="assets/vendor/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/vendor/d3/d3.min.js"></script>
    <script type="text/javascript" src="assets/vendor/nvd3/build/nv.d3.min.js"></script>
    <script type="text/javascript" src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/vendor/datatables-responsive/js/dataTables.responsive.js"></script>
    <script type="text/javascript" src="assets/vendor/pnotify/pnotify.custom.min.js"></script>
    <script type="text/javascript" src="assets/vendor/fuse-html/fuse-html.min.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
</head>

<body class="layout layout-vertical layout-left-navigation layout-above-toolbar">
    <main>
        <div id="wrapper">
            <div class="content-wrapper">
                <div class="content custom-scrollbar">

                    <div id="login-v2" class="row no-gutters">

                        <div class="intro col-12 col-md light-fg">

                            <div class="d-flex flex-column align-items-center align-items-md-start text-center text-md-left py-16 py-md-32 px-12">

                                <div class="navbar-brand">
                        <a class="logo" href="index.php">
                            <img src="./assets/images/backgrounds/logo-alt.png" alt="logo">
                        </a>

                    </div>
<br>
                                <div class="title">
                                    Free Online Training Courses
                                </div>

                                <div class="description pt-2">
                                    Good knowledge will be a light and guide you to achieve your dreams.
                                </div>

                            </div>
                        </div>

                        <div class="form-wrapper col-12 col-md-auto d-flex justify-content-center p-4 p-md-0">

                            <div class="form-content md-elevation-8 h-100 bg-white text-auto py-16 py-md-32 px-12">

                                <div class="title h4 mb-8">Log in to your account</div>
                                
                                <div class="text-danger text-center"><?php  isset($_SESSION['error']) ? $e=$_SESSION['error'] : $e=""; echo $e;?></div>
                                
                                <?php
                                    session_destroy();
                                ?>

                                <form action="controller/login.php" class="mt-8" method="POST">

                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" name="username" id="username" required/>
                                        <label>ID Pengguna</label>
                                    </div>

                                    <div class="form-group mb-4">
                                        <input type="password" class="form-control" name="password" id="password" required/>
                                        <label>Kata Sandi</label>
                                    </div>

                                    <div class="remember-forgot-password row no-gutters align-items-center justify-content-between pt-4">

                                        <div class="form-check remember-me mb-4">
                                            <label class="form-check-label">
                                                <input onclick="showPassword()" type="checkbox" class="form-check-input" />
                                                <span class="checkbox-icon"></span>
                                                <span class="form-check-description">Tampilkan Kata Sandi</span>
                                            </label>
                                        </div>

                                    </div>

                                    <button type="submit" class="submit-button btn btn-block btn-secondary my-4 mx-auto">
                                        MASUK
                                    </button>

                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>

    <!-- Fungsi Show Password -->
    <script>
    function showPassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    </script>

</body>

</html>