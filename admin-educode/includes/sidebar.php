<aside class="sidebar">
    <div class="scroll-sidebar">
        <div class="user-profile">
            <div class="dropdown user-pro-body">
                <div class="profile-image">
                    <img src="assets/images/usr-bg-img.jpg" alt="user-img" width="50px" height="50px" class="img-circle">
                    <a href="javascript:void(0);" class="dropdown-toggle u-dropdown text-blue" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="badge badge-danger">
                            <i class="fa fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated flipInY">
                        <li><a href="controller/act-logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </div>
                <p class="profile-text m-t-15 font-16"><a href="javascript:void(0);"> <?php echo $_SESSION['fullname']; ?></a></p>
            </div>
        </div>
        <nav class="sidebar-nav">
            <ul id="side-menu">
                <?php
                    if ($otorisasi == "Administrator") {
                ?>
                <li>
                    <a href="index.php?pages=home" class="active waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-screen-desktop fa-fw"></i> <span class="hide-menu"> Dashboard</span></a>
                </li>
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fa fa-file"> </i>&nbsp;<span class="hide-menu"> &nbsp;&nbsp;&nbsp;&nbsp;Master</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li> <a href="index.php?pages=users">&nbsp;&nbsp;&nbsp;&nbsp;Users</a> </li>
                    </ul>
                </li>
                <?php
                    } else if ($otorisasi == "User") {
                ?>
                <li>
                    <a href="index.php?pages=home" class="active waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-screen-desktop fa-fw"></i> <span class="hide-menu"> Dashboard</span></a>
                </li>
                <?php
                    }
                ?>
            </ul>
        </nav>
    </div>
</aside>