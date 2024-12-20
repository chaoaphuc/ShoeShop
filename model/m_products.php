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
	class M_Products extends Database
	{
		function __construct()
		{
			parent::__construct();
		}
		function queryProducts($_sql){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare($_sql);
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryProducts failed: " . $e->getMessage();
			}
		    if($stmt->rowCount() == 0){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
	    		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    	$stmt=null;
		    	$conn=null;
		    	return$data;
		    }
		}
		function queryAmountProduct($id){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT amount FROM shoesProducts WHERE id =:id LIMIT 1");
				$stmt->bindValue(":id", $id);
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryAmountProduct failed: " . $e->getMessage();
			}
		    if($stmt->rowCount() == 0){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
	    		$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    	$stmt=null;
		    	$conn=null;
		    	return$data;
		    }
		}
		function queryTotalProducts($_sql){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare($_sql);
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryTotalProducts failed: " . $e->getMessage();
			}
		    if($stmt->rowCount() == 0){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
		    	$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    	$stmt=null;
		    	$conn=null;
		    	return $data;
		    }
		}
	    function queryDetails($id){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT * FROM shoesProducts WHERE id=:id LIMIT 1");
				$stmt->bindValue(":id", $id);
				$stmt->execute();
			}catch(PDOException $e){
				echo "QueryDetail failed: " . $e->getMessage();
			}
		    if($stmt->rowCount() == 0){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
	    		$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    	$stmt=null;
		    	$conn=null;
		    	return$data;
		    }
		}
		function updateProducts($productArr = array()){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("UPDATE shoesProducts SET name=N"."?"." , gender=N"."?"." , types=N"."?"." , amount = ? , cost=? , img=?, describes=N"."?"." , updateTime=now() WHERE id=? LIMIT 1");
				
				$stmt->execute($productArr);
			}catch(PDOException $e){
		    	echo "Lỗi updateProducts: " . $e->getMessage();
		    }
		    if($stmt->rowCount() > 0){
				$stmt=null;
				$conn=null;
				return true;
		    }
			$stmt=null;
			$conn=null;
			return false;
		}
		function updateAmountProduct($id, $amount){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("UPDATE shoesProducts SET amount = :amount WHERE id=:id LIMIT 1");
				$stmt->bindValue(":amount", $amount);
				$stmt->bindValue(":id", $id);
				$stmt->execute();
			}catch(PDOException $e){
		    	echo "Lỗi updateAmountProduct: " . $e->getMessage();
		    }
		    if($stmt->rowCount() > 0){
				$stmt=null;
				$conn=null;
				return true;
		    }
			$stmt=null;
			$conn=null;
			return false;
		}
		function insertProduct($productArr = array()){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("INSERT INTO shoesProducts ( name, gender, types, amount, cost, img, describes) VALUES ( N"."?"." , N"."?"." , N"."?"." , ? , ? , ?, N"."?".")");
				
				$stmt->execute($productArr);
			}catch(PDOException $e){
		    	echo "Lỗi insertProduct: " . $e->getMessage();
		    }
		    if($stmt->rowCount() > 0){
				$stmt=null;
				$conn=null;
				return true;
		    }
			$stmt=null;
			$conn=null;
			return false;
		}
		function deleteIdProducts($idProduct){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("DELETE FROM carts WHERE idproduct=:id LIMIT 1; DELETE FROM orders WHERE idproduct=:id LIMIT 1; DELETE FROM shoesProducts WHERE id=:id LIMIT 1");
				$stmt->bindValue(':id', $idProduct);
				$stmt->execute();
			}catch(PDOException $e){
				echo "deleteIdProducts failed: " . $e->getMessage();
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