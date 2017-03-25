/* Drop Tables */

DROP TABLE IF EXISTS Administrador CASCADE
;

DROP TABLE IF EXISTS Autor CASCADE
;

DROP TABLE IF EXISTS AutorPublicacao CASCADE
;

DROP TABLE IF EXISTS Carrinho CASCADE
;

DROP TABLE IF EXISTS Cartaocredito CASCADE
;

DROP TABLE IF EXISTS Cartaocreditocliente CASCADE
;

DROP TABLE IF EXISTS Categoria CASCADE
;

DROP TABLE IF EXISTS Cliente CASCADE
;

DROP TABLE IF EXISTS Codigopostal CASCADE
;

DROP TABLE IF EXISTS Comentario CASCADE
;

DROP TABLE IF EXISTS Editora CASCADE
;

DROP TABLE IF EXISTS Encomenda CASCADE
;

DROP TABLE IF EXISTS Funcionario CASCADE
;

DROP TABLE IF EXISTS Imagem CASCADE
;

DROP TABLE IF EXISTS Informacaofaturacao CASCADE
;

DROP TABLE IF EXISTS Localidade CASCADE
;

DROP TABLE IF EXISTS Login CASCADE
;

DROP TABLE IF EXISTS Metodopagamento CASCADE
;

DROP TABLE IF EXISTS Morada CASCADE
;

DROP TABLE IF EXISTS MoradaEnvio CASCADE
;

DROP TABLE IF EXISTS MoradaFaturacao CASCADE
;

DROP TABLE IF EXISTS Multibanco CASCADE
;

DROP TABLE IF EXISTS Pais CASCADE
;

DROP TABLE IF EXISTS Perguntautilizador CASCADE
;

DROP TABLE IF EXISTS Pesquisa CASCADE
;

DROP TABLE IF EXISTS Publicacao CASCADE
;

DROP TABLE IF EXISTS Publicacaocarrinho CASCADE
;

DROP TABLE IF EXISTS Publicacaoencomenda CASCADE
;

DROP TABLE IF EXISTS PublicacaoWishList CASCADE
;

DROP TABLE IF EXISTS Subcategoria CASCADE
;

DROP TABLE IF EXISTS Wishlist CASCADE
;

/* Drop Types */

DROP TYPE IF EXISTS Genero CASCADE
;

DROP TYPE IF EXISTS Tipocartao CASCADE
;

DROP TYPE IF EXISTS Estadoencomenda CASCADE
;

DROP TYPE IF EXISTS Periodicidade CASCADE
;

/* Create Types */

CREATE TYPE Genero AS ENUM
(
	'Masculino',
	'Feminino'
)
;

CREATE TYPE Tipocartao AS ENUM
(
	'AmericanExpress',
	'MasterCard',
	'Visa'
)
;

CREATE TYPE Estadoencomenda AS ENUM
(
	'Cancelada',
	'Enviada',
	'Em processamento',
	'Devolvida',
	'Processada'
)
;

CREATE TYPE Periodicidade AS ENUM
(
	'Diario',
	'Semanal',
	'Mensal',
	'Anual'
)
;

/* Create Tables */

CREATE TABLE Administrador
(
	AdministradorID SERIAL,
	PaisID integer NOT NULL,
	Nome varchar(100) NOT NULL,
	Genero varchar(50) NOT NULL,
	Datanascimento date NOT NULL,
	Datacessacao date NULL,
	Username varchar(50) NOT NULL,
	Password varchar(50) NOT NULL,
	Ativo boolean NOT NULL,
	CONSTRAINT PK_Administrador PRIMARY KEY (AdministradorID),
	CONSTRAINT administrador_username_key UNIQUE (Username),
	CONSTRAINT administrador_password_length CHECK (length(Password) > 6)
)
;

CREATE TABLE Autor
(
	AutorID SERIAL,
	PaisID integer NOT NULL,
	Nome varchar(100) NOT NULL,
	Genero varchar(50) NOT NULL,
	Datanascimento date NOT NULL,
	Biografia text NULL,
	CONSTRAINT PK_Autor PRIMARY KEY (AutorID)
)
;

CREATE TABLE AutorPublicacao
(
	PublicacaoID integer NOT NULL,
	AutorID integer NOT NULL,
	CONSTRAINT PK_AutorPublicacao PRIMARY KEY (PublicacaoID,AutorID)
)
;

CREATE TABLE Carrinho
(
	CarrinhoID SERIAL,
	Datacriacao timestamp NOT NULL,
	Subtotal real,
	CONSTRAINT PK_Carrinho PRIMARY KEY (CarrinhoID)
)
;

CREATE TABLE Cartaocredito
(
	CartaocreditoID SERIAL,
	Tipo TipoCartao NOT NULL,
	Numero varchar(50) NOT NULL,
	Validade varchar(50) NOT NULL,
	Cvv varchar(3) NOT NULL,
	CONSTRAINT PK_Cartaocredito PRIMARY KEY (CartaocreditoID)
)
;

CREATE TABLE Cartaocreditocliente
(
	CartaocreditoclienteID SERIAL,
	ClienteID integer NOT NULL,
	Tipo TipoCartao NOT NULL,
	Numero varchar(50) NOT NULL,
	Validade varchar(50) NOT NULL,
	Cvv integer NOT NULL,
	CONSTRAINT PK_Cartaocreditocliente PRIMARY KEY (CartaocreditoclienteID)
)
;

CREATE TABLE Categoria
(
	CategoriaID SERIAL,
	Nome varchar(50) NOT NULL,
	CONSTRAINT PK_Categoria PRIMARY KEY (CategoriaID),
	CONSTRAINT categoria_nome_key UNIQUE (Nome)
)
;

CREATE TABLE Cliente
(
	ClienteID SERIAL,
	PaisID Integer NULL,
	CarrinhoID integer NULL,
	Nome varchar(100) NOT NULL,
	Genero varchar(50) NOT NULL,
	Datanascimento date NOT NULL,
	Username varchar(50) NOT NULL,
	Password varchar(50) NOT NULL,
	Ativo boolean NOT NULL,
	Dataregisto timestamp NOT NULL,
	Datacancelamento timestamp NULL,
	Telefone varchar(50) NULL,
	Email varchar(50) NOT NULL,
	Nif varchar(50) NULL,
	Idade integer NOT NULL,
	CONSTRAINT PK_Cliente PRIMARY KEY (ClienteID),
	CONSTRAINT cliente_email_key UNIQUE (Email),
	CONSTRAINT cliente_nif_key UNIQUE (Nif),
	CONSTRAINT cliente_username_key UNIQUE (Username),
	CONSTRAINT CK_Cliente_dataCessacao CHECK (Datacancelamento > Dataregisto),
	CONSTRAINT cliente_password_length CHECK (length(Password) > 6)
)
;

CREATE TABLE Codigopostal
(
	CodigopostalID SERIAL,
	LocalidadeID integer NOT NULL,
	Cod1 varchar(4) NOT NULL,
	Cod2 varchar(3) NOT NULL,
	CONSTRAINT PK_Codigopostal PRIMARY KEY (CodigopostalID)
)
;

CREATE TABLE Comentario
(
	ComentarioID SERIAL,
	ClienteID integer NOT NULL,
	PublicacaoID integer NOT NULL,
	Data timestamp NOT NULL,
	Classificacao integer NOT NULL,
	Texto text NOT NULL,
	CONSTRAINT PK_Comentario PRIMARY KEY (ComentarioID),
	CONSTRAINT CK_Comentario_texto_comprimento CHECK (char_length(Texto) <= 300)
)
;

CREATE TABLE Editora
(
	EditoraID SERIAL,
	Nome varchar(50) NOT NULL,
	CONSTRAINT PK_Editora PRIMARY KEY (EditoraID)
)
;

CREATE TABLE Encomenda
(
	EncomendaID SERIAL,
	ClienteID integer NOT NULL,
	MoradaFaturacaoID integer NOT NULL,
	MoradaEnvioID integer NOT NULL,
	InformacaofaturacaoID integer NULL,
	Data timestamp NOT NULL,
	Estado EstadoEncomenda NOT NULL DEFAULT 'Em processamento',
	CONSTRAINT PK_Encomenda PRIMARY KEY (EncomendaID)
)
;

CREATE TABLE Funcionario
(
	FuncionarioID SERIAL,
	MoradaID integer NOT NULL,
	PaisID integer NOT NULL,
	Nome varchar(100) NOT NULL,
	Genero varchar(50) NOT NULL,
	Datanascimento date NOT NULL,
	Username varchar(50) NOT NULL,
	Password varchar(50) NOT NULL,
	Ativo boolean NOT NULL,
	Dataadmissao timestamp NOT NULL,
	Datacessacao timestamp NULL,
	Telefone varchar(50) NOT NULL,
	Email varchar(50) NOT NULL,
	Nif varchar(50) NOT NULL,
	Cartaocidadao varchar(50) NOT NULL,
	Idade integer NOT NULL,
	CONSTRAINT PK_Funcionario PRIMARY KEY (FuncionarioID),
	CONSTRAINT funcionario_email_key UNIQUE (Email),
	CONSTRAINT funcionario_cartaocidadao_key UNIQUE (Cartaocidadao),
	CONSTRAINT funcionario_nif_key UNIQUE (Nif),
	CONSTRAINT funcionario_username_key UNIQUE (Username),
	CONSTRAINT CK_Funcionario_dataCessacao CHECK (Datacessacao > Dataadmissao),
	CONSTRAINT funcionario_password_length CHECK (length(Password) > 6)
)
;

CREATE TABLE Imagem
(
	ImagemID SERIAL NOT NULL,
	PublicacaoID integer NOT NULL,
	Nome varchar(100) NOT NULL,
	Url varchar(300) NOT NULL,
	CONSTRAINT PK_Imagem PRIMARY KEY (ImagemID)
)
;

CREATE TABLE Informacaofaturacao
(
	InformacaofaturacaoID SERIAL,
	MetodopagamentoID integer NULL,
	Portes real NULL,
	Iva real NULL,
	Total real NULL,
	CONSTRAINT PK_Informacaofaturacao PRIMARY KEY (InformacaofaturacaoID)
)
;

CREATE TABLE Localidade
(
	LocalidadeID SERIAL,
	PaisID integer NOT NULL,
	Nome varchar(100) NOT NULL,
	CONSTRAINT PK_Localidade PRIMARY KEY (LocalidadeID)
)
;

CREATE TABLE Login
(
	LoginID SERIAL,
	AdministradorID integer NULL,
	FuncionarioID integer NULL,
	ClienteID integer NULL,
	Data timestamp NOT NULL,
	CONSTRAINT PK_Login PRIMARY KEY (LoginID)
)
;

CREATE TABLE Metodopagamento
(
	MetodopagamentoID SERIAL,
	Tipo varchar(50) NOT NULL,
	CONSTRAINT PK_Metodopagamento PRIMARY KEY (MetodopagamentoID),
	CONSTRAINT metodopagamento_tipo_key UNIQUE (Tipo)
)
;

CREATE TABLE Morada
(
	MoradaID SERIAL,
	CodigopostalID integer NOT NULL,
	Rua varchar(100) NOT NULL,
	CONSTRAINT PK_Morada PRIMARY KEY (MoradaID)
)
;

CREATE TABLE MoradaEnvio
(
	MoradaID integer NOT NULL,
	ClienteID integer NOT NULL,
	CONSTRAINT PK_MoradaEnvio PRIMARY KEY (MoradaID,ClienteID)
)
;

CREATE TABLE MoradaFaturacao
(
	ClienteID integer NOT NULL,
	MoradaID integer NOT NULL,
	CONSTRAINT PK_Morada_Faturacao PRIMARY KEY (MoradaID,ClienteID)
)
;

CREATE TABLE Multibanco
(
	MultibancoID SERIAL,
	Entidade varchar(50) NOT NULL,
	Referencia varchar(50) NOT NULL,
	CONSTRAINT PK_Multibanco PRIMARY KEY (MultibancoID)
)
;

CREATE TABLE Pais
(
	PaisID SERIAL,
	Nome varchar(100) NOT NULL,
	CONSTRAINT PK_Pais PRIMARY KEY (PaisID),
	CONSTRAINT pais_nome_key UNIQUE (Nome)
)
;

CREATE TABLE Perguntautilizador
(
	PerguntautilizadorID SERIAL,
	Data timestamp NOT NULL,
	Nome varchar(100) NOT NULL,
	Email varchar(50) NOT NULL,
	Mensagem text NOT NULL,
	CONSTRAINT PK_Perguntautilizador PRIMARY KEY (PerguntautilizadorID)
)
;

CREATE TABLE Pesquisa
(
	PesquisaID SERIAL,
	Data timestamp NOT NULL,
	Expressao varchar(100) NOT NULL,
	CONSTRAINT PK_Pesquisa PRIMARY KEY (PesquisaID)
)
;

CREATE TABLE Publicacao
(
	PublicacaoID SERIAL,
	EditoraID integer NOT NULL,
	SubcategoriaID integer NOT NULL,
	Titulo varchar(100) NOT NULL,
	Datapublicacao date NOT NULL,
	Codigobarras varchar(13) NOT NULL,
	Descricao text NULL,
	Paginas integer NULL,
	Peso real NOT NULL,
	Iva real NOT NULL,
	Preco real NOT NULL,
	Precopromocional real NULL,
	Novidade boolean NOT NULL,
	Stock integer NOT NULL,
	Edicao varchar(50) NULL,
	Periodicidade Periodicidade NULL,
	Isbn varchar(100) NULL,
	CONSTRAINT PK_Publicacao PRIMARY KEY (PublicacaoID),
	CONSTRAINT publicacao_codigobarras_key UNIQUE (Codigobarras),
	CONSTRAINT CK_Publicacao_precopromocional CHECK (Precopromocional <= Preco)
)
;

CREATE TABLE Publicacaocarrinho
(
	PublicacaoID integer NOT NULL,
	CarrinhoID integer NOT NULL,
	Quantidade integer NOT NULL,
	CONSTRAINT PK_Publicacaocarrinho PRIMARY KEY (PublicacaoID,CarrinhoID),
	CONSTRAINT CK_Publicacaocarrinho_quantidade CHECK (Quantidade >= 1)
)
;

CREATE TABLE Publicacaoencomenda
(
	PublicacaoID Integer NOT NULL,
	EncomendaID Integer NOT NULL,
	Preco real NOT NULL,
	Quantidade integer NOT NULL DEFAULT 1,
	CONSTRAINT PK_Publicacaoencomenda PRIMARY KEY (PublicacaoID,EncomendaID),
	CONSTRAINT CK_Publicacaoencomenda_preco CHECK (Preco >= 0),
	CONSTRAINT CK_Publicacaoencomenda_quantidade CHECK (Quantidade >= 1)
)
;

CREATE TABLE PublicacaoWishList
(
	WishlistID integer NOT NULL,
	PublicacaoID integer NOT NULL,
	CONSTRAINT PK_PublicacaoWishList PRIMARY KEY (WishlistID,PublicacaoID)
)
;

CREATE TABLE Subcategoria
(
	SubcategoriaID SERIAL,
	CategoriaID integer NOT NULL,
	Nome varchar(50) NOT NULL,
	CONSTRAINT PK_Subcategoria PRIMARY KEY (SubcategoriaID)
)
;

CREATE TABLE Wishlist
(
	WishlistID SERIAL,
	ClienteID integer NOT NULL,
	Nome varchar(50) NOT NULL,
	CONSTRAINT PK_Wishlist PRIMARY KEY (WishlistID)
)
;

/* Create Trigger Funtions */
CREATE OR REPLACE FUNCTION insert_publicacao() 
RETURNS TRIGGER 
AS $$
BEGIN
	NEW.iva := NEW.preco / 1.23;

	RETURN NEW;
END $$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION insert_cliente() 
RETURNS TRIGGER 
AS $$
BEGIN
	NEW.idade := date_part('year', age(NEW.Datanascimento));

	RETURN NEW;
END $$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION insert_funcionario() 
RETURNS TRIGGER 
AS $$
BEGIN
	NEW.idade := date_part('year', age(NEW.Datanascimento));

	RETURN NEW;
END $$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION insert_encomenda() 
RETURNS TRIGGER 
AS $$
BEGIN
	INSERT INTO Informacaofaturacao(InformacaofaturacaoID)
	VALUES(DEFAULT)
	RETURNING InformacaofaturacaoID
	INTO NEW.InformacaofaturacaoID;

	RETURN NEW;
END $$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION insert_publicacaoencomenda() 
RETURNS TRIGGER 
AS $$
BEGIN
	NEW.preco = (SELECT preco
				FROM Publicacao
				WHERE publicacaoID = NEW.publicacaoID);

	RETURN NEW;
END $$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION update_informacaoFaturacao() 
RETURNS TRIGGER 
AS $$
BEGIN
	UPDATE Informacaofaturacao
	SET total=(SELECT SUM(preco)
						FROM Publicacaoencomenda
						WHERE encomendaID = NEW.encomendaID)
	WHERE informacaoFaturacaoID = (SELECT InformacaofaturacaoID
									FROM Encomenda
									WHERE encomendaID = NEW.encomendaID);

	RETURN NULL;
END $$ LANGUAGE plpgsql;

/* Create Trigger */
CREATE TRIGGER insert_publicacao_trigger
BEFORE INSERT OR UPDATE ON Publicacao
FOR EACH ROW
	EXECUTE PROCEDURE insert_publicacao();

CREATE TRIGGER insert_cliente_trigger
BEFORE INSERT OR UPDATE ON Cliente
FOR EACH ROW
	EXECUTE PROCEDURE insert_cliente();

CREATE TRIGGER insert_funcionario_trigger
BEFORE INSERT OR UPDATE ON Funcionario
FOR EACH ROW
	EXECUTE PROCEDURE insert_funcionario();

CREATE TRIGGER insert_encomenda_trigger
BEFORE INSERT OR UPDATE ON Encomenda
FOR EACH ROW
	EXECUTE PROCEDURE insert_encomenda();

CREATE TRIGGER insert_publicacaoencomenda_trigger
BEFORE INSERT OR UPDATE ON Publicacaoencomenda
FOR EACH ROW
	EXECUTE PROCEDURE insert_publicacaoencomenda();

CREATE TRIGGER update_informacaoFaturacao_trigger
AFTER INSERT OR UPDATE ON Publicacaoencomenda
FOR EACH ROW
	EXECUTE PROCEDURE update_informacaoFaturacao();

/* Create Foreign Key Constraints */

ALTER TABLE Administrador ADD CONSTRAINT FK_Administrador_nacionalidade
	FOREIGN KEY (PaisID) REFERENCES Pais (PaisID)
;

ALTER TABLE Autor ADD CONSTRAINT FK_Autor_nacionalidade
	FOREIGN KEY (PaisID) REFERENCES Pais (PaisID)
;

ALTER TABLE AutorPublicacao ADD CONSTRAINT FK_escrito_por_Publicacao
	FOREIGN KEY (PublicacaoID) REFERENCES Publicacao (PublicacaoID)
;

ALTER TABLE AutorPublicacao ADD CONSTRAINT FK_escrito_por_Autor
	FOREIGN KEY (AutorID) REFERENCES Autor (AutorID)
;

ALTER TABLE Cartaocredito ADD CONSTRAINT FK_CartaoCredito_InformacaoFaturacao
	FOREIGN KEY (CartaocreditoID) REFERENCES Informacaofaturacao (InformacaofaturacaoID)
;

ALTER TABLE Cartaocreditocliente ADD CONSTRAINT FK_CartaoCreditoCliente_possui
	FOREIGN KEY (ClienteID) REFERENCES Cliente (ClienteID)
;

ALTER TABLE Cliente ADD CONSTRAINT FK_Cliente_Carrinho
	FOREIGN KEY (CarrinhoID) REFERENCES Carrinho (CarrinhoID)
;

