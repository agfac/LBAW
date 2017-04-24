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

?>