<?php
	include_once('../../config/init.php');
	include_once($BASE_DIR .'database/publications.php');

	$nome_livro = $_GET['nome_livro'];
	$nome_autor = $_GET['nome_autor'];
	$nome_editora = $_GET['nome_editora'];
	$categoria = $_GET['categoria'];
	$subcategoria = $_GET['subcategoria'];
	$ordernar = $_GET['ordernar'];

	if($nome_livro != null || $nome_autor != null || $nome_editora != null)
		$reply = getPublicationDataSearch($nome_livro, $nome_autor, $nome_editora, null, null);
	else if($subcategoria != "Escolha uma opção")
		$reply = getPublicationDataSearch($nome_livro, $nome_autor, $nome_editora, null, $subcategoria);
	else if($categoria != "Escolha uma opção")
		$reply = getPublicationDataSearch($nome_livro, $nome_autor, $nome_editora, $categoria, null);
	else if($ordernar != "Escolha uma opção")
		$reply = getPublicationsOrderedBy($ordernar);
	else
		$reply = "NULL";

	echo json_encode($reply);
?>