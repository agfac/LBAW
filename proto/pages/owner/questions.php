<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/comments.php');
include_once('userInfo.php');

$allQuestions = getAllQuestions();


$smarty->assign('allQuestions', $allQuestions);
$smarty->display('owner/questions.tpl');
?>