<?php

//SELECT01 - Pesquisa da publicação por título
function retornaPublicacaoPorTitulo($titulo)
{
    global $db;
    $stmt = $db->prepare('SELECT * FROM publicacao WHERE titulo = :titulo');
    $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch();
}

//SELECT02 - Pesquisa do cliente por username
function retornaClientePorUsername($username)
{
    global $db;
    $stmt = $db->prepare('SELECT * FROM cliente WHERE username = :username');
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch();
}

//SELECT03 - Pesquisa das publicações por categoria
function listarPublicacoesPorCategoria($nomeCategoria)
{
    global $db;
    $stmt = $db->prepare('SELECT * FROM publicacao
      LEFT JOIN subcategoria ON publicacao.subcategoriaid = subcategoria.subcategoriaid
      LEFT JOIN categoria ON subcategoria.categoriaid = categoria.categoriaid
      WHERE categoria.nome = :nomeCategoria');
    $stmt->bindParam(':nomeCategoria', $nomeCategoria, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
}

//SELECT04 - Pesquisa das publicações por sub-categoria
function listarPublicacoesPorSubCategoria($nomeSubCategoria)
{
    global $db;
    $stmt = $db->prepare('SELECT * FROM publicacao
      LEFT JOIN subcategoria ON publicacao.subcategoriaid = subcategoria.subcategoriaid
      WHERE subcategoria.nome = :nomeSubCategoria');
    $stmt->bindParam(':nomeSubCategoria', $nomeSubCategoria, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
}

//SELECT05 - Pesquisa das publicações por autor
function listarPublicacoesPorAutor($nomeAutor)
{
    global $db;
    $stmt = $db->prepare('SELECT * FROM publicacao
      LEFT JOIN autorpublicacao ON autorpublicacao.publicacaoid = publicacao.publicacaoid
      LEFT JOIN autor ON autorpublicacao.autorid = autor.autorid
      WHERE autor.nome = :nomeAutor');
    $stmt->bindParam(':nomeAutor', $nomeAutor, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
}

//SELECT06 - Pesquisa da publicação por palavra chave na descrição
function retornaPublicacaoPorDescricao($key)
{
    global $db;
    $stmt = $db->prepare('SELECT * FROM publicacao WHERE descricao LIKE :key');
    $stmt->bindParam(':key', $key, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch();
}

//SELECT07 - Pesquisa das publicações por stock
function listarPublicacoesPorStock($nrStock)
{
    global $db;
    $stmt = $db->prepare('SELECT * FROM publicacao WHERE stock = :nrStock');
    $stmt->bindParam(':nrStock', $nrStock, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
}

//SELECT08 - Pesquisa das publicações compradas por cliente
function listarPublicacoesPorCliente($nomeCliente)
{
    global $db;
    $stmt = $db->prepare('SELECT * FROM publicacao
      LEFT JOIN publicacaoencomenda ON publicacaoencomenda.publicacaoid = publicacao.publicacaoid
      LEFT JOIN encomenda ON publicacaoencomenda.encomendaid = encomenda.encomendaid
      LEFT JOIN cliente ON encomenda.clienteid = cliente.clienteid
      WHERE cliente.nome = :nomeCliente');
    $stmt->bindParam(':nomeCliente', $nomeCliente, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
}

//SELECT09 - Pesquisa das publicações mais compradas


//SELECT10 - Pesquisa do funcionário por username
function retornaFuncionarPorUsername($username)
{
    global $db;
    $stmt = $db->prepare('SELECT * FROM funcionario WHERE username = :username');
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch();
}

//SELECT11 - Pesquisa do administrador por username
function retornaAdministradorPorUsername($username)
{
    global $db;
    $stmt = $db->prepare('SELECT * FROM administrador WHERE username = :username');
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch();
}

//SELECT12 - Pesquisa de encomendas em processamento
function listaEncomendasEmProcessamento()
{
    global $db;
    $stmt = $db->prepare('SELECT * FROM encomenda WHERE estado = "em processamento"');
    $stmt->execute();
    return $stmt->fetch();
}

//SELECT13 - Pesquisa dos últimos 10 clientes que efetuaram login


//UPDATE01 - Modifica a quantidade de publicações no carrinho do cliente


//UPDATE02 - Modifica o stock da publicação


//UPDATE03 - Modifica o preço da publicação


//UPDATE04 - Modifica dados do cliente


//UPDATE05 - Remove uma publicação na whislist


//UPDATE06 - Modifica estado da encomenda de em processamento para enviado
