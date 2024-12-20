<!-- 
	** Bài tập nhóm PHP
	** Nguyễn Thanh Phúc 
	** github.com/ntphuc98
-->
	<?php
	require_once("../views/header.php");
	if( //check admin user
		!isset($_SESSION['name']) || !isset($_SESSION['id']) || 
		!isset($_SESSION['role']) || ($_SESSION['role']!="1")
	){
		header("location:index.php");
	}else{
		require_once("../views/navAdmin.php");
		if( $_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add'])){
				//kiểm tra upload file hình ảnh
			if(isset($_FILES["imgUpload"])){
				require_once("c_uploadFile.php");
			}
			if( !isset($imgErr) ){ //k co loi
				$img = basename($_FILES["imgUpload"]["name"]);
				$productArr = array ( $_POST["name"], 
					$_POST["gender"], 
					$_POST["types"], 
					$_POST["amount"], 
					$_POST["cost"], 
					$img, 
					$_POST["describes"]
				);
				//add model and insert
				require_once("../model/m_products.php");
				$m_products = new M_Products();
				$add = $m_products->insertProduct($productArr);
				//insert ok
				if( $add ){
					echo "
					<script type='text/javascript'>
					$(document).ready(function() {
						$('.card-body').html(function(){
							return '<div class=\'alert alert-success\' role=\'alert\'>Thêm sản phẩm thành công !</div>';
							});
							});
							</script>";
				}
			}
		}

		//add views
		require_once("../views/adminAddProductsForm.php");
		require_once("../views/footer.php");
	}
?>