<?php 
    include_once('header.php'); 
    include_once('nav.php'); 
?>

    <div class="container my-3">
        <h1 class="text-center">Register Page</h1>
        <form method="post" action="controller.php" class="my-3">
            <div class="mb-3">
                <label for="firstname" class="form-label">Firstname</label>
                <input type="text" class="form-control" id="firstname" placeholder="Firstname..." name="firstname">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Lastname</label>
                <input type="text" class="form-control" id="lastname" placeholder="Lastname..." name="lastname">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email..." name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password..." name="password">
            </div>
          
            <button type="submit" class="btn btn-dark">Register</button>
        </form>
    </div>
<?php include_once('footer.php'); ?>