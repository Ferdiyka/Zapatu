<?php 
    session_start();
    require "view/functions.php";
    if(isset($_POST['login'])){
        

      $username = $_POST["username"];
      $password = $_POST["password"];


      $cek = mysqli_query($conn, "SELECT * FROM tb_user WHERE user_username = '".$username."' AND user_pass = '".MD5($password)."'");
        
        if(mysqli_num_rows($cek) > 0){
            echo 'login berhasil';
            $d = mysqli_fetch_object($cek);
            $_SESSION['username'] = $_POST["username"];
            $_SESSION['status_login'] = true;
            $_SESSION['a_global'] = $d;
            $_SESSION['id'] = $d -> user_id;
            echo '<script>window.location="view/index.php"</script>';
        } else{
            echo '<script>alert("Your username or password is wrong !")</script>';
        }

    }
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <!-- My CSS -->
  <link rel="stylesheet" href="style.css">

  <title>ZAPATU | Login</title>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" id="brand" href="#" ><h3>ZAPATU</h3></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      </div>
    </div>
  </nav>
  <!-- Akhir Navbar -->
  <!-- Header -->
  <section>
    <div class="container" id="reg-header">
      <h1>Log In</h1>
      <p>Hi! lemme know you first</p>
    </div>
  </section>
  <!-- Akhir Header -->
  <!-- JANGAN DIGANTi -->
  <!-- Form -->
  <div class="container w-50 mt-3 mb-3" style="background: #F8F8FD;">
    <form action="" method="POST">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" id="username">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password">
      </div>
      <p class="text-center mt-4 fs-6">You don't have account? <a href="view/register.php">Register</a></p>
      <button type="submit" class="btn btn-primary mt-3 mb-3 border-0" style="background: orange;" name="login">Log In</button>
    </form>
  </div>
  <!-- Akhir Form -->
  <!-- JANGAN DIGANTI -->
  <!-- Footer -->
  <footer>
      <div class="container">
        <div class="footer-info">
          <br><br><br><br><br>
          <h6>Saturday 24 / 04 / 2022 &nbsp; • &nbsp; 17 : 30 : 23</h6>
        </div>
      </div>
           <!-- Copyright  -->
           <div class="container-fluid">
            <div class="footer-copyright">
                <div class="row border-top justify-content-center align-items-center pt-4 mb-5">
                    <div class="col-auto text-gray-500 font-weight-light pt-2">
                        <p style="color:#6E6E6E">2022 Copyright Zapatu • All right reserved • Made in Jakarta</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

  <!-- Akhir Footer -->
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>

</html>