CREATE SCHEMA cadastros;

CREATE TABLE cadastros.banco (
    id integer PRIMARY KEY,
    codigo smallint NOT NULL UNIQUE,
    nome varchar(128) NOT NULL UNIQUE
);
CREATE SEQUENCE cadastros.banco_sequence START 1;

CREATE TABLE cadastros.dados_bancario (
    id integer PRIMARY KEY,
    agencia varchar(10) NOT NULL,
    conta varchar(10) NOT NULL,
    informacoes_complementares varchar(256),
    id_banco integer NOT NULL REFERENCES cadastros.banco (id)
);
CREATE SEQUENCE cadastros.dados_bancario_sequence START 1;

CREATE TABLE cadastros.usuario (
    id integer PRIMARY KEY,
    nome varchar(128) NOT NULL UNIQUE,
    cpf numeric(11) NOT NULL UNIQUE,
    email varchar(128) NOT NULL UNIQUE,
    senha varchar(32) NOT NULL,
    ativo boolean NOT NULL DEFAULT TRUE,
    id_dados_bancario integer NOT NULL REFERENCES cadastros.dados_bancario (id)
);
CREATE SEQUENCE cadastros.usuario_sequence START 1;

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
CREATE SEQUENCE apostas.possibilidade_aposta_sequence START 1;

CREATE TABLE apostas.concurso (
    id integer PRIMARY KEY,
    codigo smallint NOT NULL UNIQUE,
    data_inicio date NOT NULL UNIQUE,
    data_fim date NOT NULL UNIQUE,
    img_cartao_aposta_final BYTEA,
    ativo boolean NOT NULL DEFAULT TRUE,
    id_possibilidade_aposta integer NOT NULL REFERENCES apostas.possibilidade_aposta (id)   
);
CREATE SEQUENCE apostas.concurso_sequence START 1;

CREATE TABLE apostas.jogo (
    id integer PRIMARY KEY,
    posicao smallint NOT NULL,
    mandante varchar(32) NOT NULL,
    visitante varchar(32) NOT NULL,
    data_hora timestamp NOT NULL,
    gols_mandante smallint NOT NULL,
    gols_visitante smallint NOT NULL,
    id_resultado integer REFERENCES apostas.opcao_palpite (id),   
	id_concurso integer NOT NULL REFERENCES apostas.concurso (id),
	UNIQUE (posicao, id_concurso),
	UNIQUE (mandante, visitante, id_concurso)       
);
CREATE SEQUENCE apostas.jogo_sequence START 1;

CREATE TABLE apostas.cartao_aposta (
    id integer PRIMARY KEY,
    label varchar(32) NOT NULL,
    pago boolean NOT NULL DEFAULT FALSE,
    id_usuario integer NOT NULL REFERENCES cadastros.usuario (id),
    id_concurso integer NOT NULL REFERENCES apostas.concurso (id),
    UNIQUE (label, id_usuario, id_concurso)   
);
CREATE SEQUENCE apostas.cartao_aposta_sequence START 1;

CREATE TABLE apostas.palpite (
    id integer PRIMARY KEY,
    data_hora timestamp NOT NULL,
    ativo boolean NOT NULL DEFAULT TRUE,
    id_tipo_palpite integer REFERENCES apostas.tipo_palpite (id),   
    id_cartao_aposta integer REFERENCES apostas.cartao_aposta (id),   
	id_jogo integer NOT NULL REFERENCES apostas.jogo (id),
	UNIQUE (id_cartao_aposta, id_jogo)       
);
CREATE SEQUENCE apostas.palpite_sequence START 1;

CREATE TABLE apostas.resultados_palpite (
	id_palpite integer NOT NULL REFERENCES apostas.palpite (id),   
	id_resultado integer NOT NULL REFERENCES apostas.opcao_palpite (id),
	PRIMARY KEY (id_palpite, id_resultado)	
);

-- ALIMENTACAO DAS TABELAS DE DOMINIO

