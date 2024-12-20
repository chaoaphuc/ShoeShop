<!-- 
	** Bài tập nhóm PHP
	** Nguyễn Thanh Phúc 
	** github.com/ntphuc98
-->
<?php
	require_once("../views/header.php");
	//kiem tra login
	if(!isset($_SESSION['id']) || !isset($_SESSION['name']) || !isset($_SESSION['role'])){
		header('location:c_login.php');
	}else{
		require_once("../model/m_cart.php");
		require_once("../model/m_user.php");

		$idUser = $_SESSION['id'];
		$m_cart = new M_Cart();
		$m_user = new M_User();
		$userInfo = $m_user->queryProfile($idUser);

		if(($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST["delete"])){
			//lay so luong , id cua san pham trong gio hang user
			$amount_cart = $m_cart->queryIdCart($_POST["idcart"]);
			//so luong cua san pham trong table product
			require_once("../model/m_products.php");
			$m_products = new M_Products();
			$amount_total = $m_products->queryAmountProduct($amount_cart['idproduct']);
			//tinh so luong cap nhat sau khi xoa
			$amount_product = (int)$amount_total['amount'] + (int)$amount_cart['amount'];
			if ($m_cart->deleteIdCart($_POST["idcart"]) ){
				//sau khi xoa thanh cong cap nhat laji so luong san pham
				$m_products->updateAmountProduct( $amount_cart['idproduct'], $amount_product );
			}
		}

		if(($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST["update"])){
			//lay so luong , id cua san pham trong gio hang user
			$dataCartId = $m_cart->queryIdCart($_POST["idcart"]);
			//so luong cua san pham trong table product
			require_once("../model/m_products.php");
			$m_products = new M_Products();
			$dataProductId = $m_products->queryAmountProduct($dataCartId['idproduct']);
			//kiem tra so luong cap nhat voi so luong trong table products
			$amout_ok = (int)$dataProductId['amount'] + (int)$dataCartId['amount'];

			if(  $amout_ok >= $_POST["amount"]){
				//tinh so luong cap nhat sau khi update
				$amount_product = $amout_ok  - (int)$_POST["amount"];
				//cap nhat cart
				$ok = $m_cart->updateCart($_POST["idcart"], $_POST["size"], $_POST["amount"]);

				if($ok){
					// cap nhat product
					$m_products->updateAmountProduct( $dataCartId['idproduct'], $amount_product );
				}
			}else{
				echo "<script type='text/javascript' charset='utf-8' >
							$(document).ready(function(){ $('#amountTotal').show(); 
						});
						</script>";
			}
			

		}
		$data = $m_cart->queryAllCart($idUser);

		if(($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST["submitOrder"])){
			$phone = $_POST["phone"];
			$address = $_POST["address"];
			foreach ($data as $row) {
				require_once("../model/m_orders.php");
				$m_oders = new M_Orders();
				$m_oders->insertOrders(array($row["iduser"], $row["idproduct"], $row["size"], $row["amount"], $address, $phone ));
				$m_cart->deleteIdCart($row["idcart"]);
			}
			header("location:c_checkOut.php?status=1");
		}
		if($data == false){
			echo '<hr><div class="alert alert-info col-md-4 offset-4" role="alert">
			Không có sản phẩm trong giỏ hàng!
			</div>';
		}else{
			require_once("../views/cart.php");
		}

		require_once("../views/footer.php");
	}
	?>
	<script type="text/javascript">
		$(document).ready(function() {
			document.title = 'Giỏ hàng';
		});
</script>