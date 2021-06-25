DROP DATABASE IF EXISTS Examenvoorbereiding;

-- create new db
CREATE DATABASE Examenvoorbereiding;
-- select users as the default database
USE Examenvoorbereiding;

-- statement to create table usertype
CREATE TABLE usertype(
    id INT NOT NULL AUTO_INCREMENT,
    type VARCHAR(255) UNIQUE NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    PRIMARY KEY(id)
);

-- statement to create table user
CREATE TABLE users(
	id INT NOT NULL AUTO_INCREMENT,
	type_id INT NOT NULL,
	email VARCHAR(255) NOT NULL UNIQUE,
	username VARCHAR(255) NOT NULL UNIQUE,
	password VARCHAR(250) NOT NULL,
	created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(type_id) REFERENCES usertype(id)
);

CREATE TABLE departments(
	id int NOT NULL AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	address VARCHAR(255) NOT NULL,
	post_code VARCHAR(255) NOT NULL,
	city VARCHAR(255) NOT NULL,
	created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE department_user(
	user_id INT,
	departments_id INT,
	FOREIGN KEY(user_id)
	REFERENCES users(id),
	FOREIGN KEY(departments_id)
	REFERENCES departments(id)
);

CREATE TABLE hours(
	id int NOT NULL AUTO_INCREMENT,
	departments_id int NOT NULL,
	user_id int NOT NULL,
	start_at DATETIME,
	end_at DATETIME,
	created_at DATETIME,
	updated_at DATETIME,
	PRIMARY KEY(id),
	FOREIGN KEY(user_id)
	REFERENCES users(id),
	FOREIGN KEY(departments_id)
	REFERENCES departments(id)
);

-- insert entries into table usertype (admin AND user)
INSERT INTO usertype VALUES 
	(NULL, 'admin', now(), now()), 
	(NULL, 'user', now(), now());

-- INSERT INTO hours VALUES (NULL, '1', '1', now(), now(), now(), now()),
--  						(NULL, '2', '1', now(), now(), now(), now());
INSERT INTO departments VALUES 
	(NULL, 'sondex', 'claravisserstraat 62', '1442 PT', 'Utrecht', now(), now()), 
	(NULL, 'coolblue', 'drechterland 15', '1446 GT', 'Amsterdam', now(), now());

 