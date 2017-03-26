//UPDATE01 - Modifica a quantidade de publicações no carrinho do cliente


//UPDATE02 - Modifica o stock da publicação
UPDATE publicacao
SET stock = novoStock
WHERE nome = nomePublicacao;

//UPDATE03 - Modifica o preço da publicação
UPDATE publicacao
SET preco = novoPreco
WHERE nome = nomePublicacao;

//UPDATE04 - Modifica dados do cliente
UPDATE cliente
SET nome = novoNome, telefone = novoTelefone, email = novoEmail
WHERE nome = nomePublicacao;

//UPDATE05 - Remove uma publicação na whislist


//UPDATE06 - Modifica estado da encomenda de em processamento para enviado
UPDATE encomenda
SET estado = "enviado"
WHERE encomendaid = encomendaid;