<?php
	include_once('../../config/init.php');
	include_once($BASE_DIR .'database/publications.php');

	$nome_livro = $_GET['nome_livro'];
	$nome_autor = $_GET['nome_autor'];
	$nome_editora = $_GET['nome_editora'];

	if($nome_livro != null || $nome_autor != null || $nome_editora != null)
		$reply = getPublicationDataSearch($nome_livro, $nome_autor, $nome_editora);
	else
		$reply = "NULL";

	echo json_encode($reply);
?>