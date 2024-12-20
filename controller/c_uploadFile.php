<!-- 
	** Bài tập nhóm PHP
	** Nguyễn Thanh Phúc 
	** github.com/ntphuc98 
-->
<?php

	//tạo biến chứa đưòng dẫn nơi lưu file
	$target_dir = "../images/";
	$target_file = $target_dir.basename($_FILES["imgUpload"]["name"]); 
	//basename() return tên cuối cùng của đường dẫn. /testweb/home.php -> home.php
	//Kiểm tra điều kiện upload
		//1. kiểm tra kích thước
		//2. kiểm tra loại file (png, jpg, jpeg, gif)
		//3. kiểm tra file name đã tồn tại chưa
	// 2. 
	$file_type = pathinfo($_FILES["imgUpload"]["name"], PATHINFO_EXTENSION);
	$file_type = strtolower( $file_type );
	$file_type_allow = array( "png", "jpg", "jpeg", "gif" );
	//kiem tra bằng cách sử dụng mảng
	if(!in_array($file_type, $file_type_allow)){
		$imgErr = "File không hợp lệ !";
	}
	// 3.
	if( file_exists($target_file) ){
		$imgErr = "File Name đã tồn tại !";
	}
	if( !isset($imgErr) ){
		$success = move_uploaded_file($_FILES["imgUpload"]["tmp_name"], $target_file);
		if( !$success ){
			$imgErr = "Upload hình ảnh thất bại !";
		}
	}
?>