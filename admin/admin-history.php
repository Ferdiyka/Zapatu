<?php 
	session_start();
    include '..\db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="index.php"</script>';
	}
    

    // Pagination Logic
    $jumDataPage = 4;
    $totDataDB = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_transaction WHERE trans_status>0"));
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
        <section class="section-dash-header">
        </section><section class="section-dash-content">

            <!-- breadcrump -->
            <div class="container-fluid col-lg-10 col-md-11 col-sm-11">
                <div class="col p-0">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">
                                <a href="admin-history.php" class="text-decoration-none">History</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>



            <!-- Table  -->
            <div class="container-fluid col-lg-10 section-dash-table">
                <h4>List Verification</h4>
                <table class="table" >
                    <thead>
                        <tr>
                            <th scope="col" class="col-0">Id</th>
                            <th scope="col" class="col-2">Nama</th>
                            <th scope="col" class="col-0">Qty</th>
                            <th scope="col" >Total</th>
                            <th scope="col" class="col-2">Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col" class="col-0 text-center">Status</th>
                            <th scope="col" class="col-0">Image</th>
                            <th scope="col">Date</th>
                            <th scope="col" class="col-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        $trans = mysqli_query($conn, "SELECT * FROM tb_transaction 
                                                    JOIN tb_user ON tb_transaction.user_id = tb_user.user_id 
                                                    JOIN tb_product ON tb_transaction.prod_id = tb_product.prod_id 
                                                    WHERE trans_status>0 ORDER BY trans_id ASC LIMIT $firstData, $jumDataPage");
                        
                        // Jika data kosong
                        if(mysqli_num_rows($trans) > 0){
                            while($row = mysqli_fetch_array($trans)){
                    ?>
                                <tr>
                                    <th scope="row"><?php echo $row['trans_id'] ?></th>
                                    <td><?php echo ucwords($row['user_name']) ?></td>
                                    <td><?php echo $row['prod_qty'] ?></td>
                                    <td><?php echo 'Rp. '.number_format($row['total_price']) ?></td>
                                    <td><?php echo ucwords($row['receiver_address']) ?></td>
                                    <td><?php echo $row['receiver_tlp'] ?></td>
                                    <td class="text-center"><?php echo ($row['trans_status'] == 1)? 'Verif':'Reject'; ?></td>
                                    <td class="btn-verif">
                                        <a href="..\img\product\<?php echo $row['prod_img'] ?>" class="btn btn-block btn-primary mb-2" target="_blank">View</a>
                                    </td>
                                    <td><?php echo $row['trans_date'] ?></td>
                                    <td class="btn-verif text-center">
                                        <a href="admin-details.php?id_trans=<?php echo $row['trans_id'] ?>" class="btn btn-block btn-primary mb-2">Detail</a>
                                    </td>
                                </tr>
                    <?php }} else{ ?>
                        <tr>
                            <td align="center" colspan="10">Tidak ada data</td>
                        </tr>
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