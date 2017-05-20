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
                            WHERE data BETWEEN ? AND ?");
    $stmt->execute(array($firstDate,$todayDate));
    return $stmt->fetchAll();
}


// function getLogsByNameOrderBy($nomeUtilizador, $ordenar){

// }

// function getLogsByEmailOrderBy($emailUtilizador, $ordenar){
  
// }

// function getLogsByLoginDateOrderBy($dataLogin, $ordenar){
  
// }

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

//TODO atualizar para suportar o email do admin
function getLogsByEmail($emailUtilizador){
    global $conn;
    $stmt = $conn->prepare("SELECT DISTINCT login.*, (administrador.nome, cliente.nome, funcionario.nome) as nome
                            FROM login
                            LEFT JOIN administrador
                            ON administrador.administradorid = login.administradorid
                            LEFT JOIN cliente
                            ON cliente.clienteid = login.clienteid
                            LEFT JOIN funcionario
                            ON funcionario.funcionarioid = login.funcionarioid
                            WHERE LOWER(cliente.email) = ?
                            OR LOWER(funcionario.email) = ?
                            ORDER BY login.loginid");

    $stmt->execute(array(strtolower($emailUtilizador),strtolower($emailUtilizador)));
    return $stmt->fetchAll();
}


// function getLogsByLoginDate($dataLogin){
  
// }

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
                            ORDER BY login.data ");
                                //CASE WHEN ('maisRecente' = ?) THEN login.data END DESC,
                                //CASE WHEN ('menosRecente' = ?) THEN login.data END ASC ");
    $stmt->execute();//array($ordenar,$ordenar));
    return $stmt->fetchAll();
}


?>