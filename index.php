<?php
session_start();

$templates = array("about-us", "home", "login", "register", "wishlist", "cart", "my-account", "order-list", "user-information", "checkout", "contact-us", "faq", "privacy-policy", "single-product");

if(isset($_GET['page']) && in_array($_GET['page'],$templates))
{
$page='templates/'.$_GET['page'].'.php';
}
else {
	header("LOCATION: ?page=home");
	$page='templates/home.php';
}

include_once('templates/header.php');
include_once($page);
include_once('templates/footer.php');
?>