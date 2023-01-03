<?php 
	session_start();
    include '..\db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="index.php"</script>';
	}
    $product = mysqli_query($conn, "SELECT * FROM tb_product WHERE prod_id = '".$_GET['id']."' ");
	if(mysqli_num_rows($product) == 0){
		echo '<script>window.location="admin-product.php"</script>';
	}
	$k = mysqli_fetch_object($product);
    
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
    
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>

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
        <section class="section-dash-header"></section>
        <section class="section-prod-content">

            <!-- breadcrump -->
            <div class="container">
                <div class="col p-0">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="admin-product.php" class="text-decoration-none">Product</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a href="edit-produk.php" class="text-decoration-none">Edit Produk</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="upload col-xl-4">
                        <!-- Previous Pofile picture card-->
                        <div class="card">
                            <h4>Previous Image</h4>
                                <img src="..\img\product\<?php echo $k->prod_img ?>">
                        </div>
                        <!-- Profile picture card-->
                        <div class="card">
                            <h4>New Image</h4>
                            <div class="image">
                                <div class="form-input">
                                    <div class="preview">
                                        <img id="file-ip-1-preview">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-product col-xl-8">
                        <div class="card ">
                            <h4>Form Product</h4>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <!-- Form Group (Name)-->

                                <div class="mb-3 form-input">
                                    <label for="file-ip-1">Upload New Image</label>
                                    <input name="inputImage" type="file" id="file-ip-1" accept="image/*" onchange="showPreview(event);"
                                    value="<?php echo $k->prod_img ?>">
                                </div>

                                <div class="mb-3">
                                    <label class="small mb-1" for="inputName">Name</label>
                                    <input class="form-control" id="inputName" type="text"
                                        placeholder="Enter name product"  name="inputName" 
                                        value="<?php echo $k->prod_name ?>" required>
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (Brand)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputBrand">Brand</label>
                                        <input class="form-control" id="inputBrand" type="text"
                                            placeholder="Enter brand product"  name="inputBrand"
                                            value="<?php echo $k->prod_brand ?>" required>
                                            
                                    </div>
                                    <!-- Form Group (Category)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputCategory">Category</label>
                                        <select id="inputCategory" class="form-select"  name="inputCategory">
                                            <option style="background: red" value=""><?php
                                                $category = $k->prod_category;

                                                switch($category){
                                                    case 0 : echo "Sport Running"; break;
                                                    case 1 : echo "Sneakers"; break;
                                                    case 2 : echo "Slip On"; break;
                                                    case 3 : echo "Flat Shoes"; break;
                                                    case 4 : echo "Leather Shoes"; break;
                                                    default: echo "Data Undefined";
                                                }
                                            ?></option>
                                            <option value="0">Sport Running</option>
                                            <option value="1">Sneakers</option>
                                            <option value="2">Slip On</option>
                                            <option value="3">Flat Shoes</option>
                                            <option value="4">Leather Shoes</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Form Row  -->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (Size)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputSize">Size</label>
                                        <select name="inputSize" id="inputSize" class="form-select">
                                            <option style="background: red" value=""><?php
                                                $size = $k->prod_size;

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
                                            ?></option>
                                            <option value="0">36</option>
                                            <option value="1">37</option>
                                            <option value="2">38</option>
                                            <option value="3">39</option>
                                            <option value="4">40</option>
                                            <option value="5">41</option>
                                            <option value="6">42</option>
                                            <option value="7">43</option>
                                            <option value="8">44</option>
                                            <option value="9">45</option>
                                        </select>
                                    </div>
                                    <!-- Form Group (Gender)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputGender">Gender</label>
                                        <select name="inputGender" id="inputGender" class="form-select"  >
                                            <option style="background: red" value=""><?php 
                                                $gender = $k->prod_gender;

                                                switch($gender){
                                                    case 0 : echo "Male"; break;
                                                    case 1 : echo "Female"; break;
                                                    case 2 : echo "Unisex"; break;
                                                    default: echo "Data Undefined";
                                                }
                                            ?></option>
                                            <option value="0">Male</option>
                                            <option value="1">Female</option>
                                            <option value="2">Unisex</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (Price)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputPrice">Price</label>
                                        <input name="inputPrice" class="form-control" id="inputPrice" type="text"
                                            placeholder="Enter price product"
                                            value="<?php echo $k->prod_price ?>" >
                                    </div>
                                    <!-- Form Group (Stock)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputStock">Stock</label>
                                        <input class="form-control" id="inputStock" type="number" name="inputStock"
                                            placeholder="Enter stock product" step="1" min="0"
                                            value="<?php echo $k->prod_stock ?>" required>
                                    </div>
                                </div>

                                <!-- Form Group (Descripstion)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputDescription">Descripstion</label>
                                    <textarea name="inputDescription" class="form-control" id="inputDescription" cols="30"
                                        rows="10" placeholder="Enter description product">
                                        <?php echo $k->prod_desc ?>
                                    </textarea>
                                </div>

                                <!-- Save changes button-->
                                <input type="submit" name="submit" value="Edit Product" class="btn">
                                <button type="submit" name="cancel" value="Cancel" class="btn btn-cancel"><a href="admin-product.php" onclick="return confirm('Are you sure ?')">Cancel</a></button>
                            </form>

                            <?php 
					            if(isset($_POST['submit'])){
                                    // Menampung inputan dari form
						            $name       = strtolower($_POST['inputName']);
                                    $brand 		= strtolower($_POST['inputBrand']);
                                    $category 	= $_POST['inputCategory'];
                                        switch($category){
                                            case 0 : $cat = "Sport Running"; break;
                                            case 1 : $cat = "Sneakers"; break;
                                            case 2 : $cat = "Slip On"; break;
                                            case 3 : $cat = "Flat Shoes"; break;
                                            case 4 : $cat = "Leather Shoes"; break;
                                            default: $cat = "Data Undefined";
                                        }
                                    $sizes 		= $_POST['inputSize'];
                                        switch($sizes){
                                            case 0 : $size = "36"; break;
                                            case 1 : $size = "37"; break;
                                            case 2 : $size = "38"; break;
                                            case 3 : $size = "39"; break;
                                            case 4 : $size = "40"; break;
                                            case 5 : $size = "41"; break;
                                            case 6 : $size = "42"; break;
                                            case 7 : $size = "43"; break;
                                            case 8 : $size = "44"; break;
                                            case 9 : $size = "45"; break;
                                            default: $size = "Data Undefined";
                                        }
                                    $gender 		= $_POST['inputGender'];
                                        switch($gender){
                                            case 0 : $gen = "Male"; break;
                                            case 1 : $gen = "Female"; break;
                                            case 2 : $gen = "Unisex"; break;
                                            default: $gen = "Data Undefined";
                                        }    
                                    $price      = str_replace(".", "", str_replace("Rp. ","",$_POST['inputPrice']));
                                    $stock 	    = $_POST['inputStock'];
                                    $desc 	    = $_POST['inputDescription'];

                                    // Menampung data file yang diupload
                                    // Ambil nama image
                                    $filename = $_FILES['inputImage']['name'];      
                                    // echo $filename;     // Nama.format
                                    // Alamat temporary
                                    $tmp_name = $_FILES['inputImage']['tmp_name'];  
                                    // echo $tmp_name;     // Path folder
                                    // Ambil format image
                                    $type1 = explode('.', $filename);               
                                    // print_r($type1);    // [0] nama, [1] format
                                    $type2 = $type1[1];
                                    // echo $type2;        // Format

                                    // Name Image baru
                                    $nameProd = str_replace(' ', '', preg_replace("#[[:punct:]]#", "", $name));
                                    $newname = 'PROD_'.$nameProd.'_'.time().'.'.$type2;

                                    // Menampung data format file yang diizinkan
                                    $tipe_izin = array('jpg', 'jpeg', 'png', 'gif');

                                    if(empty($filename)){
                                        $update = mysqli_query(
                                            $conn, "UPDATE tb_product SET
                                            prod_name = '".$name."',
                                            prod_brand = '".$brand."',
                                            prod_category = '".$category."',
                                            prod_size = '".$sizes."',
                                            prod_gender = '".$gender."',
                                            prod_price = '".$price."',
                                            prod_stock = '".$stock."',
                                            prod_desc = '".$desc."'
                                            WHERE prod_id = '".$k->prod_id."' ");
    
                                        if($update){
                                            echo '<script>alert("Edit data berhasil")</script>';
                                            echo '<script>window.location="admin-product.php"</script>';
                                        }else{
                                            echo 'gagal '.mysqli_error($conn);
                                        }
                                }else{
 
                                    // Validasi format file
                                    if(!in_array($type2, $tipe_izin)){
                                        echo '<script>alert("File format not allowed !")</scrtip>';
                                    }else{
                                        //Memasukan file image baru ke folder
                                        move_uploaded_file($tmp_name, '../img/product/'.$newname);
                                        $update = mysqli_query(
                                            $conn, "UPDATE tb_product SET
                                            prod_img = '".$newname."',
                                            prod_name = '".$name."',
                                            prod_brand = '".$brand."',
                                            prod_category = '".$category."',
                                            prod_size = '".$sizes."',
                                            prod_gender = '".$gender."',
                                            prod_price = '".$price."',
                                            prod_stock = '".$stock."',
                                            prod_desc = '".$desc."'
                                            WHERE prod_id = '".$k->prod_id."' ");
    
                                        if($update){
                                            echo '<script>alert("Edit data berhasil")</script>';
                                            echo '<script>window.location="admin-product.php"</script>';
                                        }else{
                                            echo 'gagal '.mysqli_error($conn);
                                        }
                                            
                                    }  
                                                
                                    }
                                }
                            
                            ?>

                        </div>
                    </div>
                </div>
            </div>
            <section>
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
    <script>
        CKEDITOR.replace('inputDescription');
    </script>
    
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