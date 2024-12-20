<!-- 
	** Bài tập nhóm PHP
	** Nguyễn Thanh Phúc 
	** github.com/ntphuc98
-->
<?php
	if(!isset($_GET['id'])){
		header("location:../index.php");
	}else{
		$id = $_GET['id'];
		require_once("../views/header.php");
		require_once("../model/m_products.php");
		$m_products = new M_Products();
		//lấy dữ liệu theo id
		$data = $m_products->queryDetails($id);
		//không có kết quả
		if($data==0){
			header("location:../index.php");
		}
		if($_SERVER['REQUEST_METHOD'] == 'POST'){ //add cart
			if(!isset($_SESSION['id']) || !isset($_SESSION['name']) || !isset($_SESSION['role'])){ //kiem tra login
				echo "<script type='text/javascript' charset='utf-8' >
							$(document).ready(function(){ $('#danger').show(); 
						});
						</script>";
			}else{
				require_once("../model/m_cart.php");
				$m_cart = new M_Cart();
				$idUser = $_SESSION["id"];
				$idProduct = $id;

				if($m_cart->queryCart($idUser, $idProduct)){
					echo "<script type='text/javascript' charset='utf-8' >
					$(document).ready(function(){ 
						$('#had').show(); });
						</script>";
				}else{
					$size = $_POST['size'];
					$amount = $_POST['amount'];
					$amount_total = $m_products->queryAmountProduct($idProduct);
					if($amount > $amount_total['amount']){
						echo "<script type='text/javascript' charset='utf-8' >$(document).ready(function(){ 
						$('#amountTotal').show(); });</script>";
					}else{
						$amount_product = (int)$amount_total['amount'] - (int)$amount;
						$m_products->updateAmountProduct($idProduct, $amount_product);
						$m_cart->insertCart( $idUser, $idProduct, $size, $amount);
						echo "<script type='text/javascript' charset='utf-8' >$(document).ready(function(){ 
							$('#added').show(); });</script>";
					}
				}
			}
		}
		require_once("../views/detail.php");
		require_once("../views/footer.php");
	}
	?>

	<script type="text/javascript">
		$(document).ready(function() {
			document.title = '<?=$data['name']?>';
		});
	</script>