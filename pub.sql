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
