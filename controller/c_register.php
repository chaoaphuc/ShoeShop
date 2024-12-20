<!-- 
	** Bài tập nhóm PHP
	** Nguyễn Thanh Phúc 
	** github.com/ntphuc98
-->
<?php 
	require_once('../views/header.php');
	//biến chứa nội dung đã nhập
	$username = '';
	$name = '';
	$email = '';
	//nhấn button đăng ký
	if( ($_SERVER['REQUEST_METHOD'] == 'POST') ){
		$username = $_POST['username'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$pass2 = $_POST['pass2'];
		//ma xac nhan
		$vkey = md5(time().$username);
		// kiểm tra dữ liệu nhập
		require_once("../model/validation.php");
		$vali = new Validation();
		//test input
		$username = $vali->test_input($username);
		$name = $vali->test_input($name);
		$email =$vali->test_input($email);
		$pass = $vali->test_input($pass);
		$pass2 = $vali->test_input($pass2);
		//check value
		$usernameErr = $vali->checkUserName($username);
		$nameErr = $vali->checkName($name);
		$emailErr = $vali->checkEmail($email);
		$passErr = $vali->checkPass($pass);
		$pass2Err = $vali->checkPass2($pass, $pass2);
		//thõa điều kiện dữ liệu đầu vào
		if( 
			($usernameErr == null) &&
			($nameErr == null) &&
			($emailErr == null) &&
			($passErr == null) &&
			($pass2Err == null)
		){
			require_once("../model/m_user.php");
			$m_user = new M_User();
			$userArr = array( 
				ucwords($name), //oanh oc bo -> Oanh Oc Bo
				$username,
				$email,
				null,
				null,
				null,
				null,
				md5($pass),
				$vkey
			);

			$m_user->insertUser($userArr);

			//gửi email xác nhận
			require_once("../controller/PHPMailer/sendMail.php");
			$sendMail = new SendMail();
			$_subject = "Xác nhận đăng ký tài khoản!";
			$_body = "<a href='http://localhost/ShoesShop/views/verifi.php?vkey=".$vkey."''><b>Xác nhận tài khoản</b></a>";
			$sendMail->sendGmail($_subject, $_body, $email);

			echo "
			<script type='text/javascript'>
				$(document).ready(function() {
					$('.card-body').html(function(){
						return '<h4>Cảm ơn bạn đã đăng ký! Chúng tôi đã gửi một email xác nhận đăng ký đến ".$email.". Vui lòng vào email để xác nhận đăng ký!<h4><br/><a href=\'account.php\' alt=\'Đăng nhập\' ><input class=\'btn btn-success btn-lg\' type=submit value=\'Đăng nhập\'></a>';
					});
				});
			</script>";
		}
	}

	//views
	require_once("../views/register.php");
	require_once("../views/footer.php");

	//set text
	echo "<script>$('#username').val('$username')</script>";
	echo "<script>$('#email').val('$email')</script>";
	echo "<script>$('#name').val('$name')</script>";
?>
<script type="text/javascript">
		$(document).ready(function() {
			document.title = 'Đăng ký';
		});
	</script>