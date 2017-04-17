<?php
session_start();

$pages = array("home", "publications", "publication_add", "publication_edit", "orders");

if(isset($_GET['page']) && in_array($_GET['page'],$pages))
{
$page='templates/owner/'.$_GET['page'].'.php';
}
else {
	header("LOCATION: ?page=home");
	$page='templates/owner/home.php';
}

include_once('templates/owner/header.php');
include_once($page);
include_once('templates/owner/footer.php');
?>