<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baso Mas</title>
    <!-- favico -->
    <link rel="icon" type="image/png" href="assets/img/favico.png">
    <!-- css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link href="admin/restaurant/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

</head>

<body>
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
                    <a class="nav-link" href="#team">Our Team</a>
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
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            if ($_SESSION['role_id'] == 1) {
                                // Non-admin items first
                                ?>
                                <li><a class="dropdown-item " href="admin/restaurant/tables.php">Admin</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                <?php
                            } else {
                                // Admin items first
                                ?>

                                <li><a class="dropdown-item" href="logout.php">Sign Out</a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </li>
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
    <main>
        <!-- Navbar -->

        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner">
                <!-- <h1 class="title-page text-dark text center">
                    "The best review of the best Bakso."
                </h1> -->

                <div class="carousel-item active">
                    <img src="assets/img/head.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
            </div>
        </div>
        <section class="page-filter" id="fan-review">
            <div class="filter-container d-flex justify-content-between mx-auto">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search for a restaurant..."
                        aria-label="Search">
                    <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
                </form>
                <form>
                    <div class="container row form-group" id="range">
                        <form action="rating.php" method="POST">
                            <input type="range" name="rate" class="col form-control-range" max=100 min=0 id="rate"
                                oninput="hoy()">
                            <label class="col d-flex align-items-center" id="formControlRange" for="formControlRange">
                                <h6 style="margin: 0; padding-right: 5px;">0.0 -</h6>
                                <span id="rate_output"></span>
                            </label>
                            <script type="text/javascript">
                                function hoy() {
                                    var nilai = document.getElementById('rate').value;
                                    var floatValue = (parseFloat(nilai) / 10).toFixed(1);
                                    document.getElementById('rate_output').textContent = floatValue;

                                }
                            </script>
                            <button type="submit" class="btn btn-dark w-25" name="cari"
                                onclick="cekRate()">Cari</button>
                        </form>
                    </div>
                </form>
            </div>
        </section>
        <section class="review-section m-lg-4">

            <div class="album py-6">
                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-3 g-3 justify-content-center">

                    <?php
                    include 'connect.php';
                    // menggunakan query sql agar menampilkan data produk dan join kedalam tabel user agar mendapatkan siapa pemilik produk
                    $query = "SELECT * FROM restaurant ";
                    $datas = $conn->query($query);
                    foreach ($datas as $data):
                        ?>
                        <a href="./restaurant.php?idResto=<?= $data['resto_id']; ?>">
                            <div class="col">
                                <div class="card shadow-review resto-card">
                                    <img src="assets/img/<?= $data['foto'] ?>" alt="<?= $data['foto'] ?>"
                                        class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?= $data['nama_resto'] ?>
                                        </h5>

                                        <p class="card-text">
                                            <?= $data['lokasi'] ?>
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <!-- Add any additional content here -->
                                        </div>
                                        <small class="text-muted">Last updated</small>
                                    </div>
                                </div>
                            </div>
                        </a>

                    <?php endforeach ?>
                </div>
            </div>


            <center class="p-5">
                <button type="button" class="btn btn-outline-danger">Next >></button>
            </center>
        </section>
    </main>

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>BasoMas Project Team</h2>
                <p>BasoMas project team adalah tim yang berasal dari Software Engineering IT Telkom Purwokerto yang
                    dibentuk guna menciptakan Website Review Bakso Di wilayah Kota Banyumas</p>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                        <div class="pic"><img src="assets/team/asty.jpg" class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <h4>Asty Yuliani</h4>
                            <span>web developer</span>
                            <p>Easy peasy</p>
                            <div class="social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook"></i></a>
                                <a href="https://www.instagram.com/astyyliani__/?hl=id"><i
                                        class="fab fa-instagram"></i></a>
                                <a href=""> <i class="fab fa-linkedin"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6 mt-4">
                    <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="300">
                        <div class="pic"><img src="assets/team/azelia.jpg" class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <h4>Azelia Puspa</h4>
                            <span>Web development </span>
                            <p>Tugas yang baik adalah tugas yang selesai</p>
                            <div class="social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                                <a href=""> <i class="fab fa-linkedin"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mt-4">
                    <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="300">
                        <div class="pic"><img src="assets/team/lintang.jpg" class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <h4>Lintang Suryaningrum</h4>
                            <span>Content Creator</span>
                            <p>Cintai ususmu</p>
                            <div class="social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                                <a href=""> <i class="fab fa-linkedin"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mt-4">
                    <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="400">
                        <div class="pic"><img src="assets/team/destu.jpeg" class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <h4>Destu Cikal</h4>
                            <span>Content Creator</span>
                            <p>Minum</p>
                            <div class="social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook"></i></a>
                                <a href="https://instagram.com/dframll"><i class="fab fa-instagram"></i></a>
                                <a href=""> <i class="fab fa-linkedin"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Team Section -->

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
                        Website review yang fokus pada berbagai jenis bakso yang dapat ditemukan di daerah Banyumas, Jawa Tengah, Indonesia. Tujuan utama proyek ini adalah untuk memberikan informasi yang lengkap dan akurat
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
                    <h5 class="modal-title font-weight-bold" id="loginModalLabel">Sign In</h5>
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
                    <h5 class="modal-title font-weight-bold" id="registModalLabel">Sign Up</h5>
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

    <script>
        function cekRate() {
            var rate = $('#rate').val();
            $.ajax({
                type: "POST",
                url: 'rating.php',
                data: {
                    rate: rate
                }
            });
        }
    </script>

    <script>
        $(document).ready(function () {
            $('#rate').on('input', function () {
                var rate = $(this).val();
                $.ajax({
                    type: "POST",
                    url: 'rating.php',
                    data: {
                        rate: rate
                    },
                    success: function (response) {
                        // Handle the server response here if needed
                    }
                });
            });
        });
    </script>
</body>

</html>