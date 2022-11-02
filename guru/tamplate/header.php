<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Datatables | Adminto - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- third party css -->
        <link href="assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

		<!-- App css -->

		<link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

		<!-- icons -->
		<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <script src="https://code.jquery.com/jquery-2.1.4.js" integrity="sha256-siFczlgw4jULnUICcdm9gjQPZkw/YPDqhQ9+nAOScE4="crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
            
                $("#gian").click(function() {
                $("#body").addClass("sidebar-enable");
                })
            
            });
            </script>

    </head>

    <!-- body start -->
    <body class="loading" id="body" data-layout-color="light"  data-layout-mode="default" data-layout-size="fluid" data-topbar-color="light" data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='true'>

        <!-- Begin page -->
        <div id="wrapper">
            
            <!-- Topbar Start -->
            <div class="navbar-custom">
                    <ul class="list-unstyled topnav-menu float-end mb-0">

                        
    
                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="assets/images/users/logo.png" alt="user-image" class="rounded-circle">
                                <span class="pro-user-name ms-1">
                                    <?= $_SESSION["nama_lengkap"]?> <i class="mdi mdi-chevron-down"></i> 
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <a href="../config/session-destroy.php" class="dropdown-item notify-item">
                                    <i class="fe-log-out"></i>
                                    <span>Logout</span>
                                </a>
    
                            </div>
                        </li>
    
                        <li class="dropdown notification-list">
                            <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                                <i class="fe-settings noti-icon"></i>
                            </a>
                        </li>
    
                    </ul>
    
                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="index.html" class="logo logo-light text-center">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-light.png" alt="" height="16">
                            </span>
                        </a>
                        <a href="index.html" class="logo logo-dark text-center">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-dark.png" alt="" height="16">
                            </span>
                        </a>
                    </div>

                    <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
                        <li>
                            <button class="button-menu-mobile disable-btn waves-effect" id="gian">
                                <i class="fe-menu"></i>
                            </button>
                        </li>
    
                        <li>
                            <h4 class="page-title-main">Datatables</h4>
                        </li>
            
                    </ul>

                    <div class="clearfix"></div> 
               
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="h-100" data-simplebar>

                     <!-- User box -->
                    <div class="user-box text-center">

                        <img src="assets/images/users/logo.png" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
                            <div class="dropdown">
                                <a href="index.php" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"  aria-expanded="false"> <?= $_SESSION["nama_lengkap"]?></a>
                                <div class="dropdown-menu user-pro-dropdown">
                                    <!-- item-->
                                    <a href="../config/session-destroy.php" class="dropdown-item notify-item">
                                        <i class="fe-log-out me-1"></i>
                                        <span>Logout</span>
                                    </a>
        
                                </div>
                            </div>

                        <p class="text-muted left-user-info"> <?= strtoupper($_SESSION["level"])?></p>

                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="../config/session-destroy.php">
                                    <i class="mdi mdi-power"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul id="side-menu">

                            <li class="menu-title">Navigation</li>
                
                            <li>
                                <a href="index.php">
                                    <i class="mdi mdi-view-dashboard-outline"></i>
                                    <span class="badge bg-success rounded-pill float-end">9+</span>
                                    <span> Dashboard </span>
                                </a>
                            </li>

                            <li class="menu-title mt-2">Apps</li>

                            <li>
                                <a href="#sidebarIcons" data-bs-toggle="collapse">
                                    <i class="mdi mdi-shield-outline"></i>
                                    <span> Input Nilai </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarIcons">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="nilai-pengetahuan.php?id=BAHASA INDONESIA">Nilai Pengetahuan</a>
                                        </li>

                                        <li>
                                            <a href="nilai-keterampilan.php?id=BAHASA INDONESIA">Nilai Keterampilan</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="absen-siswa.php?tanggal=<?= date("Y-m-d") ?>">
                                    <i class="mdi mdi-view-dashboard-outline"></i>
                                    <span> Input Absensi </span>
                                </a>
                            </li>

                            <li>
                                <a href="prestasi.php">
                                    <i class="mdi mdi-view-dashboard-outline"></i>
                                    <span> Input Prestasi </span>
                                </a>
                            </li>

                            <li class="menu-title mt-2">Cetak</li>

                            <li>
                                <a href="#sidebarIcons2" data-bs-toggle="collapse">
                                    <i class="mdi mdi-shield-outline"></i>
                                    <span> Input Nilai </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarIcons2">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="rapor.php">Cetak Rapor</a>
                                        </li>

                                        <li>
                                            <a href="leger.php">Cetak Leger</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->