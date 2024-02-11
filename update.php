<?php 
    include_once('header.php'); 
    include_once('nav.php'); 

    require_once 'config.php';
    //var_dump($mysqli);

    if(isset($_GET['id']) ) {
        //echo 'voglio modificare id ' . $_GET['id'];
        $book = getBookByID($mysqli);
        //print_r($user);
    }

    function getBookByID($mysqli) {     
        $sql = "SELECT * FROM libri WHERE id = " . $_GET['id']; 
        $res = $mysqli->query($sql); // return un mysqli result
        if($res) { // Controllo se ci sono dei dati nella variabile $res 
            $result = $res->fetch_assoc(); // estraggo ogni singola riga che leggo dal DB e la inserisco in un array  
        }
        return $result;
        //var_dump($user);
    } 

?>

    <div class="container my-3">
        <h1 class="text-center">Update Page</h1>
        <form method="post" action="controller.php?action=update&id=<?=$_GET['id']?>" enctype="multipart/form-data" class="my-3">
            <div class="mb-3">
                <label for="firstname" class="form-label">Titolo</label>
                <input type="text" value="<?= $book['titolo'] ?>" class="form-control" id="titolo" placeholder="titolo..." name="titolo">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Autore</label>
                <input type="text" value="<?= $book['autore'] ?>" class="form-control" id="autore" placeholder="autore..." name="autore">
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">Anno</label>
                <input type="number" value="<?= $book['anno_pubblicazione'] ?>" class="form-control" id="anno" placeholder="anno..." name="anno">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Genere</label>
                <input type="text" value="<?= $book['genere'] ?>" class="form-control" id="genere" placeholder="genere..." name="genere">
            </div>
            
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" value="<?= $book['image'] ?>" class="form-control" id="image" placeholder="Image..." name="image">
            </div>
            <button type="submit" class="btn btn-dark">Update</button>
        </form>
    </div>
<?php include_once('footer.php'); ?>