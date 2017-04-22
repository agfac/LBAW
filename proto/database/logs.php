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
                          ON funcionario.funcionarioid = login.funcionarioid");
  $stmt->execute();
  return $stmt->fetchAll();
}

?>