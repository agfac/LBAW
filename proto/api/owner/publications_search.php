<?php
	include_once('../../config/init.php');
	include_once($BASE_DIR .'database/publications.php');

	$nome_livro = $_GET['nome_livro'];
	$nome_autor = $_GET['nome_autor'];
	$nome_editora = $_GET['nome_editora'];
	$categoria = $_GET['categoria'];
	$subcategoria = $_GET['subcategoria'];
	$ordernar = $_GET['ordernar'];

	if($nome_livro != null)
		$reply = getPublicationDataSearchBookName($nome_livro);
	else if($nome_autor != null)
		$reply = getPublicationDataSearchAutorName($nome_autor);
	else if($nome_editora != null)
		$reply = getPublicationDataSearchEditorName($nome_editora);
	else if($subcategoria != "Escolha uma opção")
		$reply = getPublicationDataSearchCat(null, $subcategoria);
	else if($categoria != "Escolha uma opção")
		$reply = getPublicationDataSearchCat($categoria, null);
	else if($ordernar != "Escolha uma opção")
		if($ordernar === 'ASC')
			$reply = getPublicationsOrderedByASC();
		else
			$reply = getPublicationsOrderedByDESC();
	else
		$reply = "NULL";

	echo json_encode($reply);
?>