ALTER TABLE Cliente ADD CONSTRAINT FK_Cliente_ncaionalidade
	FOREIGN KEY (PaisID) REFERENCES Pais (PaisID)
;

ALTER TABLE Codigopostal ADD CONSTRAINT FK_Codigopostal_Localidade
	FOREIGN KEY (LocalidadeID) REFERENCES Localidade (LocalidadeID)
;

ALTER TABLE Comentario ADD CONSTRAINT FK_Comentario_feito_por
	FOREIGN KEY (ClienteID) REFERENCES Cliente (ClienteID)
;

ALTER TABLE Comentario ADD CONSTRAINT FK_Comentario_relativo_a
	FOREIGN KEY (PublicacaoID) REFERENCES Publicacao (PublicacaoID)
;

ALTER TABLE Encomenda ADD CONSTRAINT FK_Encomenda_feita_por
	FOREIGN KEY (ClienteID) REFERENCES Cliente (ClienteID)
;

ALTER TABLE Encomenda ADD CONSTRAINT FK_Encomenda_morada_envio
	FOREIGN KEY (MoradaEnvioID) REFERENCES Morada (MoradaID)
;

ALTER TABLE Encomenda ADD CONSTRAINT FK_Encomenda_morada_faturacao
	FOREIGN KEY (MoradaFaturacaoID) REFERENCES Morada (MoradaID)
;

ALTER TABLE Encomenda ADD CONSTRAINT FK_Encomenda_referente_a
	FOREIGN KEY (InformacaofaturacaoID) REFERENCES Informacaofaturacao (InformacaofaturacaoID)
;

ALTER TABLE Funcionario ADD CONSTRAINT FK_Funcionario_nacionalidade
	FOREIGN KEY (PaisID) REFERENCES Pais (PaisID)
;

ALTER TABLE Funcionario ADD CONSTRAINT FK_Funcionario_morada_de
	FOREIGN KEY (MoradaID) REFERENCES Morada (MoradaID)
;

ALTER TABLE Imagem ADD CONSTRAINT FK_Imagem_ilustrada_por
	FOREIGN KEY (PublicacaoID) REFERENCES Publicacao (PublicacaoID)
;

ALTER TABLE Informacaofaturacao ADD CONSTRAINT FK_InformacaoFaturacao_associado_a
	FOREIGN KEY (MetodopagamentoID) REFERENCES Metodopagamento (MetodopagamentoID)
;

ALTER TABLE Localidade ADD CONSTRAINT FK_Localidade_pertence_a
	FOREIGN KEY (PaisID) REFERENCES Pais (PaisID)
;

ALTER TABLE Login ADD CONSTRAINT FK_Login_Administrador
	FOREIGN KEY (AdministradorID) REFERENCES Administrador (AdministradorID)
;

ALTER TABLE Login ADD CONSTRAINT FK_Login_Cliente
	FOREIGN KEY (ClienteID) REFERENCES Cliente (ClienteID)
;

ALTER TABLE Login ADD CONSTRAINT FK_Login_Funcionario
	FOREIGN KEY (FuncionarioID) REFERENCES Funcionario (FuncionarioID)
;

ALTER TABLE Morada ADD CONSTRAINT FK_Morada_pertence_a
	FOREIGN KEY (CodigopostalID) REFERENCES Codigopostal (CodigopostalID)
;

ALTER TABLE MoradaEnvio ADD CONSTRAINT FK_morada_envio_Morada
	FOREIGN KEY (MoradaID) REFERENCES Morada (MoradaID)
;

ALTER TABLE MoradaEnvio ADD CONSTRAINT FK_morada_envio_Cliente
	FOREIGN KEY (ClienteID) REFERENCES Cliente (ClienteID)
;

ALTER TABLE MoradaFaturacao ADD CONSTRAINT FK_morada_faturacao_Cliente
	FOREIGN KEY (ClienteID) REFERENCES Cliente (ClienteID)
;

ALTER TABLE MoradaFaturacao ADD CONSTRAINT FK_morada_faturacao_Morada
	FOREIGN KEY (MoradaID) REFERENCES Morada (MoradaID)
;

ALTER TABLE Multibanco ADD CONSTRAINT FK_Multibanco_InformacaoFaturacao
	FOREIGN KEY (MultibancoID) REFERENCES Informacaofaturacao (InformacaofaturacaoID)
;

ALTER TABLE Publicacao ADD CONSTRAINT FK_Publicacao_editado_por
	FOREIGN KEY (EditoraID) REFERENCES Editora (EditoraID)
;

ALTER TABLE Publicacao ADD CONSTRAINT FK_Publicacao_pertence_a
	FOREIGN KEY (SubcategoriaID) REFERENCES Subcategoria (SubcategoriaID)
;

ALTER TABLE Publicacaocarrinho ADD CONSTRAINT FK_PublicacaoCarrinho_Publicacao
	FOREIGN KEY (PublicacaoID) REFERENCES Publicacao (PublicacaoID)
;

ALTER TABLE Publicacaocarrinho ADD CONSTRAINT FK_PublicacaoCarrinho_Carrinho
	FOREIGN KEY (CarrinhoID) REFERENCES Carrinho (CarrinhoID)
;

ALTER TABLE Publicacaoencomenda ADD CONSTRAINT FK_PublicacaoEncomenda_Publicacao
	FOREIGN KEY (PublicacaoID) REFERENCES Publicacao (PublicacaoID)
;

ALTER TABLE Publicacaoencomenda ADD CONSTRAINT FK_PublicacaoEncomenda_Encomenda
	FOREIGN KEY (EncomendaID) REFERENCES Encomenda (EncomendaID)
;

ALTER TABLE PublicacaoWishList ADD CONSTRAINT FK_constituida_por_WishList
	FOREIGN KEY (WishlistID) REFERENCES Wishlist (WishlistID)
;

ALTER TABLE PublicacaoWishList ADD CONSTRAINT FK_constituda_por_Publicacao
	FOREIGN KEY (PublicacaoID) REFERENCES Publicacao (PublicacaoID)
;

ALTER TABLE Subcategoria ADD CONSTRAINT FK_Subcategoria_Categoria
	FOREIGN KEY (CategoriaID) REFERENCES Categoria (CategoriaID)
;

ALTER TABLE Wishlist ADD CONSTRAINT FK_WishList_possui
	FOREIGN KEY (ClienteID) REFERENCES Cliente (ClienteID)
;

/* Inserts */

/* ------------------------------------------------------ R10 Categoria ------------------------------------------------------ */
INSERT INTO Categoria (nome) VALUES ('Livros');
INSERT INTO Categoria (nome) VALUES ('Livros Escolares');
INSERT INTO Categoria (nome) VALUES ('Apoio Escolar');
INSERT INTO Categoria (nome) VALUES ('Revistas');
INSERT INTO Categoria (nome) VALUES ('Dicionarios e Enciclopedias');
INSERT INTO Categoria (nome) VALUES ('Guias Turisticos e Mapas');

/* ------------------------------------------------------ R9 SubCategoria ------------------------------------------------------ */
INSERT INTO SubCategoria (categoriaID,nome) VALUES (1,'Arte');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (1,'Banda Desenhada');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (1,'Ciencias Exatas e Naturais');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (1,'Ciencias Sociais e Humanas');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (1,'Desporto e Lazer');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (1,'Direito');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (1,'Engenharia');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (1,'Ensino e Educacao');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (1,'Gastronomia e Vinhos');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (1,'Gestao');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (1,'Historia');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (1,'Informatica');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (1,'Literatura');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (1,'Medicina');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (1,'Politica');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (1,'Religião e Moral');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (1,'Saude e Bem Estar');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (2,'1.º ano');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (2,'2.º ano');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (2,'3.º ano');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (2,'4.º ano');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (2,'5.º e 6.º ano');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (2,'7.º, 8.º e 9.º ciclo');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (2,'Ensino Secundario');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (3,'1.º ano');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (3,'2.º ano');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (3,'3.º ano');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (3,'4.º ano');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (3,'5.º e 6.º ano');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (3,'7.º, 8.º e 9.º ciclo');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (3,'Ensino Secundario');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (4,'Agricultura');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (4,'Arquitetura');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (4,'Arte');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (4,'Automobilismo');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (4,'Aviação');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (4,'Científicas');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (4,'Cinema');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (4,'Decoracao');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (4,'Desporto');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (4,'Direito');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (4,'Economia');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (4,'Fotografia');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (4,'Historia');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (4,'Humor');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (4,'Infantis');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (4,'Informatica');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (4,'Moda');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (4,'Musica');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (4,'Quebra-cabecas');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (4,'Turismo');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (5,'Portugues');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (5,'Ingles');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (5,'Frances');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (5,'Alemao');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (5,'Espanhol');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (6,'Africa');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (6,'America');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (6,'Asia');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (6,'Europa');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (4,'Social');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (4,'Culinaria');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (4,'Lazer');
INSERT INTO SubCategoria (categoriaID,nome) VALUES (4,'Regionais');

/* ------------------------------------------------------ R8 Editora ------------------------------------------------------ */
INSERT INTO Editora (nome) VALUES ('Coral Books');
INSERT INTO Editora (nome) VALUES ('Editorial Gustavo Gili');
INSERT INTO Editora (nome) VALUES ('G. Floy Studio');
INSERT INTO Editora (nome) VALUES ('Gradiva');
INSERT INTO Editora (nome) VALUES ('Marcador');
INSERT INTO Editora (nome) VALUES ('Pergaminho');
INSERT INTO Editora (nome) VALUES ('A Esfera dos Livros');
INSERT INTO Editora (nome) VALUES ('Jacarandá Editora');
INSERT INTO Editora (nome) VALUES ('Edições Afrontamento');
INSERT INTO Editora (nome) VALUES ('Porto Editora');
INSERT INTO Editora (nome) VALUES ('FCA');
INSERT INTO Editora (nome) VALUES ('Publindústria');
INSERT INTO Editora (nome) VALUES ('Vogais');
INSERT INTO Editora (nome) VALUES ('EuroImpala');
INSERT INTO Editora (nome) VALUES ('Editorial Presença');
INSERT INTO Editora (nome) VALUES ('Top Books');
INSERT INTO Editora (nome) VALUES ('Objectiva');
INSERT INTO Editora (nome) VALUES ('Editora Guerra & Paz');
INSERT INTO Editora (nome) VALUES ('Sextante Editora (chancela)');
INSERT INTO Editora (nome) VALUES ('Lidel');
INSERT INTO Editora (nome) VALUES ('Mc Graw-Hill');
INSERT INTO Editora (nome) VALUES ('Nascente');
INSERT INTO Editora (nome) VALUES ('Lucerna');
INSERT INTO Editora (nome) VALUES ('Centro de Cura');
INSERT INTO Editora (nome) VALUES ('Prime Books');
INSERT INTO Editora (nome) VALUES ('Edições Gailivro');
INSERT INTO Editora (nome) VALUES ('Livros Horizonte');
INSERT INTO Editora (nome) VALUES ('Editorial Caminho');
INSERT INTO Editora (nome) VALUES ('Editorial Minerva');
INSERT INTO Editora (nome) VALUES ('Ideias de Ler');
INSERT INTO Editora (nome) VALUES ('Areal Editores');
INSERT INTO Editora (nome) VALUES ('Cofina');
INSERT INTO Editora (nome) VALUES ('Impresa');
INSERT INTO Editora (nome) VALUES ('Lonely Planet Global Limited');
INSERT INTO Editora (nome) VALUES ('Oficina do Livro');

