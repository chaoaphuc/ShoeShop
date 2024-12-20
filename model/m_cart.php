
<!-- 
	** Bài tập nhóm PHP
	** Nguyễn Thanh Phúc 
	** github.com/ntphuc98
-->
<?php
	require_once("common/database.php");

	class M_Cart extends Database
	{
		
		function __construct()
		{
			parent::__construct();
		}
		function insertCart($idUser, $idProduct, $amount, $size){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("INSERT INTO carts (iduser, idproduct, size, amount) VALUES ( ?, ?, ?, ?)");
				$stmt->bindValue(1, $idUser);
				$stmt->bindValue(2, $idProduct);
				$stmt->bindValue(3, $amount);
				$stmt->bindValue(4, $size);
				$stmt->execute();
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
		function queryCart($idUser, $idProduct){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT * FROM carts  WHERE iduser=? and idproduct=?");
				$stmt->bindValue(1, $idUser);
				$stmt->bindValue(2, $idProduct);
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryCart failed: " . $e->getMessage();
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
		function queryIdCart($idCart){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT * FROM carts  WHERE id=? LIMIT 1");
				$stmt->bindValue(1, $idCart);
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryIdCart failed: " . $e->getMessage();
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
		function countCart($idUser){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT count(id) as total FROM carts  WHERE iduser=? LIMIT 1");
				$stmt->bindValue(1, $idUser);
				$stmt->execute();
			}catch(PDOException $e){
				echo "countCart failed: " . $e->getMessage();
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
		function deleteIdCart($idCart){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("DELETE FROM carts WHERE id=? LIMIT 1");
				$stmt->bindValue(1, $idCart);
				$stmt->execute();
			}catch(PDOException $e){
				echo "deleteIdCart failed: " . $e->getMessage();
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
		function queryAllCart($idUser){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT carts.id as idcart, carts.iduser as iduser, carts.idproduct as idproduct, carts.size as size, carts.amount as amount, shoesProducts.name as name,  shoesProducts.img as img, shoesProducts.cost as cost FROM carts , shoesProducts WHERE shoesProducts.id=carts.idproduct and carts.iduser=?");
				$stmt->bindValue(1, $idUser);
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryAllCart failed: " . $e->getMessage();
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
		function updateCart($idCart, $size, $amount){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("UPDATE carts SET size=:size , amount=:amount 
					WHERE id=:idCart ");
				$stmt->bindValue(":size", $size);
				$stmt->bindValue(":amount", $amount);
				$stmt->bindValue(":idCart", $idCart);
				$stmt->execute();
			}catch(PDOException $e){
		    	echo "Lỗi updateCart: " . $e->getMessage();
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
	}
?>