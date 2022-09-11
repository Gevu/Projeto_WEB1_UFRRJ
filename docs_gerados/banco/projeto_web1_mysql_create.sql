CREATE DATABASE projetoweb1;
USE projetoweb1;

CREATE TABLE 'Cliente' (
    'matricula' bigint NOT NULL,
    'nome' varchar(255) NOT NULL,
    'email' varchar(255) NOT NULL,
    'data_nasc' date NOT NULL,
    'senha' varchar(255) NOT NULL,
    'campus' int NOT NULL,
    'curso' int NOT NULL,
    'tipo' int NOT NULL
);

CREATE TABLE 'Projeto' (
    'id' int NOT NULL AUTO_INCREMENT,
    'nome' varchar(255) NOT NULL,
    'curso' int NOT NULL,
    'horas_conc' int,
    'certificado' varbinary(max)
)

CREATE TABLE 'Relatório' (
    'id' int NOT NULL AUTO_INCREMENT,
    'data envio' date NOT NULL AUTO_INCREMENT,
    'horas_atribuidas' int,
    'validado' boolean NOT_NULL,
    'matricula_cliente' bigint NOT NUll,
    'id_projeto' int NOT NULL,
)

CREATE TABLE 'Participa' (
    'matricula_cliente' bigint NOT NUll,
    'id_projeto' int NOT NULL, 
)