<?php
	include_once('../../config/init.php');
	include_once($BASE_DIR .'database/workers.php');
	
	$nome_funcionario = $_GET['nome_funcionario'];
	$email_funcionario = $_GET['email_funcionario'];
	$data_admissao = $_GET['data_admissao'];
	$estado_funcionario = $_GET['estado_funcionario'];

	if($nome_funcionario != null || $email_funcionario != null || $data_admissao != null || $estado_funcionario != null)
		$reply = getWorkersAllData("manuellopes"); //TODO, isto é só para testes
	else
		$reply = "NULL";

	echo json_encode($reply);
?>