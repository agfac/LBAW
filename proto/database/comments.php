<?php

function getAllComments(){
	global $conn;
	$stmt = $conn->prepare("SELECT comentario.*, cliente.nome, publicacao.titulo
							FROM comentario
							JOIN cliente
							ON cliente.clienteid = comentario.clienteid
							JOIN publicacao
							ON publicacao.publicacaoid = comentario.publicacaoid");
	$stmt->execute();
	return $stmt->fetchAll();
}

function getCommentsByDate($firstDate,$todayDate){
  global $conn;
  $stmt = $conn->prepare("SELECT *
                          FROM comentario
                          WHERE data BETWEEN ? AND ?");
  $stmt->execute(array($firstDate,$todayDate));
  return $stmt->fetchAll();
}

?>