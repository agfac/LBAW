<?php
	include_once('../../config/init.php');
	include_once($BASE_DIR .'database/logs.php');

	$nome_utilizador = $_GET['nome_utilizador'];
	$email_utilizador = $_GET['email_utilizador'];
	$data_login = $_GET['data_login'];
	$ordenar = $_GET['ordenar'];

	if( $nome_utilizador == NULL && $email_utilizador == NULL && $data_login == NULL && $ordenar == "Escolha uma opção" )
		$reply = getAllLogs(); 

	// else if( $nome_utilizador != NULL && $ordenar != "Escolha uma opção" )
	// 	$reply = getLogsByNameOrderBy($nome_utilizador, $ordenar);

	// else if( $email_utilizador != NULL $ordenar != "Escolha uma opção" )
	// 	$reply = getLogsByEmailOrderBy($email_utilizador, $ordenar); 

	// else if( $data_login != NULL && $ordenar != "Escolha uma opção" )
	// 	$reply = getLogsByLoginDateOrderBy($data_login, $ordenar); 

	else if( $nome_utilizador != NULL )
		$reply = getLogsByName($nome_utilizador);

	else if( $email_utilizador != NULL )
		$reply = getLogsByEmail($email_utilizador); 

	// else if( $data_login != NULL )
	// 	$reply = getLogsByLoginDate($data_login); 

	// else if( $ordenar != "Escolha uma opção" )
	// 	$reply = getAllLogsOrderBy($ordenar); 

	else
		$reply = "NULL";

	echo json_encode($reply);
?>