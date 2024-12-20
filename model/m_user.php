<!-- 
	** Bài tập nhóm PHP
	** Nguyễn Thanh Phúc 
	** github.com/ntphuc98
-->
<?php 
require_once('common/database.php');

class M_User extends Database
{	
	function __construct()
	{
		parent::__construct();
	}
	function queryAllUsers(){
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare("SELECT id, name, username, email, sex, birthday, phone, address, verified, role, crtime FROM users");
			$stmt->execute();
		}catch(PDOException $e){
	    	echo "queryAllUsers failed: " . $e->getMessage();
	    }
	    if($stmt->rowCount() == 0){ //không có
	    	$stmt=null;
	    	$conn=null;
	    	return 0;
	    }else{ //có
	    	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    $stmt=null;
		    $conn=null;
		    return $data;
		}
	}
	function queryUserName($_userName){
		//kiem tra username trong database
		$_userName = trim($_userName);
		//cat khoang trang 2 dau
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare("SELECT username FROM users WHERE username=:username");

			$stmt->bindValue(":username", $_userName);

			$stmt->execute();

		}catch(PDOException $e){
	    	echo "QueryUserName failed: " . $e->getMessage();
	    }

	    if( $stmt->rowCount() == 0 ){ //không có
	    	$stmt=null;
	    	$conn=null;
	    	return 0;
	    }else{ //có
		    $stmt=null;
		    $conn=null;
		    return 1;
		}
	}
	function queryEmail( $_email ){
		//mần ci? email tồn tại hay chưa
		$_email = trim($_email);
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare("SELECT email FROM users WHERE email=:email");
			$stmt->bindValue(":email", $_email);
			$stmt->execute();
			
		}catch(PDOException $e){
	    	echo "QueryEmail failed: " . $e->getMessage();
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

	function queryUser($_login, $_pass){
		$_login = trim($_login);
		$_pass = md5($_pass);
		$conn =parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare("SELECT id, name, email, verified, role, crtime FROM users WHERE ( username=:login OR email=:login ) AND password=:pass");
			$stmt->bindValue(':login', $_login);
			$stmt->bindValue(':pass', $_pass);
			$stmt->execute();
		}catch(PDOException $e){
	    	echo "QueryUser failed: " . $e->getMessage();
	    }

	    $row = $stmt->rowCount();
	    
	    if($row == 0 ){
	    	$stmt=null;
	    	$conn=null;
	    	return 0;
	    }else{
	    	$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    $stmt=null;
		    $conn=null;
		    return $data;
	    }
	}
	function queryVerified($_vkey){
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare("SELECT vkey, verified FROM users WHERE vkey=:vkey AND verified=0 LIMIT 1");
			$stmt->bindValue(":vkey", $_vkey);
			$stmt->execute();
		}catch(PDOException $e){
	    	echo "QueryVirified failed: " . $e->getMessage();
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
	function updateVerified($_vkey){
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare("UPDATE  users SET verified=1 WHERE vkey=:vkey LIMIT 1");
			$stmt->bindValue(":vkey", $_vkey);
			$stmt->execute();
		}catch(PDOException $e){
	    	echo "UpdateVerified failed: " . $e->getMessage();
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
	//name, username, email, sex, birthday, phone, crtime
	public function insertUser($userArr=array())
	{
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare('INSERT INTO users (name, username, email, sex, birthday, phone, address, password, vkey) VALUES ( N'.'?'.', ?, ?, ?, ?, ?, ?, ?, ?)');
			$stmt->execute( $userArr );
			$stmt=null;
			$conn=null;
			return true;
		}catch(PDOException $e){
	    	echo "Lỗi insert: " . $e->getMessage();
	    }
		$stmt=null;
		$conn=null;
		return false;
	}
	function queryProfile($_id){
		$conn =parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare('SELECT name, username, email, sex, birthday, phone, address FROM users WHERE id = :id');
			$stmt->bindValue(':id', $_id);
			$stmt->execute();
		}catch(PDOException $e){
	    	echo "Query failed: " . $e->getMessage();
	    }

	    $row = $stmt->rowCount();
	    
	    if($row == 0 ){
	    	$stmt=null;
	    	$conn=null;
	    	return 0;
	    }else{
	    	$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    $stmt=null;
		    $conn=null;
		    return $data;
	    }
	}
	function queryProfileAdmin($_id){
		$conn =parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare('SELECT id, name, username, email, sex, birthday, phone, address, verified, role, crtime FROM users WHERE id = :id LIMIT 1');
			$stmt->bindValue(':id', $_id);
			$stmt->execute();
		}catch(PDOException $e){
	    	echo "queryProfileAdmin failed: " . $e->getMessage();
	    }
	    $row = $stmt->rowCount();
	    if($row == 0 ){
	    	$stmt=null;
	    	$conn=null;
	    	return 0;
	    }else{
	    	$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    $stmt=null;
		    $conn=null;
		    return $data;
	    }
	}
	function updateProfile($profileArr = array()){
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare('UPDATE users SET name=N'.'?'.' , sex=? , birthday=? , phone=? , address=N'.'?'.' WHERE id=? ');
			$stmt->execute($profileArr);
		}catch(PDOException $e){
	    	echo "Lỗi update: " . $e->getMessage();
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
	function updateAdminUser($id, $role){
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare('UPDATE users SET role=? WHERE id=? LIMIT 1');
			$stmt->bindValue(1, $role);
			$stmt->bindValue(2, $id);
			$stmt->execute();
		}catch(PDOException $e){
	    	echo "Lỗi updateAdminUser: " . $e->getMessage();
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
	function queryPassword($_id, $_password){
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare("SELECT id, password FROM users WHERE password=:password AND id=:id");
			$stmt->bindValue(':password', $_password);
			$stmt->bindValue(':id', $_id);
			$stmt->execute();
		}catch(PDOException $e){
	    	echo "Error query password: " . $e->getMessage();
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
	function updatePassword($_id, $_password){
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare('UPDATE users SET password=:password WHERE id=:id ');
			$stmt->bindValue(':password', $_password);
			$stmt->bindValue(':id', $_id);
			$stmt->execute();
		}catch(PDOException $e){
	    	echo "Error update password: " . $e->getMessage();
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
	function deleteIdUser($idUser){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("DELETE FROM carts WHERE iduser=:id LIMIT 1; DELETE FROM orders WHERE iduser=:id LIMIT 1; DELETE FROM users WHERE id=:id LIMIT 1");
				$stmt->bindValue(':id', $idUser);
				$stmt->execute();
			}catch(PDOException $e){
				echo "deleteIdUser failed: " . $e->getMessage();
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