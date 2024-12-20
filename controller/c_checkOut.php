<!-- 
	** Bài tập nhóm PHP
	** Nguyễn Thanh Phúc 
	** github.com/ntphuc98
-->
<?php
	require_once("../views/header.php");
	require_once("../model/m_orders.php");
	$idUser = $_SESSION['id'];
	$m_order = new M_Orders();

	$sql = "SELECT orders.id as idorder, orders.iduser as iduser, orders.idproduct as idproduct, orders.size as size, orders.amount as amount, orders.address as address, orders.phone as phone, orders.status as status, shoesProducts.name as name,  shoesProducts.img as img, shoesProducts.cost as cost FROM orders , shoesProducts WHERE shoesProducts.id=orders.idproduct and orders.iduser=".$idUser;

	if(isset($_GET['status'])){
		$sql.=" AND orders.status=".$_GET['status'];
	}
	
	if ( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["cancel"])) {

		if($m_order->updateOrderUser($_POST["idorder"])){
			require_once("../model/m_products.php");
			$m_product = new M_Products();
			$amount_total = $m_product->queryAmountProduct($_POST["idproduct"]);
			$amount = $_POST["amount"] + $amount_total["amount"];
			$m_product->updateAmountProduct($_POST["idproduct"], $amount);
		}

	}

	$data = $m_order->queryOrdersUser($sql);
	if($data == false){
			echo '<hr><div class="alert alert-info col-md-4 offset-4" role="alert">
				Không có đơn mua!
			</div>';
	}else{
		require_once("../views/checkOut.php");
	}
	require_once("../views/footer.php");
?>
<script type="text/javascript">
	    $(document).ready(function() {
	        document.title = 'Đơn mua - ShoesShop';
	    });
	</script>