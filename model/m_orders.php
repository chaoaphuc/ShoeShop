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
	class M_Orders extends Database
	{
		function __construct()
		{
			parent::__construct();
		}
		function queryOrders($sql){

		}
		function queryOrdersUser($sql){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare($sql);
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryOrdersUser failed: " . $e->getMessage();
		    }
		    if($stmt->rowCount() > 0){
		    	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    	$stmt=null;
				$conn=null;
				return $data;
		    }else{
				$stmt=null;
				$conn=null;
				return false;
		    }
		}
		function queryAmountOrder($idOrder){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT amount , idproduct , status FROM orders WHERE id=:id");
				$stmt->bindValue(":id", $idOrder);
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryAmountOrder failed: " . $e->getMessage();
		    }
		    if($stmt->rowCount() > 0){
		    	$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    	$stmt=null;
				$conn=null;
				return $data;
		    }else{
				$stmt=null;
				$conn=null;
				return false;
		    }
		}
		function queryTotalOrders($sql){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare($sql);
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryOrdersUser failed: " . $e->getMessage();
		    }
		    if($stmt->rowCount() > 0){
		    	$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    	$stmt=null;
				$conn=null;
				return $data;
		    }else{
				$stmt=null;
				$conn=null;
				return false;
		    }
		}
		function insertOrders($orderArr = array()){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("INSERT INTO orders (iduser, idproduct, size, amount, address, phone) VALUES ( ?, ?, ?, ?, ?, ?)");
				$stmt->execute($orderArr);
				$stmt=null;
				$conn=null;
				return true;
			}catch(PDOException $e){
				$stmt=null;
				$conn=null;
				return false;
		    }
			$stmt=null;
			$conn=null;
			return false;
		}
		function updateOrderUser($idOrder){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("UPDATE  orders SET status=0 WHERE id=? LIMIT 1");
				$stmt->bindValue(1, $idOrder);
				$stmt->execute();
			}catch(PDOException $e){
		    	echo "updateOrderUser failed: " . $e->getMessage();
		    }
		    if($stmt->rowCount() == 0){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
			    $stmt=null;
			    $conn=null;
			    return 1;
			}
		}
		function updateOrderAdmin($orderArr = array()){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("UPDATE  orders SET size=? , amount=? , phone=? , address=? , status=? , updateTime=now() WHERE id=? LIMIT 1");
				$stmt->execute($orderArr);
			}catch(PDOException $e){
		    	echo "updateOrderAdmin failed: " . $e->getMessage();
		    }
		    if($stmt->rowCount() == 0){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
			    $stmt=null;
			    $conn=null;
			    return 1;
			}
		}
		function deleteIdOrder($idOrder){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("DELETE FROM orders WHERE id=? LIMIT 1");
				$stmt->bindValue(1, $idOrder);
				$stmt->execute();
			}catch(PDOException $e){
				echo "deleteIdOrder failed: " . $e->getMessage();
		    }
		    if($stmt->rowCount() > 0){
		    	$stmt=null;
				$conn=null;
				return true;
		    }else{
				$stmt=null;
				$conn=null;
				return false;
		    }
		}
	}
?>