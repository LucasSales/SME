<?php  
	include_once 'EscolaDAO.php';
	$dao = new EscolaDAO();

	$arrayEscolas = $dao->getEscolas($_POST['regional']);
?>