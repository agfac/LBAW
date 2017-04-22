<?php 

function getAllWorkers(){
  global $conn;
  $stmt = $conn->prepare("SELECT *
                          FROM funcionario");
  $stmt->execute();
  return $stmt->fetchAll();
}

function getWorkersAllData($username) {
    global $conn;
    $stmt = $conn->prepare("SELECT funcionario.*, morada.rua, codigopostal.*, pais.nome AS nomePais, localidade.nome AS nomeLocalidade
                            FROM funcionario
                            JOIN moradafaturacao
                            ON moradafaturacao.clienteid = funcionario.funcionarioid
                            JOIN morada
                            ON moradafaturacao.moradaid = morada.moradaid
                            JOIN codigopostal
                            ON  codigopostal.codigopostalid = morada.codigopostalid
                            JOIN localidade
                            ON localidade.localidadeid = codigopostal.localidadeid
                            JOIN pais
                            ON pais.paisid = localidade.paisid
                            WHERE funcionario.username = ?");
    $stmt->execute(array($username));
    return $stmt->fetchAll();
}

?>