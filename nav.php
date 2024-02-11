<nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Book Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                </ul>
            <span class="navbar-text">
                <?php 
                    if(!isset($_SESSION['userLogin'])){ ?>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="login.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="register.php">Register</a>
                            </li>
                        </ul>
                    <?php } else { ?>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="detail.php">
                                    <img src="https://cdn-icons-png.flaticon.com/128/924/924915.png" width="35" >
                                </a>
                            </li> 
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="controller.php?action=logout">Logout</a> 
                            </li>
                        </ul>
                    <?php } ?>
            </span>
            </div>
        </div>
    </nav>