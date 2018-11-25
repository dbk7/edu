<nav id="toolbar" class="bg-white">
    <div class="row no-gutters align-items-center flex-nowrap">

        <div class="col">

            <div class="row no-gutters align-items-center flex-nowrap">

                <button type="button" class="toggle-aside-button btn btn-icon d-block d-lg-none" data-fuse-bar-toggle="aside">
                    <i class="icon icon-menu"></i>
                </button>

                <div class="toolbar-separator d-block d-lg-none"></div>

                <div class="shortcuts-wrapper row no-gutters align-items-center px-0 px-sm-2">

                    <div class="shortcuts row no-gutters align-items-center d-none d-md-flex">

                        <?php
		                    if ($authorization == "Administrator") {
	                    ?>

                        <a href="index.php" class="shortcut-button btn btn-icon mx-1">
                            <i class="icon icon-home"></i>
                        </a>

                        <a href="index.php?page=barang" class="shortcut-button btn btn-icon mx-1">
                            <i class="icon icon-archive"></i>
                        </a>

                        <a href="index.php?page=mitra" class="shortcut-button btn btn-icon mx-1">
                            <i class="icon icon-factory"></i>
                        </a>

                        <a href="index.php?page=penjualan" class="shortcut-button btn btn-icon mx-1">
                            <i class="icon icon-cart"></i>
                        </a>

                        <a href="index.php?page=lap-penjualan" class="shortcut-button btn btn-icon mx-1">
                            <i class="icon icon-printer"></i>
                        </a>
                        
                        <?php
		                    } else if ($authorization == "Kasir") {
	                    ?>

                        <a href="index.php" class="shortcut-button btn btn-icon mx-1">
                            <i class="icon icon-home"></i>
                        </a>

                        <a href="index.php?page=barang-masuk" class="shortcut-button btn btn-icon mx-1">
                            <i class="icon icon-box-download"></i>
                        </a>

                        <a href="index.php?page=penjualan" class="shortcut-button btn btn-icon mx-1">
                            <i class="icon icon-cart"></i>
                        </a>

                        <a href="index.php?page=retur-barang" class="shortcut-button btn btn-icon mx-1">
                            <i class="icon icon-repeat"></i>
                        </a>

                        <?php
		                    } else if ($authorization == "Kepala Toko") {
	                    ?>

                        <a href="index.php" class="shortcut-button btn btn-icon mx-1">
                            <i class="icon icon-home"></i>
                        </a>

                        <a href="index.php?page=lap-barang-masuk" class="shortcut-button btn btn-icon mx-1">
                            <i class="icon icon-clipboard-text"></i>
                        </a>

                        <a href="index.php?page=lap-penjualan" class="shortcut-button btn btn-icon mx-1">
                            <i class="icon icon-printer"></i>
                        </a>

                        <a href="index.php?page=lap-retur-penjualan" class="shortcut-button btn btn-icon mx-1">
                            <i class="icon icon-file-document"></i>
                        </a>

                        <?php
                            }
                        ?>

                    </div>

                </div>

            </div>
        </div>

        <div class="col-auto">

            <div class="row no-gutters align-items-center justify-content-end">

                <div class="user-menu-button dropdown">

                    <div class="dropdown-toggle ripple row align-items-center no-gutters px-2 px-sm-4" role="button" id="dropdownUserMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-wrapper">
                            <img class="avatar" src="<?php echo $_SESSION['photo'];?>">
                        </div>
                        <span class="username mx-3 d-none d-md-block"><?php echo ucfirst($_SESSION['fullname']);?></span>
                    </div>

                    <div class="dropdown-menu" aria-labelledby="dropdownUserMenu">

                        <a class="dropdown-item" href="index.php?page=ganti-password">
                            <div class="row no-gutters align-items-center flex-nowrap">
                                <i class="icon-key"></i>
                                <span class="px-3">Ganti Password</span>
                            </div>
                        </a>

                        <a class="dropdown-item" href="index.php?page=ganti-foto">
                            <div class="row no-gutters align-items-center flex-nowrap">
                                <i class="icon-file-image-box"></i>
                                <span class="px-3">Ganti Foto</span>
                            </div>
                        </a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="logout.php">
                            <div class="row no-gutters align-items-center flex-nowrap">
                                <i class="icon-logout"></i>
                                <span class="px-3">Logout</span>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>