/* ------------------------------------------------------ R1 Publicação ------------------------------------------------------ */
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (1,1,'Arte Portuguesa no Século XX','01/01/2017','3230014481474','Bernardo Pinto de Almeida, aquele que muitos consideram o mais importante crítico de arte da actualidade, oferece-nos aqui uma larga visão panorâmica e solidamente fundamentada da recepção nacional aos movimentos artísticos do século XX e dos seus protagonistas. De agora em diante esta obra, ilustrada por centenas de imagens, muitas delas quase inéditas, será «a» História da Arte Portuguesa do Século XX, uma referência incontornável para artistas, coleccionadores, estudiosos e amantes de arte.',496,0.496,59.99,53.91,TRUE,3,'primeira',NULL,'9789898851086');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (2,1,'Guia Essencial Para o Estudante de Fotografia Profissional','01/01/2017','2192558647840','Capturar e compartilhar imagens fotográficas são práticas bastante comuns atualmente, que estão ao alcance de todos. No entanto, neste universo digital do século xxi, no qual milhões de pessoas se comunicam todos os dias por meio de fotografias, nem sempre é fácil saber quais conhecimentos um fotógrafo deve reunir para conseguir se distinguir dos demais como profissional.',192,0.192,21.20,19.08,TRUE,11,'primeira',NULL,'9788584520848');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (3,2,'SAGA','01/01/2017','5086812095806','Fantasia e ficção científica - e sexo, política, traição, morte, amor verdadeiro e reality shows - juntam-se como nunca antes neste épico subversivo e provocante do escritor Brian K. Vaughan e da artista Fiona Staples.',152,0.152,10.99,9.89,TRUE,10,'primeira',NULL,'9788416510290');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (3,2,'Velvet - Vol. 2','01/01/2017','4220053295829','Dos criadores de Capitão América: O Soldado de Inverno, uma das mais brilhantes séries de espionagem em banda desenhada.',128,0.128,9.99,8.99,TRUE,13,'segunda',NULL,'9788416510269');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (4,3,'Ciência Cosmológica','01/01/2016','2565704760882','Uma viagem até à moderna ciência do Universo. A ciência, como actividade humana socialmente relevante, é relativamente recente. Contudo, a cosmologia, como visão do Universo ligada a construções mágicas e religiosas, é bem mais antiga.',192,0.192,15.00,15.00,TRUE,12,'primeira',NULL,'9789896167165');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (5,3,'O Livro da Ciência','01/01/2017','3205973219926','MAIS UM LIVRO DA COLEÇÃO GRANDES IDEIAS Será que o Universo começou com um Big Bang? A luz é uma onda, uma partícula - ou ambas? Será que somos a causa do aquecimento global? É possível uma Teoria de Tudo?',352,0.352,24.50,22.05,TRUE,4,'primeira',NULL,'9789897542664');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (6,4,'Inteligência Multifocal','01/01/2017','5539924172326','Este livro pretende levar o leitor a caminhar para dentro de si mesmo e a expandir o mundo das ideias sobre a mente humana, a construção de pensamentos e a formação de pensadores.',360,0.360,16.60,14.94,TRUE,3,'primeira',NULL,'9789896874056');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (7,4,'Amor Zero','01/01/2017','1638761835655','Os psicopatas não têm de ser assassinos, mas estão entre nós e podem matar a nossa autoestima. Conheça os sinais de alerta para não cair no poço sem fundo do amor zero. O amor transforma-se num inferno quando o homem ou a mulher por quem nos apaixonámos deixa cair a máscara e revela-se um psicopata - com zero remorsos, zero empatia, zero compaixão, zero lealdade.',256,0.256,17.90,16.11,TRUE,8,'primeira',NULL,'9789896268060');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (8,5,'Labirintos Quase Impossíveis','01/01/2017','6444561682733','Elaborado pelo aclamado autor bestseller Gareth Moore, este livro reúne 30 complexos e desafiantes labirintos para resolver. Tem tanto de divertido como de diabólico, mas para os apaixonados por quebra-cabeças, nada lhes trará mais satisfação do que completar os desafios propostos.',84,0.084,11.90,10.71,TRUE,13,'primeira',NULL,'9789898857064');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (9,5,'Estética e Desporto','01/01/2017','2586530428762','Lembro-me de quando a rivalidade entre Roger Federer e Rafael Nadal estava no auge ter utilizado uma hipérbole para sublinhar as diferenças essenciais nos duelos entre ambos - o Homem do Renascimento contra o Cro-Magnon.',256,0.256,12.00,10.80,TRUE,3,'primeira',NULL,'9789723615388');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (10,6,'Condomínio','01/01/2017','8871263074269','A legislação relativa aos condomínios encontra-se vertida no Código Civil e em vários diplomas avulsos, razão pela qual nem sempre é simples dispor de todo o material de consulta prático e fidedigno nesta área.',192,0.192,12.90,11.61,TRUE,8,'decima',NULL,'978-972-0-02009-3');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (10,6,'Códigos Penal e Processo Penal','01/01/2017','3739359213965','É nosso objetivo oferecer aos profissionais do Direito uma seleção dos textos mais relevantes, devidamente consolidados e organizados, tendo em conta as últimas alterações legais.',840,0.840,22.00,19.80,TRUE,4,'oitava',NULL,'978-972-0-00048-4');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (11,7,'Programação de CNC para Torno e Fresadora','01/01/2016','2411708370019','Expõe os principais conceitos e a maquinação de peças em várias linguagens. Exercícios propostos e resolvidos para uma autoaprendizagem. Para profissionais, formação profissional e ensino superior.',368,0.368,26.65,23.99,TRUE,5,'primeira',NULL,'9789727228430');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (12,7,'Guia de Aplicações de Gestão de Energia e Eficiência Energética','01/01/2016','8478814991251','A energia é um bem que deve ser optimizado a um custo cada vez mais relevante. É importante maximizar a sua produção eficiente e racionalizar o seu consumo.',527,0.527,33.00,33.00,TRUE,11,'terceira',NULL,'9789897231544');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (13,8,'Adolescência, os Anos da Mudança','01/01/2016','6323951187888','Viver com um adolescente é um dos maiores desafios para qualquer pai. É estimulante mas também pode ser assustador! Este é o guia ideal para si e para os seus filhos.',352,0.352,16.99,15.29,TRUE,12,'primeira',NULL,'9789898843630');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (7,8,'Os Nossos Adolescentes e a Droga','01/01/2016','6740535325490','Num registo a que já nos habituou, Mário Cordeiro fala de um tema sensível, mas o qual é urgente discutir: os adolescentes e a droga.',344,0.344,19.90,17.91,TRUE,3,'primeira',NULL,'9789896267834');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (14,9,'As Receitas da Minha Querida Mãe','01/01/2017','7079696892385','As Receitas da Minha Querida Mãe é uma obra onde são reveladas as preferências gastronómicas destas madeirenses muito acarinhadas pelos seguidores.',120,0.120,18.00,16.20,TRUE,5,'primeira',NULL,'9789892404844');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (14,9,'Deixei de Comer Carne. E Agora?','01/01/2017','6735213228700','Tomou a decisão de deixar comer carne e depois de olhar para os produtos, denominados vegetarianos, fica sem saber o que fazer? É mais fácil do que imagina!',128,0.128,16.00,14.40,TRUE,13,'primeira',NULL,'9789892404851');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (15,10,'Tenha Um Bom Dia!','01/01/2017','6422249201404','Caroline Webb, economista e antiga partner da consultora McKinsey, mostra aos leitores as mais recentes descobertas no campo da economia comportamental, da psicologia e da neurociência que poderão alterar a sua vida.',392,0.392,18.95,17.06,TRUE,4,'primeira',NULL,'9789722358989');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (16,10,'Atitude UAUme!','01/01/2017','9515343926026','O sucesso internacional deste top seller resulta da Atitude UAUme! ser um conceito inovador que explora que todos temos de impactar os outros positivamente através da SURPRESA!',304,0.304,15.99,14.39,TRUE,14,'primeira',NULL,'9789897060526');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (17,11,'Os Últimos Dias de Estaline','01/01/2017','6562631901643','Em 2017 celebram-se os 100 anos da Revolução Russa O colapso repentino de Estaline, que o leva à morte, em Março de 1953, foi tão dramático e misterioso como a sua vida.',336,0.336,24.90,22.41,TRUE,6,'primeira',NULL,'9789896651770');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (18,11,'Grandes Discursos da História','01/01/2017','8381412076092','Foram as palavras que Péricles gritou aos cidadãos de Atenas que fundaram a democracia? Foi o «Ich bin ein Berliner», essa emotiva frase de John Kennedy, que deu à parte livre de Berlim a força de resistir?',208,0.208,16.00,14.40,TRUE,5,'primeira',NULL,'9789897022630');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (11,12,'Desenvolvimento em Swift para iOS','01/01/2017','8203137094131','A linguagem Swift é uma linguagem open source com um elevado crescimento e que permite desenvolver aplicações em diversos contextos, nomeadamente aplicações iOS, watchOS, tvOS e OS X.',256,0.256,24.95,22.46,TRUE,14,'primeira',NULL,'9789727228591');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (11,12,'Android','01/01/2017','3237163641803','As necessidades diárias dos consumidores continuam fortemente ligadas aos dispositivos móveis, que se tornaram objetos essenciais na vida de qualquer um. Para responder a estas exigências do dia a dia, o desenvolvimento de aplicações para dispositivos Android continua a apresentar um forte crescimento.',192,0.192,19.95,17.96,TRUE,12,'primeira',NULL,'9789727228621');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (10,13,'O feitiço de Marraquexe','01/01/2017','5224243915040','No coração da histórica Medina de Marraquexe, entre os animados souks e bazares, encontra-se um grupo de europeus, desfrutando a tranquilidade de um riad.',416,0.416,17.70,15.93,TRUE,6,'primeira',NULL,'978-972-0-04803-5');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (19,13,'Para onde vão os gatos quando morrem?','01/01/2017','6972274592095','O regresso a Ataúro, terra da infância, «terra do nunca», é o início desta nova viagem ao revés, de Luís Cardoso, um romance veloz, poético e emotivo, que percorre a infância e a idade de formação do narrador, a diáspora, as lutas, as desilusões, as traições, as perdas, o regresso, cruzando-o com uma plêiade de personagens extraordinárias. Uma viagem que, naturalmente, corre ao lado da história de Timor Leste, com a fantasia e a ironia que marcam desde sempre a voz do autor e nos fazem suspirar por essas terras misteriosas e de aterradora beleza.',272,0.272,16.60,14.94,TRUE,3,'primeira',NULL,'978-989-676-190-5');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (20,14,'Protocolos de Medicina Materno-Fetal','01/01/2014','1457957759311','Nesta 3.ª edição dos Protocolos de Medicina Materno-Fetal foi feita uma cuidada revisão e atualização dos protocolos anteriormente publicados e incluídos 16 novos, respondendo aos desafios impostos pela evidência científica mais recente. Esta obra é fruto do trabalho de uma equipa de profissionais que incorpora o desejo de se manter viva a chama da vocação, a responsabilidade de dignificar a classe médica e de prestar serviço à comunidade.',296,0.296,24.95,24.95,TRUE,15,'terceira',NULL,'9789897520358');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (21,14,'Anatomia e Fisiologia de Seeley','01/01/2016','7037499773863','Anatomia e Fisiologia de Seeley acompanha a tendência atual do ensino integrado das ciências básicas da saúde, facilitando a aprendizagem e proporcionando uma visão multidisciplinar dos conteúdos apresentados.',1264,1.264,104.94,104.94,TRUE,6,'decima',NULL,'9788580555882');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (10,15,'Jorge Sampaio - Uma Biografia - 2.º volume','01/01/2017','5791462972012','Este segundo volume da biografia de Jorge Sampaio ocupa-se dos seus 16 anos como Presidente: na II Câmara Municipal de Lisboa e no Palácio de Belém.',1064,1.064,24.90,22.41,TRUE,11,'segunda',NULL,'978-972-0-04984-1');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (10,15,'Quinta-feira','01/01/2017','6142874300338','Tendo mantido até agora reservada parte importante da minha ação como Presidente da República, convicto de que essa era a melhor forma de defender o superior interesse nacional - e nunca tendo ocorrido fugas de informação para a comunicação social sobre o que se passou nos meus encontros com o Primeiro-Ministro e outros membros do Governo -, entendo que é altura de completar a prestação de contas aos Portugueses dando público testemunho de componentes relevantes da minha magistratura que são, em larga medida, desconhecidos dos cidadãos.',592,0.592,18.80,16.92,TRUE,10,'primeira',NULL,'978-972-0-04942-1');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (22,16,'O Amor É Contagioso','01/01/2016','1538275989525','O Amor É Contagioso é um convite a uma meditação profunda sobre os temas mais prementes da sociedade atual.',224,0.224,14.99,13.49,TRUE,8,'primeira',NULL,'9789898849434');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (23,16,'Deus ou Nada','01/01/2016','2951563092148','Nesta fascinante entrevista autobiográfica, Robert Sarah, um dos mais desassombrados cardeais da Igreja Católica, dá um testemunho ímpar da sua fé e comenta muitos dos acontecimentos, desafios e controvérsias das últimas décadas.',344,0.344,22.95,20.66,TRUE,15,'primeira',NULL,'9789898809261');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (24,17,'Manual de Tratamento - 250 Doenças','01/01/2016','8754155616174','Nascemos para sermos felizes, para termos conhecimento do nosso próprio corpo e estarmos saudáveis.',342,0.342,17.95,16.16,TRUE,7,'primeira',NULL,'9789899956926');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (25,17,'Chegar Novo a Velho - Receitas','01/01/2017','1990865252372','Depois do enorme sucesso do livro CHEGAR NOVO A VELHO, Manuel Pinto Coelho, o maior especialista português em anti-aging, apresenta um livro de receitas que seguem os princípios básicos que defende: uma alimentação promotora de hormonas, alcalina e paleolítica',176,0.176,17.50,15.75,TRUE,9,'primeira',NULL,'9789896553050');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (10,18,'Gosto de Matemática 1','01/01/2015','5320882212185','Gosto de Matemática é uma coleção especialmente criada para os alunos do 1.° ciclo do ensino básico praticarem o novo Programa de Matemática, alcançando as Metas Curriculares.',532,0.532,9.90,9.90,TRUE,8,'primeira',NULL,'978-972-0-14139-2');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (10,18,'Alfa - Adição e Subtração - 6-8 anos','01/01/2016','8004153322242','Este bloco contém exercícios para praticar a adição e a subtração que permitem: reforçar a compreensão das operações;treinar o cálculo mental;explicar e exercitar os respetivos algoritmos.',263,0.263,5.50,5.50,TRUE,15,'primeira',NULL,'978-972-0-10947-7');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (26,19,'Preparo-me para as Provas de Aferição - 2º Ano 2016/2017','01/01/2016','9778948328070','NA',52,0.052,7.50,6.75,TRUE,11,'primeira',NULL,'9789893201640');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (10,19,'Casos de Leitura - 1.º Ciclo','01/01/2017','7386725266511','Casos de Leitura é um caderno de apoio à aprendizagem da leitura e escrita, elaborado de acordo com as orientações programáticas em vigor para o 1.° Ciclo.',80,0.08,7.70,6.93,TRUE,3,'primeira',NULL,'978-972-0-17083-5');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (27,20,'Poemas da Mentira e da Verdade','01/01/2005','2651213145718','Livro recomendado para o 3º ano de escolaridade, destinado a leitura orientada.',34,0.034,9.51,9.51,TRUE,6,'primeira',NULL,'9789722410700');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (10,20,'A Gramática - Português - 1.º ciclo','01/01/2016','0982249097803','Esta é a gramática de referência para o 1.° Ciclo!',160,0.160,11.90,10.71,TRUE,4,'primeira',NULL,'978-972-0-11024-4');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (28,21,'O Beijo da Palavrinha','01/01/2008','2376391506248','Livro recomendado para o 4º ano de escolaridade, destinado a leitura autónoma.',32,0.032,12.90,12.90,TRUE,14,'primeira',NULL,'9789722120159');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (29,21,'Histórias do Arco da Velha','01/01/1900','0326452518593','Livro recomendado para o 4º ano de escolaridade, destinado a leitura orientada.',174,0.174,6.50,6.50,TRUE,5,'primeira',NULL,'9780009685507');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (28,22,'Chocolate à Chuva','15/07/2015','2676749386384','Livro recomendado para o 6º ano de escolaridade, destinado a leitura orientada.',192,0.192,11.00,11.00,TRUE,9,'primeira',NULL,'9789722100373');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (10,22,'Ulisses','01/01/2017','4406704142865','Livro recomendado para o 6º ano de escolaridade, destinado a leitura orientada.',80,0.080,11.90,10.71,TRUE,15,'primeira',NULL,'978-972-0-72657-5');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (10,23,'Gramática de Português - 3.º Ciclo','01/01/2017','8044997343834','Elaborada de raiz de acordo com o Programa e Metas Curriculares de Português do 3.° Ciclo, esta gramática é um instrumento de trabalho completo e de fácil consulta.',288,0.288,18.80,18.80,TRUE,13,'primeira',NULL,'978-972-0-30017-1');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (10,23,'Os Lusíadas','01/01/2015','3612976962916','A ação central da obra é a viagem de Vasco da Gama para a Índia. Dela se serve o poeta para nos oferecer a visão épica de toda a História de Portugal até à sua época, ora sendo ele o narrador, ora transferindo essa tarefa para figuras da viagem. Para outras figuras - as míticas - transfere os discursos que projetam a ação no futuro em forma profética.',288,0.288,6.60,6.60,TRUE,14,'primeira',NULL,'978-972-0-04956-8');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (10,24,'Preparação para o Exame Final Nacional 2017 - Português - 12.º Ano','01/01/2016','1520384702356','Este livro foi especialmente desenvolvido para os alunos dos 10.°, 11.° e 12.° anos que se encontram em fase de preparação para os Exames Finais Nacionais.',432,0.432,29.90,26.91,TRUE,3,'primeira',NULL,'978-972-0-00016-3');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (30,24,'Resumos - Memorial do Convento - José Saramago - Ensino Secundário','01/01/2017','6047312864156','Este estudo de Memorial do Convento pretende ajudar os alunos na sistematização dos aspetos temáticos e formais do romance saramaguiano, ao mesmo tempo que tenta promover um conhecimento mais alargado do universo de produção e divulgação da obra de José Saramago.',64,0.064,7.70,6.93,TRUE,11,'primeira',NULL,'978-972-0-40181-6');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (10,25,'Fichas de Ortografia - 1.º Ano','01/01/2016','2207726726159','As Fichas de Ortografia 1 são recomendadas para o 1.º ano do ensino básico e têm como principal objetivo auxiliar o aluno no estudo das regras da ortografia de forma autónoma, quer na sala de aula quer em casa.',96,0.096,7.70,6.93,TRUE,14,'primeira',NULL,'978-972-0-01810-6');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (10,25,'Troca-Tintas - 5-6 Anos','01/01/2017','7869210941541','A educadora da minha filha sugeriu este livro para desenvolver competências adequadas à idade da minha filha. O surpreendente neste livro é ter textos e actividades que se enquadram no Plano Nacional de Leitura que contribui para o enriquecimento do processo de aprendizagem e desenvolvimento global dos nossos filhos. Recomendo vivamente este livro, para a Educação Pré-Escolar.',79,0.079,9.90,8.91,TRUE,15,'primeira',NULL,'978-972-0-10929-3');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (10,26,'Apoio ao Estudo - 2.º Ano','01/01/2016','5574840389859','De acordo com o novo enquadramento legal relativo ao currículo do 1.° Ciclo do Ensino Básico, o Apoio ao Estudo é de frequência obrigatória e tem por objetivo apoiar os alunos na criação de métodos de estudo e de trabalho, visando prioritariamente o reforço do apoio nas disciplinas de Português e de Matemática.',64,0.064,8.80,7.92,TRUE,10,'primeira',NULL,'978-972-0-14104-0');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (10,26,'Ditados 1.º e 2.º anos','01/01/2015','7153658111035','Ditados - 1.° e 2.° anos tem como principal objetivo auxiliar o aluno a escrever corretamente e sem erros.',372,0.372,6.60,6.60,TRUE,9,'primeira',NULL,'978-972-0-14030-2');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (10,27,'A Matemática - 3.º e 4.º anos','01/01/2016','5480657290805','Um auxiliar essencial para o 1.º Ciclo do Ensino Básico!',160,0.160,12.20,10.98,TRUE,9,'primeira',NULL,'978-972-0-13710-4');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (10,27,'Fichas de Avaliação - 3.º Ano','01/01/2017','6526927280903','Português, Matemática e Estudo do Meio.',104,0.104,7.70,6.93,TRUE,5,'primeira',NULL,'978-972-0-14257-3');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (10,28,'Fichas de Avaliação - 4.º Ano','01/01/2016','8026294651660','Português, Matemática e Estudo do Meio;',120,0.120,7.70,7.70,TRUE,4,'primeira',NULL,'978-972-0-14258-0');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (10,28,'I Love English! - 9-10 anos - 4.º ano','01/01/2016','1216740100921','Aprender Inglês é cada vez mais fácil e divertido!',321,0.321,7.70,6.93,TRUE,13,'primeira',NULL,'978-972-0-18164-0');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (31,29,'Prova de Aferição 2017 - Matemática e Ciências Naturais - 5.º Ano','01/01/2017','8429137192716','Em 2017, vai realizar-se, pela primeira vez, a Prova de Aferição das disciplinas de Matemática e Ciências Naturais do 5.º ano. Esta publicação reúne seis propostas de provas de aferição e respetiva solução, permitindo a verificação dos conhecimentos adquiridos, bem como a superação de eventuais dificuldades, constituindo-se assim como um utensílio de estudo indispensável. Tudo o que o aluno necessita para estar 100% preparado para a Prova de Aferição.',800,0.080,7.70,6.93,TRUE,14,'primeira',NULL,'978-989-767-202-6');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (31,29,'Prova de Aferição 2017 - História e Geografia de Portugal - 5.º Ano','01/01/2016','7931073395202','Prova de Aferição 2017 - HGP, 5.º ano é um livro desenvolvido para auxiliar os alunos na preparação para a Prova de Aferição de História e Geografia de Portugal do 5.º ano.',80,0.080,7.70,6.93,TRUE,11,'primeira',NULL,'978-989-767-203-3');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (10,30,'Preparação para a Prova Final 2017 - Matemática - 9.º Ano','01/01/2017','1697934903978','Uma das características da disciplina de Matemática, que por vezes cria grandes dificuldades aos alunos, é a forma estruturada como ela se desenvolve, tornando a falta de bases uma das principais causas e consequências de insucesso.',320,0.320,14.90,13.41,TRUE,10,'primeira',NULL,'978-972-0-00017-0');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (10,30,'Preparação para a Prova Final 2017 - Português - 9.º Ano','01/01/2017','0401075184361','Este livro foi especialmente desenvolvido para os alunos do 9.° ano que se encontram em fase de preparação para as Provas Finais.',256,0.256,14.90,13.41,TRUE,8,'primeira',NULL,'978-972-0-00029-3');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (10,31,'Preparação para o Exame Final Nacional 2017 - Física e Química A - 11.º Ano','01/01/2017','5146013439357','Com o intuito de preparar o aluno para o Exame Final Nacional de Física e Química A - 11.° ano, este livro constitui um excelente instrumento de apoio no reforço, sistematização e síntese das aprendizagens fundamentais da disciplina.',448,0.448,29.90,26.91,TRUE,3,'primeira',NULL,'978-972-0-01995-0');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (10,31,'Preparação para o Exame Final Nacional 2017 - Biologia e Geologia - 11.º Ano','01/01/2017','8194233259422','Com o intuito de preparar o aluno para o Exame Final Nacional de Biologia e Geologia do 11.° ano, este livro constitui um excelente instrumento de apoio no reforço, sistematização e síntese das aprendizagens fundamentais da disciplina.',304,0.304,29.90,26.91,TRUE,9,'primeira',NULL,'978-972-0-46911-3');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (32,35,'Autosport','22/03/2017','0985961643675','Autosport',100,0.100,2.35,2.35,TRUE,7,NULL,'Semanal',NULL);
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (33,35,'Auto Foco','23/03/2017','0109287266508','Auto Foco',100,0.100,1.99,1.99,TRUE,14,NULL,'Semanal',NULL);
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (32,36,'Take Off','23/03/2017','7049071906079','Take Off',100,0.100,1.99,1.99,TRUE,12,NULL,'Semanal',NULL);
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (33,36,'Sirius Magazine','01/02/2017','7529012336482','Sirius Magazine',100,0.100,2.50,2.50,TRUE,4,NULL,'Mensal',NULL);
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (33,37,'Visao','23/03/2017','4292557109070','Visao',100,0.100,3.20,3.20,TRUE,5,NULL,'Semanal',NULL);
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (32,37,'Sabado','23/03/2017','9918695296190','Sabado',100,0.100,3.20,3.20,TRUE,7,NULL,'Semanal',NULL);
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (33,61,'Caras','25/03/2017','1419098322397','Caras',100,0.100,1.50,1.50,TRUE,10,NULL,'Semanal',NULL);
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (33,61,'VIP','21/03/2017','0657670274761','VIP',100,0.100,1.50,1.50,TRUE,7,NULL,'Semanal',NULL);
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (33,42,'Expresso Economia','23/03/2017','2440508820339','Expresso Economia',100,0.100,1.99,1.99,TRUE,13,NULL,'Semanal',NULL);
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (32,42,'Vida Economica','23/03/2017','5464618601219','Vida Economica',100,0.100,1.99,1.99,TRUE,13,NULL,'Semanal',NULL);
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (33,40,'Dragoes','23/03/2017','7927920175420','Dragoes',100,0.100,1.50,1.50,TRUE,10,NULL,'Semanal',NULL);
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (32,40,'Jornal Sporting','23/03/2017','3724918280352','Jornal Sporting',100,0.100,1.50,1.50,TRUE,12,NULL,'Semanal',NULL);
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (32,47,'Exame Informatica','23/03/2017','1506012351385','Exame Informatica',100,0.100,2.50,2.50,TRUE,15,NULL,'Semanal',NULL);
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (33,47,'PC Guia','23/03/2017','0534154813213','PC Guia',100,0.100,2.50,2.50,TRUE,3,NULL,'Semanal',NULL);
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (32,62,'Teleculinaria','23/03/2017','0707129484025','Teleculinaria',100,0.100,2.50,2.50,TRUE,14,NULL,'Mensal',NULL);
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (32,62,'Ementa da semana','23/03/2017','6954574725085','Ementa da semana',100,0.100,0.50,0.50,TRUE,13,NULL,'Semanal',NULL);
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (33,39,'Caras Decoracao','23/03/2017','3209378132684','Caras Decoracao',100,0.100,3.00,3.00,TRUE,9,NULL,'Mensal',NULL);
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (33,39,'Casa Claudia','23/03/2017','9740495212784','Casa Claudia',100,0.100,3.50,3.50,TRUE,7,NULL,'Mensal',NULL);
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (32,51,'Evasoes','23/03/2017','4920701920776','Evasoes',100,0.100,1.60,1.60,TRUE,15,NULL,'Semanal',NULL);
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (32,51,'Viajar','01/03/2017','6659026698925','Viajar',100,0.100,2.00,2.00,TRUE,4,NULL,'Semanal',NULL);
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (32,63,'Jornal das Letras','23/03/2017','5614434196754','Jornal das Letras',100,0.100,3.00,3.00,TRUE,11,NULL,'Semanal',NULL);
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (33,63,'Blitz','23/03/2017','7773017376326','Blitz',100,0.100,4.00,4.00,TRUE,15,NULL,'Mensal',NULL);
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (32,64,'Dica da semana','23/03/2017','6839724965936','Dica da semana',100,0.100,1.50,1.50,TRUE,7,NULL,'Semanal',NULL);
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (32,64,'Jornal de Barcelos','23/03/2017','7241848559321','Jornal de Barcelos',100,0.100,0.70,0.70,TRUE,9,NULL,'Semanal',NULL);
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (10,52,'Dicionário Básico Ilustrado da Língua Portuguesa','01/01/2016','2313908565730','Dicionário Básico Ilustrado da Língua Portuguesa.',512,0.512,9.99,9.99,TRUE,14,'primeira',NULL,'978-972-0-01993-6');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (10,53,'Dicionário Escolar de Inglês-Português / Português-Inglês','01/01/2016','7417447979942','Mais de 101 000 traduções e de 54 000 entradas, exemplos e expressões idiomáticas, incluindo os termos mais usuais do inglês americano e vocábulos brasileiros. Esta edição regista vocabulário corrente e atual, para além de várias palavras e sentidos novos das mais diversas áreas: biohazard, blogosphere, metrosexual, minicam, newbie na parte Inglês-Português e bloguista, linkar, login, porta-bebés, pró-ativo, resiliência na parte Português-Inglês.',765,0.765,9.90,8.91,TRUE,11,'primeira',NULL,'978-972-0-05422-7');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (10,54,'Dicionário Escolar de Francês-Português / Português-Francês','01/01/2016','5377031095792','Atualizada com o Acordo Ortográfico, esta edição regista as novas grafias, mantendo também as grafias anteriores na parte Português-Francês. Inclui igualmente um Guia do Acordo Ortográfico que expõe as principais alterações decorrentes da reforma ortográfica.',768,0.768,9.90,9.90,TRUE,7,'primeira',NULL,'978-972-0-01561-7');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (15,55,'Alemão em 30 Dias','01/01/2004','7335604547643','Alemão em 30 Dias é o segundo volume da colecção «Novos Manuais de Línguas». Um curso de línguas que certamente o ajudará a dar os primeiros passos na língua alemã.',324,0.324,12.50,12.50,TRUE,14,'primeira',NULL,'9789722332217');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (10,56,'Dicionário Moderno de Espanhol-Português / Português-Espanhol','01/01/2016','7775009678550','Um dicionário de língua espanhola, cujo texto em português se encontra adaptado ao Acordo Ortográfico de 1990. Para facilitar a pesquisa e a transição segura para a nova ortografia, na lista de entradas da parte Português-Espanhol foram registadas as duas grafias: as grafias anteriores à reforma ortográfica e as novas grafias introduzidas por ela.',1040,1.040,17.90,16.11,TRUE,7,'primeira',NULL,'978-972-0-05755-6');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (10,57,'Guias de Viagem 10 - Top 10 Marraquexe','01/01/2016','9257786970263','Este Guia de Viagem TOP 10 tem tudo o que não pode perder em Marraquexe, qualquer que seja o tipo de viagem que vai realizar. Aqui vai encontrar o que a cidade tem de melhor.',128,0.128,14.40,14.40,TRUE,9,'primeira',NULL,'978-972-0-31835-0');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (34,58,'Lonely Planet Costa Rica','01/01/2016','4042082573451','Lonely Planet Costa Rica is your passport to the most relevant, up-to-date advice on what to see and skip, and what hidden discoveries await you. Snorkel the teeming reefs off Manzanillo, explore some of the globes best wildlife-watching destinations, or dig into Costa Rican culture and cuisine in San Jose; all with your trusted travel companion.',544,0.544,20.98,20.98,TRUE,13,'primeira',NULL,'9781786571120');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (35,59,'Oriente Distante','01/01/2012','7961913135419','Viajante habitual, o autor percorre o trilho dos vestígios da cultura e presença portuguesa pelo Oriente. Neste livro, embaixador itinerante por Macau, Japão, Mongólia, Camboja, Xinjiang e Vietname onde Portugal permanece teimosamente presente - apesar da perda do protagonismo.',453,0.453,13.90,13.90,TRUE,15,'primeira',NULL,'9789895555505');
INSERT INTO Publicacao (editoraID,subcategoriaID,titulo,dataPublicacao,codigoBarras,descricao,paginas,peso,preco,precoPromocional,novidade,stock,edicao,periodicidade,ISBN) VALUES (10,60,'CITYPACK - Londres','01/01/2017','0063535683248','Descubra a cidade de Londres com a ajuda do guia CityPack',176,0.176,13.30,11.97,TRUE,7,'primeira',NULL,'978-972-0-00039-2');

