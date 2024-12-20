<!-- Bài tập nhóm PHP
	Nguyễn Thanh Phúc - github.com/ntphuc98 -->

	<?php
	require_once("../views/header.php");
	if(
		!isset($_SESSION['name']) || 
		!isset($_SESSION['id']) || 
		!isset($_SESSION['role']) ||
		($_SESSION['role']!="1")
	){
		header("location:index.php");
	}
	require_once("../model/m_products.php");
	require_once("../views/navAdmin.php");

	$m_products = new M_Products();
	//edit product
	if(isset($_GET["edit"])){
		$idProduct = $_GET["edit"];
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["update"])) {
			//kiểm tra upload file hình ảnh
			if(isset($_FILES["imgUpload"]) && ($_FILES["imgUpload"]["error"] == 0) ) {
				require_once("c_uploadFile.php");
				if(!isset($imgErr)){
					$img = basename($_FILES["imgUpload"]["name"]);
					$productArr = array(
						$_POST["name"], 
						$_POST["gender"], 
						$_POST["types"], 
						$_POST["amount"], 
						$_POST["cost"], 
						$img, 
						$_POST["describes"],
						$idProduct
					);
					$m_products->updateProducts($productArr);
					echo '<div class="col-md-4 offset-4 alert alert-success" role="alert">Cập nhật thành công!</div>';
				}else{
					echo $imgErr;
				}
			}else{
				//get input
				$productArr = array(
					$_POST["name"], 
					$_POST["gender"], 
					$_POST["types"], 
					$_POST["amount"], 
					$_POST["cost"], 
					$_POST["img"], 
					$_POST["describes"],
					$idProduct
				);
				$m_products->updateProducts($productArr);
				echo '<div class="col-md-4 offset-4 alert alert-success" role="alert">Cập nhật thành công!</div>';
			}
		}
		//delete product
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["delete"])) {
			$m_products->deleteIdProducts($idProduct);
			echo '<div class="col-md-4 offset-4 alert alert-success" role="alert">Xóa product thành công!</div>';
		}
		//lấy dữ liệu theo id, load product detail
		$data = $m_products->queryDetails($idProduct);
		require_once("../views/adminProductsForm.php");


	}else{ //load all products
		$sql = "SELECT * FROM shoesProducts WHERE 1=1";
		$sql_total = "SELECT count(id) as total FROM shoesProducts WHERE 1=1";
		$link = "";
		//gioi tinh
		if(isset($_GET["gender"]) && ($_GET["gender"]!="-1")){
			$gender = $_GET["gender"];
			$sql_total .=  " AND gender=N'".$gender."'";
			$sql .= " AND gender=N'".$gender."'";
			$link.="gender=".$gender."&";
			echo '<script type="text/javascript">
			$(document).ready(function() {
				$("#gender option[value=\''.$gender.'\']").attr("selected", "selected");
				});
				</script>';
			}
		//kieu giay
			if(isset($_GET["types"]) && ($_GET["types"]!="-1")){
				$types = $_GET["types"];
				$sql_total .=" AND types=N'".$types."'";
				$sql .=" AND types=N'".$types."'";
				$link.="types=".$types."&";
				echo '<script type="text/javascript">
				$(document).ready(function() {
					$("#types option[value=\''.$types.'\']").attr("selected", "selected");
					});
					</script>';
				}
			//gia
				if( isset($_GET["cost"]) && ($_GET["cost"] != "-1") ){
					if($_GET["cost"] == "1"){
						$sql_total .=" ORDER BY cost";
						$sql .=" ORDER BY cost";
						$link.="cost=1&";
						echo '<script type="text/javascript">
						$(document).ready(function() {
							$("#cost option[value=1]").attr("selected", "selected");
							});
							</script>';
						}
						if($_GET["cost"] == "2"){
							$link.="cost=2&";
							$sql_total .=" ORDER BY cost DESC";
							$sql .=" ORDER BY cost DESC";
							echo '<script type="text/javascript">
							$(document).ready(function() {
								$("#cost option[value=2]").attr("selected", "selected");
								});
								</script>';
							}
						}
			$total_row = $m_products->queryTotalProducts($sql_total);
			$total_record = $total_row['total']; // tổng sô record trong table
			//trnag hiển thị
			$current_page =  isset($_GET['page']) ? $_GET['page'] : 1; 

			$limit = 5;
			$total_page = ceil($total_record / $limit); //hàm làm tròn lên.vd 2,3=3
			//kiểm tra nhập page
			if ($current_page > $total_page) {
				$current_page = $total_page;
			}
			if ($current_page < 1) {
				$current_page = 1;
			}
			//tính start
			$start = ($current_page - 1 ) * $limit;
			$sql .= " LIMIT ".$start." , ".$limit;
			$data = $m_products->queryProducts($sql);
			require_once("../views/adminProducts.php");
			require_once("../views/paging.php");
		}
		require_once("../views/footer.php");
		?>
		<script type="text/javascript">
	    $(document).ready(function() {
	        document.title = 'Quản trị Products';
	    });
	</script>