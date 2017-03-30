<?php
session_start();

$pages = array("home", "calendar", "chartjs", "contacts", "e_commerce", "echarts", "fixed_footer", "fixed_sidebar", "form_advanced", "form_buttons", "form_upload", "form_validation", "form_wizards", "form", "general_elements", "glyphicons", "home2", "home3", "icons", "inbox", "invoice", "leve2", "media_gallery", "morisjs", "other_charts", "plain_page", "pricing_tables", "profile", "project_details", "projects", "tables_dynamic", "tables", "typography", "widgets");

if(isset($_GET['page']) && in_array($_GET['page'],$pages))
{
$page='pages/owner/'.$_GET['page'].'.php';
}
else {
	header("LOCATION: ?page=home");
	$page='pages/owner/home.php';
}

include_once('pages/owner/header.php');
include_once($page);
include_once('pages/owner/footer.php');
?>