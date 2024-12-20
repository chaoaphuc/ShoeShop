<!-- 
	** Bài tập nhóm PHP
	** Nguyễn Thanh Phúc 
	** github.com/ntphuc98
-->
<?php
require_once("../views/header.php");
	// kiểm tra đã đăng nhập chưa
	if(isset($_SESSION['name']) || isset($_SESSION['id']) || isset($_SESSION['role']) ){
		header('location:index.php'); //đăng nhập rồi
	}
	// phần xử lý khi chưa đăng nhập

	//biến chưa nội dung lỗi khi đăng nhập
	$loginErr = null; 
	$passErr = null;
	$verifiErr = null;
	//start login
	// khi có yêu cầu đăng nhập
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		//get text
		$login = $_POST['login'];
		$pass = $_POST['password'];
		//  gọi model user
		require_once("../model/m_user.php");
		$m_Login = new M_User();
		// kiểm tra user and email
		$hadUN = $m_Login->queryUserName($login);
		$hadEmail = $m_Login->queryEmail($login);
		if ($hadUN == 0 && $hadEmail == 0) {
			$loginErr = "Tên đăng nhập / Email không chính xác!";
		}else{ // có username / email
			$user = $m_Login->queryUser($login, $pass);
			if( $user == 0 ) { //mật khẩu k đúng
				$loginErr = "<script>$('#login').val('$login')</script>";
				$passErr = 'Mật khẩu không chính xác!';
			}else{ //pass đúng
				if( $user['verified'] == 0 ){ //chưa xác nhận tài khoản
					//chưa xác nhận
					$date = date_create($user['crtime']);
					$date = date_format($date, ' H:i:s \, d-m-Y');
					$loginErr = "<script>$('#login').val('$login')</script>";
					$verifiErr = "Tài khoản chưa được xác nhận! Chúng tôi đã gửi email xác nhận đến ".$user['email']." vào lúc ".$date;
				}else{ //chấp nhận login
					$_SESSION['id'] = $user['id'];
					$_SESSION['name'] = $user['name'];
					$_SESSION['role'] = $user['role'];
					header("location:../index.php");
				}
			}
		}
	}
	//end login
	//views
	require_once("../views/account.php");
	require_once("../views/footer.php");
	?>
	<script type="text/javascript">
		$(document).ready(function() {
			document.title = 'Đăng nhập';
		});
	</script>