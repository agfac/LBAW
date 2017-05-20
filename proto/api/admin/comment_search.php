<?php
	include_once('../../config/init.php');
	include_once($BASE_DIR .'database/comments.php');

	$nome_cliente = $_GET['nome_cliente'];
	$email_cliente = $_GET['email_cliente'];
	$nome_publicacao = $_GET['nome_publicacao'];
	$ordenar = $_GET['ordenar'];

	if( $nome_cliente == NULL && $email_cliente == NULL && $nome_publicacao == NULL && $ordenar == "Escolha uma opção" )
		$reply = getAllComments();

	else if($nome_cliente != NULL  && $ordenar != "Escolha uma opção")
		$reply = getCommentsByClientNameOrderBy($nome_cliente, $ordenar);

	else if($email_cliente != NULL && $ordenar != "Escolha uma opção")
		$reply = getCommentsByClientEmailOrderBy($email_cliente, $ordenar);

	else if($nome_publicacao != NULL && $ordenar != "Escolha uma opção")
		$reply = getCommentsByPublicationNameOrderBy($nome_publicacao, $ordenar);

	else if($nome_cliente != NULL )
		$reply = getCommentsByClientName($nome_cliente);

	else if($email_cliente != NULL )
		$reply = getCommentsByClientEmail($email_cliente);

	else if($nome_publicacao != NULL )
		$reply = getCommentsByPublicationName($nome_publicacao);

	else if($ordenar != "Escolha uma opção")
		$reply = getCommentsOrdered($ordenar);

	else
		$reply = "NULL";

	echo json_encode($reply);
?>