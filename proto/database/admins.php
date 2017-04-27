<?php 

function createAdmin($nome, $genero, $diaNasc, $mesNasc, $anoNasc, $pais, $username, $password, $atividade) {

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
    
    //CHECK ADMINISTRADOR ALREADY EXISTS
    $stmt = $conn->prepare("SELECT *
                            FROM administrador 
                            WHERE username = ?");
    $stmt->execute(array($username));
    $result = $stmt->fetch();

    if($result){
      die('Administrador já existe!');
    }
    else{
      //INSERT INTO ADMINISTRADOR
      $stmt = $conn->prepare("INSERT INTO administrador (paisid, nome, genero, datanascimento, username, password, ativo) VALUES (?, ?, ?, ?, ?, ?, ?)");

      $datanasc = sprintf("%04d-%02d-%02d",$anoNasc,$mesNasc,$diaNasc);
      
      $stmt->execute(array($paisID, $nome, $genero, $datanasc, $username, sha1($password), $atividade));
    }


    $conn->commit();
  }catch(Exception $e){
    
    error_log($e->getMessage());

    $conn->rollBack();
  }
}

function updateAdminInformation($username, $userdata, $newuserinformation) {

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
      $stmt = $conn->prepare("UPDATE administrador
                              SET paisid = ? 
                              WHERE username = ?");
      $stmt->execute(array($paisID, $username));
    }
   
    $atividade = $newuserinformation['atividade'];
    //Check atividade
    if (!($userdata[0]['ativo'] == $atividade) && $atividade == FALSE) {
      $currentDate = date('Y-m-d H:i:s');
      $stmt = $conn->prepare("UPDATE administrador
                              SET datacessacao = ?, ativo = ?
                              WHERE username = ?");
      $stmt->execute(array($currentDate, $atividade, $username));
    } else if(!($userdata[0]['ativo'] == $atividade) && $atividade == TRUE) {
      $datacessacao = NULL;
      $stmt = $conn->prepare("UPDATE administrador
                              SET datacessacao = ?, ativo = ?
                              WHERE username = ?");
      $stmt->execute(array($datacessacao, $atividade, $username));
    }

    $nome = $newuserinformation['nome'];
    $genero = $newuserinformation['genero'];
    $diaNasc = $newuserinformation['diaNasc'];
    $mesNasc = $newuserinformation['mesNasc'];
    $anoNasc = $newuserinformation['anoNasc'];

    $birthdate = explode('-', $userdata[0]['datanascimento']);

    $birthyear = $birthdate[0];
    $str = $birthdate[1];
    $birthmonth = ltrim($str, '0');
    $birthday = $birthdate[2];

    if (!($userdata[0]['nome'] === $nome) || !($userdata[0]['genero'] === $genero) || !($birthday === $diaNasc) || !($birthmonth === $mesNasc) || !($birthyear === $anoNasc)){

      $stmt = $conn->prepare("UPDATE administrador 
                              SET nome = ?, genero = ?, datanascimento = ?
                              WHERE administrador.username = ?");

      $datanasc = sprintf("%04d-%02d-%02d",$anoNasc,$mesNasc,$diaNasc);

      $stmt->execute(array($nome, $genero, $datanasc, $username));
    }

    $conn->commit();

  }catch(Exception $e){

    error_log($e->getMessage());

    $conn->rollBack();
  }
}

function getAllAdmins(){
  global $conn;
  $stmt = $conn->prepare("SELECT *
                          FROM administrador
                          ORDER BY administradorid;");
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

function getAdminStatus($username){
  global $conn;
    $stmt = $conn->prepare("SELECT ativo
                            FROM administrador
                            WHERE username = ?");
    $stmt->execute(array($username));
    return $stmt->fetch();
}

function updateAdminStatus($username, $estado){
  global $conn;

  if ($estado == "FALSE") {
    $currentDate = date('Y-m-d H:i:s');
    $stmt = $conn->prepare("UPDATE administrador
                            SET datacessacao = ?, ativo = ?
                            WHERE username = ?");
    $stmt->execute(array($currentDate, $estado, $username));
  } else {
    $datacessacao = NULL;
    $stmt = $conn->prepare("UPDATE administrador
                            SET datacessacao = ?, ativo = ?
                            WHERE username = ?");
    $stmt->execute(array($datacessacao, $estado, $username));
  }

  $stmt = $conn->prepare("UPDATE administrador
                        SET ativo = ? 
                        WHERE username = ?");
  $stmt->execute(array($estado, $username));
}

?>