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
	require_once("../model/m_statistics.php");
	require_once("../views/navAdmin.php");
	$m_statistics = new M_Statistics();
	$countProducts = $m_statistics->queryCountProducts();
	$countRevenue = $m_statistics->queryCountRevenue();
	$countCancelOrders = $m_statistics->queryCountCancelOrders();
	$countDeliveredOrders = $m_statistics->queryCountDeliveredOrders();
	$countShipOrders = $m_statistics->queryCountShipOrders() ;
	$countOrders = $m_statistics->queryCountOrders() ;
	$countUsers = $m_statistics->queryCountUsers() ;
	$countAdminUsers = $m_statistics->queryCountAdminUsers();
	$countCustomerUsers = $m_statistics->queryCountCustomerUsers();
	
	require_once("../views/adminStatistics.php");
	require_once("../views/footer.php");
?>
<script type="text/javascript">
	    $(document).ready(function() {
	        document.title = 'Thống kê';
	    });
	</script>