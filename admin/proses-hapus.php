<?php 
	
	include '..\db.php';

	if(isset($_GET['idp'])){
		$produk = mysqli_query($conn, "SELECT prod_img FROM tb_product WHERE prod_id = '".$_GET['idp']."' ");
		$p = mysqli_fetch_object($produk);

		unlink('../img/product/'.$p->product_image);

		$delete = mysqli_query($conn, "DELETE FROM tb_product WHERE prod_id = '".$_GET['idp']."' ");
		echo '<script>window.location="admin-product.php"</script>';
	}

?>