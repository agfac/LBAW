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

function getPublicationsBySubcategory($subcategory)
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

function getAllSubCategorys(){
	global $conn;
    $stmt = $conn->prepare("SELECT categoria.nome as nome_categoria, subcategoria.nome as nome_subcategoria
							FROM subcategoria
							LEFT JOIN categoria
							ON subcategoria.categoriaid = categoria.categoriaid");
    $stmt->execute(array());
    return $stmt->fetchAll();
}

function getAllAutors(){
	global $conn;
    $stmt = $conn->prepare("SELECT autorid, nome
							FROM autor
							WHERE autorid != 6
							ORDER BY nome");
    $stmt->execute(array());
    return $stmt->fetchAll();
}

function verifyEditoraIfExists($nomeEditora){
	global $conn;

    $stmt = $conn->prepare("SELECT editoraid
                            FROM editora 
                            WHERE nome = ?");
    $stmt->execute(array($nomeEditora));
    $result = $stmt->fetch();

    if($result){
      $editoraID = $result['editoraid'];
    }
    else{
      $stmt = $conn->prepare("INSERT INTO editora (nome) VALUES (?)");
      $stmt->execute(array($nomeEditora));
      $editoraID = $conn->lastInsertId('editora_editoraid_seq');
    }
    return $editoraID;
}

function getAllCategorys(){
	global $conn;
    $stmt = $conn->prepare("SELECT *
							FROM categoria
							ORDER BY categoriaid");
    $stmt->execute(array());
    return $stmt->fetchAll();
}

function getAllSubCategorysByCategory($categoriaId){
	global $conn;
    $stmt = $conn->prepare("SELECT subcategoria.*
							FROM subcategoria
							JOIN categoria
							ON subcategoria.categoriaid = categoria.categoriaid
                            WHERE categoria.categoriaid = ?");
    $stmt->execute(array($categoriaId));
    return $stmt->fetchAll();
}

function getCategoryNameById($id){
	global $conn;
    $stmt = $conn->prepare("SELECT nome
							FROM categoria
                            WHERE categoriaid = ?");
    $stmt->execute(array($id));
    $result = $stmt->fetch();
    return $result['nome'];
}


function getSubcategoryNameById($categoriaID,$subcategoriaID){
	global $conn;
	$stmt = $conn->prepare("SELECT subcategoria.nome
                            FROM subcategoria
                            JOIN categoria
                            ON subcategoria.categoriaid = categoria.categoriaid
                            WHERE subcategoria.subcategoriaid = ? AND categoria.categoriaid = ?");
    $stmt->execute(array($subcategoriaID, $categoriaID));
    $result = $stmt->fetch();
    return $result['nome'];
}

function createPublication($titulo, $descricao, $autorId, $editoraId, $subCategoriaId, $datapublicacao, $stock, $peso, $paginas, $preco, $precopromocional, $codigobarras, $novidade, $isbn, $edicao, $periodicidade, $block3, $block4){
	global $conn;
	$conn->beginTransaction();

	try {
		//CHECK PUBLICACAO ALREADY EXISTS
		$stmt = $conn->prepare("SELECT *
								FROM publicacao 
								WHERE codigobarras = ? OR isbn = ?");
		$stmt->execute(array($codigobarras, $isbn));
		$result = $stmt->fetch();

		if($result){
			die('Publicação já existe!');
		}
		else{
			$stmt = $conn->prepare("INSERT INTO publicacao (editoraid, subcategoriaid, titulo, datapublicacao, codigobarras, descricao, paginas, peso, preco, precopromocional, novidade, stock, edicao, periodicidade, isbn) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");


			$stmt->execute(array($editoraId, $subCategoriaId, $titulo, $datapublicacao, $codigobarras, $descricao, $paginas, $peso, $preco, $precopromocional, $novidade, $stock, $edicao, $periodicidade, $isbn));

			$publicacaoID = $conn->lastInsertId('publicacao_publicacaoid_seq');


			//need to create a new autorpublicacao values after insert a new publication
			$stmt = $conn->prepare("INSERT INTO autorpublicacao (publicacaoid, autorid) VALUES (?,?)");
			$stmt->execute(array($publicacaoID, $autorId));

    		//need to create a new imagem values after insert a new publication
			$urlImagem = "images/publications/" . $block3 . "/" . $block4 . "/" . $publicacaoID .".jpg";

			$stmt = $conn->prepare("INSERT INTO imagem (publicacaoid, nome, url) VALUES (?,?,?)");
			$stmt->execute(array($publicacaoID, $titulo, $urlImagem));
		}
		$conn->commit();

	}catch(Exception $e){
		error_log($e->getMessage());
		$conn->rollBack();
	}

}

?>