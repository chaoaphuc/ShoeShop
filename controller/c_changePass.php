<!-- 
	** Bài tập nhóm PHP
	** Nguyễn Thanh Phúc 
	** github.com/ntphuc98
-->
<?php 
	require_once("../views/header.php");
	if(!isset($_SESSION['name']) || !isset($_SESSION['id']) || !isset($_SESSION['role']) ){
		header('location:../index.php'); //chưa đăng nhập
	}
	if(($_SERVER['REQUEST_METHOD'] == 'POST')){
		$oldPass = $_POST['oldPass'];
		$newPass = $_POST['newPass'];
		$newPass2 = $_POST['newPass2'];
		// kiểm tra dữ liệu nhập
		require_once("../model/validation.php");
		$vali = new Validation();
		//test input
		$oldPass =$vali->test_input($oldPass);
		$newPass = $vali->test_input($newPass);
		$newPass2 = $vali->test_input($newPass2);
		//check value
		$oldPassErr = $vali->checkPass($oldPass);
		$newPassErr = $vali->checkPass($newPass);
		$newPass2Err = $vali->checkPass2($newPass, $newPass2);
		//check DB
		$oldPass = md5($oldPass);
		if ( ($oldPassErr == null) && ($newPassErr == null) && ($newPass2Err == null) ) {
			//kiểm tra mật khẩu cũ
			$id = $_SESSION['id'];
			require_once("../model/m_user.php");	
			$m_user = new M_User();
			$had = $m_user->queryPassword($id, $oldPass);
			if ($had==false) {
				$oldPassErr = "Mật khẩu cũ không chính xác!";
			}
		}
		//thõa điều kiện dữ liệu đầu vào
		if( ($oldPassErr == null) && ($newPassErr == null) && ($newPass2Err == null) ){
			$id = $_SESSION['id'];
			$newPass =md5($newPass);
			require_once("../model/m_user.php");
			$m_user = new M_User();
			$m_user->updatePassword($id, $newPass);
			echo "<script type='text/javascript'>
				$(document).ready(function() {
					$('.card-body').html(function(){
						return '<h4>Thay đổi mật khẩu thành công!<h4><br/><a href=\'../index.php\' alt=\'Trang chủ\' ><input class=\'btn btn-success btn-lg\' type=submit value=\'Trang chủ\'></a>';
					});
				});
			</script>";
		}
	}
	require_once("../views/changePass.php");
	require_once("../views/footer.php");
?>