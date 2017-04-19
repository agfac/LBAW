<?php

function getPublicationData($id)
{
	global $conn;
    $stmt = $conn->prepare("SELECT publicacao.*, imagem.url, editora.nome AS nome_editora, autor.nome AS nome_autor
                            FROM autor
							RIGHT JOIN autorpublicacao
							ON autor.autorid = autorpublicacao.autorid 
							RIGHT JOIN publicacao
							ON autorpublicacao.publicacaoid = publicacao.publicacaoid 
							RIGHT JOIN editora
							ON editora.editoraid = publicacao.editoraid 
							RIGHT JOIN imagem
							ON imagem.publicacaoid = publicacao.publicacaoid
                            WHERE publicacao.publicacaoid = ?");
    $stmt->execute(array($id));
    return $stmt->fetchAll();
}

?>