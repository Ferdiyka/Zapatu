<?php 
	session_start();
    include '..\db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="index.php"</script>';
	}


    $trans = mysqli_query($conn, "SELECT * FROM tb_transaction 
                            JOIN tb_user ON tb_transaction.user_id = tb_user.user_id  
                            JOIN tb_product ON tb_transaction.prod_id = tb_product.prod_id 
                            WHERE trans_id = '".$_GET['id_trans']."' ");

    if(mysqli_num_rows($trans) <= 0){
		echo '<script>window.location="admin-dashboard.php"</script>';
	}
    $pTrans = mysqli_fetch_object($trans);

?>

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
                        <a href="admin-dashboard.php" class="nav-link ">Dasboard</a>
                    </li>

                    <!-- History -->
                    <li class="nav-item mx-md-2">
                        <a href="admin-history.php" class="nav-link active">History</a>
                    </li>

                    <!-- Product -->
                    <li class="nav-item mx-md-2">
                        <a href="admin-product.php" class="nav-link">Product</a>
                    </li>

                    <!-- Profile -->
                    <li class="nav-item mx-md-2">
                        <a href="admin-profil.php" class="nav-link">Profile</a>
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
            <div class="container">
                <div class="col p-0">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="admin-history.php" class="text-decoration-none">History</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Details
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>


            <div class="container">
                <div class="row">

                    <!-- Card Left -->
                    <div class="col-lg-6 pl-0">
                        <div class="card card-details">
                            <h4>Details Transaction</h4>

                            <!-- Button Download  -->
                            <a href="admin-printReport.php?id_trans=<?php echo $pTrans->trans_id ?>" target="_blank" class="btn  btn-pdf mb-2">
                                Download PDF
                            </a>

                            <table class="table" >
                                <hr>
                                <tbody>
                                    <tr>
                                        <th>ID Transaction</th>
                                        <td><?php echo $pTrans->trans_id ?></td>
                                    </tr>
                                    <tr>
                                        <th>ID User</th>
                                        <td><?php echo $pTrans->user_id ?></td>
                                    </tr>
                                    <tr>
                                        <th>ID Product</th>
                                        <td><?php echo $pTrans->prod_id ?></td>
                                    </tr>
                                    <tr>
                                        <th>ID Admin</th>
                                        <td><?php echo $pTrans->adm_id ?></td>
                                    </tr>
                                    <tr>
                                        <th>User Name</th>
                                        <td><?php echo ucwords($pTrans->user_name) ?></td>
                                    </tr>
                                    <tr>
                                        <th>User Address</th>
                                        <td><?php echo ucwords($pTrans->receiver_address) ?></td>
                                    </tr>
                                    <tr>
                                        <th>User Phone</th>
                                        <td><?php echo $pTrans->receiver_tlp ?></td>
                                    </tr>
                                    <tr>
                                        <th>User Email</th>
                                        <td><?php echo $pTrans->user_email ?></td>
                                    </tr>
                                    <tr>
                                        <th>Product Name</th>
                                        <td><?php echo ucwords($pTrans->prod_name) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Product Brand</th>
                                        <td><?php echo ucwords($pTrans->prod_brand) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Product Size</th>
                                        <td>
                                            <?php 
                                                $size = $pTrans->prod_size;

                                                switch($size){
                                                    case 0 : echo "36"; break;
                                                    case 1 : echo "37"; break;
                                                    case 2 : echo "38"; break;
                                                    case 3 : echo "39"; break;
                                                    case 4 : echo "40"; break;
                                                    case 5 : echo "41"; break;
                                                    case 6 : echo "42"; break;
                                                    case 7 : echo "43"; break;
                                                    case 8 : echo "44"; break;
                                                    case 9 : echo "45"; break;
                                                    default: echo "Data Undefined";
                                                }
                                            ?>    
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Product Gender</th>
                                        <td>
                                            <?php 
                                                $gender = $pTrans->prod_gender;

                                                switch($gender){
                                                    case 0 : echo "Male"; break;
                                                    case 1 : echo "Female"; break;
                                                    case 2 : echo "Unisex"; break;
                                                    default: echo "Data Undefined";
                                                }
                                            ?>    
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Product Category</th>
                                        <td>
                                            <?php 
                                                $cat = $pTrans->prod_category;

                                                switch($cat){
                                                    case 0 : echo "Sport Running"; break;
                                                    case 1 : echo "Sneakers"; break;
                                                    case 2 : echo "Slip On"; break;
                                                    case 3 : echo "Flat Shoes"; break;
                                                    case 4 : echo "Leather Shoes"; break;
                                                    default: echo "Data Undefined";
                                                }
                                            ?>    
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Product Quantity</th>
                                        <td><?php echo $pTrans->prod_qty ?></td>
                                    </tr>
                                    <tr>
                                        <th>Product Price</th>
                                        <td><?php echo 'Rp. '.number_format($pTrans->prod_price) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Total Price</th>
                                        <td><?php echo 'Rp. '.number_format($pTrans->total_price) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Transaction Status</th>
                                        <td>
                                            <?php 
                                                $status = $pTrans->trans_status;

                                                switch($status){
                                                    case 0 : echo "Proses"; break;
                                                    case 1 : echo "Verif"; break;
                                                    case 2 : echo "Reject"; break;
                                                    default: echo "Data Undefined";
                                                }

                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Transaction Date</th>
                                        <td><?php echo $pTrans->trans_date ?></td>
                                    </tr>
                                    <tr>
                                        <th>Status Date</th>
                                        <td><?php echo $pTrans->trans_status_date ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Card Right  -->
                    <div class="col-lg-6 ">
                        <div class="card card-details card-right">
                            <h4>Product Image</h4>

                            <img src="..\img\product\<?php echo $pTrans->prod_img ?>" alt="<?php echo ucwords($pTrans->prod_name) ?>"
                                style="border: 1px solid #DBDBDB;" title="<?php echo ucwords($pTrans->prod_name) ?>">

                            <p class="text-center mt-5"><?php echo ucwords($pTrans->prod_name) ?></p>

                        </div>
                        <br><br>
                        <div class="card card-details card-right-bank">
                            <h4>Payment Transfer</h4>

                            <img src="..\img\product\<?php echo $pTrans->trans_img_pay ?>" alt="<?php echo $pTrans->trans_img_pay ?>"
                            style="border: 1px solid #DBDBDB;" title="<?php echo $pTrans->trans_img_pay ?>">

                        </div>
                    </div>
                </div>
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