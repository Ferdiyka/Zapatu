<?php
require "functions.php";
session_start();
if($_SESSION['status_login'] != true){
  echo '<script>window.location="user-login.php"</script>';
}
$shoes = query("SELECT * FROM tb_product");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Zapatu</title>
    <link rel="stylesheet" href="../fe/libraries/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="../fe/style/main.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <!-- Navbar  -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="container">
        <!-- Logo  -->
        <a href="index.php" class="navbar-brand mt-3 mb-3">
          <h3>ZAPATU</h3>
        </a>

        <!-- Bikin tombol dikanan  -->
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu  -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <!-- Home -->
            <li class="nav-item mx-md-2">
              <a href="index.php" class="nav-link">Home</a>
            </li>

            <!-- Collection -->
            <li class="nav-item mx-md-2">
              <a href="collection.php" class="nav-link">Collection</a>
            </li>

            <!-- History -->
            <li class="nav-item mx-md-2">
              <a href="history.php" class="nav-link">History</a>
            </li>

            <!-- Profile -->
            <li class="nav-item mx-md-2">
              <a href="user-profil.php" class="nav-link">Profile</a>
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

      <!-- Produk -->
    <div class="container">
      <div class="form-group">
        <div class="input-group col mb-2 mt-2">
          <form class="d-flex col" action="" method="">
            <span class="input-group-text" id="addon-wrapping">Search</span>
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search_text" id="search_text">
          </form>
        </div>
      </div>
      <div class="container-xxl">
        <div class="">
          <div id="result" class=""></div>
        </div>
      </div>
    </div>
    </div>
    <!-- Akhir Produk -->

    <footer>
        <div class="container">
            <div class="footer-info">
                <h4 id="time"></h4>
                
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

    <script src="../fe/libraries/bootstrap/js/bootstrap.js"></script>
    <script src="../fe/libraries/retina/retina.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


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

<script>
      $(document).ready(function() {

      load_data();

      function load_data(query) {
        $.ajax({
          url: "ambil.php",
          method: "POST",
          data: {
            query: query
          },
          success: function(data) {
            $('#result').html(data);
          }
        });
      }
      $('#search_text').keyup(function() {
        var search = $(this).val();
        if (search != '') {
          load_data(search);
        } else {
          load_data();
        }
      });
      });
    </script>
  </body>
</html>
