CREATE SCHEMA cadastros;

CREATE TABLE cadastros.banco (
    id integer PRIMARY KEY,
    codigo smallint NOT NULL UNIQUE,
    nome varchar(128) NOT NULL UNIQUE
);

CREATE TABLE cadastros.dados_bancario (
    id integer PRIMARY KEY,
    agencia varchar(10) NOT NULL,
    conta varchar(10) NOT NULL,
    informacoes_complementares varchar(256),
    id_banco integer NOT NULL REFERENCES cadastros.banco (id)
);

CREATE TABLE cadastros.usuario (
    id integer PRIMARY KEY,
    nome varchar(128) NOT NULL UNIQUE,
    cpf integer(11) NOT NULL UNIQUE,
    email varchar(128) NOT NULL UNIQUE,
    senha varchar(32) NOT NULL,
    ativo boolean NOT NULL DEFAULT TRUE,
    id_dados_bancario integer NOT NULL REFERENCES cadastros.dados_bancario (id)
);

CREATE SCHEMA apostas;

CREATE TABLE apostas.opcao_palpite (
    id integer PRIMARY KEY,
    descricao varchar(32) NOT NULL UNIQUE
);

CREATE TABLE apostas.tipo_palpite (
    id integer PRIMARY KEY,
    descricao varchar(32) NOT NULL UNIQUE
);

CREATE TABLE apostas.possibilidade_aposta (
    id integer PRIMARY KEY,
    valor numeric(5, 2) NOT NULL DEFAULT 0,
    quantidade_duplos smallint NOT NULL,
    quantidade_triplos smallint NOT NULL,  
    UNIQUE (valor, quantidade_duplos, quantidade_triplos)
);

CREATE TABLE apostas.concurso (
    id integer PRIMARY KEY,
    codigo smallint NOT NULL UNIQUE,
    data_inicio date NOT NULL UNIQUE,
    data_fim date NOT NULL UNIQUE,
    img_cartao_aposta_final BLOB,
    ativo boolean NOT NULL DEFAULT TRUE,
    id_possibilidade_aposta integer NOT NULL REFERENCES apostas.possibilidade_aposta (id)   
);

CREATE TABLE apostas.jogo (
    id integer PRIMARY KEY,
    posicao smallint NOT NULL,
    mandante varchar(32) NOT NULL,
    visitante varchar(32) NOT NULL,
    data_hora datetime NOT NULL,
    gols_mandante smallint NOT NULL,
    gols_visitante smallint NOT NULL,
    id_resultado integer REFERENCES apostas.opcao_palpite (id),   
	id_concurso integer NOT NULL REFERENCES apostas.concurso (id),
	UNIQUE (posicao, id_concurso),
	UNIQUE (mandante, visitante, id_concurso)       
);

CREATE TABLE apostas.cartao_aposta (
    id integer PRIMARY KEY,
    label varchar(32) NOT NULL,
    pago boolean NOT NULL DEFAULT FALSE,
    id_usuario integer NOT NULL REFERENCES cadastro.usuario (id),
    id_concurso integer NOT NULL REFERENCES apostas.concurso (id),
    UNIQUE (label, id_usuario, id_concurso)   
);

CREATE TABLE apostas.palpite (
    id integer PRIMARY KEY,
    data_hora datetime NOT NULL,
    ativo boolean NOT NULL DEFAULT TRUE,
    id_tipo_palpite integer REFERENCES apostas.tipo_palpite (id),   
    id_cartao_aposta integer REFERENCES apostas.cartao_aposta (id),   
	id_jogo integer NOT NULL REFERENCES apostas.jogo (id),
	UNIQUE (id_cartao_aposta, id_jogo)       
);

CREATE TABLE apostas.resultados_palpite (
	id_palpite integer NOT NULL REFERENCES apostas.palpite (id),   
	id_resultado integer NOT NULL REFERENCES apostas.opcao_palpite (id),
	PRIMARY KEY (id_palpite, id_resultado)	
);