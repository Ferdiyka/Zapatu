<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zapatu</title>

    <link rel="stylesheet" href="..\fe\libraries\bootstrap\css\bootstrap.css">
    <link rel="stylesheet" href="..\fe\style\main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

</head>

<body>
    <div class="container gradient-custom">
        <div class="header-login text-center">
            <h4>ZAPATU COMPANY</h4>
            <p>We Empower People to Own the Shoes They Love</p>
        </div>

        <section class="form-login">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-8 col-lg-7 col-xl-5">
                        <div class="card text-white" style="border-radius: 1rem;">
                            <div class="card-body  text-center">
                                <form action="" method="POST">
                                    <div class="mb-md-4 mt-md-4">
                                        <h2 class="fw-bold mb-1 text-uppercase">Login</h2>
                                        <p class="text-white-50 mb-5 ">Please enter your Username and password!</p>
                                        <div class="form-outline form-white mb-4">
                                            <input type="text" name="user" id="typeUserX" class="form-control form-control-lg" required
                                                placeholder="Username" />
                                        </div>
    
                                        <div class="form-outline form-white mb-4">
                                            <input type="password" name="pass" id="typePasswordX" class="form-control form-control-lg"
                                                placeholder="Password" required />
                                        </div>
    
                                        <p class="small mb-5 pb-lg-2"><a class="resetPass"
                                                href="https://api.whatsapp.com/send?phone=+6285892547068&text=Halo Pak Ibra, Saya butuh bantuan bapak untuk reset akun saya"
                                                target="_blank">Forgot password?</a></p>
    
                                        <input type="submit" name="submit" value="Login" class="btn btn-login btn-lg px-5">
                                    </div>
                                </form>    

                                <!-- PHP  -->
                                <?php 
                                    if(isset($_POST['submit'])){
                                        session_start();
                                        include '..\db.php';

                                        $user = mysqli_real_escape_string($conn, $_POST['user']);
                                        $pass = mysqli_real_escape_string($conn, $_POST['pass']);

                                        $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE adm_username = '".$user."' AND adm_pass = '".MD5($pass)."'");
                                        
                                        if(mysqli_num_rows($cek) > 0){
                                            echo 'login berhasil';
                                            $d = mysqli_fetch_object($cek);
                                            $_SESSION['status_login'] = true;
                                            $_SESSION['a_global'] = $d;
                                            $_SESSION['id'] = $d -> adm_id;
                                            echo '<script>window.location="admin-dashboard.php"</script>';
                                        } else{
                                            echo '<script>alert("Your username or password is wrong !")</script>';
                                        }

                                    }
                                ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <footer>
        <div class="container">
            <div class="footer-info">
                <h4 id="time"></h4>
                <p>
                    <a href="https://api.whatsapp.com/send?phone=+6285892547068&text=Halo Pak Ibra, Saya butuh bantuan bapak untuk website admin ZAPATU"
                        target="_blank"><img src="..\fe\images\ic-help.png" alt="icon-help"></a>
                </p>
            </div>
        </div>
        <!-- Copyright  -->
        <div class="container-fluid">
            <div class="footer-copyright">
                <div class="row border-top justify-content-center align-items-center pt-4 mb-5">
                    <div class="col-auto text-gray-500 font-weight-light pt-2">
                        <p style="color:#6E6E6E">© 2021-<?php echo date("Y"); ?> Copyright Zapatu • All right reserved • Made in Jakarta</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="..\fe\libraries\bootstrap\js\bootstrap.js"></script>
    <script src="..\fe\script\main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
    <!-- Untuk Realtime Date time  -->
    <script type="text/javascript">
        var timestamp = '<?=time();?>';
        function updateTime(){
            $('#time').html(Date(timestamp));
            timestamp++;
        }
        $(function(){
            setInterval(updateTime, 1000);
        });
    </script>


</body>
</html>