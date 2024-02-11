<?php 
    include_once('header.php'); 
    include_once('nav.php'); 
?>

    <div class="container my-3">
        <h1 class="text-center">Add Book</h1>
        <form method="post" action="controller.php?action=addBook" enctype="multipart/form-data" class="my-3">
            <div class="mb-3">
                <label for="firstname" class="form-label">Totolo</label>
                <input type="text" class="form-control" id="titolo" placeholder="titolo..." name="titolo">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Autore</label>
                <input type="text" class="form-control" id="autore" placeholder="autore..." name="autore">
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">Anno di Pubblicazione</label>
                <input type="number" class="form-control" id="anno" placeholder="anno..." name="anno">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Genere</label>
                <input type="text" class="form-control" id="genere" placeholder="genere..." name="genere">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" placeholder="Image..." name="image">
            </div>
            <button type="submit" class="btn btn-dark">Aggiungi</button>
        </form>
    </div>
<?php include_once('footer.php'); ?>