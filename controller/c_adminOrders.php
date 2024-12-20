<!-- 
	** Bài tập nhóm PHP
	** Nguyễn Thanh Phúc 
	** github.com/ntphuc98 
-->
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
	require_once("../model/m_orders.php");
	require_once("../views/navAdmin.php");
	
	$m_order = new M_Orders();
	$sql = "SELECT orders.id as idorder, orders.iduser as iduser, orders.idproduct as idproduct, orders.size as size, orders.amount as amount, orders.address as address, orders.phone as phone, orders.crtime as crtime, orders.status as status, orders.updateTime as updateTime, shoesProducts.name as name,  shoesProducts.img as img, shoesProducts.cost as cost , users.name as nameuser FROM orders , shoesProducts, users WHERE shoesProducts.id=orders.idproduct and users.id=orders.iduser";
	//edit
	if(isset($_GET["edit"])){
		$idOrder = $_GET["edit"];
		//update
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["update"]) ){
			//lay so luong , id cua san pham trong gio hang user
			$dataAmountOrder = $m_order->queryAmountOrder($idOrder);
			//so luong cua san pham trong table product
			require_once("../model/m_products.php");
			$m_products = new M_Products();
			$dataProductId = $m_products->queryAmountProduct($dataAmountOrder['idproduct']);
			//kiem tra so luong cap nhat voi so luong trong table products
			$amout_ok = (int)$dataProductId['amount'] + (int)$dataAmountOrder['amount'];
			//kiem tra so luong
			if($amout_ok >= $_POST["amount"]){
				//huy don
				if($_POST["status"] == "0" && $dataAmountOrder['status'] != "0"){
					//so luong update product
					$amount_product = $amout_ok;
					$m_order->updateOrderAdmin(
						array( 
							$_POST["size"], 
							$_POST["amount"],
							$_POST["phone"], 
							$_POST["address"],
							$_POST["status"],
							$idOrder
						)
					);
					$m_products->updateAmountProduct( $dataAmountOrder['idproduct'], $amount_product );
						echo '<div class="col-md-4 offset-4 alert alert-success" role="alert">Cập nhật thành công!</div>';
				}else{
					$amount_product = $amout_ok - (int)$_POST["amount"];
					$m_order->updateOrderAdmin(
						array( 
							$_POST["size"], 
							$_POST["amount"], 
							$_POST["phone"], 
							$_POST["address"],
							$_POST["status"],
							$idOrder
						)
					);
					$m_products->updateAmountProduct( $dataAmountOrder['idproduct'], $amount_product );
						echo '<div class="col-md-4 offset-4 alert alert-success" role="alert">Cập nhật thành công!</div>';
				}
			}else{
					echo '<div class="col-md-4 offset-4 alert alert-danger" role="alert">Số lượng tối đa: '.$amout_ok.'</div>';
			}

			
		}
		//delete
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["delete"]) ){
			$m_order->deleteIdOrder($idOrder);
				echo '<div class="col-md-4 offset-4 alert alert-success" role="alert">Xóa đơn thành công!</div>';
		}
		//load form
		$sqlEdit = $sql." AND orders.id=".$idOrder." LIMIT 1";
		$data = $m_order->queryOrdersUser($sqlEdit);
		
		require_once("../views/adminOrdersForm.php");

	}else{
		//load all data
		$sql_total = "SELECT count(orders.id) as total FROM orders , shoesProducts, users WHERE shoesProducts.id=orders.idproduct and users.id=orders.iduser";
		$link = "";
		//search
		if(isset($_GET["searchOd"]) && ($_GET["searchOd"] != "-1")){
			$searchOd = $_GET["searchOd"];
			$sql_total .=  " AND ( shoesProducts.name LIKE N'%".$searchOd."%'"." OR users.name LIKE N'%".$searchOd."%')";
			$sql .=  " AND ( shoesProducts.name LIKE N'%".$searchOd."%'"." OR users.name LIKE N'%".$searchOd."%')";
			$link .="searchOd=".$searchOd."&";
			echo '<script type="text/javascript">
			$(document).ready(function() {
				$("#searchOd").val("'.$searchOd.'");
				});
				</script>';
		}
		//trang thai
		if(isset($_GET["status"]) && ($_GET["status"] != "-1")){
			$status = $_GET["status"];
			$sql_total .=  " AND status='".$status."'";
			$sql .= " AND status='".$status."'";
			$link.="status=".$status."&";
			echo '<script type="text/javascript">
			$(document).ready(function() {
				$("#status option[value=\''.$status.'\']").attr("selected", "selected");
				});
				</script>';
		}

		$total_row = $m_order->queryTotalOrders($sql_total);
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

		$data = $m_order->queryOrdersUser($sql);
		require_once("../views/adminOrders.php");
		require_once("../views/paging.php");

	}
	require_once("../views/footer.php");
?>
	<script type="text/javascript">
	    $(document).ready(function() {
	        document.title = 'Quản trị Orders';
	    });
	</script>