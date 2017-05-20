<?php

function getAllComments(){
	global $conn;
	$stmt = $conn->prepare("SELECT comentario.*, cliente.nome, publicacao.titulo
							FROM comentario
							JOIN cliente
							ON cliente.clienteid = comentario.clienteid
							JOIN publicacao
							ON publicacao.publicacaoid = comentario.publicacaoid
							ORDER BY comentario.comentarioid ");
	$stmt->execute();
	return $stmt->fetchAll();
}

function getCommentsByDate($firstDate,$todayDate){
  global $conn;
  $stmt = $conn->prepare("SELECT *
                          FROM comentario
                          WHERE data BETWEEN ? AND ?
                          ORDER BY comentarioid ASC");
  $stmt->execute(array($firstDate,$todayDate));
  return $stmt->fetchAll();
}

function getLast5CommentsByDate($firstDate,$todayDate){
  global $conn;
  $stmt = $conn->prepare("SELECT comentario.data, comentario.texto, cliente.nome
						  FROM comentario
						  JOIN cliente
						  on cliente.clienteid = comentario.clienteid
						  WHERE data BETWEEN ? AND ? 
						  ORDER BY comentario.data DESC
						  LIMIT 5");
  
  $stmt->execute(array($firstDate,$todayDate));
  return $stmt->fetchAll();
}

function getCommentsByClientName($nomeCliente){
	global $conn;
	$stmt = $conn->prepare("SELECT comentario.*, cliente.nome, publicacao.titulo
							FROM comentario
							JOIN cliente
							ON cliente.clienteid = comentario.clienteid
							JOIN publicacao
							ON publicacao.publicacaoid = comentario.publicacaoid
							WHERE LOWER(cliente.nome) like '%'||?||'%'
							ORDER BY comentario.comentarioid ");

	$stmt->execute(array(strtolower($nomeCliente)));
	return $stmt->fetchAll();
}

function getCommentsByClientEmail($emailCliente){
	global $conn;
	$stmt = $conn->prepare("SELECT comentario.*, cliente.nome, publicacao.titulo
							FROM comentario
							JOIN cliente
							ON cliente.clienteid = comentario.clienteid
							JOIN publicacao
							ON publicacao.publicacaoid = comentario.publicacaoid
							WHERE LOWER(cliente.email) = ? ");

	$stmt->execute(array(strtolower($emailCliente)));
	return $stmt->fetchAll();
}

function getCommentsByPublicationName($nomePublicacao){
	global $conn;
	$stmt = $conn->prepare("SELECT comentario.*, cliente.nome, publicacao.titulo
							FROM comentario
							JOIN cliente
							ON cliente.clienteid = comentario.clienteid
							JOIN publicacao
							ON publicacao.publicacaoid = comentario.publicacaoid
							WHERE LOWER(publicacao.titulo) like '%'||?||'%' ");

	$stmt->execute(array(strtolower($nomePublicacao)));
	return $stmt->fetchAll();
}

function getCommentsOrdered($ordenar){
	global $conn;
	$stmt = $conn->prepare("SELECT comentario.*, cliente.nome, publicacao.titulo
							FROM comentario
							JOIN cliente
							ON cliente.clienteid = comentario.clienteid
							JOIN publicacao
							ON publicacao.publicacaoid = comentario.publicacaoid
							ORDER BY 
								CASE WHEN ('DESC' = ?) THEN comentario.classificacao END DESC,
								CASE WHEN ('ASC' = ?) THEN comentario.classificacao END ASC ");

	$stmt->execute(array($ordenar, $ordenar));
	return $stmt->fetchAll();
}

function getCommentsByClientNameOrderBy($nomeCliente, $ordenar){
	global $conn;
	$stmt = $conn->prepare("SELECT comentario.*, cliente.nome, publicacao.titulo
							FROM comentario
							JOIN cliente
							ON cliente.clienteid = comentario.clienteid
							JOIN publicacao
							ON publicacao.publicacaoid = comentario.publicacaoid
							WHERE LOWER(cliente.nome) like '%'||?||'%'
							ORDER BY 
								CASE WHEN ('DESC' = ?) THEN comentario.classificacao END DESC,
								CASE WHEN ('ASC' = ?) THEN comentario.classificacao END ASC ");

	$stmt->execute(array(strtolower($nomeCliente), $ordenar, $ordenar));
	return $stmt->fetchAll();
}

function getCommentsByClientEmailOrderBy($emailCliente, $ordenar){
	global $conn;
	$stmt = $conn->prepare("SELECT comentario.*, cliente.nome, publicacao.titulo
							FROM comentario
							JOIN cliente
							ON cliente.clienteid = comentario.clienteid
							JOIN publicacao
							ON publicacao.publicacaoid = comentario.publicacaoid
							WHERE LOWER(cliente.email) = ? 
							ORDER BY 
								CASE WHEN ('DESC' = ?) THEN comentario.classificacao END DESC,
								CASE WHEN ('ASC' = ?) THEN comentario.classificacao END ASC ");

	$stmt->execute(array(strtolower($emailCliente), $ordenar, $ordenar));
	return $stmt->fetchAll();
}

function getCommentsByPublicationNameOrderBy($nomePublicacao, $ordenar){
	global $conn;
	$stmt = $conn->prepare("SELECT comentario.*, cliente.nome, publicacao.titulo
							FROM comentario
							JOIN cliente
							ON cliente.clienteid = comentario.clienteid
							JOIN publicacao
							ON publicacao.publicacaoid = comentario.publicacaoid
							WHERE LOWER(publicacao.titulo) like '%'||?||'%' 
							ORDER BY 
								CASE WHEN ('DESC' = ?) THEN comentario.classificacao END DESC,
								CASE WHEN ('ASC' = ?) THEN comentario.classificacao END ASC ");

	$stmt->execute(array(strtolower($nomePublicacao), $ordenar, $ordenar));
	return $stmt->fetchAll();
}

?>