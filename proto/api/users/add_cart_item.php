<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/users.php');

if($_GET['id'] && $_GET['value']){
	
	try{
		insertCartPublication($_SESSION['userid'], $_GET['id'], $_GET['value']);
		
		$message['success_messages'][] = "Publicação adicionada ao carrinho";

	}catch (PDOException $e) {
		if (strpos($e->getMessage(), 'PK_Publicacaocarrinho') !== false) 
			$message['error_messages'][] = "Publicação já existe no carrinho";
		else
			$message['error_messages'][] = "Erro ao adicionar publicação no carrinho";
	}

	echo json_encode($message);
}
?>