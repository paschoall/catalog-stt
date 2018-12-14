create table usuario(
    id_user int not null auto_increment primary key,
    email varchar(45) not null,
    nome varchar(45) not null,
    senha varchar(255) not null,
    data_reg datetime not null default current_timestamp,
    cep varchar(9),
    nome_rua varchar(120),
    bairro varchar(100),
    numero integer,
    cidade varchar(45),
    estado varchar(45),
    pais varchar(45) default 'Brasil',
    complemento varchar(100),
    admin boolean not null default false,
    UNIQUE(email)
);