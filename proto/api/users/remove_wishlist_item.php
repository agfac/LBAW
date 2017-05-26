<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/users.php');

if($_GET['id']){
	try {

		removePublicationWishList($_SESSION['userid'], $_GET['id']);

	} catch (PDOException $e) {

		$_SESSION['error_messages'][] = "Erro ao remover publicacao da wishlist" . $e->getMessage();
	}
}

echo true;
?>
