<?php
	include_once('../../config/init.php');
	include_once($BASE_DIR .'database/logs.php');

	$nome_utilizador = $_GET['nome_utilizador'];
	$email_utilizador = $_GET['email_utilizador'];
	$data_login = $_GET['data_login'];
	$ordenar = $_GET['ordenar'];

	if($nome_utilizador != null || $email_utilizador != null || $data_login != null || $ordenar != null)
		$reply = getAllLogs(); //TODO, isto é só para testes
	else
		$reply = "NULL";

	echo json_encode($reply);
?>