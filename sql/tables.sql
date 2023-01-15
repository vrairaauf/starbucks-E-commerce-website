CREATE DATABASE IF NOT EXISTS starbux;
/*-----------------------------------------*/
CREATE TABLE IF NOT EXISTS Users(

	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(20) NOT NULL,
	family_name VARCHAR(20) NOT NULL,
	email VARCHAR(50) NOT NULL,
	password VARCHAR(500) NOT NULL,
	city VARCHAR(20) NOT NULL,
	adress VARCHAR(50) NOT NULL,
	zip_code VARCHAR(5) NOT NULL,
	created_at DATE NOT NULL,
	PRIMARY KEY(id)

);
/*-----------------------------------------*/
CREATE TABLE IF NOT EXISTS Admins(

	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(20) NOT NULL,
	family_name VARCHAR(20) NOT NULL,
	email VARCHAR(50) NOT NULL,
	password VARCHAR(500) NOT NULL,
	created_at DATE NOT NULL,
	PRIMARY KEY(id)

);
/*----------------------------------------------*/
CREATE TABLE IF NOT EXISTS Coffee(
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(50) NOT NULL,
	libelle VARCHAR(250) NOT NULL,
	image_name VARCHAR(50) NOT NULL,
	price FLOAT NOT NULL,
	currency VARCHAR(5) NOT NULL DEFAULT 'TND',
	PRIMARY KEY(id)
);

/*---------------------------------------------*/
CREATE TABLE IF NOT EXISTS Commandes(

	id INT NOT NULL AUTO_INCREMENT,
	customer_id INT NOT NULL,
	price FLOAT NOT NULL,
	delivred VARCHAR(5) NOT NULL DEFAULT 'non',
	delivred_by INT,
	created_at DATETIME NOT NULL,
	delivred_at DATETIME,
	PRIMARY KEY(id),
	FOREIGN KEY (customer_id) REFERENCES Users(id),
	FOREIGN KEY (delivred_by) REFERENCES Admins(id)

);
/*-----------------------------------------------*/
CREATE TABLE IF NOT EXISTS Coffee_Per_Commande(

	id INT NOT NULL AUTO_INCREMENT,
	quantity INT NOT NULL DEFAULT 1,
	coffee_id INT NOT NULL,
	commande_id INT NOT NULL,	
	PRIMARY KEY(id),
	FOREIGN KEY (coffee_id) REFERENCES Coffee(id),
	FOREIGN KEY (commande_id) REFERENCES Commandes(id)
	
);