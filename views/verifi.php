<?php 
	require_once('header.php');
	require_once('../model/m_user.php');
 ?>
 <?php
 	if(isset($_GET['vkey'])){
 		$vkey=$_GET['vkey'];
 		$m_user = new M_User();
 		$had = $m_user->queryVerified($vkey);
 		if ($had) {
 			$m_user->updateVerified($vkey);
 			$err = "<h4>Xác nhận tài khoản thành công!<h4><br/><a href='../controller/c_login.php' alt='Đăng nhập' ><input class='btn btn-success btn-lg' type='submit' value='Đăng nhập'></a>";
 		}else{
 			$err = 'Something went wrong!';
 		}
 	}else{
 		$err = 'Something went wrong!';
 	}
 ?>

	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-3">
				<?php 
					if(isset($err)){
						echo "<h2>".$err."</h2>";
	 				}
				 ?>
			</div>
		</div>
	</div>

 <?php 
	require_once('footer.php');
 ?>