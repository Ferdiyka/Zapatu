<?php 
	session_start();
    include '..\db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
	}
    // Pagination Logic
    $jumDataPage = 5;
    $totDataDB = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_product WHERE prod_category=0"));
    $totPage = ceil($totDataDB / $jumDataPage);
    $pageActive = (isset($_GET["page"])) ? $_GET['page'] : 1;
    $firstData = ($jumDataPage * $pageActive) - $jumDataPage;
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
                        <a href="admin-dashboard.php" class="nav-link">Dasboard</a>
                    </li>

                    <!-- History -->
                    <li class="nav-item mx-md-2">
                        <a href="admin-history.php" class="nav-link">History</a>
                    </li>

                    <!-- Product -->
                    <li class="nav-item mx-md-2">
                        <a href="admin-product.php" class="nav-link active">Product</a>
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
            <div class="container-fluid col-lg-10 col-md-11 col-sm-11">
                <div class="col p-0">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">
                                <a href="admin-product.php" class="text-decoration-none">Product</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>


            <!-- Table  -->
            <div class="container-fluid col-lg-10 section-dash-table">
                <a href="admin-add-product.php" class="btn btn-block btn-primary mb-2">Add Product</a>
                <table class="table" >
                    <thead>
                        <tr>
                            <th scope="col" class="col-0">NO</th>
                            <th scope="col" class="col-1">Name</th>
                            <th scope="col" class="col-1">Brand</th>
                            <th scope="col" class="col-0">Category</th>
                            <th scope="col" class="col-0">Size</th>
                            <th scope="col" class="col-0">Gender</th>
                            <th scope="col" class="col-1">Price</th>
                            <th scope="col" class="col-0">Stock</th>
                            <th scope="col" class="col-3">Description</th>
                            <th scope="col" class="col-md-auto">Image</th>
                            <th scope="col" class="col-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- Looping Prod Name -->  
                        <?php
                            $no = 1;
                            $isi = mysqli_query($conn, "SELECT * FROM tb_product ORDER BY prod_id DESC");
                            while($row = mysqli_fetch_array($isi)){
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['prod_name'] ?></td>
                            <td><?php echo $row['prod_brand'] ?></td>
                            <td>
                                <?php 
                                    $cat = $row['prod_category'];

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
                            <td>
                                <?php 
                                    $size = $row['prod_size'];

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
                            <td>
                                <?php 
                                    $gender = $row['prod_gender'];

                                    switch($gender){
                                        case 0 : echo "Male"; break;
                                        case 1 : echo "Female"; break;
                                        case 2 : echo "Unisex"; break;
                                        default: echo "Data Undefined";
                                    }
                                ?> 
                                </td>
                            <td>Rp. <?php echo number_format($row['prod_price']) ?></td>
                            <td><?php echo $row['prod_stock'] ?></td>
                            <td align="justify"><?php echo $row['prod_desc'] ?></td>
                            <td class="btn-verif">
                                <a href="..\img\product\<?php echo $row['prod_img'] ?>" class="btn btn-block btn-primary mb-2" target="_blank">View</a>
                            </td>
                            <td class="btn-verif">
                                <a href="edit-produk.php?id=<?php echo $row['prod_id'] ?>" class="btn btn-block btn-warning mb-2">Edit</a> 
                                <a href="proses-hapus.php?idp=<?php echo $row['prod_id'] ?>"class="btn btn-block btn-danger mb-2" onclick="return confirm('Yakin ingin hapus ?')">Delete</a>
                            </td>

                        <?php } ?>
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end p-3">

                        <?php if($pageActive > 1) : ?>
                            <li class="page-item"><a href="?page=<?= $pageActive - 1;?>" class="page-link p-3">Previous</a></li>
                        <?php else : ?>
                            <li class="page-item disabled"><a href="?page=<?= $pageActive;?>" class="page-link p-3">Previous</a></li>
                        <?php endif; ?>
                        
                        <?php for($i=1; $i<=$totPage; $i++) :?>
                            <?php if($i == $pageActive) : ?>
                                <li class="page-item active"><a class="page-link p-3" href="?page=<?= $i;?>"><?= $i;?></a></li>
                            <?php else : ?>
                                <li class="page-item"><a class="page-link p-3" href="?page=<?= $i;?>"><?= $i;?></a></li>
                            <?php endif; ?>
                        <?php endfor; ?>
                        
                        <?php if($pageActive < $totPage) : ?>
                            <li class="page-item"><a href="?page=<?= $pageActive + 1;?>" class="page-link p-3" href="#">Next</a></li>
                        <?php else : ?>
                            <li class="page-item disabled"><a href="?page=<?= $pageActive;?>" class="page-link p-3" href="#">Next</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
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