<?php
function getAllQuestions(){
	global $conn;
	$stmt = $conn->prepare("SELECT *
							FROM perguntautilizador
							ORDER BY data DESC");
	$stmt->execute();
	return $stmt->fetchAll();
}
?>