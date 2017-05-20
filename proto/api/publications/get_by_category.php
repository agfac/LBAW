<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/publications.php');

$pubs = getPublicationsBySubcategory($_GET['subcat_name'], $_GET['cat_name']);

echo json_encode($pubs);
?>