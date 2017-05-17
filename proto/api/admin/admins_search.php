<?php
	include_once('../../config/init.php');
	include_once($BASE_DIR .'database/admins.php');
	
	$nome_administrador = $_GET['nome_administrador'];
	$email_administrador = $_GET['email_administrador'];
	$data_cessacao = $_GET['data_cessacao'];
	$estado_administrador = $_GET['estado_administrador'];

	if($nome_administrador != null || $email_administrador != null || $data_cessacao != null || $estado_administrador != null)
		$reply = getAdminAllData("tiagocampos"); //TODO, isto é só para testes
	else
		$reply = "NULL";

	echo json_encode($reply);
?>