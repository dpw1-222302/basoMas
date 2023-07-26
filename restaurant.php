<?php
include 'connect.php'
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baso Mas</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    $id = $_GET['idResto'];
    $query = "SELECT * FROM restaurant WHERE resto_id = '$id'";
    $datas = $conn->query($query);
    foreach ($datas as $data):
    endforeach ?>
    <nav class="sticky-top navbar navbar-expand-lg navbar-light bg-light topnav">

        <a class="navbar-brand" href="index.php">
            <img class="logo" src="assets/img/logo.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#fan-review">Fan Reviews</a>
                </li>

                <?php
                session_start();

                if (!empty($_SESSION['email'])) {
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= $_SESSION['nama_lengkap'] ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                    <?php
                } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#loginModal" data-toggle="modal">Sign In</a>
                    </li>
                    <?php
                } ?>
            </ul>
        </div>
    </nav>


    <main class="pt-4">
        <div class="container">
            <div class="row">
                <!-- konten reviewnya -->
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb badge-light">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Restaurant</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?= $data['nama_resto'] ?>
                            </li>
                        </ol>
                    </nav>

                    <!-- nama restoran -->
                    <div class="container">
                        <h1 class="font-weight-bold">
                            <?= $data['nama_resto'] ?>
                        </h1>
                    </div>

                    <!-- lokasi restoran -->
                    <div class="container">
                        <span>
                            <a href="">
                                <?= $data['lokasi'] ?>
                            </a>
                        </span>
                    </div>


                    <!-- rating sama username yang ngereview -->
                    <div class="container">
                        <!-- icon rating -->
                        <div class="rating-container">
                            <img src="assets/img/Logo Rating.png" alt="">
                            <div class="user-info">
                                <p class="username font-weight-bold">Username</p>
                                <p class="text-secondary">username rated 0.0 for
                                    <?= $data['nama_resto']; ?>
                                </p>
                            </div>
                        </div>

                        <div class="resto-container mt-2">
                            <div class="d-flex img-resto ">
                                <img src="assets/img/1.png" alt="">
                            </div>
                        </div>
                    </div>

                    <div>

                        <?php
                        $id = $_GET['idResto'];
                        $query = "SELECT * FROM review JOIN user WHERE resto_id = '$id'";
                        $datas = $conn->query($query);
                        foreach ($datas as $review):
                            ?>
                            <div class="review-container">
                                <div class="review-image border-radius">
                                    <div class="image-dummy">

                                    </div>
                                </div>
                                <div class="col card" style="width: 100%;">
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold">
                                            <?= $review['nama_lengkap'] ?>
                                        </h5>
                                        <h6 class="card-subtitle mb-2 text-muted">waktu review 7.25pm</h6>
                                        <p class="card-text">
                                            <?= $review['caption'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach ?>
                        <!-- end of review card -->
                    </div>
                </div>

                <!-- ini info restaurantnya -->
                <aside class="col-md-3">

                    <div class="card sticky-top">
                        <div class="card-body">
                            <div class="mb-4 border-bottom card-title font-weight-bold">
                                <p>telepon:
                                    <?= $data['no_telp'] ?>
                                </p>
                            </div>
                            <div class="card-subtitle text-muted">
                                <p>jam buka:
                                    <?= $data['jam_buka'] ?>
                                </p>
                            </div>
                            <div class="card-subtitle text-muted">
                                <p>jam buka:
                                    <?= $data['jam_tutup'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </main>

    <footer class="text-center text-lg-start text-muted" style="background-color:#cfc6b4;">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block text-light">
                <span>Get connected with us on social networks:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4 text-light">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i> Baso Mas
                        </h6>
                        <p>
                            Here you can use rows and columns to organize your footer content. Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4 text-light">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Products
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Angular</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">React</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Vue</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Laravel</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4 text-light">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Useful links
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Pricing</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Settings</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Orders</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Help</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 text-light">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            info@example.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4 text-light" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2021 Copyright:
            <a class="text-danger fw-bold" href="">Baso Mas</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->


    <!-- Modal Login -->
    <div class="modal" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="loginModalLabel">SIGN IN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="proses_login.php" method="POST">
                    <div class="modal-body">
                        <label for="email">Email</label>
                        <input required type="email" class="form-control" id="email" placeholder="Email" name="email">
                    </div>
                    <div class="modal-body">
                        <label for="password">Password</label>
                        <input required type="password" class="form-control" id="password" placeholder="Password"
                            name="password">
                    </div>
                    <div class="modal-body mb-3">Not registered?
                        <a class="text-primary regist" href="#registModal" data-dismiss="modal"
                            data-toggle="modal">Create an account

                        </a>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
                        <button name="submit" type="submit" class="btn btn-dark">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Regist -->
    <div class="modal" id="registModal" tabindex="-1" aria-labelledby="registModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="registModalLabel">SIGN UP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="proses_register.php" method="POST">
                    <div class="modal-body">
                        <label for="nama">Full Name</label>
                        <input required type="text" class="form-control" id="nama" placeholder="Full name" name="nama">
                    </div>
                    <div class="modal-body">
                        <label for="email">Email</label>
                        <input required type="email" class="form-control" id="email" placeholder="Email" name="email">
                    </div>
                    <div class="modal-body">
                        <label for="password">Password</label>
                        <input required type="password" class="form-control" id="password" placeholder="Password"
                            name="password">
                    </div>
                    <div class="modal-body mb-3">Already have an account? <a class="regist" href="#loginModal"
                            data-dismiss="modal" data-toggle="modal">Sign In</a></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
                        <button name="submit" type="submit" class="btn btn-dark">Sign Up</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
    </script>

</body>

</html>