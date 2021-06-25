DROP DATABASE IF EXISTS project;
-- create new db
CREATE DATABASE project;

-- select project  as the default database
USE project;

CREATE TABLE usertype(
    id INT NOT NULL AUTO_INCREMENT,
    type VARCHAR(255),
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    PRIMARY KEY(id)
);

-- statement to create table account
CREATE TABLE account(
    id INT NOT NULL AUTO_INCREMENT,
    type_id INT NOT NULL,
    username VARCHAR(250) UNIQUE,
    email VARCHAR(250) UNIQUE NOT NULL,
    password VARCHAR(250) NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(type_id) REFERENCES usertype(id)
);

-- statement to create table persoon
CREATE TABLE person(
    id INT NOT NULL AUTO_INCREMENT,
    account_id INT NOT NULL,
    first_name VARCHAR(250) NOT NULL,
    middle_name VARCHAR(250),
    last_name VARCHAR(250) NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(account_id) REFERENCES account(id)
);

-- insert entry into table usertype (admin)
INSERT INTO usertype VALUES (NULL, 'admin', now(), now());

-- insert entry into table usertype (user; all signed up users are by default of type user.)
INSERT INTO usertype VALUES (NULL, 'user', now(), now());

-- insert entry into table acount (assumed usertype id to be 1, might not be the case)
INSERT INTO account VALUES (NULL, 1, 'nilu', 'n.lican1@rocva.nl', MD5('admin'), now(), now());

-- insert entry into persoon, use account_id from table account (assumed account id to be 2, might not be the case)
INSERT INTO person VALUES (null, 2, 'nilu', NULL, 'lican', now(), now());