/* ------------------------------------------------------ R2 Carrinho ------------------------------------------------------ */
INSERT INTO Carrinho (dataCriacao) VALUES ('11/12/2016 10:50:50');
INSERT INTO Carrinho (dataCriacao) VALUES ('09/03/2018 11:20:40');
INSERT INTO Carrinho (dataCriacao) VALUES ('05/09/2017 12:10:30');
INSERT INTO Carrinho (dataCriacao) VALUES ('14/01/2017 13:10:20');
INSERT INTO Carrinho (dataCriacao) VALUES ('31/03/2017 14:20:10');
INSERT INTO Carrinho (dataCriacao) VALUES ('17/09/2017 15:40:20');
INSERT INTO Carrinho (dataCriacao) VALUES ('23/05/2016 15:30:30');
INSERT INTO Carrinho (dataCriacao) VALUES ('27/08/2016 10:20:40');
INSERT INTO Carrinho (dataCriacao) VALUES ('05/05/2016 11:10:50');
INSERT INTO Carrinho (dataCriacao) VALUES ('17/08/2017 09:10:30');

/* ------------------------------------------------------ R3 PublicacaoCarrinho ------------------------------------------------------ */
INSERT INTO PublicacaoCarrinho (publicacaoID,carrinhoID,quantidade) VALUES (11,4,3);
INSERT INTO PublicacaoCarrinho (publicacaoID,carrinhoID,quantidade) VALUES (1,10,1);
INSERT INTO PublicacaoCarrinho (publicacaoID,carrinhoID,quantidade) VALUES (68,8,3);
INSERT INTO PublicacaoCarrinho (publicacaoID,carrinhoID,quantidade) VALUES (56,2,1);
INSERT INTO PublicacaoCarrinho (publicacaoID,carrinhoID,quantidade) VALUES (14,2,3);
INSERT INTO PublicacaoCarrinho (publicacaoID,carrinhoID,quantidade) VALUES (51,3,3);
INSERT INTO PublicacaoCarrinho (publicacaoID,carrinhoID,quantidade) VALUES (95,7,2);
INSERT INTO PublicacaoCarrinho (publicacaoID,carrinhoID,quantidade) VALUES (44,6,2);
INSERT INTO PublicacaoCarrinho (publicacaoID,carrinhoID,quantidade) VALUES (9,10,1);
INSERT INTO PublicacaoCarrinho (publicacaoID,carrinhoID,quantidade) VALUES (82,5,1);
INSERT INTO PublicacaoCarrinho (publicacaoID,carrinhoID,quantidade) VALUES (52,1,2);
INSERT INTO PublicacaoCarrinho (publicacaoID,carrinhoID,quantidade) VALUES (6,4,2);
INSERT INTO PublicacaoCarrinho (publicacaoID,carrinhoID,quantidade) VALUES (60,2,1);
INSERT INTO PublicacaoCarrinho (publicacaoID,carrinhoID,quantidade) VALUES (81,4,2);
INSERT INTO PublicacaoCarrinho (publicacaoID,carrinhoID,quantidade) VALUES (83,2,2);
INSERT INTO PublicacaoCarrinho (publicacaoID,carrinhoID,quantidade) VALUES (23,7,3);
INSERT INTO PublicacaoCarrinho (publicacaoID,carrinhoID,quantidade) VALUES (48,7,2);
INSERT INTO PublicacaoCarrinho (publicacaoID,carrinhoID,quantidade) VALUES (10,2,3);
INSERT INTO PublicacaoCarrinho (publicacaoID,carrinhoID,quantidade) VALUES (53,7,3);
INSERT INTO PublicacaoCarrinho (publicacaoID,carrinhoID,quantidade) VALUES (88,10,3);
INSERT INTO PublicacaoCarrinho (publicacaoID,carrinhoID,quantidade) VALUES (58,6,2);
INSERT INTO PublicacaoCarrinho (publicacaoID,carrinhoID,quantidade) VALUES (12,2,2);
INSERT INTO PublicacaoCarrinho (publicacaoID,carrinhoID,quantidade) VALUES (40,9,2);
INSERT INTO PublicacaoCarrinho (publicacaoID,carrinhoID,quantidade) VALUES (50,5,3);
INSERT INTO PublicacaoCarrinho (publicacaoID,carrinhoID,quantidade) VALUES (5,4,2);
INSERT INTO PublicacaoCarrinho (publicacaoID,carrinhoID,quantidade) VALUES (14,5,2);
INSERT INTO PublicacaoCarrinho (publicacaoID,carrinhoID,quantidade) VALUES (59,4,3);
INSERT INTO PublicacaoCarrinho (publicacaoID,carrinhoID,quantidade) VALUES (15,10,2);
INSERT INTO PublicacaoCarrinho (publicacaoID,carrinhoID,quantidade) VALUES (88,3,2);
INSERT INTO PublicacaoCarrinho (publicacaoID,carrinhoID,quantidade) VALUES (76,4,1);
INSERT INTO PublicacaoCarrinho (publicacaoID,carrinhoID,quantidade) VALUES (66,4,2);

/* ------------------------------------------------------ R20 Pais ------------------------------------------------------ */
INSERT INTO Pais (nome) VALUES ('Portugal');
INSERT INTO Pais (nome) VALUES ('Espanha');
INSERT INTO Pais (nome) VALUES ('Angola');
INSERT INTO Pais (nome) VALUES ('Argentina');
INSERT INTO Pais (nome) VALUES ('Mexico');
INSERT INTO Pais (nome) VALUES ('Brasil');
INSERT INTO Pais (nome) VALUES ('Cabo Verde');
INSERT INTO Pais (nome) VALUES ('Chile');
INSERT INTO Pais (nome) VALUES ('Dinamarca');
INSERT INTO Pais (nome) VALUES ('USA');
INSERT INTO Pais (nome) VALUES ('Reino Unido');
INSERT INTO Pais (nome) VALUES ('Irlanda');
INSERT INTO Pais (nome) VALUES ('Venezuela');
INSERT INTO Pais (nome) VALUES ('Peru');
INSERT INTO Pais (nome) VALUES ('Egito');
INSERT INTO Pais (nome) VALUES ('Hong Kong');
INSERT INTO Pais (nome) VALUES ('Timor-Leste');
INSERT INTO Pais (nome) VALUES ('Jamaica');

/* ------------------------------------------------------ R12 Cliente ------------------------------------------------------ */
INSERT INTO Cliente (paisID,carrinhoID,nome,genero,dataNascimento,userName,passWord,ativo,dataRegisto,telefone,email,nif) VALUES (1,1,'Joao Americo Pereira Ribeiro','Masculino','21/03/1993','joaoribeiro','QYU41RAX3FI',TRUE,'05/03/2013 11:54:40','934844763','joaoribeiro@gmail.com','044593724');
INSERT INTO Cliente (paisID,carrinhoID,nome,genero,dataNascimento,userName,passWord,ativo,dataRegisto,telefone,email,nif) VALUES (1,2,'Antonio Joaquim dos Santos Teixeira','Masculino','24/03/1995','antonioteixeira','BRD41MAM5ON',TRUE,'03/10/2015 13:34:40','966450982','antonioteixiera@gmail.com','283234271');
INSERT INTO Cliente (paisID,carrinhoID,nome,genero,dataNascimento,userName,passWord,ativo,dataRegisto,telefone,email,nif) VALUES (1,3,'Eduardo Paredes da Silva','Masculino','15/11/1988','eduardosilva','RQV35LJX2ML',TRUE,'12/10/2013 15:32:42','917716855','eduardoparedessilva@gmail.com','239054718');
INSERT INTO Cliente (paisID,carrinhoID,nome,genero,dataNascimento,userName,passWord,ativo,dataRegisto,telefone,email,nif) VALUES (1,4,'Alexandre Jose Ribeiro Gaspar','Masculino','15/03/1979','alexandregaspar','LSL47AZW9BX',TRUE,'09/11/2013 17:26:35','917176613','alexandrejosegaspar@gmail.com','405583318');
INSERT INTO Cliente (paisID,carrinhoID,nome,genero,dataNascimento,userName,passWord,ativo,dataRegisto,dataCancelamento,telefone,email,nif) VALUES (1,5,'Maria de Castro Meireles Guerra','Feminino','13/11/1980','mariaguerra','VEF30WBO4MB',FALSE,'01/08/2013 14:32:12','01/08/2016 22:12:43','968203005','mariameirelesguerra@hotmail.com','161643248');
INSERT INTO Cliente (paisID,carrinhoID,nome,genero,dataNascimento,userName,passWord,ativo,dataRegisto,telefone,email,nif) VALUES (1,6,'Luis Alberto Martins Guimaraes','Masculino','07/06/1996','luisguimaraes','GCV39KPT8BG',TRUE,'22/09/2014 15:29:18','964412884','luisalbertoguimaraes@gmail.com','156008522');
INSERT INTO Cliente (paisID,carrinhoID,nome,genero,dataNascimento,userName,passWord,ativo,dataRegisto,telefone,email,nif) VALUES (1,7,'Ricardo Martins Marques','Masculino','08/02/1971','ricardomarques','PGT76GUP3KT',TRUE,'07/10/2012 12:16:32','962680460','ricardomartinsmarques@gmail.com','551775972');
INSERT INTO Cliente (paisID,carrinhoID,nome,genero,dataNascimento,userName,passWord,ativo,dataRegisto,telefone,email,nif) VALUES (1,8,'Belmiro Jose Guimaraes Pinto','Masculino','11/07/1993','belmiropinto','UCQ67FXR1YJ',TRUE,'23/09/2017 09:36:35','914899512','belmirojoseguimaraespinto@hotmail.com','156795223');
INSERT INTO Cliente (paisID,carrinhoID,nome,genero,dataNascimento,userName,passWord,ativo,dataRegisto,telefone,email,nif) VALUES (1,9,'Ricardo Antonio Ramos Cruz','Masculino','12/08/1988','ricardocruz','FBT96EWW3LM',TRUE,'01/04/2015 11:02:34','934216494','ricardoantonioramoscruz@gmail.com','122897197');
INSERT INTO Cliente (paisID,carrinhoID,nome,genero,dataNascimento,userName,passWord,ativo,dataRegisto,telefone,email,nif) VALUES (1,10,'Daniel Rodrigues de Sousa Carmo','Masculino','01/10/1976','danielcarmo','MCL83NVJ2EH',TRUE,'30/07/2014 11:43:22','933835578','danielsousacarmo@hotmail.com','817189216');
INSERT INTO Cliente (paisID,carrinhoID,nome,genero,dataNascimento,userName,passWord,ativo,dataRegisto,telefone,email,nif) VALUES (1,1,'Henrique Jose Gouveia Pinto','Masculino','01/09/1981','henriquepinto,','QYZ07WLN7YC',TRUE,'21/04/2012 14:33:22','912356510','henriquegouveiapinto@gmail.com','220227873');
INSERT INTO Cliente (paisID,carrinhoID,nome,genero,dataNascimento,userName,passWord,ativo,dataRegisto,telefone,email,nif) VALUES (1,2,'Augusto Manuel Alves Pardal','Masculino','12/01/1979','augustopardal','YBS70AHE9VH',TRUE,'22/08/2015 10:07:12','967193101','augustomanuelpardal@gmail.com','184681792');
INSERT INTO Cliente (paisID,carrinhoID,nome,genero,dataNascimento,userName,passWord,ativo,dataRegisto,dataCancelamento,telefone,email,nif) VALUES (1,3,'Manuel da Costa Soares de Sampaio','Masculino','12/09/1976','manuelsampaio','ORU30BNL0JK',FALSE,'28/11/2016 11:12:40','10/03/2017 19:45:32','964749241','manuelsoaressampaio@gmail.com','995300138');
INSERT INTO Cliente (paisID,carrinhoID,nome,genero,dataNascimento,userName,passWord,ativo,dataRegisto,telefone,email,nif) VALUES (1,4,'Maria Adelaide Ribeiro','Feminino','12/06/1976','mariaribeiro','NGJ01GJR0YA',TRUE,'18/04/2014 09:08:33','918367885','mariaadelaideribeiro@gmail.com','828257176');
INSERT INTO Cliente (paisID,carrinhoID,nome,genero,dataNascimento,userName,passWord,ativo,dataRegisto,telefone,email,nif) VALUES (1,5,'Fernando Jose Costa Matos','Masculino','04/10/1988','fernandomatos','EEK74UJV6HC',TRUE,'09/05/2012 21:50:32','932641906','fernandojosecostamatos@gmail.com','337520918');
INSERT INTO Cliente (paisID,carrinhoID,nome,genero,dataNascimento,userName,passWord,ativo,dataRegisto,telefone,email,nif) VALUES (1,6,'Teresa Maria Ribeiro Gaspar','Feminino','11/12/1975','teresagaspar','HGY55RMA9YB',TRUE,'12/12/2013 08:32:21','938501001','teresamariagaspar@gmail.com','794359407');
INSERT INTO Cliente (paisID,carrinhoID,nome,genero,dataNascimento,userName,passWord,ativo,dataRegisto,telefone,email,nif) VALUES (1,7,'Teresa de Jesus Teixeira Ferreira','Feminino','02/11/1990','teresaferreira','YJP07DRL9MK',TRUE,'03/01/2013 12:43:21','926131659','teresajesusteixeira@hotmail.com','736225027');
INSERT INTO Cliente (paisID,carrinhoID,nome,genero,dataNascimento,userName,passWord,ativo,dataRegisto,telefone,email,nif) VALUES (1,8,'Jose Manuel Carvalho dos Santos','Masculino','09/07/1970','josesantos','BKF67NLO2SU',TRUE,'01/03/2014 15:50:32','965650958','josemanuelcarvalhodossantos@hotmail.com','833984062');
INSERT INTO Cliente (paisID,carrinhoID,nome,genero,dataNascimento,userName,passWord,ativo,dataRegisto,telefone,email,nif) VALUES (1,9,'Jorge Manuel Rodrigues Goncalves','Masculino','22/03/1986','jorgegoncalves','NWH27SAD6MP',TRUE,'02/10/2015 16:21:40','966172007','jorgemanuelrodriguesgoncalves@gmail.com','866169562');
INSERT INTO Cliente (paisID,carrinhoID,nome,genero,dataNascimento,userName,passWord,ativo,dataRegisto,telefone,email,nif) VALUES (1,10,'Helena Isabel Duarte Dias Ribeiro','Feminino','29/06/1973','helenaribeiro','NNS43YYQ8GT',TRUE,'01/03/2016 17:21:32','966229693','helenaisabelribeiro@hotmail.com','898351545');
INSERT INTO Cliente (paisID,carrinhoID,nome,genero,dataNascimento,userName,passWord,ativo,dataRegisto,telefone,email,nif) VALUES (1,1,'Armando Dina Mieiro','Masculino','06/09/1998','armandomieiro','HLL49KIO9FU',TRUE,'12/11/2012 18:21:34','917865498','armandomieiro@gmail.com','259873398');

/* ------------------------------------------------------ R4 WishList ------------------------------------------------------ */
INSERT INTO WishList (clienteID,nome) VALUES (15,'Informatica');
INSERT INTO WishList (clienteID,nome) VALUES (2,'Romance');
INSERT INTO WishList (clienteID,nome) VALUES (21,'Acao');
INSERT INTO WishList (clienteID,nome) VALUES (10,'Historia');
INSERT INTO WishList (clienteID,nome) VALUES (3,'Informatica');
INSERT INTO WishList (clienteID,nome) VALUES (6,'Informatica');
INSERT INTO WishList (clienteID,nome) VALUES (9,'Acao');
INSERT INTO WishList (clienteID,nome) VALUES (4,'Romance');
INSERT INTO WishList (clienteID,nome) VALUES (20,'Informatica');
INSERT INTO WishList (clienteID,nome) VALUES (18,'Arte');
INSERT INTO WishList (clienteID,nome) VALUES (1,'Arte');
INSERT INTO WishList (clienteID,nome) VALUES (7,'Acao');
INSERT INTO WishList (clienteID,nome) VALUES (20,'Historia');
INSERT INTO WishList (clienteID,nome) VALUES (15,'Acao');
INSERT INTO WishList (clienteID,nome) VALUES (10,'Informatica');
INSERT INTO WishList (clienteID,nome) VALUES (19,'Romance');
INSERT INTO WishList (clienteID,nome) VALUES (7,'Historia');
INSERT INTO WishList (clienteID,nome) VALUES (11,'Historia');
INSERT INTO WishList (clienteID,nome) VALUES (9,'Arte');
INSERT INTO WishList (clienteID,nome) VALUES (19,'Informatica');

