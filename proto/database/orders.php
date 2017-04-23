<?php 

function getAllOrders(){
  global $conn;
  $stmt = $conn->prepare("SELECT encomenda.*, cliente.nome as nomecliente, informacaofaturacao.*
                          FROM encomenda
                          JOIN cliente
                          ON cliente.clienteid = encomenda.encomendaid
                          JOIN informacaofaturacao
                          ON informacaofaturacao.informacaofaturacaoid = encomenda.informacaofaturacaoid");
  $stmt->execute();
  return $stmt->fetchAll();
}

?>