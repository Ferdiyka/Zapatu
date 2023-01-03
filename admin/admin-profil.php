<?php 
	session_start();
	include '..\db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="index.php"</script>';
	}
    $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE adm_id = '".$_SESSION['id']."' ");
	$d = mysqli_fetch_object($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zapatu</title>

    <link rel="stylesheet" href="..\fe\libraries\bootstrap\css\bootstrap.css">
    <link rel="stylesheet" href="../view/fe/style/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

</head>

<body>

    <!-- Navbar  -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <!-- Logo  -->
            <a href="admin-dashboard.php" class="navbar-brand mt-3 mb-3">
                <h3>ZAPATU Company</h3>
            </a>

            <!-- Bikin tombol dikanan  -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <!-- Menu  -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <!-- Dasboard -->
                    <li class="nav-item  mx-md-2">
                        <a href="admin-dashboard.php" class="nav-link">Dasboard</a>
                    </li>

                    <!-- History -->
                    <li class="nav-item mx-md-2">
                        <a href="admin-history.php" class="nav-link">History</a>
                    </li>

                    <!-- Product -->
                    <li class="nav-item mx-md-2">
                        <a href="admin-product.php" class="nav-link">Product</a>
                    </li>

                    <!-- Profile -->
                    <li class="nav-item mx-md-2">
                        <a href="admin-profil.php" class="nav-link active">Profile</a>
                    </li>

                    <!-- Mobile Button Logout  -->
                    <form class="form-inline d-sm-block d-md-none">
                        <button class="btn btn-login my-2 my-sm-0">
                            <a class="text-reset text-decoration-none" href="logout.php" onclick="return confirm('Are you sure ?')">Logout</a>
                        </button>
                    </form>

                    <!-- Desktop Button Logout  -->
                    <form class="form-inline my-2 my-lg-0 d-none d-md-block">
                        <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">
                            <a class="text-reset text-decoration-none" href="logout.php" onclick="return confirm('Are you sure ?')">Logout</a>
                        </button>
                    </form>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <!-- BG Hiasan -->
        <section class="section-dash-header"></section>
        <section class="section-dash-content">

            <!-- breadcrump -->
            <div class="container-fluid col-lg-10 col-md-11 col-sm-11">
                <div class="col p-0">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">
                                <a href="admin-profil.php" class="text-decoration-none">Profile</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>


            <!-- Ubah Profile  -->
            <div class="container-fluid col-lg-10 section-dash-table">
                <form action="" method="POST">
                    <input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $d->adm_username ?>">
                    <input type="submit" name="submit" value="Ubah Username"  class="btn btn-block btn-primary mb-2">
                </form>
                <?php 
					if(isset($_POST['submit'])){

						$user 	= $_POST['user'];
                        
						$update = mysqli_query($conn, "UPDATE tb_admin SET 
										adm_username = '".$user."'
										WHERE adm_id = '".$d->adm_id."' ");
						if($update){
							echo '<script>alert("Ubah data berhasil")</script>';
							echo '<script>window.location="admin-profil.php"</script>';
						}else{
							echo 'gagal '.mysqli_error($conn);
						}
					}
				?>
            </div>
            <!-- Password  -->
            <div class="container-fluid col-lg-10 section-dash-table">
                <form action="" method="POST">
                    <input type="password" name="pass1" placeholder="Password Baru" class="input-control" required>
					<input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="input-control" required>
					<input type="submit" name="ubah_password" value="Ubah Password"  class="btn btn-block btn-primary mb-2">
                </form>
                <?php 
					if(isset($_POST['ubah_password'])){

						$pass1 	= $_POST['pass1'];
						$pass2 	= $_POST['pass2'];

						if($pass2 != $pass1){
							echo '<script>alert("Konfirmasi Password Baru tidak sesuai")</script>';
						}else{

							$u_pass = mysqli_query($conn, "UPDATE tb_admin SET 
										adm_pass = '".MD5($pass1)."'
										WHERE adm_id = '".$d->adm_id."' ");
							if($u_pass){
								echo '<script>alert("Ubah data berhasil")</script>';
								echo '<script>window.location="admin-profil.php"</script>';
							}else{
								echo 'gagal '.mysqli_error($conn);
							}
						}

					}
				?>
            </div>           

        </section>
    </main>

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