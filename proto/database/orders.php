<?php

function getAllOrders(){
  global $conn;
  $stmt = $conn->prepare("SELECT encomenda.*, cliente.nome as nomecliente, informacaofaturacao.*
                          FROM encomenda
                          JOIN cliente
                          ON cliente.clienteid = encomenda.clienteid
                          JOIN informacaofaturacao
                          ON informacaofaturacao.informacaofaturacaoid = encomenda.informacaofaturacaoid
                          ORDER BY encomenda.encomendaid");
  $stmt->execute();
  return $stmt->fetchAll();
}

function getBest5OrdersByDate($firstDate,$lastDate){
	global $conn;
	$stmt = $conn->prepare("SELECT encomenda.*, cliente.nome as nomecliente, informacaofaturacao.*
		                    FROM encomenda
		                    JOIN cliente
		                    ON cliente.clienteid = encomenda.clienteid
		                    JOIN informacaofaturacao
		                    ON informacaofaturacao.informacaofaturacaoid = encomenda.informacaofaturacaoid
							WHERE encomenda.data BETWEEN ? AND ?
		                    ORDER BY informacaofaturacao.total DESC
							LIMIT 5");
	$stmt->execute(array($firstDate,$lastDate));
	return $stmt->fetchAll();
}

function getTodayOrders($lastDate){
	global $conn;
	$stmt = $conn->prepare("SELECT encomenda.*, cliente.nome as nomecliente, informacaofaturacao.*
		                    FROM encomenda
		                    JOIN cliente
		                    ON cliente.clienteid = encomenda.clienteid
		                    JOIN informacaofaturacao
		                    ON informacaofaturacao.informacaofaturacaoid = encomenda.informacaofaturacaoid
							WHERE encomenda.data::date >= ? AND encomenda.data::date <= ?
		                    ORDER BY encomenda.encomendaid");
	$stmt->execute(array($lastDate,$lastDate));
	return $stmt->fetchAll();
}

function getOrderData($id)
{
	global $conn;
    $stmt = $conn->prepare("SELECT encomenda.*, cliente.nome as nomecliente, informacaofaturacao.*, publicacaoencomenda.*, morada.rua, codigopostal.*, localidade.nome as nome_localidade, pais.nome as nome_pais, publicacao.titulo, publicacao.publicacaoid
							FROM encomenda
							LEFT JOIN informacaofaturacao
							ON informacaofaturacao.informacaofaturacaoid = encomenda.informacaofaturacaoid
							LEFT JOIN publicacaoencomenda
							ON publicacaoencomenda.encomendaid = encomenda.encomendaid
							LEFT JOIN publicacao
							ON publicacao.publicacaoid = publicacaoencomenda.publicacaoid
							LEFT JOIN moradaenvio
							ON moradaenvio.moradaid = encomenda.moradaenvioid
							LEFT JOIN morada
							ON morada.moradaid = moradaenvio.moradaid
							LEFT JOIN codigopostal
							ON codigopostal.codigopostalid = morada.codigopostalid
							LEFT JOIN localidade
							ON localidade.localidadeid = codigopostal.localidadeid
							LEFT JOIN pais
							ON pais.paisid = localidade.paisid
							LEFT JOIN cliente
							ON cliente.clienteid = encomenda.clienteid
							WHERE encomenda.encomendaid = ?");
    $stmt->execute(array($id));
    return $stmt->fetchAll();
}

function getOrderFactAddData($id)
{
	global $conn;
    $stmt = $conn->prepare("SELECT morada.rua, codigopostal.*, localidade.nome as nome_localidade, pais.nome as nome_pais
							FROM encomenda
							LEFT JOIN moradafaturacao
							ON moradafaturacao.moradaid = encomenda.moradafaturacaoid
							LEFT JOIN morada
							ON morada.moradaid = moradafaturacao.moradaid
							LEFT JOIN codigopostal
							ON codigopostal.codigopostalid = morada.codigopostalid
							LEFT JOIN localidade
							ON localidade.localidadeid = codigopostal.localidadeid
							LEFT JOIN pais
							ON pais.paisid = localidade.paisid
							WHERE encomenda.encomendaid = ?");
    $stmt->execute(array($id));
    return $stmt->fetchAll();
}

function getOrderStatus($id){
	global $conn;
    $stmt = $conn->prepare("SELECT estado
							FROM encomenda
							WHERE encomendaid = ?");
    $stmt->execute(array($id));
    return $stmt->fetch();
}

function updateOrderStatus($id, $estado){
	global $conn;

	//check if id exists
	$stmt = $conn->prepare("SELECT *
							FROM encomenda
							WHERE encomendaid = ?");
    $stmt->execute(array($id));
    $result = $stmt->fetch();

    if(!$result){
      	die('Encomenda não existe');
    }
    else{
		$stmt = $conn->prepare("UPDATE encomenda
			                    SET estado = ?
			                    WHERE encomendaid = ?");
		$stmt->execute(array($estado, $id));
	}
}

function getOrdersSearch($nome_cliente, $email_cliente, $id_encomenda){
	global $conn;
	$stmt = $conn->prepare("SELECT encomenda.*, cliente.nome AS nome_cliente, cliente.email AS email_cliente, informacaofaturacao.*
                        	FROM encomenda
                        	INNER JOIN cliente
                        	ON cliente.clienteid = encomenda.clienteid
							INNER JOIN informacaofaturacao
							ON informacaofaturacao.informacaofaturacaoid = encomenda.informacaofaturacaoid
            				WHERE encomenda.encomendaid = ? OR cliente.nome like '%'||?||'%' OR cliente.email = ?
            				ORDER BY encomenda.encomendaid");
    $stmt->execute(array($id_encomenda, $nome_cliente, $email_cliente));
    return $stmt->fetchAll();
}

function getOrdersByStatus($estadoencomenda){
	global $conn;
	$stmt = $conn->prepare("SELECT encomenda.*, cliente.nome as nome_cliente, cliente.email as email_cliente, informacaofaturacao.*
                        	FROM encomenda
                        	JOIN cliente
                        	ON cliente.clienteid = encomenda.clienteid
                        	JOIN informacaofaturacao
                        	ON informacaofaturacao.informacaofaturacaoid = encomenda.informacaofaturacaoid
							WHERE encomenda.estado = ?
							ORDER BY encomenda.encomendaid");
    $stmt->execute(array($estadoencomenda));
    return $stmt->fetchAll();
}

?>