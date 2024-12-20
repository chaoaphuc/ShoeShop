<?php 
	require_once("../model/m_products.php");

	$mProduct = new M_Products();
	$countTotal = $mProduct->queryTotalProducts("SELECT count(id) as total FROM shoesProducts LIMIT 1");
	$startNew = $countTotal['total']-1;
	$dataNew = $mProduct->queryProducts("SELECT *  FROM shoesProducts LIMIT ".$startNew.", 1");
	$hotId = $mProduct->queryProducts("SELECT idproduct, SUM(amount) as s FROM orders GROUP by idproduct HAVING max(s)");

	$sqlHot = "SELECT *  FROM shoesProducts Where id=".$hotId[0]['idproduct'];
	$dataHot = $mProduct->queryProducts($sqlHot);

	require_once("../views/productsHotNew.php");


 ?>