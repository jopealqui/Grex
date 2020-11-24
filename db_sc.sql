CREATE DATABASE DB_SC;

CREATE TABLE Usuario (
    ID_User INT NOT NULL AUTO_INCREMENT,
    Nome TEXT NOT NULL,
    Email VARCHAR (200) NOT NULL,
    Senha VARCHAR (30) NOT NULL,
    Data_nasc DATE NOT NULL,
    Cidade TEXT NOT NULL,
    Limitacao TEXT NOT NULL,
    Acompanhante BOOLEAN NOT NULL,
    PRIMARY KEY (ID_User)
) CHARSET = utf8 ;

CREATE TABLE Carro (
    ID_Carro INT NOT NULL AUTO_INCREMENT,
    Modelo TEXT NOT NULL,
    Ano TEXT NOT NULL,
    Placa TEXT NOT NULL,
    Lugares TEXT NOT NULL,
    Cor TEXT NOT NULL,
    PRIMARY KEY (ID_Carro)
) CHARSET = utf8;

CREATE TABLE Motorista (
    ID_Motorista INT NOT NULL AUTO_INCREMENT,
    Nome TEXT NOT NULL,
    Email VARCHAR (200) NOT NULL,
    Senha VARCHAR (30) NOT NULL,
    Data_nasc DATE NOT NULL,
    Cidade TEXT NOT NULL,
    CNH INT NOT NULL,
    RG  INT NOT NULL,
    CPF INT NOT NULL,
    PRIMARY KEY (ID_Motorista)
) CHARSET = utf8 ;

CREATE TABLE Localização (
    ID_Localização INT NOT NULL AUTO_INCREMENT,
    Logradouro TEXT NOT NULL,
    Número INT NOT NULL,
    CEP INT NOT NULL,
    PRIMARY KEY (ID_Localização)
) CHARSET = utf8;