<!-- 
	** Bài tập nhóm PHP
	** Nguyễn Thanh Phúc 
	** github.com/ntphuc98
-->
<?php
	require_once("common/database.php");
	/**
	 * 
	 */
	class M_Statistics extends Database
	{
		
		function __construct()
		{
			parent::__construct();
		}
		function queryCountProducts(){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT count(id) as total FROM shoesProducts LIMIT 1");
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryCountProducts failed: " . $e->getMessage();
			}
		    if($stmt->rowCount() == 0){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
		    	$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    	$stmt=null;
		    	$conn=null;
		    	return $data['total'];
		    }
		}
		function queryCountCancelOrders(){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT count(id) as total FROM orders WHERE status=0 LIMIT 1");
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryCountCancelOrders failed: " . $e->getMessage();
			}
		    if($stmt->rowCount() == 0){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
		    	$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    	$stmt=null;
		    	$conn=null;
		    	return $data['total'];
		    }
		}
		function queryCountDeliveredOrders(){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT count(id) as total FROM orders WHERE status=3 LIMIT 1");
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryCountDeliveredOrders failed: " . $e->getMessage();
			}
		    if($stmt->rowCount() == 0){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
		    	$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    	$stmt=null;
		    	$conn=null;
		    	return $data['total'];
		    }
		}
		function queryCountShipOrders(){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT count(id) as total FROM orders WHERE status=2 LIMIT 1");
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryCountShipOrders failed: " . $e->getMessage();
			}
		    if($stmt->rowCount() == 0){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
		    	$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    	$stmt=null;
		    	$conn=null;
		    	return $data['total'];
		    }
		}
		function queryCountOrders(){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT count(id) as total FROM orders WHERE status=1 LIMIT 1");
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryCountOrders failed: " . $e->getMessage();
			}
		    if($stmt->rowCount() == 0){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
		    	$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    	$stmt=null;
		    	$conn=null;
		    	return $data['total'];
		    }
		}
		function queryCountUsers(){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT count(id) as total FROM users LIMIT 1");
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryCountUsers failed: " . $e->getMessage();
			}
		    if($stmt->rowCount() == 0){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
		    	$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    	$stmt=null;
		    	$conn=null;
		    	return $data['total'];
		    }
		}
		function queryCountAdminUsers(){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT count(id) as total FROM users WHERE role=1 LIMIT 1");
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryCountAdminUsers failed: " . $e->getMessage();
			}
		    if($stmt->rowCount() == 0){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
		    	$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    	$stmt=null;
		    	$conn=null;
		    	return $data['total'];
		    }
		}
		function queryCountCustomerUsers(){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT count(id) as total FROM users WHERE role=2 LIMIT 1");
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryCountCustomerUsers failed: " . $e->getMessage();
			}
		    if($stmt->rowCount() == 0){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
		    	$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    	$stmt=null;
		    	$conn=null;
		    	return $data['total'];
		    }
		}


		function queryCountRevenue(){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT SUM(orders.amount) as total FROM orders WHERE status=1 LIMIT 1");
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryCountRevenue failed: " . $e->getMessage();
			}
		    if($stmt->rowCount() == 0){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
		    	$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    	$stmt=null;
		    	$conn=null;
		    	return $data['total'];
		    }
		}
	}

?>