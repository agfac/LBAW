<?php
	include_once('../../config/init.php');
	include_once($BASE_DIR .'database/publications.php');

	$publicacaoid = $_GET['publicacaoid'];

	$reply = removePublication($publicacaoid);

	echo json_encode($reply);
?>