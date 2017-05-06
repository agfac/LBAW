<?php
	include_once('../../config/init.php');
	include_once($BASE_DIR .'database/orders.php');

	$nome_cliente = $_GET['nome_cliente'];
	$email_cliente = $_GET['email_cliente'];
	$id_encomenda = $_GET['id_encomenda'];
	$estadoencomenda = $_GET['estadoencomenda'];

	if($nome_cliente != null || $email_cliente != null || $id_encomenda != null)
		$reply = getOrdersSearch($nome_cliente, $email_cliente, $id_encomenda);
	else if($estadoencomenda != "Escolha uma opção")
		$reply = getOrdersByStatus($estadoencomenda);
	else
		$reply = "NULL";

	echo json_encode($reply);
?>