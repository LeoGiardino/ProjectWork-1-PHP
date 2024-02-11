<?php

    session_start();
    include_once('header.php');
    include_once('nav.php');

    if (isset($_SESSION['registration_success']) && $_SESSION['registration_success']) {
        echo '<p class="alert alert-success text-center">Registrazione avvenuta con successo!</p>';
        // Una volta mostrato il messaggio, rimuovi il flag dalla sessione
        unset($_SESSION['registration_success']);
    }
?>

<div class="container my-3">
    <h1 class="text-center">Login Page</h1>
    <form method="post" action="controller.php?action=login" class="my-3">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Email..." name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password..." name="password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<?php include_once('footer.php'); ?>