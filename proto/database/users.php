<?php

function createUser($nome, $genero, $diaNasc, $mesNasc, $anoNasc, $morada, $localidade, $cod1, $cod2, $pais, $telefone, $email, $nif, $username, $password) {

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
    
    //CHECK CLIENTE ALREADY EXISTS
    $stmt = $conn->prepare("SELECT *
                            FROM cliente 
                            WHERE username = ? OR email = ? OR nif = ?");
    $stmt->execute(array($username, $email, $nif));
    $result = $stmt->fetch();

    error_log('antes do if cliente');
    if($result){
      error_log('Cliente já existe!');
      // die('Cliente já existe!');
    }
    else{
      //INSERT INTO CLIENTE
      $stmt = $conn->prepare("INSERT INTO cliente (paisid, nome, genero, datanascimento, username, password, telefone, email, nif) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
      error_log('Antes da data!');
      // $datanasc = sprintf("%02d/%02d/%04d",$diaNasc,$mesNasc+1,$anoNasc);
      $datanasc = '1/2/1999';
      error_log('Depois da data!');
      error_log(print_r($conn->errorInfo()));
      error_log($paisID);
      error_log($nome);
      error_log($genero);
      error_log($datanasc);
      error_log($username);
      error_log(sha1($password));
      error_log($telefone);
      error_log($email);
      error_log($nif);
      $stmt->execute(array($paisID, $nome, $genero, $datanasc, $username, sha1($password), $telefone, $email, $nif));
            error_log('Depois do execute!');
            error_log(print_r($conn->errorInfo()));
      $clienteID = $conn->lastInsertId('cliente_clienteid_seq');
    }

    error_log('cliente_sucess');
    error_log($clienteID);
    //INSERT INTO MORADA
    $stmt = $conn->prepare("INSERT INTO morada (codigopostalid, rua) VALUES (?, ?)");
    $stmt->execute(array($codPostalID, $morada));
    $moradaID = $conn->lastInsertId('morada_moradaid_seq');

    //INSERT INTO MORADA_FATURACAO
    $stmt = $conn->prepare("INSERT INTO moradafaturacao (moradaid, clienteid) VALUES (?, ?)");
    $stmt->execute(array($moradaID, $clienteID));

      //INSERT INTO MORADA_ENVIO
    $stmt = $conn->prepare("INSERT INTO moradaenvio (moradaid, clienteid) VALUES (?, ?)");
    $stmt->execute(array($moradaID, $clienteID));

    error_log('sucess');

    $conn->commit();
  }catch(Exception $e){
    error_log($e->getMessage());
    error_log(print_r($conn->errorInfo()));
    error_log('exception');
    $conn->rollBack();
  }
}

function isLoginCorrect($username, $password) {
  global $conn;
  $stmt = $conn->prepare("SELECT * 
    FROM cliente 
    WHERE username = ? AND password = ?");
  $stmt->execute(array($username, sha1($password)));
  return $stmt->fetch() == true;
}
?>
