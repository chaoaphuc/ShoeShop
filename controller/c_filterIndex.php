<!-- 
	** Bài tập nhóm PHP
	** Nguyễn Thanh Phúc 
	** github.com/ntphuc98
-->
<?php
	require_once("../model/m_products.php");
	$valGender = $_POST["val"];
	// $valGender = "Nữ";
	if($valGender=="-1"){
		?>
			<option value="-1">Loại giày</option>
			<option value="Giày Sneaker">Giày Sneaker</option>
			<option value="Giày Boot">Giày Boot</option>
			<option value="Giày Lười">Giày Lười</option>
			<option value="Giày Cao Gót">Giày Cao Gót</option>
			<option value="Giày Tây">Giày Tây</option>
		<?php
	}else{
		$m_products = new M_Products();
		$sql = "SELECT DISTINCT types FROM shoesProducts WHERE gender=N'".$valGender."'";
		$dataTypes = $m_products->queryProducts($sql);
		if ($dataTypes!=0) {
			echo '<option value="-1">Loại giày</option>';
			foreach ($dataTypes as $rowTypes) {
				echo '<option value="'.$rowTypes['types'].'">'.$rowTypes['types'].'</option>';
			}
		}
	}
?>