<?php
	include_once('../../config/init.php');
	include_once($BASE_DIR .'database/publications.php');

	$nome_livro = $_GET['nome_livro'];
	$nome_autor = $_GET['nome_autor'];
	$nome_editora = $_GET['nome_editora'];
	$categoria = $_GET['categoria'];
	$subcategoria = $_GET['subcategoria'];
	$ordernar = $_GET['ordernar'];

	if($nome_livro == NULL && $nome_autor == NULL && $nome_editora == NULL && $subcategoria == "Escolha uma opção" && $categoria == "Escolha uma opção" && $ordernar == "Escolha uma opção" )
		$reply = getAllPublications();
	else if($nome_autor != null && $ordernar != "Escolha uma opção")
		if($ordernar === 'ASC')
			$reply = getPublicationsOrderedByAutorNameASC($nome_autor);
		else
			$reply = getPublicationsOrderedByAutorNameDESC($nome_autor);
	else if($nome_editora != null && $ordernar != "Escolha uma opção")
		if($ordernar === 'ASC')
			$reply = getPublicationsOrderedByEditorNameASC($nome_editora);
		else
			$reply = getPublicationsOrderedByEditorNameDESC($nome_editora);
	else if($subcategoria != "Escolha uma opção" && $ordernar != "Escolha uma opção")
		if($ordernar === 'ASC')
			$reply = getPublicationsOrderedBySubCategoryASC($subcategoria);
		else
			$reply = getPublicationsOrderedBySubCategoryDESC($subcategoria);
	else if($categoria != "Escolha uma opção" && $ordernar != "Escolha uma opção")
		if($ordernar === 'ASC')
			$reply = getPublicationsOrderedByCategoryASC($categoria);
		else
			$reply = getPublicationsOrderedByCategoryDESC($categoria);
	else if($nome_livro != null)
		$reply = getPublicationDataSearchPublicationName($nome_livro);
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