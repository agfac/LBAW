<?php
	include_once('../../config/init.php');
	include_once($BASE_DIR .'database/users.php');

	
	$nome_cliente = $_GET['nome_cliente'];
	$email_cliente = $_GET['email_cliente'];
	$estado_cliente = $_GET['estado_cliente'];

	if($nome_cliente != null || $email_cliente != null || $estado_cliente != null )
		//TODO
		//$reply = getClientDataSearch($nome_cliente, $email_cliente, $estado_cliente);
		$reply = getUserAllData("joaoribeiro");
	else
		$reply = "NULL";

	echo json_encode($reply);
?>