/* Alimentar tabelas de SQL para teste */

#Insere admin
insert into USUARIO(EMAIL, NOME, SENHA, ADMIN) values('paschoalln@usp.br', 'Leo Natan Paschoal', 
	'$2y$10$TR937qgts6b6PbsstPGA3.LbPgYXzbmSHMqDYISISMJi4K5XRyTGm', 1);

# Insere Joao, senha Joao123
insert into USUARIO(EMAIL, NOME, SENHA, CEP, 
	NOME_RUA, BAIRRO, NUMERO, CIDADE, ESTADO, 
	COMPLEMENTO, DATA_NASC)
	values ('joao@gmail.com', 'Joao', '$2y$10$xFjkDFz6UaML7P02NG0I.uhuBRttvMSQVVETGFVvmciP0k8UV/.ie', 
		'13566590', 'Avenida Trabalhador Sancarlense', 
		'Parque Arnold Schimidt', 400, 'São Carlos', 
		'SP', 'Endereco da USP', 
		STR_TO_DATE('01/01/1990', '%d/%m/%Y'));


#Insere Maria, senha Maria123
insert into USUARIO(EMAIL, NOME, SENHA, CEP, 
	NOME_RUA, BAIRRO, NUMERO, CIDADE, ESTADO, 
	COMPLEMENTO, DATA_NASC)
	values ('maria@gmail.com', 'Maria', '$2y$10$tPOc9NwTJiLbqvNx3tmQn.FStRWz2E9MBuPIokzWJI1XlZj882VSu', 
		'13566590', 'Avenida Trabalhador Sancarlense', 
		'Parque Arnold Schimidt', 400, 'São Carlos', 
		'SP', 'Endereco da USP', 
		STR_TO_DATE('05/01/1990', '%d/%m/%Y'));

#Insere Jose, senha Jose123
insert into USUARIO(EMAIL, NOME, SENHA, CEP, 
	NOME_RUA, BAIRRO, NUMERO, CIDADE, ESTADO, 
	COMPLEMENTO, DATA_NASC)
	values ('jose@gmail.com', 'Jose', '$2y$10$i5RC4jZ3p87Mmayv.QFLQOfGu9OdLAA17uhfkPKOMD8E1hKm1JxtC', 
		'13566590', 'Avenida Trabalhador Sancarlense', 
		'Parque Arnold Schimidt', 400, 'São Carlos', 
		'SP', 'Endereco da USP', 
		STR_TO_DATE('05/01/1990', '%d/%m/%Y'));

#Insere Recurso de Joao
insert into RECURSO(ID_RECURSO, CADASTRADOR, TITULO, IDIOMA, DESCRICAO, 
	REPOSITORIO, VERSAO, STATUS, ENTIDADE_CONTRIBUINTE,
	FORMATO, TAMANHO, LOCALIZACAO, REQUISITOS_TECNOLOGICOS, 
	INSTRUCOES_INSTALACAO, DURACAO, TIPO_INTERATIVIDADE,
	TIPO_RECURSO, DESCRICAO_EDUCACIONAL, CUSTO, CREATIVE_COMMONS,
	COPYRIGHT) 
	values (1, 'joao@gmail.com', 'Titulo', 'Português (Brasil)',
		'Um artigo sobre teste de software', 'WordPress', '1.0',
		'Disponível', 'Labes ICMC', 'HTML', 1000, 'umlink.com.br',
		'Navegador Web', 'Nao há instalação', NULL, 'Expositiva',
		'Artigo', 'Leitura para qualquer um que desejar', 0, 
		'BY-NC', 'Labes Copyright');

#Insere autores do Recurso do Joao
insert into AUTOR_RECURSO values(1, 'joao@gmail.com');
insert into AUTOR_RECURSO values(1, 'maria@gmail.com');

#Insere palavras_chave do recurso do Joao
insert into PALAVRASCHAVE values('Artigo', 1);
insert into PALAVRASCHAVE values('Aceitação', 1);
insert into PALAVRASCHAVE values('Unidade', 1);

#Insere niveis do recurso do Joao
insert into NIVEIS values('Aceitação', 1);
insert into NIVEIS values('Unidade', 1);

#Insere técnicas do recurso de Joao
insert into TECNICA values('Teste Funcional', 1);

#Insere critérios do recurso de Joao
insert into CRITERIO values('Particionamento em classes de equivalência', 1);

#Insere Recurso de Maria
insert into RECURSO(ID_RECURSO, CADASTRADOR, TITULO, IDIOMA, DESCRICAO, 
	REPOSITORIO, VERSAO, STATUS, ENTIDADE_CONTRIBUINTE,
	FORMATO, TAMANHO, LOCALIZACAO, REQUISITOS_TECNOLOGICOS, 
	INSTRUCOES_INSTALACAO, DURACAO, TIPO_INTERATIVIDADE,
	TIPO_RECURSO, DESCRICAO_EDUCACIONAL, CUSTO, CREATIVE_COMMONS,
	COPYRIGHT) 
	values (2, 'maria@gmail.com', 'Outro Titulo', 'Português (Brasil)',
		'Um video sobre teste estrutural', 'Youtube', '2.0',
		'Disponível', 'Grupo de Pesquisa Unicamp', 'MP4', 32000, 'youtube.com.br',
		'Navegador Web', 'Nao há instalação', 60, 'Expositiva',
		'Vídeo', 'Assistir quem desejar aprender sobre teste estrutural', 0, 
		'BY-NC', 'UNICAMP Copyright');

#insere autores do Recurso de Maria
insert into AUTOR_RECURSO values(2, 'maria@gmail.com');
insert into AUTOR_RECURSO values(2, 'jose@gmail.com');

#Insere palavras_chave do recurso de Maria
insert into PALAVRASCHAVE values('Video', 2);
insert into PALAVRASCHAVE values('Estrutural', 2);

#Insere niveis do recurso de Maria
insert into NIVEIS values('Aceitação', 2);
insert into NIVEIS values('Integração', 2);
insert into NIVEIS values('Sistema', 2);

#Insere técnicas do recurso de Maria
insert into TECNICA values('Teste Estrutural', 2);

#Insere critérios do recurso de Joao
insert into CRITERIO values('Particionamento em classes de equivalência', 2);
insert into CRITERIO values('Mutação', 2);
