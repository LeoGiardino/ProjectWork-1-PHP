<?php
session_start();
//var_dump($_REQUEST);

require_once 'config.php';
//var_dump($mysqli);

include_once('function.php');

if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'login') {
    echo 'Sono nella sezione login';
    login($mysqli, $_REQUEST['email'], $_REQUEST['password']);
    exit(header('Location: http://localhost/PHP-IFOA/ProjectWork-1-PHP/index.php'));
} else if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'logout') {
    echo 'Sono nella sezione logout';
    session_unset();
    exit(header('Location: http://localhost/PHP-IFOA/ProjectWork-1-PHP/login.php'));
}

// $contacts = [];
//$target_dir = "uploads/";
//$image = $target_dir.$_FILES['image']['name'];

// if(!empty($_FILES['image'])) {
//     if($_FILES['image']["type"] === 'image/png' || $_FILES['image']["type"] === 'image/jpg') {
//         if($_FILES['image']["size"] < 4000000) {
//             if(is_uploaded_file($_FILES['image']["tmp_name"]) && $_FILES['image']["error"] === UPLOAD_ERR_OK) {
//                 if(move_uploaded_file($_FILES['image']["tmp_name"], $target_dir.$_FILES['image']['name'])) {
//                     $image = $target_dir.$_FILES['image']['name'];
//                     echo 'Caricamento avvenuto con successo';
//                 } else {
//                     echo 'Errore durante il caricamento dell\'immagine';
//                 }
//             }
//         } else {
//             echo 'Dimensione del file troppo grande';
//         }
//     } else {
//         echo 'Tipo di file non supportato';
//     }
// }




if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'delete') {
    removeBook($mysqli, $_REQUEST['id']);
    exit(header('Location: http://localhost/PHP-IFOA/ProjectWork-1-PHP/'));

} else if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'addBook') {
    var_dump($_FILES);

    // Verifica se il form è stato inviato

    // Verifica se è stato caricato un file
    if (isset($_FILES["image"])) {
        $target_dir = "uploads/"; // Directory di destinazione per il caricamento delle immagini
        $target_file = $target_dir . basename($_FILES["image"]["name"]); // Percorso completo del file da caricare

        // Tentativo di caricamento dell'immagine
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = $target_file;

            $titolo = strlen(trim(htmlspecialchars($_REQUEST['titolo']))) > 2 ? trim(htmlspecialchars($_REQUEST['titolo'])) : exit();
            $autore = strlen(trim(htmlspecialchars($_REQUEST['autore']))) > 2 ? trim(htmlspecialchars($_REQUEST['autore'])) : exit();
            $genere = strlen(trim(htmlspecialchars($_REQUEST['genere']))) > 2 ? trim(htmlspecialchars($_REQUEST['genere'])) : exit();

            addBook($mysqli, $titolo, $autore, $_REQUEST['anno'], $genere, $image);
            exit(header('Location: http://localhost/PHP-IFOA/ProjectWork-1-PHP/'));
        }
    }


} else if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'update') {
    // fare i controlli di validazione dei campi
    $regexphone = '/(?:([+]\d{1,4})[-.\s]?)?(?:[(](\d{1,3})[)][-.\s]?)?(\d{1,4})[-.\s]?(\d{1,4})[-.\s]?(\d{1,9})/';
    preg_match_all($regexphone, htmlspecialchars($_REQUEST['phone']), $matches, PREG_SET_ORDER, 0);
    $regexemail = '/^((?!\.)[\w\-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/m';
    preg_match_all($regexemail, htmlspecialchars($_REQUEST['email']), $matchesEmail, PREG_SET_ORDER, 0);
    $regexPass = '/^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{6,})\S$/';
    preg_match_all($regexPass, htmlspecialchars($_REQUEST['password']), $matchesPass, PREG_SET_ORDER, 0);

    if (isset($_FILES["image"])) {
        $target_dir = "uploads/"; // Directory di destinazione per il caricamento delle immagini
        $target_file = $target_dir . basename($_FILES["image"]["name"]); // Percorso completo del file da caricare

        // Tentativo di caricamento dell'immagine
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = $target_file;

            $titolo = strlen(trim(htmlspecialchars($_REQUEST['titolo']))) > 2 ? trim(htmlspecialchars($_REQUEST['titolo'])) : exit();
            $autore = strlen(trim(htmlspecialchars($_REQUEST['autore']))) > 2 ? trim(htmlspecialchars($_REQUEST['autore'])) : exit();
            $genere = strlen(trim(htmlspecialchars($_REQUEST['genere']))) > 2 ? trim(htmlspecialchars($_REQUEST['genere'])) : exit();

            updateBook($mysqli, $titolo, $autore, $_REQUEST['anno'], $genere, $image);
            exit(header('Location: http://localhost/PHP-IFOA/ProjectWork-1-PHP/'));
        }
    }

} else {

    // fare i controlli di validazione dei campi
    $regexemail = '/^((?!\.)[\w\-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/m';
    preg_match_all($regexemail, htmlspecialchars($_REQUEST['email']), $matchesEmail, PREG_SET_ORDER, 0);
    $regexPass = '/^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{6,})\S$/';
    preg_match_all($regexPass, htmlspecialchars($_REQUEST['password']), $matchesPass, PREG_SET_ORDER, 0);

    $firstname = strlen(trim(htmlspecialchars($_REQUEST['firstname']))) > 2 ? trim(htmlspecialchars($_REQUEST['firstname'])) : exit();
    $lastname = strlen(trim(htmlspecialchars($_REQUEST['lastname']))) > 2 ? trim(htmlspecialchars($_REQUEST['lastname'])) : exit();
    $email = $matchesEmail ? htmlspecialchars($_REQUEST['email']) : exit();
    $pass = $matchesPass ? htmlspecialchars($_REQUEST['password']) : exit();
    $password = password_hash($pass, PASSWORD_DEFAULT);

    createUser($mysqli, $firstname, $lastname, $email, $password);
    exit(header('Location: http://localhost/PHP-IFOA/ProjectWork-1-PHP/login.php'));
}




//include_once('mail.php'); 


?>