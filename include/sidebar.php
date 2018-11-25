<aside id="aside" class="aside aside-left" data-fuse-bar="aside" data-fuse-bar-media-step="md" data-fuse-bar-position="left">
    <div class="aside-content-wrapper">

        <div class="aside-content bg-primary-700 text-auto">

            <div class="aside-toolbar">

                <div class="logo">
                    <span class="logo-icon">F</span>
                    <span class="logo-text">212 Mart</span>
                </div>

                <button id="toggle-fold-aside-button" type="button" class="btn btn-icon d-none d-lg-block" data-fuse-aside-toggle-fold>
                    <i class="icon icon-backburger"></i>
                </button>

            </div>

            <ul class="nav flex-column custom-scrollbar" id="sidenav" data-children=".nav-item">

                <?php
		            if ($authorization == "Administrator") {
	            ?>

                <li class="subheader">
                    <span>Master</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link ripple " href="index.php" >

                        <i class="icon s-4 icon-home"></i>

                        <span>Beranda</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link ripple " href="index.php?page=barang" >

                        <i class="icon s-4 icon-archive"></i>

                        <span>Barang</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link ripple " href="index.php?page=mitra" >

                        <i class="icon s-4 icon-factory"></i>

                        <span>Mitra</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link ripple " href="index.php?page=kategori" >

                        <i class="icon s-4 icon-tag"></i>

                        <span>Kategori</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link ripple " href="index.php?page=users" >

                        <i class="icon s-4 icon-account-multiple"></i>

                        <span>Users</span>
                    </a>
                </li>


                <li class="subheader">
                    <span>Transaksi</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link ripple " href="index.php?page=barang-masuk" >

                        <i class="icon s-4 icon-box-download"></i>

                        <span>Barang Masuk</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link ripple " href="index.php?page=penjualan" >

                        <i class="icon s-4 icon-cart"></i>

                        <span>Penjualan</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link ripple " href="index.php?page=retur-penjualan" >

                        <i class="icon s-4 icon-repeat"></i>

                        <span>Retur Penjualan</span>
                    </a>
                </li>


                <li class="subheader">
                    <span>Laporan</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link ripple " href="index.php?page=lap-barang-masuk" >

                        <i class="icon s-4 icon-clipboard-text"></i>

                        <span>Barang Masuk</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link ripple " href="index.php?page=lap-penjualan" >

                        <i class="icon s-4 icon-printer"></i>

                        <span>Penjualan</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link ripple " href="index.php?page=lap-retur-penjualan" >

                        <i class="icon s-4 icon-file-document"></i>

                        <span>Retur Penjualan</span>
                    </a>
                </li>

                <?php
		            } else if ($authorization == "Kasir") {
	            ?>

                <li class="subheader">
                    <span>Transaksi</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link ripple " href="index.php?page=barang-masuk" >

                        <i class="icon s-4 icon-box-download"></i>

                        <span>Barang Masuk</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link ripple " href="index.php?page=penjualan" >

                        <i class="icon s-4 icon-cart"></i>

                        <span>Penjualan</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link ripple " href="index.php?page=retur-penjualan" >

                        <i class="icon s-4 icon-repeat"></i>

                        <span>Retur Penjualan</span>
                    </a>
                </li>

                <?php
		            } else if ($authorization == "Kepala Toko") {
	            ?>

                <li class="subheader">
                    <span>Laporan</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link ripple " href="index.php?page=lap-barang-masuk" >

                        <i class="icon s-4 icon-clipboard-text"></i>

                        <span>Barang Masuk</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link ripple " href="index.php?page=lap-penjualan" >

                        <i class="icon s-4 icon-printer"></i>

                        <span>Penjualan</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link ripple " href="index.php?page=lap-retur-penjualan" >

                        <i class="icon s-4 icon-file-document"></i>

                        <span>Retur Penjualan</span>
                    </a>
                </li>

                <?php
                    }
                ?>

            </ul>
        </div>
    </div>
</aside>