INSERT INTO cadastros.banco (id, codigo, nome) 
	VALUES  (nextval('cadastros.banco_sequence'), 1,	'Banco do Brasil S.A.'),
			(nextval('cadastros.banco_sequence'), 3,	'Banco da Amazônia S.A.'),
			(nextval('cadastros.banco_sequence'), 4,	'Banco do Nordeste do Brasil S.A.'),
			(nextval('cadastros.banco_sequence'), 12,	'Banco INBURSA de Investimentos S.A.'),
			(nextval('cadastros.banco_sequence'), 17,	'BNY Mellon Banco S.A.'),
			(nextval('cadastros.banco_sequence'), 21,	'BANESTES S.A. Banco do Estado do Espírito Santo'),
			(nextval('cadastros.banco_sequence'), 24,	'Banco BANDEPE S.A.'),
			(nextval('cadastros.banco_sequence'), 25,	'Banco Alfa S.A.'),
			(nextval('cadastros.banco_sequence'), 29,	'Banco Itaú Consignado S.A.'),
			(nextval('cadastros.banco_sequence'), 33,	'Banco Santander  (Brasil)  S.A.'),
			(nextval('cadastros.banco_sequence'), 36,	'Banco Bradesco BBI S.A.'),
			(nextval('cadastros.banco_sequence'), 37,	'Banco do Estado do Pará S.A.'),
			(nextval('cadastros.banco_sequence'), 40,	'Banco Cargill S.A.'),
			(nextval('cadastros.banco_sequence'), 41,	'Banco do Estado do Rio Grande do Sul S.A.'),
			(nextval('cadastros.banco_sequence'), 47,	'Banco do Estado de Sergipe S.A.'),
			(nextval('cadastros.banco_sequence'), 62,	'Hipercard Banco Múltiplo S.A.'),
			(nextval('cadastros.banco_sequence'), 63,	'Banco Bradescard S.A.'),
			(nextval('cadastros.banco_sequence'), 64,	'Goldman Sachs do Brasil Banco Múltiplo S.A.'),
			(nextval('cadastros.banco_sequence'), 65,	'Banco Andbank (Brasil) S.A.'),
			(nextval('cadastros.banco_sequence'), 70,	'BRB - Banco de Brasília S.A.'),
			(nextval('cadastros.banco_sequence'), 74,	'Banco J. Safra S.A.'),
			(nextval('cadastros.banco_sequence'), 75,	'Banco ABN AMRO S.A.'),
			(nextval('cadastros.banco_sequence'), 77,	'Banco Inter S.A.'),
			(nextval('cadastros.banco_sequence'), 81,	'BBN Banco Brasileiro de Negócios S.A.'),
			(nextval('cadastros.banco_sequence'), 82,	'Banco Topázio S.A.'),
			(nextval('cadastros.banco_sequence'), 83,	'Banco da China Brasil S.A.'),
			(nextval('cadastros.banco_sequence'), 94,	'Banco Finaxis S.A.'),
			(nextval('cadastros.banco_sequence'), 95,	'Banco Confidence de Câmbio S.A.'),
			(nextval('cadastros.banco_sequence'), 96,	'Banco B3 S.A.'),
			(nextval('cadastros.banco_sequence'), 104,	'Caixa Econômica Federal'),
			(nextval('cadastros.banco_sequence'), 107,	'Banco BOCOM BBM S.A.'),
			(nextval('cadastros.banco_sequence'), 118,	'Standard Chartered Bank (Brasil) S/A–Bco Invest.'),
			(nextval('cadastros.banco_sequence'), 119,	'Banco Western Union do Brasil S.A.'),
			(nextval('cadastros.banco_sequence'), 120,	'Banco Rodobens S.A.'),
			(nextval('cadastros.banco_sequence'), 121,	'Banco Agibank S.A.'),
			(nextval('cadastros.banco_sequence'), 125,	'Brasil Plural S.A. - Banco Múltiplo'),
			(nextval('cadastros.banco_sequence'), 128,	'MS Bank S.A. Banco de Câmbio'),
			(nextval('cadastros.banco_sequence'), 129,	'UBS Brasil Banco de Investimento S.A.'),
			(nextval('cadastros.banco_sequence'), 144,	'BEXS Banco de Câmbio S.A.'),
			(nextval('cadastros.banco_sequence'), 169,	'Banco Olé Bonsucesso Consignado S.A.'),
			(nextval('cadastros.banco_sequence'), 184,	'Banco Itaú BBA S.A.'),
			(nextval('cadastros.banco_sequence'), 204,	'Banco Bradesco Cartões S.A.'),
			(nextval('cadastros.banco_sequence'), 208,	'Banco BTG Pactual S.A.'),
			(nextval('cadastros.banco_sequence'), 212,	'Banco Original S.A.'),
			(nextval('cadastros.banco_sequence'), 217,	'Banco John Deere S.A.'),
			(nextval('cadastros.banco_sequence'), 218,	'Banco BS2 S.A.'),
			(nextval('cadastros.banco_sequence'), 222,	'Banco Credit Agricole Brasil S.A.'),
			(nextval('cadastros.banco_sequence'), 224,	'Banco Fibra S.A.'),
			(nextval('cadastros.banco_sequence'), 233,	'Banco Cifra S.A.'),
			(nextval('cadastros.banco_sequence'), 237,	'Banco Bradesco S.A.'),
			(nextval('cadastros.banco_sequence'), 246,	'Banco ABC Brasil S.A.'),
			(nextval('cadastros.banco_sequence'), 248,	'Banco Boavista Interatlântico S.A.'),
			(nextval('cadastros.banco_sequence'), 249,	'Banco Investcred Unibanco S.A.'),
			(nextval('cadastros.banco_sequence'), 250,	'BCV - Banco de Crédito e Varejo S.A.'),
			(nextval('cadastros.banco_sequence'), 254,	'Paraná Banco S.A.'),
			(nextval('cadastros.banco_sequence'), 263,	'Banco Cacique S.A.'),
			(nextval('cadastros.banco_sequence'), 265,	'Banco Fator S.A.'),
			(nextval('cadastros.banco_sequence'), 318,	'Banco BMG S.A.'),
			(nextval('cadastros.banco_sequence'), 320,	'China Construction Bank (Brasil) Banco Múltiplo S.A.'),
			(nextval('cadastros.banco_sequence'), 341,	'Itaú Unibanco S.A.'),
			(nextval('cadastros.banco_sequence'), 366,	'Banco Société Générale Brasil S.A.'),
			(nextval('cadastros.banco_sequence'), 370,	'Banco Mizuho do Brasil S.A.'),
			(nextval('cadastros.banco_sequence'), 376,	'Banco J. P. Morgan S.A.'),
			(nextval('cadastros.banco_sequence'), 389,	'Banco Mercantil do Brasil S.A.'),
			(nextval('cadastros.banco_sequence'), 394,	'Banco Bradesco Financiamentos S.A.'),
			(nextval('cadastros.banco_sequence'), 399,	'Kirton Bank S.A. - Banco Múltiplo'),
			(nextval('cadastros.banco_sequence'), 422,	'Banco Safra S.A.'),
			(nextval('cadastros.banco_sequence'), 456,	'Banco MUFG Brasil S.A.'),
			(nextval('cadastros.banco_sequence'), 464,	'Banco Sumitomo Mitsui Brasileiro S.A.'),
			(nextval('cadastros.banco_sequence'), 473,	'Banco Caixa Geral - Brasil S.A.'),
			(nextval('cadastros.banco_sequence'), 477,	'Citibank N.A.'),
			(nextval('cadastros.banco_sequence'), 479,	'Banco ItauBank S.A'),
			(nextval('cadastros.banco_sequence'), 487,	'Deutsche Bank S.A. - Banco Alemão'),
			(nextval('cadastros.banco_sequence'), 488,	'JPMorgan Chase Bank, National Association'),
			(nextval('cadastros.banco_sequence'), 492,	'ING Bank N.V.'),
			(nextval('cadastros.banco_sequence'), 505,	'Banco Credit Suisse (Brasil) S.A.'),
			(nextval('cadastros.banco_sequence'), 600,	'Banco Luso Brasileiro S.A.'),
			(nextval('cadastros.banco_sequence'), 604,	'Banco Industrial do Brasil S.A.'),
			(nextval('cadastros.banco_sequence'), 610,	'Banco VR S.A.'),
			(nextval('cadastros.banco_sequence'), 611,	'Banco Paulista S.A.'),
			(nextval('cadastros.banco_sequence'), 612,	'Banco Guanabara S.A.'),
			(nextval('cadastros.banco_sequence'), 623,	'Banco PAN S.A.'),
			(nextval('cadastros.banco_sequence'), 633,	'Banco Rendimento S.A.'),
			(nextval('cadastros.banco_sequence'), 634,	'Banco Triângulo S.A.'),
			(nextval('cadastros.banco_sequence'), 641,	'Banco Alvorada S.A.'),
			(nextval('cadastros.banco_sequence'), 643,	'Banco Pine S.A.'),
			(nextval('cadastros.banco_sequence'), 652,	'Itaú Unibanco Holding S.A.'),
			(nextval('cadastros.banco_sequence'), 653,	'Banco Indusval S.A.'),
			(nextval('cadastros.banco_sequence'), 655,	'Banco Votorantim S.A.'),
			(nextval('cadastros.banco_sequence'), 707,	'Banco Daycoval S.A.'),
			(nextval('cadastros.banco_sequence'), 719,	'Banif-Banco Internacional do Funchal (Brasil)S.A.'),
			(nextval('cadastros.banco_sequence'), 739,	'Banco Cetelem S.A.'),
			(nextval('cadastros.banco_sequence'), 743,	'Banco Semear S.A.'),
			(nextval('cadastros.banco_sequence'), 745,	'Banco Citibank S.A.'),
			(nextval('cadastros.banco_sequence'), 746,	'Banco Modal S.A.'),
			(nextval('cadastros.banco_sequence'), 747,	'Banco Rabobank International Brasil S.A.'),
			(nextval('cadastros.banco_sequence'), 748,	'Banco Cooperativo Sicredi S.A.'),
			(nextval('cadastros.banco_sequence'), 751,	'Scotiabank Brasil S.A. Banco Múltiplo'),
			(nextval('cadastros.banco_sequence'), 752,	'Banco BNP Paribas Brasil S.A.'),
			(nextval('cadastros.banco_sequence'), 755,	'Bank of America Merrill Lynch Banco Múltiplo S.A.'),
			(nextval('cadastros.banco_sequence'), 756,	'Banco Cooperativo do Brasil S.A. - BANCOOB');

