<?php
	include_once('../../config/init.php');
	include_once($BASE_DIR .'database/comments.php');

	$nome_cliente = $_GET['nome_cliente'];
	$email_cliente = $_GET['email_cliente'];
	$nome_publicacao = $_GET['nome_publicacao'];
	$ordenar = $_GET['ordenar'];

	if($nome_cliente != null || $email_cliente != null || $nome_publicacao != null || $ordenar != null)
		$reply = getAllComments(); //TODO, isto é só para testes
	else
		$reply = "NULL";

	echo json_encode($reply);
?>