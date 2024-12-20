<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Header </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="../bootstrap/css/style.css" crossorigin="anonymous" >
	<script src="../bootstrap/js/jquery-3.3.1.min.js"></script>
</head>
<body> 
	<!--header-->
	<div class="container-fluid">
		<nav class=" navbar navbar-dark bg-dark">
			<!-- Navbar content -->
			<a class="navbar-brand" href="../">
				<img src="/" width="30" height="30" class="d-inline-block align-top" alt="">
				ShoesShop
			</a>
			<ul class="nav nav-pills">
				<?php 
				if(isset($_SESSION['name']) && isset($_SESSION['id']) && isset($_SESSION['role']))
				{
					?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="profile.php" role="menu" aria-haspopup="true" aria-expanded="false">
							<?=$_SESSION['name']?>
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="../controller/c_profile.php">Thông tin cá nhân</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="../controller/c_changePass.php">Đổi mật khẩu</a>
						</div>
					</li>
					<?php if($_SESSION['role']=="1"): ?>
						<li class="nav-item">
							<a class="nav-link" href='../controller/c_adminProducts.php'>Admin</a>
						</li>
					<?php endif; ?>
					<li class="nav-item">
						<a class="nav-link" href='../controller/c_logout.php'>Đăng xuất</a>
					</li>
					<?php
				}else{
					?>
					<li class="nav-item"><a class="nav-link" href='../controller/c_login.php'>Đăng nhập</a> </li>
					<li class="nav-item"><a class="nav-link" href='../controller/c_register.php'>Đăng ký</a> </li>
					<?php
				}
				?>	
			</ul>
		</nav>
		<nav class="navbar navbar-dark bg-dark">
			<ul class="nav nav-tabs card-header-tabs">
				<li class="nav-item">
					<a class="nav-link active" href="../index.php">Home</a>
				</li>
				<?php 
				if(	isset($_SESSION['id'])  && isset($_SESSION['name']) && isset($_SESSION['role'])):
					require_once("../model/m_cart.php");
					$m_cart=new M_Cart();
					$countCart=$m_cart->countCart($_SESSION["id"]);
				?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Đơn mua</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="../controller/c_checkOut.php?status=0">Đã hủy</a>
						<a class="dropdown-item" href="../controller/c_checkOut.php?status=3">Đã giao</a>
						<a class="dropdown-item" href="../controller/c_checkOut.php?status=2">Đang giao</a>
						<a class="dropdown-item" href="../controller/c_checkOut.php?status=1">Đang xác nhận</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="../controller/c_checkOut.php">Tất cả</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../controller/c_cart.php">Giỏ hàng <?="(".$countCart['total'].")"?></a>
				</li>
			<?php endif; ?>
			<li class="nav-item">
				<a class="nav-link" href="#abouts">Giới thiệu</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#contact">Liên hệ</a>
			</li>
		</ul>
		<form action="../controller/c_search.php" class="form-inline my-2 my-lg-0" method="GET">
			<input class="form-control mr-sm-2" name="search" id="search"	type="search" placeholder="Nhập tên sản phẩm" aria-label="Search" required>
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit" >Search</button>
		</form>
	</nav>