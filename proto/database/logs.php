<?php 

function getAllLogs(){
    global $conn;
    $stmt = $conn->prepare("SELECT DISTINCT login.*, (administrador.nome, cliente.nome, funcionario.nome) as nome
                            FROM login
                            LEFT JOIN administrador
                            ON administrador.administradorid = login.administradorid
                            LEFT JOIN cliente
                            ON cliente.clienteid = login.clienteid
                            LEFT JOIN funcionario
                            ON funcionario.funcionarioid = login.funcionarioid
                            ORDER BY login.loginid");
    $stmt->execute();
    return $stmt->fetchAll();
}

function getlogsByDate($firstDate,$todayDate){
    global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM login
                            WHERE data::date >= ? AND data::date <= ?");
    $stmt->execute(array($firstDate,$todayDate));
    return $stmt->fetchAll();
}

//TODO
// function getLogsByNameOrderBy($nomeUtilizador, $ordenar){

// }

// function getLogsByEmailOrderBy($emailUtilizador, $ordenar){
  
// }

// function getLogsByLoginDateOrderBy($dataLogin, $ordenar){
  
// }

function getLogsByNameAndDate($nomeUtilizador, $dataLogin){
    global $conn;

    $stmt = $conn->prepare("SELECT DISTINCT login.*, (administrador.nome, cliente.nome, funcionario.nome) as nome
                            FROM login
                            LEFT JOIN administrador
                            ON administrador.administradorid = login.administradorid
                            LEFT JOIN cliente
                            ON cliente.clienteid = login.clienteid
                            LEFT JOIN funcionario
                            ON funcionario.funcionarioid = login.funcionarioid
                            WHERE login.data::date = ?
                            AND ( LOWER(administrador.nome) like '%'||?||'%'
                            OR LOWER(cliente.nome) like '%'||?||'%'
                            OR LOWER(funcionario.nome) like '%'||?||'%' )
                            ORDER BY login.loginid ");

    $stmt->execute(array($dataLogin, strtolower($nomeUtilizador), strtolower($nomeUtilizador), strtolower($nomeUtilizador)));
    return $stmt->fetchAll();
}

function getLogsByUsernameAndDate($usernameUtilizador, $dataLogin){
    global $conn;

    $stmt = $conn->prepare("SELECT DISTINCT login.*, (administrador.nome, cliente.nome, funcionario.nome) as nome
                            FROM login
                            LEFT JOIN administrador
                            ON administrador.administradorid = login.administradorid
                            LEFT JOIN cliente
                            ON cliente.clienteid = login.clienteid
                            LEFT JOIN funcionario
                            ON funcionario.funcionarioid = login.funcionarioid
                            WHERE login.data::date = ?
                            AND ( LOWER(cliente.username) = ?
                            OR LOWER(funcionario.username) = ?
                            OR LOWER(administrador.username) = ? )
                            ORDER BY login.loginid");

    $stmt->execute(array($dataLogin, strtolower($usernameUtilizador),strtolower($usernameUtilizador),strtolower($usernameUtilizador)));
    return $stmt->fetchAll();
}

//TODO não funciona bem
function getLogsByName($nomeUtilizador){
    global $conn;

    $stmt = $conn->prepare("SELECT DISTINCT login.*, (administrador.nome, cliente.nome, funcionario.nome) as nome
                            FROM login
                            LEFT JOIN administrador
                            ON administrador.administradorid = login.administradorid
                            LEFT JOIN cliente
                            ON cliente.clienteid = login.clienteid
                            LEFT JOIN funcionario
                            ON funcionario.funcionarioid = login.funcionarioid
                            WHERE LOWER(administrador.nome) like '%'||?||'%'
                            OR LOWER(cliente.nome) like '%'||?||'%'
                            OR LOWER(funcionario.nome) like '%'||?||'%'
                            ORDER BY login.loginid");

    $stmt->execute(array(strtolower($nomeUtilizador),strtolower($nomeUtilizador),strtolower($nomeUtilizador)));
    return $stmt->fetchAll();
}

//TODO não funciona bem
function getLogsByUsername($usernameUtilizador){
    global $conn;

    $stmt = $conn->prepare("SELECT DISTINCT login.*, (administrador.nome, cliente.nome, funcionario.nome) as nome
                            FROM login
                            LEFT JOIN administrador
                            ON administrador.administradorid = login.administradorid
                            LEFT JOIN cliente
                            ON cliente.clienteid = login.clienteid
                            LEFT JOIN funcionario
                            ON funcionario.funcionarioid = login.funcionarioid
                            WHERE LOWER(cliente.username) = ?
                            OR LOWER(funcionario.username) = ?
                            OR LOWER(administrador.username) = ?
                            ORDER BY login.loginid");

    $stmt->execute(array(strtolower($usernameUtilizador),strtolower($usernameUtilizador),strtolower($usernameUtilizador)));
    return $stmt->fetchAll();
}


function getLogsByLoginDate($dataLogin){
    global $conn;

    $stmt = $conn->prepare("SELECT DISTINCT login.*, (administrador.nome, cliente.nome, funcionario.nome) as nome
                            FROM login
                            LEFT JOIN administrador
                            ON administrador.administradorid = login.administradorid
                            LEFT JOIN cliente
                            ON cliente.clienteid = login.clienteid
                            LEFT JOIN funcionario
                            ON funcionario.funcionarioid = login.funcionarioid
                            WHERE login.data::date = ?
                            ORDER BY login.loginid ");

    $stmt->execute(array($dataLogin));
    return $stmt->fetchAll();
}

//TODO
function getAllLogsOrderBy($ordenar){
    global $conn;

    $stmt = $conn->prepare("SELECT DISTINCT login.*, (administrador.nome, cliente.nome, funcionario.nome) as nome
                            FROM login
                            LEFT JOIN administrador
                            ON administrador.administradorid = login.administradorid
                            LEFT JOIN cliente
                            ON cliente.clienteid = login.clienteid
                            LEFT JOIN funcionario
                            ON funcionario.funcionarioid = login.funcionarioid
                            ORDER BY 
                                CASE WHEN ('maisRecente' = ?) THEN login.data END DESC,
                                CASE WHEN ('menosRecente' = ?) THEN login.data END ASC ");

    $stmt->execute(array($ordenar,$ordenar));
    return $stmt->fetchAll();
}


?>