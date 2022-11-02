<?php
session_start();

if(isset($_SESSION["login"])){
    if($_SESSION["level"] == 'admin'){
    
    header("Location: admin/index.php");
    exit;
    } else if($_SESSION["level"] == 'guru'){
    
        header("Location: guru/index.php");
        exit;
    } else if($_SESSION["level"] == 'siswa'){
    
        header("Location: siswa/index.php");
        exit;
    } 
}

include 'config/view.php';
if(isset($_POST["submit"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $cek = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

  

    //cek username

    if(mysqli_num_rows($cek) === 1) {
        //cek password 
        $row = mysqli_fetch_assoc($cek);
        if(password_verify($password,$row["password"])){
            //set session
            $_SESSION["login"] = true;
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["nama_lengkap"] = $row["nama_lengkap"];
            $level = $row["level"];
            $_SESSION["level"] = $row["level"];
            if($level == 'admin')
            {
            header("Location: admin/index.php");
            exit;
            }
            else if($level == 'guru')
            {
            $cek2 = mysqli_query($conn, "SELECT * FROM guru WHERE NPK = '$username'");
            $row2 = mysqli_fetch_assoc($cek2);
            $_SESSION["guru"] = $row2["wali_kelas"];
            header("Location: guru/index.php");
            exit;
            } else if ($level == 'siswa'){
                $cek3 = mysqli_query($conn, "SELECT * FROM siswa WHERE NIS = '$username'");
                $row3 = mysqli_fetch_assoc($cek3);
                $_SESSION["kelas"] = $row3["kelas"];
                $_SESSION["siswa"] = $row3["id_siswa"];
                header("Location: siswa/index.php");
            }
            
            
        }
    }

    $error = true;
}




?>





<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Log In | Adminto - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

		<!-- App css -->

		<link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

		<!-- icons -->
		<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="loading authentication-bg authentication-bg-pattern">

        <div class="account-pages my-5">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="text-center">   
                            <a href="index.html">
                                <img src="assets/images/logo-dark.png" alt="" height="22" class="mx-auto">
                            </a>
                            <p class="text-muted mt-2 mb-4">Raport SD Cibanjaran</p>

                        </div>
                        <div class="card">
                            <div class="card-body p-4">
                                
                                <div class="text-center mb-4">
                                    <h4 class="text-uppercase mt-0">Sign In</h4>
                                </div>

                                <form action="" method="POST">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input class="form-control" type="text" id="username" name="username" required placeholder="Enter your email">
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input class="form-control" type="password" required="" id="password" name="password" required placeholder="Enter your password">
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                            <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>

                                    <div class="mb-3 d-grid text-center">
                                        <button class="btn btn-primary" type="submit" name ="submit" > Log In </button>
                                    </div>
                                </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="pages-recoverpw.html" class="text-muted ms-1"><i class="fa fa-lock me-1"></i>Forgot your password?</a></p>
                                <p class="text-muted">Don't have an account? <a href="pages-register.html" class="text-dark ms-1"><b>Sign Up</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>
</html>