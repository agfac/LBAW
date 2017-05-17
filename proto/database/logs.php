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

?>