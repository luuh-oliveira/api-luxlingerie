create database db_luxlingerie;

use db_luxlingerie;

create table tblAdministrador (
idAdministrador Int not null auto_increment primary key,
email varchar(255) not null,
senha varchar(255) not null,
unique index(idAdministrador)
);

create table tblCliente (
idCliente Int not null auto_increment primary key,
nome varchar(200) not null,
email varchar(255) not null,
celular varchar(25),
senha varchar(45) not null,
unique index(idCliente)
);

create table tblModelo (
idModelo Int not null auto_increment primary key,
nome varchar(255) not null,
unique index(idModelo)
);

create table tblCor (
idCor Int not null auto_increment primary key,
cor varchar(255),
unique index (idCor)
);

create table tblTamanho (
idTamanho Int not null auto_increment primary key,
tamanho varchar(3),
unique index(idTamanho)
);

create table tblCompra (
idCompra Int not null auto_increment primary key,
quantidadeProduto Int not null,
valorTotal double not null,
dataCompra varchar(50),
unique index (idCompra)
);

create table tblProduto (
idProduto Int not null auto_increment primary key,
nome varchar(255) not null,
preco double not null,
quantidade int,
foto varchar (500),
descricao text not null,

idCor Int not null,
constraint FK_Produto_Cor
foreign key(idCor)
references tblCor(idCor),

idModelo Int not null,
constraint FK_Produto_Modelo
foreign key(idModelo)
references tblModelo(idModelo),

idTamanho Int not null,
constraint FK_Produto_Tamanho
foreign key(idTamanho)
references tblTamanho(idTamanho),

idCompra Int,
constraint FK_Produto_Compra
foreign key(idCompra)
references tblCompra(idCompra)

);

alter table tblProduto
	add column desconto Int not null;