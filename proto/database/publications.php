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
    $stmt = $conn->prepare("SELECT publicacao.*, imagem.url, editora.nome AS nome_editora, autor.nome AS nome_autor, autor.autorid as id_autor, subcategoria.subcategoriaid as id_subcategoria, subcategoria.nome as nome_subcategoria, categoria.nome as nome_categoria, categoria.categoriaid as id_categoria
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
                            RIGHT JOIN categoria
                            ON subcategoria.categoriaid = categoria.categoriaid
                            WHERE publicacao.publicacaoid = ?");
    $stmt->execute(array($id));
    return $stmt->fetchAll();
}

function getPublicationDataSearch($nome_livro, $nome_autor, $nome_editora, $categoriaid, $subcategoriaid)
{
	global $conn;
    $stmt = $conn->prepare("SELECT publicacao.*, editora.nome AS nome_editora, autor.nome AS nome_autor, autor.autorid as id_autor, subcategoria.subcategoriaid as id_subcategoria, subcategoria.nome as nome_subcategoria, categoria.nome as nome_categoria, categoria.categoriaid as id_categoria
                            FROM autor
							RIGHT JOIN autorpublicacao
							ON autor.autorid = autorpublicacao.autorid 
							RIGHT JOIN publicacao
							ON autorpublicacao.publicacaoid = publicacao.publicacaoid 
							RIGHT JOIN editora
							ON editora.editoraid = publicacao.editoraid
                            RIGHT JOIN subcategoria
                            ON subcategoria.subcategoriaid = publicacao.subcategoriaid
                            RIGHT JOIN categoria
                            ON subcategoria.categoriaid = categoria.categoriaid
                            WHERE publicacao.titulo = ? OR autor.nome = ? OR editora.nome = ? OR categoria.categoriaid = ? OR subcategoria.subcategoriaid = ?");
    $stmt->execute(array($nome_livro,$nome_autor,$nome_editora,$categoriaid,$subcategoriaid));
    return $stmt->fetchAll();
}

function getPublicationsOrderedBy($ordernar)
{
	global $conn;
    $stmt = $conn->prepare("SELECT publicacao.*, editora.nome AS nome_editora, autor.nome AS nome_autor, autor.autorid as id_autor, subcategoria.subcategoriaid as id_subcategoria, subcategoria.nome as nome_subcategoria, categoria.nome as nome_categoria, categoria.categoriaid as id_categoria
                            FROM autor
							RIGHT JOIN autorpublicacao
							ON autor.autorid = autorpublicacao.autorid 
							RIGHT JOIN publicacao
							ON autorpublicacao.publicacaoid = publicacao.publicacaoid 
							RIGHT JOIN editora
							ON editora.editoraid = publicacao.editoraid
                            RIGHT JOIN subcategoria
                            ON subcategoria.subcategoriaid = publicacao.subcategoriaid
                            RIGHT JOIN categoria
                            ON subcategoria.categoriaid = categoria.categoriaid
                            ORDER BY CASE @ordenar WHEN 'ASC' THEN publicacao.preco ASC ELSE publicacao.preco DESC END");
    $stmt->execute(array());
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

function updateURL($publication_id, $titulo, $urlImagem){
	global $conn;

	$stmt = $conn->prepare("UPDATE imagem
	                     	SET url = ?, nome = ?
	                    	WHERE publicacaoid = ?");
	$stmt->execute(array($urlImagem, $titulo, $publication_id));
}

function updateAutorPublicacao($autorId, $publication_id){
	global $conn;

	$stmt = $conn->prepare("UPDATE autorpublicacao
	                     	SET autorid = ?
	                    	WHERE publicacaoid = ?");
	$stmt->execute(array($autorId, $publication_id));
}

function updatePublication($titulo, $descricao, $editoraId, $subCategoriaId, $datapublicacao, $stock, $peso, $paginas, $preco, $precopromocional, $codigobarras, $novidade, $isbn, $edicao, $periodicidade, $publication_id){
	global $conn;
	$conn->beginTransaction();

	try {
		$stmt = $conn->prepare("UPDATE publicacao
								SET editoraid = ?, subcategoriaid = ?, titulo = ?, datapublicacao = ?, codigobarras = ?, descricao = ?, paginas = ?, peso = ?, preco = ?, precopromocional = ?, novidade = ?, stock = ?, edicao = ?, periodicidade = ?, isbn = ?
								WHERE publicacaoid = ?");


		$stmt->execute(array($editoraId, $subCategoriaId, $titulo, $datapublicacao, $codigobarras, $descricao, $paginas, $peso, $preco, $precopromocional, $novidade, $stock, $edicao, $periodicidade, $isbn, $publication_id));

		$conn->commit();

	}catch(Exception $e){
		error_log($e->getMessage());
		$conn->rollBack();
	}
}

function removePublication($publication_id){
	global $conn;

	$stmt = $conn->prepare("DELETE FROM autorpublicacao
							WHERE publicacaoid = ?");
	$stmt->execute(array($publication_id));

	$stmt = $conn->prepare("DELETE FROM imagem
							WHERE publicacaoid = ?");
	$stmt->execute(array($publication_id));

	$stmt = $conn->prepare("DELETE FROM publicacaocarrinho
							WHERE publicacaoid = ?");
	$stmt->execute(array($publication_id));

	$stmt = $conn->prepare("DELETE FROM publicacaoencomenda
							WHERE publicacaoid = ?");
	$stmt->execute(array($publication_id));

	$stmt = $conn->prepare("DELETE FROM publicacaowishlist
							WHERE publicacaoid = ?");
	$stmt->execute(array($publication_id));

	$stmt = $conn->prepare("DELETE FROM comentario
							WHERE publicacaoid = ?");
	$stmt->execute(array($publication_id));
	
	$stmt = $conn->prepare("DELETE FROM publicacao
							WHERE publicacaoid = ?");
	$stmt->execute(array($publication_id));

	return $stmt->fetchAll();
}

?>