<?php
//fetch.php

$connect = mysqli_connect("localhost", "root", "", "db_zapatu");
$output = '';
if (isset($_POST["query"])) {
  $search = mysqli_real_escape_string($connect, $_POST["query"]);
  $query = "
  SELECT * FROM tb_product 
  WHERE prod_name LIKE '%" . $search . "%'
  OR prod_brand LIKE '%" . $search . "%' 
  OR prod_price LIKE '%" . $search . "%' 
  OR prod_category LIKE '%" . $search . "%' 
 ";
} else {
  $query = "
  SELECT * FROM tb_product ORDER BY prod_name
 ";
}
$result = mysqli_query($connect, $query);

if (mysqli_num_rows($result) > 0) {

  foreach ($result as $row) {

    // echo '
    //     <div class="">
    //     <div class="col-4 mt-4 mb-2 ms-2">
    //       <div class="card">
    //         <div class="card-body" id="produk-show">
    //           <img src="../img/' . $row['gambar_produk'] . '" class="card-img-top" alt="">
    //           <div class="card-body">
    //             <h5 class="card-title">' . $row['nama_produk'] . '</h5>
    //             <p class="card-text">Rp.' . number_format($row['harga_produk']) . '</p>
    //             <a href="product.php?id=' . $row['productid'] . '" class="btn btn-primary">Order</a>
    //           </div>
    //         </div>
    //       </div>    
    //     </div>
    //     </div>
    //     ';
    echo '
    <div class="card mb-3 mt-4" style="max-width: 540px; background: #FB2E86;" >
      <div class="row no-gutters">
        <div class="col-md-4 mt-5">
          <img src="../img/product/' . $row['prod_img'] . '" class="card-img" alt="">
        </div>
          <div class="col-md-8">
          <div class="card-body">
          <h5 class="card-title">' . $row['prod_name'] . '</h5>
          <p class="card-text">Rp.' . number_format($row['prod_price']) . '</p>
          <p class="card-text">Kategori : ' . $row['prod_category'] . '</p>
          <p class="card-text">Size : ' . $row['prod_size'] . '</p>
          <p class="card-text">Stock : ' . $row['prod_stock'] . '</p>
          <a href="product.php?id=' . $row['prod_id'] . '" class="btn btn-primary">Order</a>
          </div>
        </div>
      </div>
    </div>
    ';
  }
} else {
  echo '<h4 class="pt-4 pb-5" align="center" >Shoes Not Found</h4>';
}
