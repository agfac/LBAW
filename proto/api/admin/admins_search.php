<?php
	include_once('../../config/init.php');
	include_once($BASE_DIR .'database/admins.php');
	
	$nome_administrador = $_GET['nome_administrador'];
	$email_administrador = $_GET['email_administrador'];
	$data_cessacao = $_GET['data_cessacao'];
	$estado_administrador = $_GET['estado_administrador'];

	if($nome_administrador == NULL && $email_administrador == NULL && $data_cessacao == null && $estado_administrador == "Escolha uma opção")
		$reply = getAllAdmins();

	else if($nome_administrador != NULL && $estado_administrador != "Escolha uma opção")
		$reply = getAdminByNameOrderBy($nome_administrador, $estado_administrador);

	// else if($email_administrador != NULL && $estado_administrador != "Escolha uma opção")
	// 	$reply = getAdminByEmailOrderBy($email_administrador, $estado_administrador);

	// else if($data_cessacao != NULL && $estado_administrador != "Escolha uma opção")
	// 	$reply = getAdminByCessationDataOrderBy($data_cessacao, $estado_administrador);


	else if($nome_administrador != NULL)
		$reply = getAdminByName($nome_administrador);

	// else if($email_administrador != NULL)
	// 	$reply = getAdminByEmail($email_administrador);

	// else if($data_cessacao != NULL)
	// 	$reply = getAdminByCessationData($data_cessacao);

	else if($estado_administrador != "Escolha uma opção")
		$reply = getAdminByAdminStatus($estado_administrador);
	else
		$reply = "NULL";

	echo json_encode($reply);
?>