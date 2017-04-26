<?php 

function createWorker($nome, $genero, $diaNasc, $mesNasc, $anoNasc, $morada, $localidade, $cod1, $cod2, $pais, $currentDate, $telefone, $email, $nif, $cartaocidadao, $username, $password) {

  global $conn;

  $conn->beginTransaction();

  try{
    
  //CHECK PAIS ALREADY EXISTS
    $stmt = $conn->prepare("SELECT *
                            FROM pais 
                            WHERE nome = ?");
    $stmt->execute(array($pais));
    $result = $stmt->fetch();

    if($result){
      $paisID = $result['paisid'];
    }
    else{
      //INSERT INTO PAIS
      $stmt = $conn->prepare("INSERT INTO pais (nome) VALUES (?)");
      $stmt->execute(array($pais));
      $paisID = $conn->lastInsertId('pais_paisid_seq');
    }

    //CHECK LOCALIDADE ALREADY EXISTS
    $stmt = $conn->prepare("SELECT *
      FROM localidade 
      WHERE nome = ?");
    $stmt->execute(array($localidade));
    $result = $stmt->fetch();
    
    if($result){
      $localidadeID = $result['localidadeid'];
    }
    else{
      //INSERT INTO LOCALIDADE
      $stmt = $conn->prepare("INSERT INTO localidade (paisid, nome) VALUES (?, ?)");
      $stmt->execute(array($paisID, $localidade));
      $localidadeID = $conn->lastInsertId('localidade_localidadeid_seq');
    }

    //CHECK CODIGO_POSTAL ALREADY EXISTS
    $stmt = $conn->prepare("SELECT *
                            FROM codigopostal 
                            WHERE cod1 = ? AND cod2 = ?");
    $stmt->execute(array($cod1, $cod2));
    $result = $stmt->fetch();
    
    if($result){
      $codPostalID = $result['codigopostalid'];
    }
    else{
      //INSERT INTO CODIGO_POSTAL
      $stmt = $conn->prepare("INSERT INTO codigopostal (localidadeid, cod1, cod2) VALUES (?, ?, ?)");
      $stmt->execute(array($localidadeID, $cod1, $cod2));
      $codPostalID = $conn->lastInsertId('codigopostal_codigopostalid_seq');
    }

    //CHECK MORADA ALREADY EXISTS
    $stmt = $conn->prepare("SELECT *
      FROM morada 
      WHERE rua = ?");
    $stmt->execute(array($morada));
    $result = $stmt->fetch();
    
    if($result){
      $moradaID = $result['moradaid'];
    }
    else{
      //INSERT INTO MORADA
      $stmt = $conn->prepare("INSERT INTO morada (codigopostalid, rua) VALUES (?, ?)");
    $stmt->execute(array($codPostalID, $morada));
    $moradaID = $conn->lastInsertId('morada_moradaid_seq');
    }
    
    //CHECK FUNCIONARIO ALREADY EXISTS
    $stmt = $conn->prepare("SELECT *
                            FROM funcionario 
                            WHERE username = ? OR email = ? OR nif = ?");
    $stmt->execute(array($username, $email, $nif));
    $result = $stmt->fetch();

    if($result){
      die('Funcionário já existe!');
    }
    else{
      //INSERT INTO FUNCIONARIO
      $stmt = $conn->prepare("INSERT INTO funcionario (paisid, moradaid, nome, genero, datanascimento, username, password, dataadmissao, telefone, email, nif, cartaocidadao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

      $datanasc = sprintf("%04d-%02d-%02d",$anoNasc,$mesNasc,$diaNasc);

      $stmt->execute(array($paisID, $moradaID, $nome, $genero, $datanasc, $username, sha1($password), $currentDate, $telefone, $email, $nif, $cartaocidadao));
      
    }

    $conn->commit();
  }catch(Exception $e){
    
    error_log($e->getMessage());

    $conn->rollBack();
  }
}

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
                          JOIN morada
                          ON morada.moradaid = funcionario.moradaid
                          JOIN codigopostal
                          ON codigopostal.codigopostalid = morada.codigopostalid
                          JOIN localidade
                          ON localidade.localidadeid = codigopostal.localidadeid
                          JOIN pais
                          ON pais.paisid = localidade.paisid
                          WHERE funcionario.username = ?");
  $stmt->execute(array($username));
  return $stmt->fetchAll();
}

?>