/* ------------------------------------------------------ R5 PublicacaoWishList ------------------------------------------------------ */
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (2,44);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (4,67);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (9,87);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (7,54);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (11,72);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (7,5);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (10,30);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (11,58);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (19,11);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (10,20);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (12,88);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (10,78);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (9,31);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (16,81);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (3,40);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (4,95);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (3,39);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (18,54);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (5,74);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (1,14);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (9,84);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (15,43);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (9,51);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (16,16);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (3,94);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (1,32);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (15,93);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (6,15);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (3,45);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (8,3);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (4,55);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (11,13);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (20,86);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (16,63);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (9,29);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (6,88);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (4,84);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (16,50);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (17,90);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (19,85);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (13,87);
INSERT INTO PublicacaoWishList (wishListID,publicacaoID) VALUES (17,29);

/* ------------------------------------------------------ R6 Comentario ------------------------------------------------------ */
INSERT INTO Comentario (clienteID,publicacaoID,data,classificacao,texto) VALUES (7,34,'12/08/2017 21:30:16',1,'et magnis dis parturient montes, nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique neque venenatis lacus. Etiam bibendum fermentum metus. Aenean sed pede');
INSERT INTO Comentario (clienteID,publicacaoID,data,classificacao,texto) VALUES (13,43,'21/08/2017 21:30:16',1,'Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;');
INSERT INTO Comentario (clienteID,publicacaoID,data,classificacao,texto) VALUES (14,91,'12/05/2017 21:30:16',4,'nibh. Aliquam ornare, libero at auctor ullamcorper, nisl arcu iaculis enim, sit amet ornare lectus justo eu arcu. Morbi sit');
INSERT INTO Comentario (clienteID,publicacaoID,data,classificacao,texto) VALUES (21,66,'14/08/2016 21:30:16',3,'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce aliquet');
INSERT INTO Comentario (clienteID,publicacaoID,data,classificacao,texto) VALUES (3,79,'20/09/2016 21:30:16',1,'Quisque fringilla euismod enim. Etiam gravida molestie arcu. Sed eu nibh vulputate mauris sagittis placerat. Cras dictum ultricies ligula. Nullam enim. Sed');
INSERT INTO Comentario (clienteID,publicacaoID,data,classificacao,texto) VALUES (12,57,'03/09/2017 21:30:16',4,'ipsum nunc id enim. Curabitur massa. Vestibulum accumsan neque et nunc. Quisque ornare tortor at risus. Nunc ac sem ut');
INSERT INTO Comentario (clienteID,publicacaoID,data,classificacao,texto) VALUES (10,15,'20/05/2016 21:30:16',4,'sem. Nulla interdum. Curabitur dictum. Phasellus in felis. Nulla tempor augue ac ipsum. Phasellus vitae mauris sit amet');
INSERT INTO Comentario (clienteID,publicacaoID,data,classificacao,texto) VALUES (13,28,'29/04/2017 21:30:16',1,'id enim. Curabitur massa. Vestibulum accumsan neque et nunc. Quisque ornare tortor at risus. Nunc ac sem ut dolor dapibus');
INSERT INTO Comentario (clienteID,publicacaoID,data,classificacao,texto) VALUES (12,51,'30/07/2016 21:30:16',1,'nunc ac mattis ornare, lectus ante dictum mi, ac mattis velit justo nec ante. Maecenas mi felis, adipiscing fringilla, porttitor');
INSERT INTO Comentario (clienteID,publicacaoID,data,classificacao,texto) VALUES (15,8,'18/06/2016 21:30:16',3,'Duis cursus, diam at pretium aliquet, metus urna convallis erat, eget tincidunt dui augue eu tellus. Phasellus elit pede, malesuada');
INSERT INTO Comentario (clienteID,publicacaoID,data,classificacao,texto) VALUES (1,14,'25/08/2017 21:30:16',3,'turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere');
INSERT INTO Comentario (clienteID,publicacaoID,data,classificacao,texto) VALUES (13,80,'10/05/2016 21:30:16',2,'elit pede, malesuada vel, venenatis vel, faucibus id, libero. Donec consectetuer mauris id sapien. Cras dolor dolor, tempus non,');
INSERT INTO Comentario (clienteID,publicacaoID,data,classificacao,texto) VALUES (10,42,'03/06/2017 21:30:16',1,'a, magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui, in sodales');
INSERT INTO Comentario (clienteID,publicacaoID,data,classificacao,texto) VALUES (12,17,'14/12/2016 21:30:16',5,'Suspendisse dui. Fusce diam nunc, ullamcorper eu, euismod ac, fermentum vel, mauris. Integer sem elit, pharetra ut, pharetra sed, hendrerit a,');
INSERT INTO Comentario (clienteID,publicacaoID,data,classificacao,texto) VALUES (16,78,'16/10/2016 21:30:16',4,'Nulla semper tellus id nunc interdum feugiat. Sed nec metus facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet odio.');
INSERT INTO Comentario (clienteID,publicacaoID,data,classificacao,texto) VALUES (16,66,'25/03/2016 21:30:16',1,'consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui, in sodales');
INSERT INTO Comentario (clienteID,publicacaoID,data,classificacao,texto) VALUES (7,83,'16/01/2017 21:30:16',3,'a feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis, lacus');
INSERT INTO Comentario (clienteID,publicacaoID,data,classificacao,texto) VALUES (3,34,'16/08/2017 21:30:16',3,'dolor vitae dolor. Donec fringilla. Donec feugiat metus sit amet ante. Vivamus non lorem vitae');
INSERT INTO Comentario (clienteID,publicacaoID,data,classificacao,texto) VALUES (7,33,'10/12/2016 21:30:16',3,'iaculis nec, eleifend non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas nunc sed libero. Proin sed turpis nec mauris blandit mattis. Cras eget');
INSERT INTO Comentario (clienteID,publicacaoID,data,classificacao,texto) VALUES (21,88,'12/07/2017 21:30:16',5,'ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam');
INSERT INTO Comentario (clienteID,publicacaoID,data,classificacao,texto) VALUES (8,59,'31/05/2016 21:30:16',1,'pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque');
INSERT INTO Comentario (clienteID,publicacaoID,data,classificacao,texto) VALUES (7,57,'28/05/2017 21:30:16',4,'consequat purus. Maecenas libero est, congue a, aliquet vel, vulputate eu, odio. Phasellus at augue id ante dictum cursus. Nunc mauris elit, dictum eu,');
INSERT INTO Comentario (clienteID,publicacaoID,data,classificacao,texto) VALUES (21,8,'07/07/2016 21:30:16',4,'ornare, libero at auctor ullamcorper, nisl arcu iaculis enim, sit amet ornare lectus justo eu arcu. Morbi sit amet massa.');
INSERT INTO Comentario (clienteID,publicacaoID,data,classificacao,texto) VALUES (3,51,'27/06/2016 21:30:16',4,'blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla vulputate');
INSERT INTO Comentario (clienteID,publicacaoID,data,classificacao,texto) VALUES (15,63,'02/11/2017 21:30:16',3,'nonummy. Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus ornare. Fusce mollis. Duis sit amet');
INSERT INTO Comentario (clienteID,publicacaoID,data,classificacao,texto) VALUES (3,66,'15/06/2017 21:30:16',4,'rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet');
INSERT INTO Comentario (clienteID,publicacaoID,data,classificacao,texto) VALUES (20,27,'27/03/2017 21:30:16',2,'Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar');
INSERT INTO Comentario (clienteID,publicacaoID,data,classificacao,texto) VALUES (13,63,'13/09/2017 21:30:16',1,'lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a');
INSERT INTO Comentario (clienteID,publicacaoID,data,classificacao,texto) VALUES (14,46,'28/07/2017 21:30:16',5,'bibendum fermentum metus. Aenean sed pede nec ante blandit viverra. Donec tempus, lorem fringilla ornare');
INSERT INTO Comentario (clienteID,publicacaoID,data,classificacao,texto) VALUES (3,22,'28/03/2016 21:30:16',4,'odio sagittis semper. Nam tempor diam dictum sapien. Aenean massa. Integer vitae nibh. Donec est mauris, rhoncus id, mollis nec, cursus a, enim.');
INSERT INTO Comentario (clienteID,publicacaoID,data,classificacao,texto) VALUES (21,54,'18/10/2016 21:30:16',5,'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus ornare. Fusce mollis. Duis');

