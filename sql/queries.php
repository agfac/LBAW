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


//SELECT04 - Pesquisa das publicações por sub-categoria
//Pode nao estar certo xD
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


//SELECT06 - Pesquisa da publicação por palavra chave na descrição


//SELECT07 - Pesquisa das publicações por stock


//SELECT08 - Pesquisa das publicações compradas por cliente


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
