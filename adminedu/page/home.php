<div class="content custom-scrollbar bg-white">

        <div id="project-dashboard" class="page-layout simple right-sidebar">

            <div class="page-content-wrapper custom-scrollbar">

                <!-- HEADER -->
                <div class="page-header bg-secondary text-auto d-flex flex-column justify-content-between px-6 pt-4 pb-0">

                    <div class="row no-gutters align-items-start justify-content-between flex-nowrap">

                        <div>
                            <span class="h2">Selamat Datang, <?php echo ucfirst($_SESSION['fullname']);?> (<?php echo ucfirst($_SESSION['authorization']);?>)</span>
                        </div>

                        <button type="button" class="sidebar-toggle-button btn btn-icon d-block d-xl-none" data-fuse-bar-toggle="dashboard-project-sidebar" aria-label="Toggle sidebar">
                            <i class="icon icon-menu"></i>
                        </button>
                    </div>

                    <div class="row no-gutters align-items-center project-selection">

                        <div class="selected-project h6 px-4 py-2">EDUCODE - Free Online Training Courses</div>

                    </div>

                </div>
                <!-- / HEADER -->

                <!-- CONTENT -->
                <div class="page-content text-center">

                    <img height=100% src="assets/images/backgrounds/bg.png" style="width: 100%">

                </div>
                <!-- / CONTENT -->

            </div>
        </div>

        <script type="text/javascript" src="assets/js/apps/dashboard/project.js"></script>

    </div>
</div>