INSERT INTO apostas.opcao_palpite (id, descricao) 
	VALUES (1, 'VITORIA_MANDANTE'),
			(2, 'EMPATE'),
			(3, 'VITORIA_VISITANTE');

INSERT INTO apostas.tipo_palpite (id, descricao) 
	VALUES (1, 'SIMPLES'),
			(2, 'DUPLO'),
			(3, 'TRIPLO');

INSERT INTO apostas.possibilidade_aposta (id, quantidade_duplos, quantidade_triplos, valor) 
	VALUES  (nextval('apostas.possibilidade_aposta_sequence'),  1,	0,	2  ),  
			(nextval('apostas.possibilidade_aposta_sequence'), 2,	0,	4  ),  
			(nextval('apostas.possibilidade_aposta_sequence'), 3,	0,	8  ),  
			(nextval('apostas.possibilidade_aposta_sequence'), 4,	0,	16 ),   
			(nextval('apostas.possibilidade_aposta_sequence'), 5,	0,	32 ),   
			(nextval('apostas.possibilidade_aposta_sequence'), 6,	0,	64 ),   
			(nextval('apostas.possibilidade_aposta_sequence'), 7,	0,	128),    
			(nextval('apostas.possibilidade_aposta_sequence'), 8,	0,	256),    
			(nextval('apostas.possibilidade_aposta_sequence'), 9,	0,	512),    
			(nextval('apostas.possibilidade_aposta_sequence'), 0,	1,	3  ),  
			(nextval('apostas.possibilidade_aposta_sequence'), 1,	1,	6  ),  
			(nextval('apostas.possibilidade_aposta_sequence'), 2,	1,	12 ),   
			(nextval('apostas.possibilidade_aposta_sequence'), 3,	1,	24 ),   
			(nextval('apostas.possibilidade_aposta_sequence'), 4,	1,	48 ),   
			(nextval('apostas.possibilidade_aposta_sequence'), 5,	1,	96 ),   
			(nextval('apostas.possibilidade_aposta_sequence'), 6,	1,	192),    
			(nextval('apostas.possibilidade_aposta_sequence'), 7,	1,	384),    
			(nextval('apostas.possibilidade_aposta_sequence'), 8,	1,	768),    
			(nextval('apostas.possibilidade_aposta_sequence'), 0,	2,	9  ),  
			(nextval('apostas.possibilidade_aposta_sequence'), 1,	2,	18 ),   
			(nextval('apostas.possibilidade_aposta_sequence'), 2,	2,	36 ),   
			(nextval('apostas.possibilidade_aposta_sequence'), 3,	2,	72 ),   
			(nextval('apostas.possibilidade_aposta_sequence'), 4,	2,	144),    
			(nextval('apostas.possibilidade_aposta_sequence'), 5,	2,	288),    
			(nextval('apostas.possibilidade_aposta_sequence'), 6,	2,	576),    
			(nextval('apostas.possibilidade_aposta_sequence'), 0,	3,	27 ),   
			(nextval('apostas.possibilidade_aposta_sequence'), 1,	3,	54 ),   
			(nextval('apostas.possibilidade_aposta_sequence'), 2,	3,	108),    
			(nextval('apostas.possibilidade_aposta_sequence'), 3,	3,	216),    
			(nextval('apostas.possibilidade_aposta_sequence'), 4,	3,	432),    
			(nextval('apostas.possibilidade_aposta_sequence'), 5,	3,	864),    
			(nextval('apostas.possibilidade_aposta_sequence'), 0,	4,	81 ),   
			(nextval('apostas.possibilidade_aposta_sequence'), 1,	4,	162),    
			(nextval('apostas.possibilidade_aposta_sequence'), 2,	4,	324),    
			(nextval('apostas.possibilidade_aposta_sequence'), 3,	4,	648),    
			(nextval('apostas.possibilidade_aposta_sequence'), 0,	5,	243),    
			(nextval('apostas.possibilidade_aposta_sequence'), 1,	5,	486),    
			(nextval('apostas.possibilidade_aposta_sequence'), 0,	6,	729);
	