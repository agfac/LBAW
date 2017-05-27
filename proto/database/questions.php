<?php

function getAllQuestions(){
	global $conn;
	$stmt = $conn->prepare("SELECT *
							FROM perguntautilizador
							ORDER BY data DESC");
	$stmt->execute();
	return $stmt->fetchAll();
}

function updateQuestionStatus($id){
	global $conn;
	$stmt = $conn->prepare("UPDATE perguntautilizador
							SET respondido = NOT respondido
							WHERE perguntautilizadorid = ?");
    $stmt->execute(array($id));
    return $stmt->fetch();
}

?>