DROP DATABASE IF EXISTS diak_pub;
CREATE DATABASE diak_pub;
USE diak_pub;

CREATE TABLE types(
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	type VARCHAR(20)
);

CREATE TABLE packages(
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	package VARCHAR(20)
);

CREATE TABLE drinks(
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(20),
	amount INTEGER,
	type_id INTEGER,
	quantity_id INTEGER,
	FOREIGN KEY ( type_id ) REFERENCES types( id ),
	FOREIGN KEY ( package_id ) REFERENCES packages( id )
);

INSERT INTO types (type) VALUES
( "Sörök" ),
( "Borok" ),
( "Rövid" ),
( "Üdítő" );

INSERT INTO packages (package) VALUES
( "Üveges" ),
( "Dobozos" ),
( "Hordós" ),
( "Kimért" );

INSERT INTO drinks ( drink, amount, type_id, package_id ) VALUES
( "Egri bikavér", 25, 2, 1 ),
( "Dab", 135, 1, 2 ),
( "Szilva pálinka", 30, 3, 4 ),
( "Fanta", 125, 4, 2 ),
( "Kövidinka", 3, 2, 3 );
