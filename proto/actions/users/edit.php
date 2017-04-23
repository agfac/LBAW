<?php
include_once '../../config/init.php';
include_once $BASE_DIR . 'database/users.php';

$username = $_SESSION['username'];

$newuserinformation = array(
    'nome'       => strip_tags($_POST['nome']),
    'genero'     => strip_tags($_POST['genero']),
    'diaNasc'    => strip_tags($_POST['diaNasc']),
    'mesNasc'    => strip_tags($_POST['mesNasc']),
    'anoNasc'    => strip_tags($_POST['anoNasc']),
    'morada'     => strip_tags($_POST['morada']),
    'localidade' => strip_tags($_POST['localidade']),
    'cod1'       => strip_tags($_POST['cod1']),
    'cod2'       => strip_tags($_POST['cod2']),
    'pais'       => strip_tags($_POST['pais']),
    'telefone'   => strip_tags($_POST['telefone']),
    'email'      => strip_tags($_POST['email']),
    'nif'        => strip_tags($_POST['nif']),
    'username'   => strip_tags($_POST['username']),
);

$password     = $_POST['password'];
$newpassword  = $_POST['novapassword'];
$confpassword = $_POST['confpassword'];

try {

    updateUserInformation($username, $newuserinformation);

    if ($password) {
        if ($password === getUserPassword()) {
            if ($newpassword === $confpassword) {
                updateUserPassword($newpassword);
            } else {
                $_SESSION['error_messages'][]         = 'Wrong new password';
                $_SESSION['field_errors']['password'] = 'New and confirmation password are different';
            }
        } else {
            $_SESSION['error_messages'][]         = 'Wrong password';
            $_SESSION['field_errors']['password'] = 'Old password is not correct';
        }
    }

} catch (PDOException $e) {

    if (strpos($e->getMessage(), 'cliente_email_key') !== false || strpos($e->getMessage(), 'cliente_nif_key') !== false || strpos($e->getMessage(), 'cliente_username_key') !== false) {
        $_SESSION['error_messages'][]         = 'Duplicate username';
        $_SESSION['field_errors']['username'] = 'Username already exists';
    } else {
        $_SESSION['error_messages'][] = 'Error creating user';
    }

    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . 'pages/users/register.php');
    exit;
}
$_SESSION['success_messages'][] = 'User registered successfully';
header("Location: $BASE_URL");
