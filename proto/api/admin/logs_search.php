<?php
	include_once('../../config/init.php');
	include_once($BASE_DIR .'database/logs.php');

	$nome_utilizador = $_GET['nome_utilizador'];
	$username_utilizador = $_GET['username_utilizador'];
	$data_login = $_GET['data_login'];

	if( $nome_utilizador == NULL && $username_utilizador == NULL && $data_login == NULL  )
		$reply = getAllLogs(); 

	else if( $nome_utilizador != NULL && $username_utilizador == NULL && $data_login != NULL )
		$reply = getLogsByNameAndDate($nome_utilizador, $data_login);

	else if( $nome_utilizador == NULL && $username_utilizador != NULL && $data_login != NULL )
		$reply = getLogsByUsernameAndDate($username_utilizador, $data_login);

	else if( $nome_utilizador != NULL && $username_utilizador == NULL && $data_login == NULL )
		$reply = getLogsByName($nome_utilizador);

	else if( $nome_utilizador == NULL && $username_utilizador != NULL && $data_login == NULL )
		$reply = getLogsByUsername($username_utilizador); 

	else if( $nome_utilizador == NULL && $username_utilizador == NULL && $data_login != NULL )
		$reply = getLogsByLoginDate($data_login); 

	else
		$reply = "NULL";

	echo json_encode($reply);
?>