/* ------------------------------------------------------ R7 Imagem ------------------------------------------------------ */
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (1,'Arte Portuguesa no Século XX','/img/products/Livros/Arte/1.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (2,'Guia Essencial Para o Estudante de Fotografia Profissional','/img/products/Livros/Arte/2.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (3,'SAGA','/img/products/Livros/Banda_Desenhada/3.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (4,'Velvet - Vol. 2','/img/products/Livros/Banda_Desenhada/4.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (5,'Ciência Cosmológica','/img/products/Livros/Ciencias_Exatas_e_Naturais/5.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (6,'O Livro da Ciência','/img/products/Livros/Ciencias_Exatas_e_Naturais/6.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (7,'Inteligência Multifocal','/img/products/Livros/Ciencias_Sociais_e_Humanas/7.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (8,'Amor Zero','/img/products/Livros/Ciencias_Sociais_e_Humanas/8.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (9,'Labirintos Quase Impossíveis','/img/products/Livros/Desporto_e_Lazer/9.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (10,'Estética e Desporto','/img/products/Livros/Desporto_e_Lazer/10.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (11,'Condomínio','/img/products/Livros/Direito/11.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (12,'Códigos Penal e Processo Penal','/img/products/Livros/Direito/12.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (13,'Programação de CNC para Torno e Fresadora','/img/products/Livros/Engenharia/13.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (14,'Guia de Aplicações de Gestão de Energia e Eficiência Energética','/img/products/Livros/Engenharia/14.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (15,'Adolescência, os Anos da Mudança','/img/products/Livros/Ensino_e_Educacao/15.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (16,'Os Nossos Adolescentes e a Droga','/img/products/Livros/Ensino_e_Educacao/16.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (17,'As Receitas da Minha Querida Mãe','/img/products/Livros/Gastronomia_e_Vinhos/17.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (18,'Deixei de Comer Carne. E Agora?','/img/products/Livros/Gastronomia_e_Vinhos/18.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (19,'Tenha Um Bom Dia!','/img/products/Livros/Gestao/19.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (20,'Atitude UAUme!','/img/products/Livros/Gestao/20.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (21,'Os Últimos Dias de Estaline','/img/products/Livros/Historia/21.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (22,'Grandes Discursos da História','/img/products/Livros/Historia/22.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (23,'Desenvolvimento em Swift para iOS','/img/products/Livros/Informatica/23.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (24,'Android','/img/products/Livros/Informatica/24.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (25,'O feitiço de Marraquex','/img/products/Livros/Literatura/25.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (26,'Para onde vão os gatos quando morrem?','/img/products/Livros/Literatura/26.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (27,'Protocolos de Medicina Materno-Fetal','/img/products/Livros/Medicina/27.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (28,'Anatomia e Fisiologia de Seeley','/img/products/Livros/Medicina/28.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (29,'Jorge Sampaio - Uma Biografia - 2.º volume','/img/products/Livros/Politica/29.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (30,'Quinta-feira','/img/products/Livros/Politica/30.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (31,'O Amor É Contagioso','/img/products/Livros/Religiao_e_Moral/31.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (32,'Deus ou Nada','/img/products/Livros/Religiao_e_Moral/32.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (33,'Manual de Tratamento - 250 Doenças','/img/products/Livros/Saude_e_Bem_Estar/33.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (34,'Chegar Novo a Velho - Receitas','/img/products/Livros/Saude_e_Bem_Estar/34.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (35,'Gosto de Matemática 1','/img/products/Livros_Escolares/1.º_ano/35.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (36,'Alfa - Adição e Subtração - 6-8 anos','/img/products/Livros_Escolares/1.º_ano/36.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (37,'Preparo-me para as Provas de Aferição - 2º Ano 2016/2017','/img/products/Livros_Escolares/2.º_ano/37.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (38,'Casos de Leitura - 1.º Ciclo','/img/products/Livros_Escolares/2.º_ano/38.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (39,'Poemas da Mentira e da Verdade','/img/products/Livros_Escolares/3.º_ano/39.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (40,'A Gramática - Português - 1.º ciclo','/img/products/Livros_Escolares/3.º_ano/40.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (41,'O Beijo da Palavrinha','/img/products/Livros_Escolares/4.º_ano/41.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (42,'Histórias do Arco da Velha','/img/products/Livros_Escolares/4.º_ano/42.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (43,'Chocolate à Chuva','/img/products/Livros_Escolares/5.º_e_6.º_ano/43.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (44,'Ulisses','/img/products/Livros_Escolares/5.º_e_6.º_ano/44.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (45,'Gramática de Português - 3.º Ciclo','/img/products/Livros_Escolares/7.º_8.º_e_9.º_ciclo/45.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (46,'Os Lusíadas','/img/products/Livros_Escolares/7.º_8.º_e_9.º_ciclo/46.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (47,'Preparação para o Exame Final Nacional 2017 - Português - 12.º Ano','/img/products/Livros_Escolares/Ensino_Secundario/47.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (48,'Resumos - Memorial do Convento - José Saramago - Ensino Secundário','/img/products/Livros_Escolares/Ensino_Secundario/48.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (49,'Fichas de Ortografia - 1.º Ano','/img/products/Apoio_Escolar/1.º_ano/49.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (50,'Troca-Tintas - 5-6 Anos','/img/products/Apoio_Escolar/1.º_ano/50.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (51,'Apoio ao Estudo - 2.º Ano','/img/products/Apoio_Escolar/2.º_ano/51.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (52,'Ditados 1.º e 2.º anos','/img/products/Apoio_Escolar/2.º_ano/52.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (53,'A Matemática - 3.º e 4.º anos','/img/products/Apoio_Escolar/3.º_ano/53.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (54,'Fichas de Avaliação - 3.º Ano','/img/products/Apoio_Escolar/3.º_ano/54.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (55,'Fichas de Avaliação - 4.º Ano','/img/products/Apoio_Escolar/4.º_ano/55.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (56,'I Love English! - 9-10 anos - 4.º ano','/img/products/Apoio_Escolar/4.º_ano/56.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (57,'Prova de Aferição 2017 - Matemática e Ciências Naturais - 5.º Ano','/img/products/Apoio_Escolar/5.º_e_6.º_ano/57.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (58,'Prova de Aferição 2017 - História e Geografia de Portugal - 5.º Ano','/img/products/Apoio_Escolar/5.º_e_6.º_ano/58.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (59,'Preparação para a Prova Final 2017 - Matemática - 9.º Ano','/img/products/Apoio_Escolar/7.º_8.º_e_9.º_ciclo/59.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (60,'Preparação para a Prova Final 2017 - Português - 9.º Ano','/img/products/Apoio_Escolar/7.º_8.º_e_9.º_ciclo/60.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (61,'Preparação para o Exame Final Nacional 2017 - Física e Química A - 11.º Ano','/img/products/Apoio_Escolar/Ensino_Secundario/61.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (62,'Preparação para o Exame Final Nacional 2017 - Biologia e Geologia - 11.º Ano','/img/products/Apoio_Escolar/Ensino_Secundario/62.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (63,'Autosport','/img/products/Revistas/Automobilismo/63.jpg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (64,'Auto Foco','/img/products/Revistas/Automobilismo/64.jpg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (65,'Take Off','/img/products/Revistas/Aviacao/65.jpg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (66,'Sirius Magazine','/img/products/Revistas/Aviacao/66.jpg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (67,'Visao','/img/products/Revistas/Cientificas/67.jpg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (68,'Sabado','/img/products/Revistas/Cientificas/68.jpg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (69,'Caras','/img/products/Revistas/Social/69.jpg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (70,'VIP','/img/products/Revistas/Social/70.jpg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (71,'Expresso Economia','/img/products/Revistas/Economia/71.jpg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (72,'Vida Economica','/img/products/Revistas/Economia/72.jpg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (73,'Dragoes','/img/products/Revistas/Desporto/73.jpg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (74,'Jornal Sporting','/img/products/Revistas/Desporto/74.jpg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (75,'Exame Informatica','/img/products/Revistas/Informatica/75.jpg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (76,'PC Guia','/img/products/Revistas/Informatica/76.jpg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (77,'Teleculinaria','/img/products/Revistas/Culinaria/77.jpg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (78,'Ementa da semana','/img/products/Revistas/Culinaria/78.jpg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (79,'Caras Decoracao','/img/products/Revistas/Decoracao/79.jpg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (80,'Casa Claudia','/img/products/Revistas/Decoracao/80.jpg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (81,'Evasoes','/img/products/Revistas/Turismo/81.jpg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (82,'Viajar','/img/products/Revistas/Turismo/82.jpg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (83,'Jornal das Letras','/img/products/Revistas/Lazer/83.jpg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (84,'Blitz','/img/products/Revistas/Lazer/84.jpg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (85,'Dica da semana','/img/products/Revistas/Regionais/85.jpg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (86,'Jornal de Barcelos','/img/products/Revistas/Regionais/86.jpg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (87,'Dicionário Básico Ilustrado da Língua Portuguesa','/img/products/Dicionarios_e_Enciclopedias/Portugues/87.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (88,'Dicionário Escolar de Inglês-Português / Português-Inglês','/img/products/Dicionarios_e_Enciclopedias/Ingles/88.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (89,'Dicionário Escolar de Francês-Português / Português-Francês','/img/products/Dicionarios_e_Enciclopedias/Frances/89.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (90,'Alemão em 30 Dias','/img/products/Dicionarios_e_Enciclopedias/Alemao/90.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (91,'Dicionário Moderno de Espanhol-Português / Português-Espanhol','/img/products/Dicionarios_e_Enciclopedias/Espanhol/91.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (92,'Guias de Viagem 10 - Top 10 Marraquexe','/img/products/Guias_Turisticos_e_Mapas/Africa/92.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (93,'Lonely Planet Costa Rica','/img/products/Guias_Turisticos_e_Mapas/America/93.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (94,'Oriente Distante','/img/products/Guias_Turisticos_e_Mapas/Asia/94.jpeg');
INSERT INTO Imagem (publicacaoID,nome,url) VALUES (95,'CITYPACK - Londres','/img/products/Guias_Turisticos_e_Mapas/Europa/95.jpeg');

/* ------------------------------------------------------ R18 Autor ------------------------------------------------------ */
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (9,'Nathaniel Lee','feminino','10/02/1976','Curabitur massa. Vestibulum accumsan neque et nunc. Quisque ornare tortor');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (2,'Dorothy Harrison','feminino','27/04/1973','et netus et malesuada fames ac turpis egestas. Fusce aliquet');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (5,'Risa Kim','feminino','18/11/1975','lectus justo eu arcu. Morbi sit amet massa. Quisque porttitor eros nec');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (18,'Desirae Chapman','masculino','31/12/1984','libero est, congue a, aliquet vel, vulputate eu, odio. Phasellus');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (15,'Morgan Savage','feminino','10/06/1976','magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (11,'Avram Goodwin','masculino','09/10/1974','sagittis augue, eu tempor erat neque non quam. Pellentesque habitant morbi tristique');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (12,'Sasha Carlson','feminino','17/06/1986','fames ac turpis egestas. Fusce aliquet magna a neque. Nullam ut nisi');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (3,'Merritt Mclaughlin','masculino','29/06/1972','fringilla ornare placerat, orci lacus vestibulum lorem, sit amet ultricies sem magna nec quam. Curabitur vel lectus.');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (6,'Kaye Murphy','masculino','18/02/1980','nulla at sem molestie sodales. Mauris blandit enim consequat purus. Maecenas libero est, congue a, aliquet vel, vulputate eu,');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (4,'Oliver Deleon','feminino','05/08/1980','pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (7,'Macon Dalton','feminino','07/02/1977','quis diam luctus lobortis. Class aptent taciti sociosqu ad litora');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (11,'Fuller Aguirre','masculino','12/04/1980','Nullam velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus.');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (14,'Jermaine Bowman','feminino','12/01/1979','vel lectus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec dignissim magna a');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (10,'Erasmus Thornton','feminino','23/08/1981','et magnis dis parturient montes, nascetur ridiculus mus. Proin vel nisl. Quisque fringilla euismod enim.');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (17,'Nathaniel Byers','feminino','22/01/1984','purus ac tellus. Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (14,'Hayfa Harrington','feminino','10/07/1974','et, eros. Proin ultrices. Duis volutpat nunc sit amet metus.');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (7,'Raymond Jimenez','masculino','21/04/1975','non lorem vitae odio sagittis semper. Nam tempor diam dictum sapien. Aenean massa. Integer vitae');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (5,'Jescie Sharpe','masculino','20/09/1978','tincidunt, neque vitae semper egestas, urna justo faucibus lectus, a sollicitudin orci sem');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (16,'Phyllis Navarro','masculino','07/10/1978','ac nulla. In tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (3,'Desiree Strong','masculino','02/01/1972','Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis facilisis, magna tellus faucibus');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (16,'Jenette Butler','masculino','17/07/1983','Nam ligula elit, pretium et, rutrum non, hendrerit id, ante. Nunc');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (15,'David Hall','masculino','10/03/1977','magna a neque. Nullam ut nisi a odio semper cursus.');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (8,'Hilel Elliott','feminino','16/03/1970','Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec metus facilisis lorem');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (4,'Joy Bullock','feminino','13/05/1970','Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec metus facilisis lorem tristique');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (10,'Christian Lambert','masculino','03/01/1972','odio semper cursus. Integer mollis. Integer tincidunt aliquam arcu. Aliquam ultrices iaculis');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (4,'Petra Mckay','feminino','11/04/1981','dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (10,'Gay Cardenas','masculino','24/09/1983','magnis dis parturient montes, nascetur ridiculus mus. Donec dignissim magna a tortor. Nunc commodo');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (14,'Laith Knox','feminino','10/12/1986','lobortis tellus justo sit amet nulla. Donec non justo. Proin non');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (18,'Amal Parsons','feminino','16/12/1970','dapibus id, blandit at, nisi. Cum sociis natoque penatibus et magnis dis');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (5,'Hanae Briggs','masculino','27/10/1968','Nam nulla magna, malesuada vel, convallis in, cursus et, eros. Proin');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (5,'Whitney Trevino','feminino','04/01/1986','Nam nulla magna, malesuada vel, convallis in, cursus et, eros. Proin ultrices. Duis volutpat nunc sit amet metus.');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (6,'Gail Conner','feminino','18/04/1983','sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Mauris ut quam vel sapien imperdiet ornare. In faucibus. Morbi');
INSERT INTO Autor (PaisID,nome,genero,dataNascimento,biografia) VALUES (17,'Nolan Briggs','feminino','18/09/1978','Mauris ut quam vel sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus');

/* ------------------------------------------------------ R11 AutorPublicacao ------------------------------------------------------ */
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (1,23);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (2,17);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (3,13);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (4,30);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (5,18);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (6,2);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (7,3);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (8,12);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (9,29);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (10,18);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (11,24);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (12,11);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (13,27);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (14,7);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (15,28);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (16,20);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (17,25);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (18,21);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (19,17);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (20,31);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (21,11);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (22,21);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (23,26);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (24,8);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (25,13);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (26,10);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (27,32);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (28,7);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (29,32);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (30,23);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (31,32);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (32,27);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (33,32);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (34,21);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (35,4);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (36,31);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (37,8);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (38,28);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (39,18);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (40,26);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (41,4);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (42,22);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (43,28);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (44,23);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (45,5);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (46,28);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (47,30);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (48,32);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (49,27);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (50,32);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (51,32);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (52,2);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (53,28);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (54,24);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (55,27);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (56,11);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (57,29);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (58,1);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (59,2);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (60,32);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (61,19);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (62,31);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (63,15);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (64,1);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (65,15);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (66,6);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (67,22);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (68,4);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (69,27);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (70,23);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (71,22);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (72,16);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (73,24);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (74,16);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (75,16);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (76,12);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (77,27);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (78,17);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (79,13);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (80,11);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (81,20);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (82,31);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (83,20);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (84,16);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (85,9);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (86,10);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (87,23);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (88,28);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (89,18);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (90,28);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (91,10);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (92,30);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (93,12);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (94,23);
INSERT INTO AutorPublicacao (publicacaoID,autorID) VALUES (95,27);

/* ------------------------------------------------------ R21 Localidade ------------------------------------------------------ */
INSERT INTO Localidade (paisID,nome) VALUES (1,'Abrantes	');
INSERT INTO Localidade (paisID,nome) VALUES (1,'Albufeira');
INSERT INTO Localidade (paisID,nome) VALUES (1,'Amarante');
INSERT INTO Localidade (paisID,nome) VALUES (1,'Aveiro');
INSERT INTO Localidade (paisID,nome) VALUES (1,'Barcelos');
INSERT INTO Localidade (paisID,nome) VALUES (1,'Beja');
INSERT INTO Localidade (paisID,nome) VALUES (1,'Braga');
INSERT INTO Localidade (paisID,nome) VALUES (1,'Bragança');
INSERT INTO Localidade (paisID,nome) VALUES (1,'Caldas da Rainha');
INSERT INTO Localidade (paisID,nome) VALUES (1,'Castelo Branco');
INSERT INTO Localidade (paisID,nome) VALUES (1,'Coimbra');
INSERT INTO Localidade (paisID,nome) VALUES (1,'Ermesinde');
INSERT INTO Localidade (paisID,nome) VALUES (1,'Espinho');
INSERT INTO Localidade (paisID,nome) VALUES (1,'Évora');
INSERT INTO Localidade (paisID,nome) VALUES (1,'Faro');
INSERT INTO Localidade (paisID,nome) VALUES (1,'Figueira da Foz');
INSERT INTO Localidade (paisID,nome) VALUES (1,'Funchal');
INSERT INTO Localidade (paisID,nome) VALUES (1,'Guarda');
INSERT INTO Localidade (paisID,nome) VALUES (1,'Guimarães');
INSERT INTO Localidade (paisID,nome) VALUES (1,'Lamego');
INSERT INTO Localidade (paisID,nome) VALUES (1,'Leiria');
INSERT INTO Localidade (paisID,nome) VALUES (1,'Lisboa');
INSERT INTO Localidade (paisID,nome) VALUES (1,'Maia');
INSERT INTO Localidade (paisID,nome) VALUES (1,'Matosinhos');
INSERT INTO Localidade (paisID,nome) VALUES (1,'Mealhada');
INSERT INTO Localidade (paisID,nome) VALUES (1,'Mirandela');
INSERT INTO Localidade (paisID,nome) VALUES (1,'Odivelas');
INSERT INTO Localidade (paisID,nome) VALUES (1,'Paredes');
INSERT INTO Localidade (paisID,nome) VALUES (1,'Penafiel');
INSERT INTO Localidade (paisID,nome) VALUES (1,'Porto');

/* ------------------------------------------------------ R22 CodigoPostal ------------------------------------------------------ */
INSERT INTO CodigoPostal (localidadeID,cod1,cod2) VALUES (1,'2200','320');
INSERT INTO CodigoPostal (localidadeID,cod1,cod2) VALUES (2,'8200','250');
INSERT INTO CodigoPostal (localidadeID,cod1,cod2) VALUES (3,'4600','058');
INSERT INTO CodigoPostal (localidadeID,cod1,cod2) VALUES (4,'3800','371');
INSERT INTO CodigoPostal (localidadeID,cod1,cod2) VALUES (5,'4750','264');
INSERT INTO CodigoPostal (localidadeID,cod1,cod2) VALUES (6,'7800','449');
INSERT INTO CodigoPostal (localidadeID,cod1,cod2) VALUES (7,'4715','586');
INSERT INTO CodigoPostal (localidadeID,cod1,cod2) VALUES (8,'5300','031');
INSERT INTO CodigoPostal (localidadeID,cod1,cod2) VALUES (9,'2504','909');
INSERT INTO CodigoPostal (localidadeID,cod1,cod2) VALUES (10,'6001','909');
INSERT INTO CodigoPostal (localidadeID,cod1,cod2) VALUES (11,'3025','016');
INSERT INTO CodigoPostal (localidadeID,cod1,cod2) VALUES (12,'4445','418');
INSERT INTO CodigoPostal (localidadeID,cod1,cod2) VALUES (13,'4501','902');
INSERT INTO CodigoPostal (localidadeID,cod1,cod2) VALUES (14,'7005','872');
INSERT INTO CodigoPostal (localidadeID,cod1,cod2) VALUES (15,'8005','998');
INSERT INTO CodigoPostal (localidadeID,cod1,cod2) VALUES (16,'3080','744');
INSERT INTO CodigoPostal (localidadeID,cod1,cod2) VALUES (17,'9000','083');
INSERT INTO CodigoPostal (localidadeID,cod1,cod2) VALUES (18,'6300','625');
INSERT INTO CodigoPostal (localidadeID,cod1,cod2) VALUES (19,'4800','178');
INSERT INTO CodigoPostal (localidadeID,cod1,cod2) VALUES (20,'5101','909');
INSERT INTO CodigoPostal (localidadeID,cod1,cod2) VALUES (21,'2410','253');
INSERT INTO CodigoPostal (localidadeID,cod1,cod2) VALUES (22,'1750','364');
INSERT INTO CodigoPostal (localidadeID,cod1,cod2) VALUES (23,'4425','087');
INSERT INTO CodigoPostal (localidadeID,cod1,cod2) VALUES (24,'4450','187');
INSERT INTO CodigoPostal (localidadeID,cod1,cod2) VALUES (25,'3050','894');
INSERT INTO CodigoPostal (localidadeID,cod1,cod2) VALUES (26,'5371','909');
INSERT INTO CodigoPostal (localidadeID,cod1,cod2) VALUES (27,'2675','639');
INSERT INTO CodigoPostal (localidadeID,cod1,cod2) VALUES (28,'4580','023');
INSERT INTO CodigoPostal (localidadeID,cod1,cod2) VALUES (29,'4560','495');
INSERT INTO CodigoPostal (localidadeID,cod1,cod2) VALUES (30,'4000','000');

/* ------------------------------------------------------ R23 Morada ------------------------------------------------------ */
INSERT INTO Morada (codigoPostalID,rua) VALUES (1,'Esplanada 1º de Maio');
INSERT INTO Morada (codigoPostalID,rua) VALUES (2,'Albufeira Gare');
INSERT INTO Morada (codigoPostalID,rua) VALUES (3,'Rua Carlos Amarante');
INSERT INTO Morada (codigoPostalID,rua) VALUES (4,'Praceta Cidadela de Aveiro');
INSERT INTO Morada (codigoPostalID,rua) VALUES (5,'Rua Duques Barcelos');
INSERT INTO Morada (codigoPostalID,rua) VALUES (6,'Rua Beja');
INSERT INTO Morada (codigoPostalID,rua) VALUES (7,'Rua Maria Ondina Braga');
INSERT INTO Morada (codigoPostalID,rua) VALUES (8,'Rua Dona Catarina de Bragança');
INSERT INTO Morada (codigoPostalID,rua) VALUES (9,'Apartado 16, Caldas da Rainha');
INSERT INTO Morada (codigoPostalID,rua) VALUES (10,'Apartado 4, Castelo Branco');
INSERT INTO Morada (codigoPostalID,rua) VALUES (11,'Rua de Coimbra');
INSERT INTO Morada (codigoPostalID,rua) VALUES (12,'Travessa de Ermesinde');
INSERT INTO Morada (codigoPostalID,rua) VALUES (13,'Apartado 1001, Espinho');
INSERT INTO Morada (codigoPostalID,rua) VALUES (14,'Circular de Évora');
INSERT INTO Morada (codigoPostalID,rua) VALUES (15,'Rua de Faro');
INSERT INTO Morada (codigoPostalID,rua) VALUES (16,'Rua da Figueira da Foz');
INSERT INTO Morada (codigoPostalID,rua) VALUES (17,'Rua do Marquês do Funchal');
INSERT INTO Morada (codigoPostalID,rua) VALUES (18,'In Guarda Retail-Park');
INSERT INTO Morada (codigoPostalID,rua) VALUES (19,'Rua Capitão Alfredo Guimarães');
INSERT INTO Morada (codigoPostalID,rua) VALUES (20,'Apartado 1, Lamego');
INSERT INTO Morada (codigoPostalID,rua) VALUES (21,'Rua Assunção Leiria');
INSERT INTO Morada (codigoPostalID,rua) VALUES (22,'Terminal de Carga Aeroporto de Lisboa');
INSERT INTO Morada (codigoPostalID,rua) VALUES (23,'Rua Fontineiros da Maia');
INSERT INTO Morada (codigoPostalID,rua) VALUES (24,'Rua Orfeão de Matosinhos');
INSERT INTO Morada (codigoPostalID,rua) VALUES (25,'Póvoa da Mealhada');
INSERT INTO Morada (codigoPostalID,rua) VALUES (26,'Apartado 1, Mirandela');
INSERT INTO Morada (codigoPostalID,rua) VALUES (27,'Praça Cidade de Odivelas');
INSERT INTO Morada (codigoPostalID,rua) VALUES (28,'Rua da Misericórdia de Paredes');
INSERT INTO Morada (codigoPostalID,rua) VALUES (29,'Largo dos Bombeiros Voluntários de Penafiel');
INSERT INTO Morada (codigoPostalID,rua) VALUES (30,'Largo 1º de Dezembro');

/* ------------------------------------------------------ R13 MoradaFaturacao ------------------------------------------------------ */
INSERT INTO MoradaFaturacao (clienteID,moradaID) VALUES (1,9);
INSERT INTO MoradaFaturacao (clienteID,moradaID) VALUES (2,12);
INSERT INTO MoradaFaturacao (clienteID,moradaID) VALUES (3,22);
INSERT INTO MoradaFaturacao (clienteID,moradaID) VALUES (4,23);
INSERT INTO MoradaFaturacao (clienteID,moradaID) VALUES (5,30);
INSERT INTO MoradaFaturacao (clienteID,moradaID) VALUES (6,14);
INSERT INTO MoradaFaturacao (clienteID,moradaID) VALUES (7,25);
INSERT INTO MoradaFaturacao (clienteID,moradaID) VALUES (8,18);
INSERT INTO MoradaFaturacao (clienteID,moradaID) VALUES (9,12);
INSERT INTO MoradaFaturacao (clienteID,moradaID) VALUES (10,26);
INSERT INTO MoradaFaturacao (clienteID,moradaID) VALUES (11,15);
INSERT INTO MoradaFaturacao (clienteID,moradaID) VALUES (12,6);
INSERT INTO MoradaFaturacao (clienteID,moradaID) VALUES (13,17);
INSERT INTO MoradaFaturacao (clienteID,moradaID) VALUES (14,5);
INSERT INTO MoradaFaturacao (clienteID,moradaID) VALUES (15,17);
INSERT INTO MoradaFaturacao (clienteID,moradaID) VALUES (16,25);
INSERT INTO MoradaFaturacao (clienteID,moradaID) VALUES (17,7);
INSERT INTO MoradaFaturacao (clienteID,moradaID) VALUES (18,29);
INSERT INTO MoradaFaturacao (clienteID,moradaID) VALUES (19,8);
INSERT INTO MoradaFaturacao (clienteID,moradaID) VALUES (20,3);
INSERT INTO MoradaFaturacao (clienteID,moradaID) VALUES (21,6);

/* ------------------------------------------------------ R14 MoradaEnvio ------------------------------------------------------ */
INSERT INTO MoradaEnvio (clienteID,moradaID) VALUES (1,9);
INSERT INTO MoradaEnvio (clienteID,moradaID) VALUES (2,12);
INSERT INTO MoradaEnvio (clienteID,moradaID) VALUES (3,22);
INSERT INTO MoradaEnvio (clienteID,moradaID) VALUES (4,23);
INSERT INTO MoradaEnvio (clienteID,moradaID) VALUES (5,30);
INSERT INTO MoradaEnvio (clienteID,moradaID) VALUES (6,14);
INSERT INTO MoradaEnvio (clienteID,moradaID) VALUES (7,25);
INSERT INTO MoradaEnvio (clienteID,moradaID) VALUES (8,18);
INSERT INTO MoradaEnvio (clienteID,moradaID) VALUES (9,12);
INSERT INTO MoradaEnvio (clienteID,moradaID) VALUES (10,26);
INSERT INTO MoradaEnvio (clienteID,moradaID) VALUES (11,15);
INSERT INTO MoradaEnvio (clienteID,moradaID) VALUES (12,6);
INSERT INTO MoradaEnvio (clienteID,moradaID) VALUES (13,17);
INSERT INTO MoradaEnvio (clienteID,moradaID) VALUES (14,5);
INSERT INTO MoradaEnvio (clienteID,moradaID) VALUES (15,17);
INSERT INTO MoradaEnvio (clienteID,moradaID) VALUES (16,25);
INSERT INTO MoradaEnvio (clienteID,moradaID) VALUES (17,7);
INSERT INTO MoradaEnvio (clienteID,moradaID) VALUES (18,29);
INSERT INTO MoradaEnvio (clienteID,moradaID) VALUES (19,8);
INSERT INTO MoradaEnvio (clienteID,moradaID) VALUES (20,3);
INSERT INTO MoradaEnvio (clienteID,moradaID) VALUES (21,6);

/* ------------------------------------------------------ R15 CartaoCreditoCliente ------------------------------------------------------ */
INSERT INTO CartaoCreditoCliente (clienteID,tipo,numero,validade,cvv) VALUES (1,'MasterCard','4539991256127798','22/05/2015','935');
INSERT INTO CartaoCreditoCliente (clienteID,tipo,numero,validade,cvv) VALUES (2,'MasterCard','4024007101047','14/08/2011','983');
INSERT INTO CartaoCreditoCliente (clienteID,tipo,numero,validade,cvv) VALUES (3,'AmericanExpress','4485012147500889','07/06/2010','837');
INSERT INTO CartaoCreditoCliente (clienteID,tipo,numero,validade,cvv) VALUES (4,'Visa','4485517338024358','05/06/2010','854');
INSERT INTO CartaoCreditoCliente (clienteID,tipo,numero,validade,cvv) VALUES (5,'AmericanExpress','4716038150097','26/04/2012','385');
INSERT INTO CartaoCreditoCliente (clienteID,tipo,numero,validade,cvv) VALUES (6,'Visa','4716945839428','02/05/2016','376');
INSERT INTO CartaoCreditoCliente (clienteID,tipo,numero,validade,cvv) VALUES (7,'MasterCard','4716953205280','01/06/2014','831');
INSERT INTO CartaoCreditoCliente (clienteID,tipo,numero,validade,cvv) VALUES (8,'MasterCard','4556354288945679','24/09/2011','610');
INSERT INTO CartaoCreditoCliente (clienteID,tipo,numero,validade,cvv) VALUES (9,'AmericanExpress','4539034808209085','06/07/2013','276');
INSERT INTO CartaoCreditoCliente (clienteID,tipo,numero,validade,cvv) VALUES (10,'Visa','4840928111223','10/01/2015','203');
INSERT INTO CartaoCreditoCliente (clienteID,tipo,numero,validade,cvv) VALUES (11,'Visa','4532027722626','15/01/2012','890');
INSERT INTO CartaoCreditoCliente (clienteID,tipo,numero,validade,cvv) VALUES (12,'MasterCard','4716995890950924','25/09/2012','645');
INSERT INTO CartaoCreditoCliente (clienteID,tipo,numero,validade,cvv) VALUES (13,'MasterCard','4401847396021','24/10/2012','719');
INSERT INTO CartaoCreditoCliente (clienteID,tipo,numero,validade,cvv) VALUES (14,'AmericanExpress','4916722740475409','14/08/2010','597');
INSERT INTO CartaoCreditoCliente (clienteID,tipo,numero,validade,cvv) VALUES (15,'AmericanExpress','4716199213119149','28/06/2015','389');
INSERT INTO CartaoCreditoCliente (clienteID,tipo,numero,validade,cvv) VALUES (16,'Visa','4305967903689564','11/03/2011','752');
INSERT INTO CartaoCreditoCliente (clienteID,tipo,numero,validade,cvv) VALUES (17,'MasterCard','4485834498720877','08/06/2011','173');
INSERT INTO CartaoCreditoCliente (clienteID,tipo,numero,validade,cvv) VALUES (18,'AmericanExpress','4539959690998769','22/04/2016','970');
INSERT INTO CartaoCreditoCliente (clienteID,tipo,numero,validade,cvv) VALUES (19,'MasterCard','4539218926600511','01/04/2012','885');
INSERT INTO CartaoCreditoCliente (clienteID,tipo,numero,validade,cvv) VALUES (20,'Visa','4929736934353','14/09/2011','735');

/* ------------------------------------------------------ R16 Funcionario ------------------------------------------------------ */
INSERT INTO Funcionario (funcionarioID,moradaID,paisID,nome,genero,dataNascimento,username,password,ativo,dataAdmissao,telefone,email,nif,cartaoCidadao) VALUES (1,1,1,'Manuel Pereira Lopes','Masculino','08/12/1980','manuellopes','YPB58AJH6LE',TRUE,'02/09/2009 12:12:50','938321270','manuelpereiralopes@hotmail.com','998187586','51057539 8NE7');
INSERT INTO Funcionario (funcionarioID,moradaID,paisID,nome,genero,dataNascimento,username,password,ativo,dataAdmissao,telefone,email,nif,cartaoCidadao) VALUES (2,2,1,'Rui Manuel Fernandes Varela','Masculino','10/05/1991','ruivarela','FOT73YNK8JP',TRUE,'15/08/2012 15:48:15','919232515','ruivarela@gmail.com','102798307','79782665 1XL6');
INSERT INTO Funcionario (funcionarioID,moradaID,paisID,nome,genero,dataNascimento,username,password,ativo,dataAdmissao,telefone,email,nif,cartaoCidadao) VALUES (3,3,1,'Emanuel Jose Costa Frade','Masculino','02/02/2000','emanuelfrade','AXK90DBX1NI',TRUE,'19/11/2002 11:50:50','917672257','emanueljosecostafrade@hotmail.com','637237286','44216592 7KU5');
INSERT INTO Funcionario (funcionarioID,moradaID,paisID,nome,genero,dataNascimento,username,password,ativo,dataAdmissao,telefone,email,nif,cartaoCidadao) VALUES (4,4,1,'Flavio Vieira Marques','Masculino','29/03/1978','flaviomarques','ODB56YJQ9SX',TRUE,'19/03/1997 10:08:10','934216494','flaviovieiramarques@gmail.com','060839699','96659782 2YM1');
INSERT INTO Funcionario (funcionarioID,moradaID,paisID,nome,genero,dataNascimento,username,password,ativo,dataAdmissao,dataCessacao,telefone,email,nif,cartaoCidadao) VALUES (5,5,1,'Fernanda Goncalves Teixeira','Feminino','07/02/1996','fernandateixeira','OLP29HOE9KR',FALSE,'07/05/2014 09:40:20','12/12/2016 19:15:08','938713908','fernandagoncalvesteixeira@gmail.com','937865341','67542959 4IL4');

/* ------------------------------------------------------ R17 Administrador ------------------------------------------------------ */
INSERT INTO Administrador (paisID,nome,genero,dataNascimento,username,password,ativo) VALUES (1,'Renata Vieira Esteves','Feminino','17/8/1994','renataesteves','AIQ85AQG4TJ',TRUE);
INSERT INTO Administrador (paisID,nome,genero,dataNascimento,username,password,ativo) VALUES (1,'Carla Maria dos Santos Botelho','Feminino','27/3/1994','carlabotelho','MAV09WFT8TE',TRUE);
INSERT INTO Administrador (paisID,nome,genero,dataNascimento,username,password,ativo) VALUES (1,'Tiago Miguel Alves Campos','Masculino','15/3/1993','tiagocampos','QDQ58ODE1KV',TRUE);
INSERT INTO Administrador (paisID,nome,genero,dataNascimento,username,password,ativo) VALUES (1,'Armindo Alves Teixeira','Masculino','8/3/1992','armindoteixeira','VBN58OSG2YG',TRUE);
INSERT INTO Administrador (paisID,nome,genero,dataNascimento,username,password,ativo) VALUES (1,'Joaquim da Costa Torres','Masculino','19/7/1991','joaquimtorres','WPZ07DVI9PP',TRUE);
INSERT INTO Administrador (paisID,nome,genero,dataNascimento,dataCessacao,username,password,ativo) VALUES (1,'Carlos Manuel Teixeira','Masculino','8/9/1991','12/02/2017','carlosteixeira','BSO38NJN5MA',FALSE);

/* ------------------------------------------------------ R19 Login ------------------------------------------------------ */
INSERT INTO Login (administradorID,data) VALUES (6,'22/09/2016 23:55:06');
INSERT INTO Login (administradorID,data) VALUES (5,'09/04/2017 05:15:07');
INSERT INTO Login (administradorID,data) VALUES (3,'31/12/2016 15:25:20');
INSERT INTO Login (administradorID,data) VALUES (5,'22/04/2017 19:09:15');
INSERT INTO Login (administradorID,data) VALUES (5,'04/04/2017 20:48:45');
INSERT INTO Login (administradorID,data) VALUES (5,'06/05/2017 23:45:18');
INSERT INTO Login (administradorID,data) VALUES (3,'20/01/2017 10:15:45');
INSERT INTO Login (administradorID,data) VALUES (3,'22/12/2016 12:45:10');
INSERT INTO Login (administradorID,data) VALUES (5,'01/06/2016 12:45:10');
INSERT INTO Login (administradorID,data) VALUES (2,'16/03/2018 12:45:10');
INSERT INTO Login (administradorID,data) VALUES (3,'19/06/2016 12:45:10');
INSERT INTO Login (administradorID,data) VALUES (6,'13/12/2016 12:45:10');
INSERT INTO Login (administradorID,data) VALUES (2,'24/12/2016 12:45:10');
INSERT INTO Login (administradorID,data) VALUES (2,'20/03/2018 12:45:10');
INSERT INTO Login (administradorID,data) VALUES (6,'16/05/2016 12:45:10');
INSERT INTO Login (administradorID,data) VALUES (2,'26/10/2017 12:45:10');
INSERT INTO Login (administradorID,data) VALUES (5,'01/09/2017 12:45:10');
INSERT INTO Login (administradorID,data) VALUES (1,'04/01/2017 12:45:10');
INSERT INTO Login (administradorID,data) VALUES (4,'30/10/2016 12:45:10');
INSERT INTO Login (funcionarioID,data) VALUES (1,'19/06/2017 12:45:10');
INSERT INTO Login (funcionarioID,data) VALUES (4,'30/04/2016 12:45:10');
INSERT INTO Login (funcionarioID,data) VALUES (3,'09/04/2017 12:45:10');
INSERT INTO Login (funcionarioID,data) VALUES (2,'22/03/2018 12:45:10');
INSERT INTO Login (funcionarioID,data) VALUES (1,'19/02/2017 12:45:10');
INSERT INTO Login (funcionarioID,data) VALUES (5,'12/04/2016 12:45:10');
INSERT INTO Login (funcionarioID,data) VALUES (2,'03/01/2017 12:45:10');
INSERT INTO Login (funcionarioID,data) VALUES (1,'11/04/2016 12:45:10');
INSERT INTO Login (funcionarioID,data) VALUES (3,'06/06/2016 12:45:10');
INSERT INTO Login (funcionarioID,data) VALUES (4,'03/09/2016 12:45:10');
INSERT INTO Login (funcionarioID,data) VALUES (1,'03/12/2017 12:45:10');
INSERT INTO Login (funcionarioID,data) VALUES (5,'26/07/2016 12:45:10');
INSERT INTO Login (funcionarioID,data) VALUES (3,'13/04/2017 12:45:10');
INSERT INTO Login (funcionarioID,data) VALUES (2,'14/12/2016 12:45:10');
INSERT INTO Login (funcionarioID,data) VALUES (1,'04/04/2016 12:45:10');
INSERT INTO Login (funcionarioID,data) VALUES (4,'26/01/2018 12:45:10');
INSERT INTO Login (clienteID,data) VALUES (21,'02/07/2017 12:45:10');
INSERT INTO Login (clienteID,data) VALUES (21,'01/01/2017 12:45:10');
INSERT INTO Login (clienteID,data) VALUES (20,'28/08/2017 12:45:10');
INSERT INTO Login (clienteID,data) VALUES (5,'01/02/2018 12:45:10');
INSERT INTO Login (clienteID,data) VALUES (1,'18/06/2017 12:45:10');
INSERT INTO Login (clienteID,data) VALUES (7,'21/01/2018 12:45:10');
INSERT INTO Login (clienteID,data) VALUES (12,'17/02/2017 12:45:10');
INSERT INTO Login (clienteID,data) VALUES (3,'16/12/2016 12:45:10');
INSERT INTO Login (clienteID,data) VALUES (11,'15/06/2016 12:45:10');
INSERT INTO Login (clienteID,data) VALUES (19,'09/10/2017 12:45:10');
INSERT INTO Login (clienteID,data) VALUES (5,'13/07/2016 12:45:10');
INSERT INTO Login (clienteID,data) VALUES (6,'06/06/2016 12:45:10');
INSERT INTO Login (clienteID,data) VALUES (13,'29/06/2016 12:45:10');
INSERT INTO Login (clienteID,data) VALUES (12,'21/05/2016 12:45:10');
INSERT INTO Login (clienteID,data) VALUES (1,'07/05/2017 12:45:10');

/* ------------------------------------------------------ R24 Encomenda ------------------------------------------------------ */
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,data,estado) VALUES (1,1,1,'22/01/2014 12:24:36','Enviada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,data,estado) VALUES (9,9,9,'04/02/2014 10:28:37','Processada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,data,estado) VALUES (13,13,'13','14/02/2014 09:32:45','Devolvida');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,data,estado) VALUES (11,11,11,'15/02/2014 12:24:36','Enviada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,data,estado) VALUES (3,3,3,'04/03/2014 13:21:39','Em processamento');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,data,estado) VALUES (9,9,9,'10/03/2014 15:32:58','Devolvida');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,data,estado) VALUES (11,11,11,'26/04/2014 22:23:49','Enviada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,data,estado) VALUES (18,18,18,'15/05/2014 21:14:46','Enviada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,data,estado) VALUES (15,15,15,'04/06/2014 17:16:37','Processada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,data,estado) VALUES (13,13,13,'25/06/2014 18:12:09','Processada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,data,estado) VALUES (20,20,20,'08/07/2014 15:23:36','Enviada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,data,estado) VALUES (10,10,10,'14/01/2015 16:39:34','Processada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,data,estado) VALUES (14,14,14,'28/02/2015 14:25:39','Processada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,data,estado) VALUES (6,6,6,'02/03/2015 18:11:45','Em processamento');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,data,estado) VALUES (7,7,7,'15/04/2015 13:22:39','Cancelada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,data,estado) VALUES (3,3,3,'24/04/2015 08:48:39','Enviada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,data,estado) VALUES (5,5,5,'19/05/2015 09:24:33','Cancelada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,data,estado) VALUES (6,6,6,'27/05/2015 11:21:45','Processada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,data,estado) VALUES (14,14,14,'29/01/2016 10:11:36','Devolvida');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,data,estado) VALUES (21,21,21,'29/01/2016 09:38:39','Cancelada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,data,estado) VALUES (12,12,12,'21/01/2016 18:24:48','Em processamento');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,data,estado) VALUES (20,20,20,'16/02/2016 14:34:38','Devolvida');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,data,estado) VALUES (6,6,6,'20/02/2016 21:29:37','Cancelada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,data,estado) VALUES (11,11,11,'13/03/2016 12:09:45','Em processamento');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,data,estado) VALUES (19,19,19,'25/03/2016 10:24:43','Devolvida');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,data,estado) VALUES (19,19,19,'26/03/2016 09:21:36','Processada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,data,estado) VALUES (3,3,3,'20/04/2016 18:24:45','Processada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,data,estado) VALUES (8,8,8,'11/05/2016 09:26:36','Devolvida');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,data,estado) VALUES (11,11,11,'30/01/2017 14:32:33','Devolvida');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,data,estado) VALUES (9,9,9,'01/02/2017 13:28:37','Cancelada');

/* ------------------------------------------------------ R27 MetodoPagamento ------------------------------------------------------ */
INSERT INTO MetodoPagamento (tipo) VALUES ('Multibanco');
INSERT INTO MetodoPagamento (tipo) VALUES ('CartaoCredito');
INSERT INTO MetodoPagamento (tipo) VALUES ('Transferência Bancaria');
INSERT INTO MetodoPagamento (tipo) VALUES ('À Cobrança');
INSERT INTO MetodoPagamento (tipo) VALUES ('PayPal');
INSERT INTO MetodoPagamento (tipo) VALUES ('MBnet');
INSERT INTO MetodoPagamento (tipo) VALUES ('PaySafeCard');
INSERT INTO MetodoPagamento (tipo) VALUES ('MoneyBookers');

/* ------------------------------------------------------ R26 InformacaoFaturacao ------------------------------------------------------ */
UPDATE InformacaoFaturacao SET metodoPagamentoID=6 WHERE informacaofaturacaoID=1;
UPDATE InformacaoFaturacao SET metodoPagamentoID=1 WHERE informacaofaturacaoID=2;
UPDATE InformacaoFaturacao SET metodoPagamentoID=6 WHERE informacaofaturacaoID=3;
UPDATE InformacaoFaturacao SET metodoPagamentoID=5 WHERE informacaofaturacaoID=4;
UPDATE InformacaoFaturacao SET metodoPagamentoID=5 WHERE informacaofaturacaoID=5;
UPDATE InformacaoFaturacao SET metodoPagamentoID=6 WHERE informacaofaturacaoID=6;
UPDATE InformacaoFaturacao SET metodoPagamentoID=4 WHERE informacaofaturacaoID=7;
UPDATE InformacaoFaturacao SET metodoPagamentoID=8 WHERE informacaofaturacaoID=8;
UPDATE InformacaoFaturacao SET metodoPagamentoID=8 WHERE informacaofaturacaoID=9;
UPDATE InformacaoFaturacao SET metodoPagamentoID=3 WHERE informacaofaturacaoID=10;
UPDATE InformacaoFaturacao SET metodoPagamentoID=6 WHERE informacaofaturacaoID=11;
UPDATE InformacaoFaturacao SET metodoPagamentoID=6 WHERE informacaofaturacaoID=12;
UPDATE InformacaoFaturacao SET metodoPagamentoID=8 WHERE informacaofaturacaoID=13;
UPDATE InformacaoFaturacao SET metodoPagamentoID=1 WHERE informacaofaturacaoID=14;
UPDATE InformacaoFaturacao SET metodoPagamentoID=4 WHERE informacaofaturacaoID=15;
UPDATE InformacaoFaturacao SET metodoPagamentoID=1 WHERE informacaofaturacaoID=16;
UPDATE InformacaoFaturacao SET metodoPagamentoID=6 WHERE informacaofaturacaoID=17;
UPDATE InformacaoFaturacao SET metodoPagamentoID=2 WHERE informacaofaturacaoID=18;
UPDATE InformacaoFaturacao SET metodoPagamentoID=1 WHERE informacaofaturacaoID=19;
UPDATE InformacaoFaturacao SET metodoPagamentoID=3 WHERE informacaofaturacaoID=20;
UPDATE InformacaoFaturacao SET metodoPagamentoID=5 WHERE informacaofaturacaoID=21;
UPDATE InformacaoFaturacao SET metodoPagamentoID=2 WHERE informacaofaturacaoID=22;
UPDATE InformacaoFaturacao SET metodoPagamentoID=5 WHERE informacaofaturacaoID=23;
UPDATE InformacaoFaturacao SET metodoPagamentoID=1 WHERE informacaofaturacaoID=24;
UPDATE InformacaoFaturacao SET metodoPagamentoID=8 WHERE informacaofaturacaoID=25;
UPDATE InformacaoFaturacao SET metodoPagamentoID=3 WHERE informacaofaturacaoID=26;
UPDATE InformacaoFaturacao SET metodoPagamentoID=7 WHERE informacaofaturacaoID=27;
UPDATE InformacaoFaturacao SET metodoPagamentoID=4 WHERE informacaofaturacaoID=28;
UPDATE InformacaoFaturacao SET metodoPagamentoID=1 WHERE informacaofaturacaoID=29;
UPDATE InformacaoFaturacao SET metodoPagamentoID=5 WHERE informacaofaturacaoID=30;

/* ------------------------------------------ Update InformacaoFaturacaoID on Encomenda ------------------------------------------------ */
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,informacaoFaturacaoID,data,estado) VALUES (1,1,1,1,'22/01/2014 12:24:36','Enviada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,informacaoFaturacaoID,data,estado) VALUES (9,9,9,9,'04/02/2014 10:28:37','Processada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,informacaoFaturacaoID,data,estado) VALUES (13,13,13,'13','14/02/2014 09:32:45','Devolvida');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,informacaoFaturacaoID,data,estado) VALUES (11,11,11,11,'15/02/2014 12:24:36','Enviada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,informacaoFaturacaoID,data,estado) VALUES (3,3,3,3,'04/03/2014 13:21:39','Em processamento');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,informacaoFaturacaoID,data,estado) VALUES (9,9,9,9,'10/03/2014 15:32:58','Devolvida');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,informacaoFaturacaoID,data,estado) VALUES (11,11,11,11,'26/04/2014 22:23:49','Enviada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,informacaoFaturacaoID,data,estado) VALUES (18,18,18,18,'15/05/2014 21:14:46','Enviada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,informacaoFaturacaoID,data,estado) VALUES (15,15,15,15,'04/06/2014 17:16:37','Processada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,informacaoFaturacaoID,data,estado) VALUES (13,13,13,13,'25/06/2014 18:12:09','Processada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,informacaoFaturacaoID,data,estado) VALUES (20,20,20,20,'08/07/2014 15:23:36','Enviada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,informacaoFaturacaoID,data,estado) VALUES (10,10,10,10,'14/01/2015 16:39:34','Processada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,informacaoFaturacaoID,data,estado) VALUES (14,14,14,14,'28/02/2015 14:25:39','Processada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,informacaoFaturacaoID,data,estado) VALUES (6,6,6,6,'02/03/2015 18:11:45','Em processamento');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,informacaoFaturacaoID,data,estado) VALUES (7,7,7,7,'15/04/2015 13:22:39','Cancelada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,informacaoFaturacaoID,data,estado) VALUES (3,3,3,3,'24/04/2015 08:48:39','Enviada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,informacaoFaturacaoID,data,estado) VALUES (5,5,5,5,'19/05/2015 09:24:33','Cancelada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,informacaoFaturacaoID,data,estado) VALUES (6,6,6,6,'27/05/2015 11:21:45','Processada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,informacaoFaturacaoID,data,estado) VALUES (14,14,14,14,'29/01/2016 10:11:36','Devolvida');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,informacaoFaturacaoID,data,estado) VALUES (21,21,21,21,'29/01/2016 09:38:39','Cancelada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,informacaoFaturacaoID,data,estado) VALUES (12,12,12,12,'21/01/2016 18:24:48','Em processamento');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,informacaoFaturacaoID,data,estado) VALUES (20,20,20,20,'16/02/2016 14:34:38','Devolvida');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,informacaoFaturacaoID,data,estado) VALUES (6,6,6,6,'20/02/2016 21:29:37','Cancelada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,informacaoFaturacaoID,data,estado) VALUES (11,11,11,11,'13/03/2016 12:09:45','Em processamento');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,informacaoFaturacaoID,data,estado) VALUES (19,19,19,19,'25/03/2016 10:24:43','Devolvida');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,informacaoFaturacaoID,data,estado) VALUES (19,19,19,19,'26/03/2016 09:21:36','Processada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,informacaoFaturacaoID,data,estado) VALUES (3,3,3,3,'20/04/2016 18:24:45','Processada');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,informacaoFaturacaoID,data,estado) VALUES (8,8,8,8,'11/05/2016 09:26:36','Devolvida');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,informacaoFaturacaoID,data,estado) VALUES (11,11,11,11,'30/01/2017 14:32:33','Devolvida');
INSERT INTO Encomenda (clienteID,moradaFaturacaoID,moradaEnvioID,informacaoFaturacaoID,data,estado) VALUES (9,9,9,9,'01/02/2017 13:28:37','Cancelada');

/* ------------------------------------------------------ R25 PublicacaoEncomenda ------------------------------------------------------ */
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (43,1);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (39,1);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (34,2);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (58,2);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (81,3);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (93,3);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (17,4);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (30,4);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (81,5);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (10,5);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (51,6);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (3,6);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (29,7);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (82,7);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (94,8);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (21,8);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (31,9);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (58,9);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (66,10);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (89,10);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (71,11);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (33,11);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (24,12);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (19,12);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (69,13);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (16,13);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (16,14);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (34,14);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (49,15);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (66,15);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (7,16);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (72,16);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (67,17);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (31,17);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (57,18);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (39,18);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (92,19);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (67,19);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (8,20);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (11,20);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (14,21);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (73,21);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (8,22);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (21,22);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (21,23);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (2,23);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (72,24);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (16,24);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (36,25);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (68,25);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (84,26);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (31,26);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (29,27);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (80,27);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (83,28);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (39,28);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (26,29);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (82,29);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (68,30);
INSERT INTO PublicacaoEncomenda (publicacaoID,encomendaID) VALUES (30,30);

/* ------------------------------------------------------ R28 CartaoCredito ------------------------------------------------------ */
INSERT INTO CartaoCredito (tipo,numero,validade,cvv) VALUES ('MasterCard','4539991256127798','22/05/2015','935');
INSERT INTO CartaoCredito (tipo,numero,validade,cvv) VALUES ('MasterCard','4024007101047434','14/08/2011','983');
INSERT INTO CartaoCredito (tipo,numero,validade,cvv) VALUES ('AmericanExpress','4485012147500889','07/06/2010','837');
INSERT INTO CartaoCredito (tipo,numero,validade,cvv) VALUES ('Visa','4485517338024358','05/06/2010','854');
INSERT INTO CartaoCredito (tipo,numero,validade,cvv) VALUES ('AmericanExpress','4716038150097342','26/04/2012','385');
INSERT INTO CartaoCredito (tipo,numero,validade,cvv) VALUES ('Visa','4716945839428343','02/05/2016','376');
INSERT INTO CartaoCredito (tipo,numero,validade,cvv) VALUES ('MasterCard','4716953205280344','01/06/2014','831');
INSERT INTO CartaoCredito (tipo,numero,validade,cvv) VALUES ('MasterCard','4556354288945679','24/09/2011','610');
INSERT INTO CartaoCredito (tipo,numero,validade,cvv) VALUES ('AmericanExpress','4539034808209085','06/07/2013','276');
INSERT INTO CartaoCredito (tipo,numero,validade,cvv) VALUES ('Visa','4840928111262334','10/01/2015','203');

/* ------------------------------------------------------ R29 Multibanco ------------------------------------------------------ */
INSERT INTO Multibanco (entidade,referencia) VALUES ('61624','614 976 849');
INSERT INTO Multibanco (entidade,referencia) VALUES ('75491','395 315 825');
INSERT INTO Multibanco (entidade,referencia) VALUES ('65582','182 226 819');
INSERT INTO Multibanco (entidade,referencia) VALUES ('72157','686 128 244');
INSERT INTO Multibanco (entidade,referencia) VALUES ('37188','328 165 191');
INSERT INTO Multibanco (entidade,referencia) VALUES ('87488','655 663 668');
INSERT INTO Multibanco (entidade,referencia) VALUES ('31585','232 614 235');
INSERT INTO Multibanco (entidade,referencia) VALUES ('91247','117 778 349');
INSERT INTO Multibanco (entidade,referencia) VALUES ('12416','758 365 939');
INSERT INTO Multibanco (entidade,referencia) VALUES ('39498','823 263 724');
INSERT INTO Multibanco (entidade,referencia) VALUES ('33338','459 581 165');
INSERT INTO Multibanco (entidade,referencia) VALUES ('87159','549 252 633');
INSERT INTO Multibanco (entidade,referencia) VALUES ('58894','761 858 827');
INSERT INTO Multibanco (entidade,referencia) VALUES ('85815','874 344 824');
INSERT INTO Multibanco (entidade,referencia) VALUES ('75464','765 962 113');
INSERT INTO Multibanco (entidade,referencia) VALUES ('71286','283 437 367');
INSERT INTO Multibanco (entidade,referencia) VALUES ('54848','564 915 627');
INSERT INTO Multibanco (entidade,referencia) VALUES ('16113','518 494 733');
INSERT INTO Multibanco (entidade,referencia) VALUES ('48114','641 766 252');
INSERT INTO Multibanco (entidade,referencia) VALUES ('19287','849 911 584');
INSERT INTO Multibanco (entidade,referencia) VALUES ('79216','743 932 611');
INSERT INTO Multibanco (entidade,referencia) VALUES ('82711','281 722 782');
INSERT INTO Multibanco (entidade,referencia) VALUES ('13548','155 372 814');
INSERT INTO Multibanco (entidade,referencia) VALUES ('96251','659 456 281');
INSERT INTO Multibanco (entidade,referencia) VALUES ('57635','171 997 945');
INSERT INTO Multibanco (entidade,referencia) VALUES ('63569','254 382 232');
INSERT INTO Multibanco (entidade,referencia) VALUES ('28947','212 379 526');
INSERT INTO Multibanco (entidade,referencia) VALUES ('15991','331 991 595');
INSERT INTO Multibanco (entidade,referencia) VALUES ('72657','229 647 948');
INSERT INTO Multibanco (entidade,referencia) VALUES ('84466','417 838 858');

/* ------------------------------------------------------ R30 Pesquisa ------------------------------------------------------ */
INSERT INTO Pesquisa (data,expressao) VALUES ('04/11/2016 10:45:20','Livro');
INSERT INTO Pesquisa (data,expressao) VALUES ('02/11/2017 10:45:20','Livro');
INSERT INTO Pesquisa (data,expressao) VALUES ('19/03/2018 10:45:20','Preparacao');
INSERT INTO Pesquisa (data,expressao) VALUES ('15/09/2017 10:45:20','Spider');
INSERT INTO Pesquisa (data,expressao) VALUES ('15/01/2017 10:45:20','Men');
INSERT INTO Pesquisa (data,expressao) VALUES ('18/10/2016 10:45:20','Spider');
INSERT INTO Pesquisa (data,expressao) VALUES ('08/02/2018 10:45:20','Revista');
INSERT INTO Pesquisa (data,expressao) VALUES ('09/03/2017 10:45:20','Revista');
INSERT INTO Pesquisa (data,expressao) VALUES ('06/09/2017 10:45:20','Jornal');
INSERT INTO Pesquisa (data,expressao) VALUES ('26/04/2016 10:45:20','Men');
INSERT INTO Pesquisa (data,expressao) VALUES ('19/11/2016 10:45:20','Men');
INSERT INTO Pesquisa (data,expressao) VALUES ('27/05/2016 10:45:20','Arte');
INSERT INTO Pesquisa (data,expressao) VALUES ('18/06/2016 10:45:20','Jornal');
INSERT INTO Pesquisa (data,expressao) VALUES ('10/03/2017 10:45:20','Preparacao');
INSERT INTO Pesquisa (data,expressao) VALUES ('06/05/2016 10:45:20','Preparacao');
INSERT INTO Pesquisa (data,expressao) VALUES ('12/11/2017 10:45:20','Preparacao');
INSERT INTO Pesquisa (data,expressao) VALUES ('06/07/2016 10:45:20','Jornal');
INSERT INTO Pesquisa (data,expressao) VALUES ('03/01/2017 10:45:20','Livro');
INSERT INTO Pesquisa (data,expressao) VALUES ('16/10/2016 10:45:20','Men');
INSERT INTO Pesquisa (data,expressao) VALUES ('11/11/2016 10:45:20','Arte');
INSERT INTO Pesquisa (data,expressao) VALUES ('11/10/2016 10:45:20','Revista');
INSERT INTO Pesquisa (data,expressao) VALUES ('10/08/2016 10:45:20','Revista');
INSERT INTO Pesquisa (data,expressao) VALUES ('09/06/2016 10:45:20','Preparacao');
INSERT INTO Pesquisa (data,expressao) VALUES ('14/11/2017 10:45:20','Men');
INSERT INTO Pesquisa (data,expressao) VALUES ('15/04/2017 10:45:20','Preparacao');
INSERT INTO Pesquisa (data,expressao) VALUES ('27/10/2016 10:45:20','Spider');
INSERT INTO Pesquisa (data,expressao) VALUES ('27/08/2017 10:45:20','Spider');
INSERT INTO Pesquisa (data,expressao) VALUES ('28/03/2017 10:45:20','Embalar');
INSERT INTO Pesquisa (data,expressao) VALUES ('01/03/2017 10:45:20','Livro');
INSERT INTO Pesquisa (data,expressao) VALUES ('05/06/2017 10:45:20','Men');
INSERT INTO Pesquisa (data,expressao) VALUES ('29/04/2016 10:45:20','Spider');
INSERT INTO Pesquisa (data,expressao) VALUES ('08/03/2018 10:45:20','Preparacao');
INSERT INTO Pesquisa (data,expressao) VALUES ('26/11/2017 10:45:20','Spider');
INSERT INTO Pesquisa (data,expressao) VALUES ('11/12/2017 10:45:20','Historias');
INSERT INTO Pesquisa (data,expressao) VALUES ('08/12/2016 10:45:20','Jornal');
INSERT INTO Pesquisa (data,expressao) VALUES ('20/08/2016 10:45:20','Men');
INSERT INTO Pesquisa (data,expressao) VALUES ('18/09/2017 10:45:20','Preparacao');
INSERT INTO Pesquisa (data,expressao) VALUES ('03/06/2016 10:45:20','Arte');
INSERT INTO Pesquisa (data,expressao) VALUES ('20/10/2017 10:45:20','Revista');
INSERT INTO Pesquisa (data,expressao) VALUES ('04/11/2016 10:45:20','Livro');
INSERT INTO Pesquisa (data,expressao) VALUES ('11/06/2017 10:45:20','Livro');
INSERT INTO Pesquisa (data,expressao) VALUES ('25/08/2017 10:45:20','Spider');
INSERT INTO Pesquisa (data,expressao) VALUES ('04/09/2017 10:45:20','Embalar');
INSERT INTO Pesquisa (data,expressao) VALUES ('01/04/2017 10:45:20','Historias');
INSERT INTO Pesquisa (data,expressao) VALUES ('09/01/2018 10:45:20','Historias');
INSERT INTO Pesquisa (data,expressao) VALUES ('06/04/2017 10:45:20','Exames');
INSERT INTO Pesquisa (data,expressao) VALUES ('13/07/2017 10:45:20','Embalar');
INSERT INTO Pesquisa (data,expressao) VALUES ('08/02/2017 10:45:20','Historias');
INSERT INTO Pesquisa (data,expressao) VALUES ('14/10/2017 10:45:20','Preparacao');
INSERT INTO Pesquisa (data,expressao) VALUES ('16/02/2018 10:45:20','Men');

/* ------------------------------------------------------ R31 PerguntaUtilizador ------------------------------------------------------ */
INSERT INTO PerguntaUtilizador (data,nome,email,mensagem) VALUES ('20/01/2018 15:48:12','Lacy Sexton','ornare.facilisis.eget@euaugueporttitor.edu','Posso levantar em loja física?');
INSERT INTO PerguntaUtilizador (data,nome,email,mensagem) VALUES ('20/10/2017 15:48:12','Cameron Rhodes','et.libero@etipsum.ca','Olá, pode indicar quais os métodos de pagamento disponíveis?');
INSERT INTO PerguntaUtilizador (data,nome,email,mensagem) VALUES ('01/05/2017 15:48:12','Faith Grant','Sed.auctor@nullaat.org','Olá, tudo bem? Tenho uma duvida relativamente à minha encomenda');
INSERT INTO PerguntaUtilizador (data,nome,email,mensagem) VALUES ('31/01/2017 15:48:12','Aretha Mcdaniel','nec.euismod@nibh.ca','Olá, pode indicar quais os métodos de pagamento disponíveis?');
INSERT INTO PerguntaUtilizador (data,nome,email,mensagem) VALUES ('29/05/2016 15:48:12','Ulla Leach','erat.eget@facilisislorem.ca','Não consigo esperar mais pela minha encomenda');
INSERT INTO PerguntaUtilizador (data,nome,email,mensagem) VALUES ('09/05/2017 15:48:12','Angela Bartlett','ut.molestie.in@at.org','Não consigo esperar mais pela minha encomenda');
INSERT INTO PerguntaUtilizador (data,nome,email,mensagem) VALUES ('25/02/2018 15:48:12','Zorita Mercado','Curabitur.consequat.lectus@sedturpis.edu','Olá, tudo bem? Tenho uma duvida relativamente à minha encomenda');
INSERT INTO PerguntaUtilizador (data,nome,email,mensagem) VALUES ('14/08/2017 15:48:12','Frances Norman','nec@velit.org','Posso levantar em loja física?');
INSERT INTO PerguntaUtilizador (data,nome,email,mensagem) VALUES ('02/03/2017 15:48:12','Eugenia Douglas','gravida.molestie@nequevenenatislacus.co.uk','Olá, pode indicar quais os métodos de pagamento disponíveis?');
INSERT INTO PerguntaUtilizador (data,nome,email,mensagem) VALUES ('04/04/2016 15:48:12','Regina Cooke','semper.rutrum.Fusce@atortorNunc.org','Não consigo esperar mais pela minha encomenda');
INSERT INTO PerguntaUtilizador (data,nome,email,mensagem) VALUES ('17/11/2017 15:48:12','Colin Sears','eu@aliquet.net','Posso levantar em loja física?');
INSERT INTO PerguntaUtilizador (data,nome,email,mensagem) VALUES ('23/11/2016 15:48:12','Sierra Yates','vestibulum@imperdieteratnonummy.com','Olá, quanto tempo demora a chegar a minha encomenda?');
INSERT INTO PerguntaUtilizador (data,nome,email,mensagem) VALUES ('18/03/2018 15:48:12','Elmo Mccullough','tempor.diam@magnis.co.uk','Olá, tudo bem? Tenho uma duvida relativamente à minha encomenda');
INSERT INTO PerguntaUtilizador (data,nome,email,mensagem) VALUES ('16/12/2017 15:48:12','Hashim Dudley','lectus.Nullam.suscipit@tristique.org','Olá, tudo bem? Tenho uma duvida relativamente à minha encomenda');
INSERT INTO PerguntaUtilizador (data,nome,email,mensagem) VALUES ('07/11/2016 15:48:12','Grady Roberson','cursus.Integer.mollis@Namporttitorscelerisque.edu','Olá, tudo bem? Tenho uma duvida relativamente à minha encomenda');
INSERT INTO PerguntaUtilizador (data,nome,email,mensagem) VALUES ('14/10/2016 15:48:12','Jakeem Burt','velit@seddolor.edu','Olá, quanto tempo demora a chegar a minha encomenda?');
INSERT INTO PerguntaUtilizador (data,nome,email,mensagem) VALUES ('11/03/2017 15:48:12','Berk Riggs','convallis.dolor.Quisque@Nullamenim.org','Olá, tudo bem? Tenho uma duvida relativamente à minha encomenda');
INSERT INTO PerguntaUtilizador (data,nome,email,mensagem) VALUES ('28/10/2017 15:48:12','Sylvia Hardy','quis.accumsan@semPellentesque.net','Olá, pode indicar quais os métodos de pagamento disponíveis?');
INSERT INTO PerguntaUtilizador (data,nome,email,mensagem) VALUES ('31/05/2016 15:48:12','Avram Hebert','mi.Duis@mauriserat.co.uk','Posso levantar em loja física?');
INSERT INTO PerguntaUtilizador (data,nome,email,mensagem) VALUES ('23/11/2017 15:48:12','Jaden David','non.sollicitudin@Donec.ca','Não consigo esperar mais pela minha encomenda');
INSERT INTO PerguntaUtilizador (data,nome,email,mensagem) VALUES ('24/10/2016 15:48:12','Kyle Huffman','Curabitur@Donec.ca','Não consigo esperar mais pela minha encomenda');
INSERT INTO PerguntaUtilizador (data,nome,email,mensagem) VALUES ('05/08/2017 15:48:12','Fallon Hardy','aliquet@diamProindolor.net','Posso levantar em loja física?');
INSERT INTO PerguntaUtilizador (data,nome,email,mensagem) VALUES ('01/10/2017 15:48:12','Lael Lynn','hendrerit.Donec@libero.org','Olá, tudo bem? Tenho uma duvida relativamente à minha encomenda');
INSERT INTO PerguntaUtilizador (data,nome,email,mensagem) VALUES ('07/06/2017 15:48:12','Octavius Merritt','auctor.velit.Aliquam@volutpatnuncsit.org','Olá, quanto tempo demora a chegar a minha encomenda?');
INSERT INTO PerguntaUtilizador (data,nome,email,mensagem) VALUES ('05/11/2016 15:48:12','Laura Frye','nec.leo.Morbi@commodotincidunt.co.uk','Olá, pode indicar quais os métodos de pagamento disponíveis?');
INSERT INTO PerguntaUtilizador (data,nome,email,mensagem) VALUES ('14/08/2016 15:48:12','Jarrod Powell','ac.nulla.In@tincidunt.edu','Não consigo esperar mais pela minha encomenda');
INSERT INTO PerguntaUtilizador (data,nome,email,mensagem) VALUES ('18/11/2017 15:48:12','Preston Carr','accumsan.convallis.ante@gravida.org','Olá, pode indicar quais os métodos de pagamento disponíveis?');
INSERT INTO PerguntaUtilizador (data,nome,email,mensagem) VALUES ('24/04/2016 15:48:12','Quyn Mcmillan','tempus.lorem@ultrices.org','Não consigo esperar mais pela minha encomenda');
INSERT INTO PerguntaUtilizador (data,nome,email,mensagem) VALUES ('12/05/2016 15:48:12','Lana Crosby','et.netus@utlacusNulla.edu','Olá, pode indicar quais os métodos de pagamento disponíveis?');
INSERT INTO PerguntaUtilizador (data,nome,email,mensagem) VALUES ('19/12/2017 15:48:12','Serena Mccarty','mus.Proin@fringilla.com','Olá, tudo bem? Tenho uma duvida relativamente à minha encomenda');
INSERT INTO PerguntaUtilizador (data,nome,email,mensagem) VALUES ('28/12/2016 15:48:12','Orson Dennis','Proin.vel@Donecnonjusto.co.uk','Posso levantar em loja física?');
