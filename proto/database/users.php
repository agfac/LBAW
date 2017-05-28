<?php

//CREATE USER
function createUser($nome, $genero, $diaNasc, $mesNasc, $anoNasc, $morada, $localidade, $cod1, $cod2, $pais, $telefone, $email, $nif, $username, $password) {

  global $conn;

  $conn->beginTransaction();

  try{
    
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
      $stmt->execute(array($pais, $localidade));
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

      //INSERT INTO CLIENTE
    $stmt = $conn->prepare("INSERT INTO cliente (paisid, nome, genero, datanascimento, username, password, telefone, email, nif) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $datanasc = sprintf("%02d/%02d/%04d",$diaNasc,$mesNasc+1,$anoNasc);

    $stmt->execute(array($pais, $nome, $genero, $datanasc, $username, sha1($password), $telefone, $email, $nif));

    $clienteID = $conn->lastInsertId('cliente_clienteid_seq');
    

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

    throw $e;
  }
}

//CREATE AUTOR
function createAutor($paisId, $nomeAutor, $genero, $datanascimento, $biografia){
  global $conn;

  $conn->beginTransaction();

  try{

    //CHECK AUTOR ALREADY EXISTS
    $stmt = $conn->prepare("SELECT *
                            FROM autor 
                            WHERE nome = ? AND datanascimento = ?");
    $stmt->execute(array($nomeAutor, $datanascimento));
    $result = $stmt->fetch();

      //INSERT INTO AUTOR
    $stmt = $conn->prepare("INSERT INTO autor (paisid, nome, genero, datanascimento, biografia) VALUES (?, ?, ?, ?, ?)");

    $stmt->execute(array($paisId, $nomeAutor, $genero, $datanascimento, $biografia));

    $autorID = $conn->lastInsertId('autor_autorid_seq');
    

    $conn->commit();

    return $autorID;
  }catch(Exception $e){

    error_log($e->getMessage());

    $conn->rollBack();

    throw $e;
  }
}

//LOGIN VERIFICATION
function isLoginCorrect($username, $password) {

  global $conn;
  
  $stmt = $conn->prepare("SELECT * 
                          FROM cliente 
                          WHERE username = ? AND password = ?");
  
  $stmt->execute(array($username, sha1($password)));
  
  return $stmt->fetch() == true;
}

//GET USER DATA
function getUserData($username) {

  global $conn;

  $stmt = $conn->prepare("SELECT * 
                          FROM cliente
                          WHERE username = ?");

  $stmt->execute(array($username));

  return $stmt->fetchAll();
}

//GET USER ORDER LIST
function getUserOrderList($clienteid) {

  global $conn;

  $stmt = $conn->prepare("SELECT encomenda.*, informacaofaturacao.portes, informacaofaturacao.total, metodopagamento.tipo, morada.*, codigopostal.*, localidade.nome 
                          FROM informacaofaturacao
                          RIGHT JOIN encomenda
                          ON informacaofaturacao.informacaofaturacaoid = encomenda.informacaofaturacaoid
                          LEFT JOIN metodopagamento
                          ON informacaofaturacao.metodopagamentoid = metodopagamento.metodopagamentoid
                          LEFT JOIN morada
                          ON morada.moradaid = encomenda.moradafaturacaoid
                          LEFT JOIN codigopostal
                          ON morada.codigopostalid = codigopostal.codigopostalid
                          LEFT JOIN localidade
                          ON localidade.localidadeid = codigopostal.localidadeid
                          WHERE encomenda.clienteid = ?");

  $stmt->execute(array($clienteid));

  return $stmt->fetchAll();
}

//GET USER PUBLICATIONS ON CART
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

//GET USER CART SUBTOTAL
function getUserCartSubtotal($clienteid) {

  global $conn;
  
  $stmt = $conn->prepare("SELECT subtotal
                          FROM carrinho
                          WHERE carrinhoid = ?");
  
  $stmt->execute(array($clienteid));
  
  return $stmt->fetchAll();
}

//INSERT PUBLICATION ON CART
function insertCartPublication($carrinhoid, $publicacaoid, $quantidade) {

  global $conn;
  
  $stmt = $conn->prepare("INSERT INTO publicacaocarrinho
                          VALUES (?, ?, ?)");
  
  $stmt->execute(array($publicacaoid, $carrinhoid, $quantidade));
}

//UPDATE QUANTITY ON PUBLICATION CART
function updateCartItems($carrinhoid, $publicacaoid, $quantidade) {

  global $conn;
  
  $stmt = $conn->prepare("UPDATE publicacaocarrinho
                          SET quantidade = ?
                          WHERE carrinhoid = ? AND publicacaoid = ?");
  
  $stmt->execute(array($quantidade, $carrinhoid, $publicacaoid));
}

//REMOVE PUBLICATION FROM CART
function removeCartItem($carrinhoid, $publicacaoid) {

  global $conn;
  
  $stmt = $conn->prepare("DELETE FROM publicacaocarrinho
                          WHERE carrinhoid = ? AND publicacaoid = ?");
  
  $stmt->execute(array($carrinhoid, $publicacaoid));
}

//PUBLICATION ON CART VERIFICATION
function isPublicationOnCart($carrinhoid, $publicacaoid) {

  global $conn;
  
  $stmt = $conn->prepare("SELECT * 
                          FROM publicacaocarrinho 
                          WHERE publicacaoid = ? AND carrinhoid = ?");
  
  $stmt->execute(array($publicacaoid, $carrinhoid));
  
  return $stmt->fetch() == true;
}

//GET PUBLICATIONS ON WISHLIST
function getUserPublicationsWishList($clienteid) {

  global $conn;
  
  $stmt = $conn->prepare("SELECT cliente.clienteid, publicacao.publicacaoid, publicacao.titulo, publicacao.preco, imagem.url, subcategoria.nome AS nome_subcategoria, categoria.nome AS nome_categoria
                          FROM wishlist
                          JOIN cliente
                          ON wishlist.clienteid = cliente.clienteid 
                          JOIN publicacaowishlist
                          ON publicacaowishlist.wishlistid = wishlist.wishlistid 
                          JOIN publicacao
                          ON publicacao.publicacaoid = publicacaowishlist.publicacaoid 
                          JOIN imagem
                          ON imagem.publicacaoid = publicacao.publicacaoid
                          JOIN subcategoria
                          ON publicacao.subcategoriaid = subcategoria.subcategoriaid 
                          JOIN categoria
                          ON categoria.categoriaid = subcategoria.categoriaid
                          WHERE cliente.clienteid = ?");
  
  $stmt->execute(array($clienteid));
  
  return $stmt->fetchAll();
}

//REMOVE PUBLICATION FROM WISHLIST
function removePublicationWishList($clienteid, $publicacaoid) {

  global $conn;
  
  $stmt = $conn->prepare("DELETE FROM publicacaowishlist
                          WHERE publicacaowishlist.publicacaoid = ? AND publicacaowishlist.wishlistid = (SELECT wishlist.wishlistid
                          FROM wishlist
                          WHERE wishlist.clienteid = ?)");
  
  $stmt->execute(array($publicacaoid, $clienteid));
}

//MOVE PUBLICATION FROM WISHLIST TO CART
function movePublicationWishListToCart($clienteid, $publicacaoid, $quantidade) {

  global $conn;
  
  $conn->beginTransaction();

  try{

    //INSERT PUBLICATION ON CART
    $stmt = $conn->prepare("INSERT INTO publicacaocarrinho
      VALUES (?, ?, ?)");
    $stmt->execute(array($publicacaoid, $clienteid, $quantidade));

    //REMOVE PUBLICATION FROM WISHLIST
    $stmt = $conn->prepare("DELETE FROM publicacaowishlist
                            WHERE publicacaowishlist.publicacaoid = ? AND publicacaowishlist.wishlistid = (SELECT wishlist.wishlistid
                            FROM wishlist
                            WHERE wishlist.clienteid = ?)");
    $stmt->execute(array($publicacaoid, $clienteid));

    $conn->commit();
  }catch(Exception $e){

    error_log($e->getMessage());

    $conn->rollBack();

    throw $e;
  }
}

//GET ALL CLIENTS
function getAllUsers(){
  global $conn;
  
  $stmt = $conn->prepare("SELECT * 
                          FROM cliente
                          ORDER BY cliente.clienteid");
  $stmt->execute();
  
  return $stmt->fetchAll();
}

function getUserAllData($username) {
  global $conn;

  $stmt = $conn->prepare("SELECT cliente.*, morada.rua, codigopostal.*, pais.paisid, pais.nome AS nomePais, localidade.localidadeid, localidade.nome AS nomeLocalidade
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

//CLIENT STATUS VERIFICATION
function getClientStatus($username){
  global $conn;
  $stmt = $conn->prepare("SELECT ativo
                          FROM cliente
                          WHERE username = ?");
  $stmt->execute(array($username));
  return $stmt->fetch();
}

//UPDATE CLIENT STATUS
function updateClientStatus($username, $estado){
  global $conn;

  if ($estado == "FALSE") {
    $currentDate = date('Y-m-d H:i:s');
    $stmt = $conn->prepare("UPDATE cliente
                            SET datacancelamento = ?, ativo = ?
                            WHERE username = ?");
    $stmt->execute(array($currentDate, $estado, $username));
  } else {
    $datacancelamento = NULL;
    $stmt = $conn->prepare("UPDATE cliente
                            SET datacancelamento = ?, ativo = ?
                            WHERE username = ?");
    $stmt->execute(array($datacancelamento, $estado, $username));
  }

  $stmt = $conn->prepare("UPDATE cliente
                          SET ativo = ? 
                          WHERE username = ?");
  $stmt->execute(array($estado, $username));
}

//PAIS EXIST VERIFICATION
function verifyPaisIfExists($nomePais){
  global $conn;

  $stmt = $conn->prepare("SELECT *
                          FROM pais 
                          WHERE nome = ?");
  $stmt->execute(array($nomePais));
  $result = $stmt->fetch();

  if($result){
    $paisID = $result['paisid'];
  }
  else{
    $stmt = $conn->prepare("INSERT INTO pais (nome) 
      VALUES (?)");
    $stmt->execute(array($nomePais));
    $paisID = $conn->lastInsertId('pais_paisid_seq');
  }
  return $paisID;
}

//UPDATE CLIENT INFORMATION
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
    $localidadeID = $userdata[0]['localidadeid'];

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

      $codPostalID = $result['codigopostalid'];

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

      $moradaID = $result['moradaid'];

      //UPDATE INTO MORADA
      $stmt = $conn->prepare("UPDATE morada
                              SET codigopostalid = ? 
                              WHERE moradaid = ?");
      $stmt->execute(array($codPostalID, $moradaID));
    }

    $morada = $newuserinformation['morada'];

    if (!($userdata[0]['rua'] === $morada)){

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

      $moradaID = $result['moradaid'];

      //UPDATE INTO MORADA
      $stmt = $conn->prepare("UPDATE morada
                              SET rua = ? 
                              WHERE moradaid = ?");
      $stmt->execute(array($morada, $moradaID));
    }

    $nome = $newuserinformation['nome'];
    $genero = $newuserinformation['genero'];
    $diaNasc = $newuserinformation['diaNasc'];
    $mesNasc = $newuserinformation['mesNasc'];
    $anoNasc = $newuserinformation['anoNasc'];
    $telefone = $newuserinformation['telefone'];
    $email = $newuserinformation['email'];
    $nif = $newuserinformation['nif'];

    $birthdate = explode('-', $userdata[0]['datanascimento']);

    $birthyear = $birthdate[0];
    $str = $birthdate[1];
    $birthmonth = ltrim($str, '0');
    $birthday = $birthdate[2];

    if (!($userdata[0]['nome'] === $nome) || !($userdata[0]['genero'] === $genero) || !($birthday === $diaNasc) || !($birthmonth === $mesNasc) || !($birthyear === $anoNasc) || !($userdata[0]['telefone'] === $telefone) || !($userdata[0]['email'] === $email) || !($userdata[0]['nif'] === $nif)){

      $stmt = $conn->prepare("UPDATE cliente 
                              SET nome = ?, genero = ?, datanascimento = ?, telefone = ?, email = ?, nif = ? 
                              WHERE cliente.username = ?");

      $datanasc = sprintf("%02d/%02d/%04d",$diaNasc,$mesNasc,$anoNasc);

      $stmt->execute(array($nome, $genero, $datanasc, $telefone, $email, $nif, $username));
    }

    $conn->commit();

  }catch(Exception $e){

    error_log($e->getMessage());

    $conn->rollBack();

    throw $e;
  }
}

//UPDATE CLIENT PASSWORD
function updateUserPassword($username, $newpassword){

  global $conn;

  $stmt = $conn->prepare("UPDATE cliente 
                          SET password = ?
                          WHERE username = ?");
  $stmt->execute(array(sha1($newpassword),$username));
  
  return $stmt->fetchAll();
}

//GET USER BY REGISTER DATE
function getUsersByDate($firstDate,$todayDate){
  global $conn;
  $stmt = $conn->prepare("SELECT *
                          FROM cliente
                          WHERE dataregisto::date >= ? AND dataregisto::date <= ?");
  $stmt->execute(array($firstDate,$todayDate));
  return $stmt->fetchAll();
}

//GET USER BY NAME AND STATUS
function getUserByNameAndStatus($nomeCliente, $estadoCliente){

  global $conn;

  $stmt = $conn->prepare("SELECT *
                          FROM cliente
                          WHERE LOWER(nome) like '%'||?||'%'
                          AND ativo = ?
                          ORDER BY clienteid ASC");

  $stmt->execute(array(strtolower($nomeCliente), $estadoCliente));
  
  return $stmt->fetchAll();
}

//GET USER BY NAME
function getUserByName($nomeCliente){

  global $conn;

  $stmt = $conn->prepare("SELECT *
                          FROM cliente
                          WHERE LOWER(nome) like '%'||?||'%'");

  $stmt->execute(array(strtolower($nomeCliente)));
  
  return $stmt->fetchAll();
}

//GET USER BY EMAIL
function getUserByEmail($emailCliente){

  global $conn;

  $stmt = $conn->prepare("SELECT *
                          FROM cliente
                          WHERE LOWER(email) = ?");

  $stmt->execute(array(strtolower($emailCliente)));
  
  return $stmt->fetchAll();
}

//GET USER BY STATUS
function getUserByStatus($estadoCliente){

  global $conn;

  $stmt = $conn->prepare("SELECT *
                          FROM cliente
                          WHERE ativo = ?
                          ORDER BY clienteid ASC");
  
  $stmt->execute(array($estadoCliente));
  
  return $stmt->fetchAll();
}

//CLIENT EXISTS VERIFICATION
function checkIfUserExists($username){
  global $conn;
  $stmt = $conn->prepare("SELECT username
                          FROM cliente
                          WHERE username = ?");
  $stmt->execute(array($username));

  return ($stmt->fetch() !== false);
}

function getAllCountries(){
  
  global $conn;
  
  $stmt = $conn->prepare("SELECT nome
                          FROM pais");
  $stmt->execute();

  return $stmt->fetchAll();
}

function getAllCountriesAllInfo(){
  
  global $conn;
  
  $stmt = $conn->prepare("SELECT *
                          FROM pais");
  $stmt->execute();

  return $stmt->fetchAll();
}
?>