<?php
session_start();

$pages = array("home", "clients", "client_edit", "workers", "worker_edit", "worker_add", "admins", "admin_edit", "admin_add", "comments", "logs_clients");

if(isset($_GET['page']) && in_array($_GET['page'],$pages))
{
$page='templates/admin/'.$_GET['page'].'.php';
}
else {
	header("LOCATION: ?page=home");
	$page='templates/admin/home.php';
}

include_once('templates/admin/header.php');
include_once($page);
include_once('templates/admin/footer.php');
?>