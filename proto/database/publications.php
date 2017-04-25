<?php

function getAllPublications(){
	global $conn;
	$stmt = $conn->prepare("SELECT publicacao.*, autor.nome AS nome_autor
							FROM autor
							RIGHT JOIN autorpublicacao
							ON autorpublicacao.autorid = autor.autorid
							RIGHT JOIN publicacao
							ON publicacao.publicacaoid = autorpublicacao.publicacaoid
							ORDER BY publicacao.publicacaoid");
	$stmt->execute();
	return $stmt->fetchAll();
}

function getPublicationData($id)
{
	global $conn;
    $stmt = $conn->prepare("SELECT publicacao.*, imagem.url, editora.nome AS nome_editora, autor.nome AS nome_autor, subcategoria.nome as nome_subcategoria
                            FROM autor
							RIGHT JOIN autorpublicacao
							ON autor.autorid = autorpublicacao.autorid 
							RIGHT JOIN publicacao
							ON autorpublicacao.publicacaoid = publicacao.publicacaoid 
							RIGHT JOIN editora
							ON editora.editoraid = publicacao.editoraid 
							RIGHT JOIN imagem
							ON imagem.publicacaoid = publicacao.publicacaoid
                            RIGHT JOIN subcategoria
                            ON subcategoria.subcategoriaid = publicacao.subcategoriaid
                            WHERE publicacao.publicacaoid = ?");
    $stmt->execute(array($id));
    return $stmt->fetchAll();
}

function getPublicationDataBySubcategory($subcategory)
{
	global $conn;
    $stmt = $conn->prepare("SELECT publicacao.*, imagem.url, editora.nome AS nome_editora, autor.nome AS nome_autor, subcategoria.nome as nome_subcategoria
                            FROM autor
							RIGHT JOIN autorpublicacao
								ON autor.autorid = autorpublicacao.autorid 
							RIGHT JOIN publicacao
								ON autorpublicacao.publicacaoid = publicacao.publicacaoid 
							RIGHT JOIN editora
								ON editora.editoraid = publicacao.editoraid 
							RIGHT JOIN imagem
								ON imagem.publicacaoid = publicacao.publicacaoid
                            RIGHT JOIN subcategoria
                           		ON subcategoria.subcategoriaid = publicacao.subcategoriaid
                            WHERE subcategoria.nome = ?");
    $stmt->execute(array($subcategory));
    return $stmt->fetchAll();
}

?>