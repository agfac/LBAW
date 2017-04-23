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

    if($result){
      die('Cliente já existe!');
    }
    else{
      //INSERT INTO CLIENTE
      $stmt = $conn->prepare("INSERT INTO cliente (paisid, nome, genero, datanascimento, username, password, telefone, email, nif) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

      $datanasc = sprintf("%02d/%02d/%04d",$diaNasc,$mesNasc+1,$anoNasc);
      
      $stmt->execute(array($paisID, $nome, $genero, $datanasc, $username, sha1($password), $telefone, $email, $nif));
      
      $clienteID = $conn->lastInsertId('cliente_clienteid_seq');
    }

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

    $conn->commit();
  }catch(Exception $e){
    
    error_log($e->getMessage());

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

function getUserData($username) {
    global $conn;
    $stmt = $conn->prepare("SELECT * 
                            FROM cliente
                            WHERE username = ?");
    $stmt->execute(array($username));
    return $stmt->fetchAll();
}

function getUserOrderList($clienteid) {
    global $conn;
    $stmt = $conn->prepare("SELECT encomenda.encomendaid, publicacao.titulo, publicacao.preco, informacaofaturacao.total, encomenda.data, encomenda.estado, imagem.url 
                            FROM informacaofaturacao
                            JOIN encomenda
                            ON informacaofaturacao.informacaofaturacaoid = encomenda.informacaofaturacaoid 
                            JOIN cliente
                            ON cliente.clienteid = encomenda.clienteid 
                            JOIN publicacaoencomenda
                            ON publicacaoencomenda.encomendaid = encomenda.encomendaid 
                            JOIN publicacao
                            ON publicacao.publicacaoid = publicacaoencomenda.publicacaoid
                            JOIN imagem
                            ON imagem.publicacaoid = publicacao.publicacaoid
                            WHERE encomenda.clienteid = ?");
    $stmt->execute(array($clienteid));
    return $stmt->fetchAll();
}

function getUserPublicationsCart($clienteid) {
  global $conn;
  $stmt = $conn->prepare("SELECT publicacao.publicacaoid, publicacao.titulo, publicacaocarrinho.quantidade, publicacao.preco, imagem.url, subcategoria.nome AS nome_subcategoria, categoria.nome AS nome_categoria
                          FROM cliente
                          JOIN carrinho
                          ON cliente.carrinhoid = carrinho.carrinhoid 
                          JOIN publicacaocarrinho
                          ON publicacaocarrinho.carrinhoid = carrinho.carrinhoid 
                          JOIN publicacao
                          ON publicacao.publicacaoid = publicacaocarrinho.publicacaoid 
                          JOIN imagem
                          ON imagem.publicacaoid = publicacaocarrinho.publicacaoid
                          JOIN subcategoria
                          ON publicacao.subcategoriaid = subcategoria.subcategoriaid 
                          JOIN categoria
                          ON categoria.categoriaid = subcategoria.categoriaid
                          WHERE cliente.clienteid = ?");
  $stmt->execute(array($clienteid));
  return $stmt->fetchAll();
}

function getAllUsers(){
  global $conn;
  $stmt = $conn->prepare("SELECT * 
                          FROM cliente");
  $stmt->execute();
  return $stmt->fetchAll();
}

function getUserAllData($username) {
    global $conn;
    $stmt = $conn->prepare("SELECT cliente.*, morada.rua, codigopostal.*, pais.paisid, pais.nome AS nomePais, localidade.nome AS nomeLocalidade
                            FROM cliente
                            LEFT JOIN moradafaturacao
                            ON moradafaturacao.clienteid = cliente.clienteid
                            LEFT JOIN morada
                            ON moradafaturacao.moradaid = morada.moradaid
                            LEFT JOIN codigopostal
                            ON  codigopostal.codigopostalid = morada.codigopostalid
                            LEFT JOIN localidade
                            ON localidade.localidadeid = codigopostal.localidadeid
                            LEFT JOIN pais
                            ON pais.paisid = localidade.paisid
                            WHERE cliente.username = ?");
    $stmt->execute(array($username));
    return $stmt->fetchAll();
}

function updateUserInformation($username, $userdata, $newuserinformation) {

  global $conn;

  $conn->beginTransaction();

  try{
    
    $paisID = $userdata[0]['paisid'];
    $pais = $newuserinformation['pais'];

    if (!($userdata[0]['nomepais'] === $pais)) {
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
        $stmt = $conn->prepare("INSERT INTO pais (nome) 
                                VALUES (?)");
        $stmt->execute(array($pais));
        $paisID = $conn->lastInsertId('pais_paisid_seq');
      }

      //UPDATE INTO PAIS
      $stmt = $conn->prepare("UPDATE cliente
                              SET paisid = ? 
                              WHERE username = ?");
      $stmt->execute(array($paisID, $username));

    }
    
    $localidade = $newuserinformation['localidade'];

    if (!($userdata[0]['nomelocalidade'] === $localidade)) {
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
        $stmt = $conn->prepare("INSERT INTO localidade (paisid, nome) 
                                VALUES (?, ?)");
        $stmt->execute(array($paisID, $localidade));
        $localidadeID = $conn->lastInsertId('localidade_localidadeid_seq');
      }

      //GET CODPOSTAL ID
      $stmt = $conn->prepare("SELECT codigopostal.codigopostalid, cliente.clienteid
                              FROM moradaenvio
                              JOIN morada
                              ON moradaenvio.moradaid = morada.moradaid 
                              JOIN cliente
                              ON moradaenvio.clienteid = cliente.clienteid 
                              JOIN codigopostal
                              ON morada.codigopostalid = codigopostal.codigopostalid
                              WHERE cliente.username = ?");
      $stmt->execute(array($username));
      $result = $stmt->fetch();

      $codPostalID = $result;

      //UPDATE INTO CODPOSTAL
      $stmt = $conn->prepare("UPDATE codigopostal
                              SET localidadeid = ? 
                              WHERE codigopostalid = ?");
      $stmt->execute(array($localidadeID, $codPostalID));
    }

    $cod1 = $newuserinformation['cod1'];
    $cod2 = $newuserinformation['cod2'];

    if (!($userdata[0]['cod1'] === $cod1) || !($userdata[0]['cod2'] === $cod2)){

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
        $stmt = $conn->prepare("INSERT INTO codigopostal (localidadeid, cod1, cod2) 
                                VALUES (?, ?, ?)");
        $stmt->execute(array($localidadeID, $cod1, $cod2));
        $codPostalID = $conn->lastInsertId('codigopostal_codigopostalid_seq');
      }

      //GET MORADA ID
      $stmt = $conn->prepare("SELECT morada.moradaid
                              FROM morada
                              JOIN codigopostal
                              ON morada.codigopostalid = codigopostal.codigopostalid 
                              JOIN moradaenvio
                              ON morada.moradaid = moradaenvio.moradaid 
                              JOIN cliente
                              ON cliente.clienteid = moradaenvio.clienteid
                              WHERE cliente.username = ?");
      $stmt->execute(array($username));
      $result = $stmt->fetch();

      $moradaID = $result;

      //UPDATE INTO MORADA
      $stmt = $conn->prepare("UPDATE morada
                              SET codigopostalid = ? 
                              WHERE moradaid = ?");
      $stmt->execute(array($codPostalID, $moradaID));
    }

    $nome = $newuserinformation['nome'];
    $genero = $newuserinformation['genero'];
    $diaNasc = $newuserinformation['diaNasc'];
    $mesNasc = $newuserinformation['mesNasc'];
    $anoNasc = $newuserinformation['anoNasc'];
    $morada = $newuserinformation['morada'];
    $telefone = $newuserinformation['telefone'];
    $email = $newuserinformation['email'];
    $nif = $newuserinformation['nif'];
    $username = $newuserinformation['username'];

    if (!($userdata[0]['nome'] === $nome) || !($userdata[0]['genero'] === $genero) || !($userdata[0]['diaNasc'] === $diaNasc) || !($userdata[0]['mesNasc'] === $mesNasc) || !($userdata[0]['anoNasc'] === $anoNasc) || !($userdata[0]['morada'] === $morada) || !($userdata[0]['telefone'] === $telefone) || !($userdata[0]['email'] === $email) || !($userdata[0]['nif'] === $nif) || !($userdata[0]['username'] === $username)){

      $stmt = $conn->prepare("UPDATE cliente 
                              SET nome = ?, genero = ?, datanascimento = ?, username = ?, telefone = ?, email = ?, nif = ? 
                              WHERE cliente.username = ?");

      $datanasc = sprintf("%02d/%02d/%04d",$diaNasc,$mesNasc+1,$anoNasc);

      $stmt->execute(array($nome, $genero, $datanasc, $username, $telefone, $email, $nif, $username));
    }

    $conn->commit();
  }catch(Exception $e){
    
    error_log($e->getMessage());

    $conn->rollBack();
  }
}
?>