<!-- 
	** Bài tập nhóm PHP
	** Nguyễn Thanh Phúc 
	** github.com/ntphuc98
-->
<?php
	session_start();
	if (isset($_SESSION['name'])) 
		unset($_SESSION['name']);
	if (isset($_SESSION['id'])) 
		unset($_SESSION['id']);
	if (isset($_SESSION['role'])) 
		unset($_SESSION['role']);
	header("location:../index.php");
?>