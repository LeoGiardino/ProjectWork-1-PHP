<?php

session_start();

//print_r($_SESSION);
/* $contacts = [];
if(isset($_SESSION['contacts'])){
    $contacts = $_SESSION['contacts'];
}*/

if (!isset($_SESSION['userLogin'])) {
    exit(header('Location: http://localhost/PHP-IFOA/ProjectWork-1-PHP/login.php'));
}

session_write_close();


require_once 'config.php';
//var_dump($mysqli);

include_once('function.php');
include_once('header.php');
include_once('nav.php');





$books = getAllBooks($mysqli);

?>

<div class="container my-3">
    <h1 class="text-center">Book Store</h1>
    <div >

        <a class="btn btn-warning ms-auto mb-4" href="addBook.php" role="button">Aggiungi Libro</a>
    </div>

    <div class="container my-3 d-flex justify-content-between">
    <?php
    if ($books) {
        foreach ($books as $key => $book) {
            ?>
            <div class="card" style="width: 18rem;">
                <img src="<?= $book['image'] ?>" class="card-img-top image-card" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $book['titolo'] ?></h5>
                    <p class="mb-0"><?= $book['autore'] ?></p>
                    <p class="mb-0"><?= $book['anno_pubblicazione'] ?></p>
                    <p class="mb-0"><?= $book['genere'] ?></p>
                </div>
                
                <div class="card-body pt-0">
                    <a class="btn btn-warning" href="update.php?id=<?= $book['id'] ?>" role="button">Modifica</a>
                    <a class="btn btn-danger" href="controller.php?action=delete&id=<?= $book['id'] ?>" role="button">Elimina</a>
                </div>
            </div>

            

        <?php }
    } ?>
    </div>

</div>

