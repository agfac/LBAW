<?php
	include_once('../../config/init.php');
	include_once($BASE_DIR .'database/logs.php');

	$nome_utilizador = $_GET['nome_utilizador'];
	$username_utilizador = $_GET['username_utilizador'];
	$data_login = $_GET['data_login'];
	$ordenar = $_GET['ordenar'];

	if( $nome_utilizador == NULL && $username_utilizador == NULL && $data_login == NULL && $ordenar == "Escolha uma opção" )
		$reply = getAllLogs(); 

	//TODO
	// else if( $nome_utilizador != NULL && $ordenar != "Escolha uma opção" )
	// 	$reply = getLogsByNameOrderBy($nome_utilizador, $ordenar);

	// else if( $username_utilizador != NULL $ordenar != "Escolha uma opção" )
	// 	$reply = getLogsByEmailOrderBy($username_utilizador, $ordenar); 

	// else if( $data_login != NULL && $ordenar != "Escolha uma opção" )
	// 	$reply = getLogsByLoginDateOrderBy($data_login, $ordenar); 

	//TODO não funciona bem
	else if( $nome_utilizador != NULL && $username_utilizador == NULL && $data_login != NULL && $ordenar == "Escolha uma opção" )
		$reply = getLogsByNameAndDate($nome_utilizador, $data_login);

	//TODO não funciona bem
	else if( $nome_utilizador == NULL && $username_utilizador != NULL && $data_login != NULL && $ordenar == "Escolha uma opção" )
		$reply = getLogsByUsernameAndDate($username_utilizador, $data_login);

	else if( $nome_utilizador != NULL && $username_utilizador == NULL && $data_login == NULL && $ordenar == "Escolha uma opção" )
		$reply = getLogsByName($nome_utilizador);

	else if( $nome_utilizador == NULL && $username_utilizador != NULL && $data_login == NULL && $ordenar == "Escolha uma opção" )
		$reply = getLogsByUsername($username_utilizador); 

	else if( $nome_utilizador == NULL && $username_utilizador == NULL && $data_login != NULL && $ordenar == "Escolha uma opção" )
		$reply = getLogsByLoginDate($data_login); 

	//TODO
	// else if( $ordenar != "Escolha uma opção" )
	// 	$reply = getAllLogsOrderBy($ordenar); 

	else
		$reply = "NULL";

	echo json_encode($reply);
?>