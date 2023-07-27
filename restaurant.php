<?php
include 'connect.php'
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baso Mas</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="admin/restaurant/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

</head>

<body>
    <?php
    $id = $_GET['idResto'];
    $idAvg = $_GET['idResto'];
    $avgQuery = "SELECT AVG(rating) FROM review WHERE resto_id='$idAvg'";
    $query = "SELECT * FROM restaurant WHERE resto_id = '$id'";
    $datas = $conn->query($query);
    foreach ($datas as $data):
    endforeach;

    $avg = $conn->query($avgQuery);
    $average = mysqli_fetch_column($avg);
    $averageRounded = round($average, 1);
    ?>
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
                <li class="nav-item">
                    <a class="nav-link" href="index.php?#team">Our Team</a>
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
                            <a class="dropdown-item" href="logout.php">Sign Out</a>
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


    <main class="container pt-4">
        <div class="d-flex review-flex">
            <!-- konten reviewnya -->
            <div class="width-review">
                <div class="shadow-review p-2">
                    <nav class="container mt-3" aria-label="breadcrumb">
                        <ol class="breadcrumb badge-light">
                            <li class="breadcrumb-item "><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item "><a href="#">Restaurant</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?= $data['nama_resto'] ?>
                            </li>
                        </ol>
                    </nav>

                    <!-- nama restoran -->
                    <div class="container">
                        <h1 class="card-title restaurant-page">
                            <?= $data['nama_resto'] ?>
                        </h1>
                    </div>

                    <!-- lokasi restoran -->
                    <div class="mb-2 container">
                        <span>
                            <a href="">
                                <?= $data['lokasi'] ?>
                            </a>
                        </span>
                    </div>


                    <!-- rating sama username yang ngereview -->
                    <div class="container mb-4">
                        <!-- icon rating -->
                        <div class="rating-container">
                            <div class="container-rating">
                                <img src="assets/img/Logo Review.png" alt="">
                                <p class="card-title">
                                    <?= $averageRounded; ?>
                                </p>
                            </div>
                            <div class="user-info p-2">
                                <p class="score font-weight-bold">Score</p>
                                <p class="text-secondary">
                                    <?= $data['nama_resto']; ?> got rated for 0.0

                                </p>
                            </div>
                        </div>

                        <div class="d-block position-relative">
                            <div class="resto-container mt-2 position-relative"
                                style="background-image: url('assets/upload/restaurant/<?= $data['foto'] ?>'); ">

                                <div class="d-flex img-resto">
                                    <img src="assets/upload/restaurant/<?= $data['foto'] ?>"
                                        alt="<?= $data['nama_resto']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- end of resto container -->

                <!-- tambah review -->
                <div class="container mt-4" id="inputReview" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                    <div class="tambah-review mt-4 pt-4">
                        <form method="POST" action="tambah-review.php" enctype="multipart/form-data">
                            <input type="hidden" name="idResto" id="Resto" value="<?= $id ?>">

                            <div class="container-fluid form-group d-flex align-items-center ">
                                <div class="mr-4">
                                    <b>Add Your Rating</b>
                                </div>
                                <input style="width: 300px;" type="range" min="0" max="100" value="50" id="o"
                                    oninput="hey()" />
                                <div class="m-2 rating-value">
                                    <span class="card-title" id="outputValue" value="">5.0</span>
                                </div>

                                <input type="hidden" id="outputHidden" name="outputValue" value="">
                                <script type="text/javascript">
                                    function hey() {
                                        var nilai = document.getElementById('o').value;
                                        var floatValue = (parseFloat(nilai) / 10).toFixed(1);
                                        document.getElementById('outputValue').textContent = floatValue;
                                        //beri value ke id outputhidden
                                        document.getElementById('outputHidden').value = floatValue;
                                    }
                                </script>
                            </div>

                            <div class="container-fluid form-group">
                                <label for="caption"></label>
                                <textarea class="form-control" id="caption" name="caption" rows="3"
                                    placeholder="Add a review here..."></textarea>
                            </div>

                            <div class="container form-group">
                                <label for="file">Add an image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <?php
                            if (!empty($_SESSION['email'])) {
                                ?>

                                <div class="d-flex justify-content-end mr-sm-3">
                                    <button name="submit" type="submit" class="btn btn-dark mb-4">Tambah Review</button>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="d-flex justify-content-end mr-sm-3">
                                    <button name="" type="button" class="btn btn-dark mb-4" data-toggle="modal"
                                        data-target="#loginModal">Tambah Review</button>
                                </div>
                                <?php
                            }
                            ?>

                        </form>
                    </div>
                </div>
                <!-- end of tambah review -->

                <!-- review user loop -->
                <div>
                    <?php
                    $id = $_GET['idResto'];
                    $query = "SELECT `review`.`caption`, `review`.`rating`, review.foto_review, review.created_at, user.nama_lengkap FROM `review` JOIN `user` ON review.user_id = user.user_id WHERE resto_id=$id;";
                    $datas = $conn->query($query);
                    foreach ($datas as $review):
                        $time = strtotime($review['created_at']);
                        $myFormatForView = date("g:i A", $time);
                        ?>
                        <div class="review-container">
                            <div class="review-image border-radius">
                                <div class="d-flex image-dummy">
                                    <img src="./assets/upload/restaurant/<?= $data['foto'] ?>"
                                        alt="<?= $review['foto_review'] ?>">
                                </div>
                            </div>
                            <div class="d-flex content-review" style="width: 100%;">
                                <div class="col card-body">
                                    <h5 class="card-title font-weight-bold">
                                        <?= $review['nama_lengkap'] ?>
                                    </h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Waktu Review
                                        <?= $myFormatForView ?>
                                    </h6>
                                    <p class="card-text">
                                        <?= $review['caption'] ?>
                                    </p>
                                </div>
                                <div class="user-rating m-3" style="width: 50px; height: 50px;">
                                    <div class="container-rating" ">
                                            <img style=" width: 50px; height: 50px;" src="assets/img/Logo Review.png"
                                        alt="">
                                        <p style="font-size: 12pt; color: #442319;">
                                            <?= $review['rating'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach ?>
                    <!-- end of review card -->
                </div>
            </div>

            <!-- ini info restaurantnya -->
            <aside class="info-card">
                <div class="card m-3 shadow-sm">
                    <div class="card-body">
                        <div class="mb-4 border-bottom card-title card-info">
                            <p>&#9742;
                                <?= $data['no_telp'] ?>
                            </p>
                        </div>
                        <div class="card-subtitle text-muted">
                            <p> Jam buka:
                                <?= $data['jam_buka'] ?>
                            </p>
                        </div>
                        <div class="card-subtitle text-muted">
                            <p>Jam buka:
                                <?= $data['jam_tutup'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </main>

    <!-- Footer -->
    <footer class="text-center text-lg-start text-muted" style="">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block text-light">
                <span>Get connected with us on social networks:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div class="social-media">
                <a href="" class="social-media me-4 text-reset">
                    <i class=" fab fa-facebook-f"></i>
                </a>
                <a href="" class="social-media me-4 text-reset">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="social-media me-4 text-reset">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="social-media me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="social-media me-4 text-reset">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="social-media me-4 text-reset">
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
                        <div class="text-uppercase fw-bold mb-4">
                            <img src="assets/img/Logo-white.png" style="width: 200px;" alt="">
                        </div>
                        <p class="readme">
                            Website review yang fokus pada berbagai jenis bakso yang dapat ditemukan di daerah Banyumas,
                            Jawa Tengah, Indonesia. Tujuan utama proyek ini adalah untuk memberikan informasi yang
                            lengkap dan akurat
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 text-light">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3"></i> Banyumas, Jawa Tengah</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            info@basomas.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> +62 857-5393-6838</p>

                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4 company" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2023 Copyright: Baso Mas
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