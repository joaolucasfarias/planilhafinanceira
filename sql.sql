CREATE SEQUENCE seq_categoria;

CREATE TABLE categoria (
	idCategoria INTEGER NOT NULL DEFAULT NEXTVAL('seq_categoria'),
	nomeCategoria VARCHAR(100) NOT NULL,
	operacao CHAR(1) NOT NULL,
	total NUMERIC(10,2) NOT NULL DEFAULT 0,
	CONSTRAINT pk_categoria PRIMARY KEY (idCategoria),
	CONSTRAINT ck_operacao CHECK (operacao IN('C','D'))
);

CREATE SEQUENCE seq_item;

CREATE TABLE item (
	idItem INTEGER NOT NULL DEFAULT NEXTVAL('seq_item'),
	nomeItem VARCHAR(100) NOT NULL,
	valorBase NUMERIC (10,2) NOT NULL,
	idCategoria INTEGER NOT NULL,
	CONSTRAINT pk_item PRIMARY KEY (idItem),
	CONSTRAINT fk_item_categoria FOREIGN KEY (idCategoria) REFERENCES categoria(idCategoria)
);