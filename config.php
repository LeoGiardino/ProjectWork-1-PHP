<?php

    $config = [
        'mysql_host' => 'localhost',
        'mysql_user' => 'root',
        'mysql_password' => ''
    ];

    $mysqli = new mysqli(
        $config['mysql_host'],
        $config['mysql_user'],
        $config['mysql_password']);
    // Verifico la connessione al DB, se fallisce mando un errore
    if($mysqli->connect_error) { die($mysqli->connect_error); } 

    $sql = 'CREATE DATABASE IF NOT EXISTS  gestione_libreria;';
    if(!$mysqli->query($sql)) { die($mysqli->connect_error); } // Creo il mio DB
 
    $mysqli->query('USE  gestione_libreria;'); // Seleziono il DB

    // Creo la tabella
    $sql = 'CREATE TABLE IF NOT EXISTS users ( 
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        firstname VARCHAR(255) NOT NULL, 
        lastname VARCHAR(255) NOT NULL, 
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(100) NOT NULL
    )';

    if(!$mysqli->query($sql)) { die($mysqli->connect_error); }

   // Creo la tabella
   $sql = 'CREATE TABLE IF NOT EXISTS libri ( 
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    titolo VARCHAR(255) NOT NULL, 
    autore VARCHAR(255) NOT NULL, 
    anno_pubblicazione INT NOT NULL, 
    genere VARCHAR(255) NOT NULL, 
    image VARCHAR(100) NULL
)';

if(!$mysqli->query($sql)) { die($mysqli->connect_error); }


?>