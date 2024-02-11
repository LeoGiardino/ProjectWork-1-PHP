<?php

function getAllBooks($mysqli)
{
    $result = [];
    $sql = "SELECT * FROM libri;";
    $res = $mysqli->query($sql); // return un mysqli result
    if ($res) { // Controllo se ci sono dei dati nella variabile $res
        while ($row = $res->fetch_assoc()) { // Trasformo $res in un array associativo
            $result[] = $row; // estraggo ogni singola riga che leggo dal DB e la inserisco in un array
            //array_push($contacts, $row); // estraggo ogni singola riga che leggo dal DB e la inserisco in un array
        }
    }
    return $result;
}

function createUser($mysqli, $firstname, $lastname, $email, $password)
{
    $sql = "INSERT INTO users (firstname, lastname, email, password) 
                VALUES ('$firstname', '$lastname', '$email', '$password');";
    if (!$mysqli->query($sql)) {
        echo ($mysqli->connect_error);
    } else {
        $_SESSION['registration_success'] = true;
        echo 'Record aggiunto con successo!!!';
    }
}

function removeBook($mysqli, $id) {
    if(!$mysqli->query('DELETE FROM libri WHERE id = ' . $id)) { echo($mysqli->connect_error); }
    else { echo 'Record eliminato con successo!!!';}
}

function updateBook($mysqli, $titolo, $autore, $anno_pubblicazione, $genere, $image) {
    $sql = "UPDATE libri SET 
            titolo = '$titolo',
            autore = '$autore',
            anno_pubblicazione = '$anno_pubblicazione',
            genere = '$genere',
            image = '$image'
            WHERE id = " . $_GET['id'];
        if(!$mysqli->query($sql)) { echo($mysqli->connect_error); }
        else { echo 'Record aggiornato con successo!!!';}
}

function login($mysqli, $email, $password) {
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $res = $mysqli->query($sql);
    //var_dump($res);
    if($res) { // Controllo se ci sono dei dati nella variabile $res 
        $result = $res->fetch_assoc(); // estraggo ogni singola riga che leggo dal DB e la inserisco in un array  
    }
    //var_dump($result['password']);
    if(password_verify($password, $result['password'])){
        echo 'Login effettuato!!';
        $_SESSION['userLogin'] = $result;
        session_write_close();
        exit(header('Location: http://localhost/PHP-IFOA/ProjectWork-1-PHP/index.php'));
    } else {
        echo 'Password errata!!';
    }
}

function addBook($mysqli, $titolo, $autore, $anno_pubblicazione, $genere, $image) {
    $user = $_SESSION['userLogin']['id'];
    if($user) {
        $sql = "INSERT INTO libri (titolo, autore, anno_pubblicazione, genere, image) 
        VALUES ('$titolo', '$autore', '$anno_pubblicazione', '$genere', '$image');";
        if (!$mysqli->query($sql)) {
            echo ($mysqli->connect_error);

        }else {
            echo 'Record aggiunto con successo!!!';
        }
    }
}


