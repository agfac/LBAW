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

function getAllQuestions(){
	global $conn;
	$stmt = $conn->prepare("SELECT *
							FROM perguntautilizador
							ORDER BY data DESC");
	$stmt->execute();
	return $stmt->fetchAll();
}

function getCommentsByDate($firstDate,$todayDate){
  global $conn;
  $stmt = $conn->prepare("SELECT *
                          FROM comentario
                          WHERE data::date >= ? AND data::date <= ?
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
						  WHERE data::date >= ? AND data::date <= ?
						  ORDER BY comentario.data DESC
						  LIMIT 5");
  
  $stmt->execute(array($firstDate,$todayDate));
  return $stmt->fetchAll();
}

function deleteComment($idcomment){
	global $conn;
	$stmt = $conn->prepare("DELETE FROM comentario
							WHERE comentarioid = ?");
	$stmt->execute(array($idcomment));
	return $stmt->fetchAll();
}

function getCommentsByClientNamePublicationName($nomeCliente, $nomePublicacao){
	global $conn;
	$stmt = $conn->prepare("SELECT comentario.*, cliente.nome, publicacao.titulo
							FROM comentario
							JOIN cliente
							ON cliente.clienteid = comentario.clienteid
							JOIN publicacao
							ON publicacao.publicacaoid = comentario.publicacaoid
							WHERE LOWER(cliente.nome) like '%'||?||'%'
							AND LOWER(publicacao.titulo) like '%'||?||'%'
							ORDER BY comentario.comentarioid ");

	$stmt->execute(array(strtolower($nomeCliente), strtolower($nomePublicacao)));
	return $stmt->fetchAll();
}
function getCommentsByClientEmailPublicationName($emailCliente, $nomePublicacao){
	global $conn;
	$stmt = $conn->prepare("SELECT comentario.*, cliente.nome, publicacao.titulo
							FROM comentario
							JOIN cliente
							ON cliente.clienteid = comentario.clienteid
							JOIN publicacao
							ON publicacao.publicacaoid = comentario.publicacaoid
							WHERE LOWER(cliente.email) = ?
							AND LOWER(publicacao.titulo) like '%'||?||'%'
							ORDER BY comentario.comentarioid ");

	$stmt->execute(array(strtolower($emailCliente), strtolower($nomePublicacao)));
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
							WHERE LOWER(publicacao.titulo) like '%'||?||'%' 
							ORDER BY comentario.comentarioid ");

	$stmt->execute(array(strtolower($nomePublicacao)));
	return $stmt->fetchAll();
}

?>