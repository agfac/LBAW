<?php 

function getAllAdmins(){
  global $conn;
  $stmt = $conn->prepare("SELECT *
                          FROM administrador");
  $stmt->execute();
  return $stmt->fetchAll();
}

function getAdminAllData($username){
  global $conn;
  $stmt = $conn->prepare("SELECT administrador.*, pais.nome as nomepais
                          FROM administrador
                          JOIN pais
                          ON administrador.paisid = pais.paisid
                          WHERE administrador.username = ?");
  $stmt->execute(array($username));
  return $stmt->fetchAll();
}

?>