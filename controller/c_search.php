<!-- 
	** Bài tập nhóm PHP
	** Nguyễn Thanh Phúc 
	** github.com/ntphuc98
-->
<?php
		require_once('../views/header.php');
		require_once("../model/m_products.php");
		$m_products = new M_Products();
		//câu sql với từng kiểu
		$sql_total = "SELECT count(id) as total FROM shoesProducts WHERE ";
		$sql =  "SELECT * FROM shoesProducts WHERE ";
		//lay input
		$name_search = $_GET["search"];
		//phan trang
		$link = "search=".$name_search."&";
		//noi sql
		$sql_total.=" name LIKE N'%".$name_search."%'";
		$sql .=" name LIKE N'%".$name_search."%'";
		//js set input
		echo '<script type="text/javascript">
					$(document).ready(function() {
					    	document.title="Tìm kiếm: '.$name_search.'";
					    	$("#search").val("'.$name_search.'");
					    	// $("#filter").hide();
					    });
					</script>';
		//gioi tinh
	if(isset($_GET["gender"]) && ($_GET["gender"]!="-1")){
		$gender = $_GET["gender"];
		$sql_total .=  " AND gender=N'".$gender."'";
		$sql .= " AND gender=N'".$gender."'";
		$link.="gender=".$gender."&";
		echo '<script type="text/javascript">
			$(document).ready(function() {
				$("#gender option[value=\''.$gender.'\']").attr("selected", "selected");
				});
				</script>';
	}
	//kieu giay
	if(isset($_GET["types"]) && ($_GET["types"]!="-1")){
		$types = $_GET["types"];
		$sql_total .=" AND types=N'".$types."'";
		$sql .=" AND types=N'".$types."'";
		$link.="types=".$types."&";
		echo '<script type="text/javascript">
			$(document).ready(function() {
				$("#types option[value=\''.$types.'\']").attr("selected", "selected");
				});
				</script>';
	}
	//gia
	if( isset($_GET["cost"]) && ($_GET["cost"] != "-1") ){
		if($_GET["cost"] == "1"){
			$sql_total .=" ORDER BY cost";
			$sql .=" ORDER BY cost";
			$link.="cost=1&";
			echo '<script type="text/javascript">
			$(document).ready(function() {
				$("#cost option[value=1]").attr("selected", "selected");
				});
				</script>';
		}
		if($_GET["cost"] == "2"){
			$link.="cost=2&";
			$sql_total .=" ORDER BY cost DESC";
			$sql .=" ORDER BY cost DESC";
			echo '<script type="text/javascript">
				$(document).ready(function() {
					$("#cost option[value=2]").attr("selected", "selected");
					});
					</script>';
		}
	}
	// ORDER BY tên-cột DESC //giam
		//thuc thi dem so record
		$total_row = $m_products->queryTotalProducts($sql_total);
		$total_record = $total_row['total']; // tổng sô record trong ket qua
		//trang hiển thị
		$current_page =  isset($_GET['page']) ? $_GET['page'] : 1; 
		// gioi han so san pham tren 1 trang
		$limit = 12;
		//lam tron so trang
		$total_page = ceil($total_record / $limit); //hàm làm tròn lên.vd 2,3=3
		//kiểm tra nhập page
		if ($current_page > $total_page) {
			$current_page = $total_page;
		}
		if ($current_page < 1) {
			$current_page = 1;
		}
		//tính start
		$start = ($current_page - 1 ) * $limit;
		$sql .= " LIMIT ".$start." , ".$limit;
		
		$data = $m_products->queryProducts($sql);

		require_once("../views/products.php");
		require_once("../views/paging.php");
		require_once("../views/footer.php");
?>