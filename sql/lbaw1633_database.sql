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

/* Create Tables */

CREATE TABLE Administrador
(
	AdministradorID SERIAL,
	PaisID integer NOT NULL,
	Nome varchar(100) NOT NULL,
	Genero varchar(50) NOT NULL,
	Datanascimento timestamp NOT NULL,
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
	Datanascimento timestamp NOT NULL,
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
	Subtotal real NOT NULL,
	CONSTRAINT PK_Carrinho PRIMARY KEY (CarrinhoID)
)
;

CREATE TABLE Cartaocredito
(
	CartaocreditoID SERIAL,
	Tipo TipoCartao NOT NULL,
	Numero integer NOT NULL,
	Validade varchar(50) NOT NULL,
	Cvv integer NOT NULL,
	CONSTRAINT PK_Cartaocredito PRIMARY KEY (CartaocreditoID)
)
;

CREATE TABLE Cartaocreditocliente
(
	CartaocreditoclienteID integer NOT NULL,
	ClienteID integer NOT NULL,
	Tipo TipoCartao NOT NULL,
	Numero integer NOT NULL,
	Validade varchar(50) NOT NULL,
	Cvv integer NOT NULL,
	CONSTRAINT PK_Cartaocreditocliente PRIMARY KEY (CartaocreditoclienteID),
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
	Datanascimento timestamp NOT NULL,
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
	Cod1 integer NOT NULL,
	Cod2 integer NOT NULL,
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
	MoradaID integer NOT NULL,
	InformacaofaturacaoID integer NOT NULL,
	Data timestamp NOT NULL,
	Estado EstadoEncomenda NOT NULL,
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
	Datanascimento timestamp NOT NULL,
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
	ImagemID integer NOT NULL,
	PublicacaoID integer NOT NULL,
	Nome varchar(50) NOT NULL,
	Url varchar(300) NOT NULL,
	CONSTRAINT PK_Imagem PRIMARY KEY (ImagemID)
)
;

CREATE TABLE Informacaofaturacao
(
	InformacaofaturacaoID SERIAL,
	MetodopagamentoID integer NOT NULL,
	Portes real NOT NULL,
	Iva real NOT NULL,
	Total real NOT NULL,
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
	Datapublicacao timestamp NOT NULL,
	Codigobarras integer NOT NULL,
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
	CONSTRAINT CK_Publicacao_precopromocional CHECK (Precopromocional < Preco)
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
	Quantidade integer NOT NULL,
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
	FOREIGN KEY (MoradaID) REFERENCES Morada (MoradaID)
;

ALTER TABLE Encomenda ADD CONSTRAINT FK_Encomenda_morada_faturacao
	FOREIGN KEY (MoradaID) REFERENCES Morada (MoradaID)
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