<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - BasoMas</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../../index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Baso Mas</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="tables.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>

        <!-- end of sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-dark" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <!-- Nav Item - User Information -->
                        <?php
                    session_start();?>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800 font-weight-bold">Restaurant</h1>

                    <!-- Button Tambah Data -->
                    <div class="pb-4">
                        <button type="button" class="btn btn-dark" data-toggle="modal"
                            data-target="#tambahDataModal">
                            Tambah Data
                        </button>
                    </div>

                    <!-- DataTales Example -->
                    <div class=" container-fluid card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">DataTables Example</h6>
                        </div>

                        <div class="card-body justify-content-center">
                            <div class="table-responsive">
                                <table class="table table-bordered w-auto" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Restaurant</th>
                                            <th>Lokasi</th>
                                            <th>Harga</th>
                                            <th>No Telepon</th>
                                            <th>Jam Buka</th>
                                            <th>Jam Tutup</th>
                                            <th>Foto</th>
                                            <th>Video</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../../connect.php';
                                        // menggunakan query sql agar menampilkan data produk dan join kedalam tabel user agar mendapatkan siapa pemilik produk
                                        $query = "SELECT * FROM restaurant";
                                        $datas = $conn->query($query);
                                        foreach ($datas as $data):
                                            ?>
                                            <tr>
                                                <td>
                                                    <?= $data['nama_resto'] ?>
                                                </td>
                                                <td style="word-wrap: break-word;min-width: 160px;max-width: 160px;">
                                                    <?= $data['lokasi'] ?>
                                                </td>
                                                <td>
                                                    <?= $data['harga'] ?>
                                                </td>
                                                <td>
                                                    <?= $data['no_telp'] ?>
                                                </td>
                                                <td>
                                                    <?= $data['jam_buka'] ?>
                                                </td>
                                                <td>
                                                    <?= $data['jam_tutup'] ?>
                                                </td>
                                                <td>
                                                    <img src="../../assets/upload/restaurant/<?= $data['foto'] ?>"
                                                        alt="<?= $data['nama_resto'] ?>" style="width:100px;">
                                                </td>
                                                <td style="word-wrap: break-word;min-width: 100px;max-width: 200px;">
                                                    <?= $data['video'] ?>
                                                </td>
                                                <td class="col-sm-2">

                                                    <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                                        data-target="#editDataModal<?= $data['resto_id']; ?>">Ubah</button>

                                                    <a href="./hapus-aksi.php?idResto=<?= $data['resto_id']; ?>">
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal" data-target="#hapusDataModal">Hapus</button>
                                                    </a>

                                                </td>
                                            </tr>

                                            <!-- Modal ubah data -->
                                            <div class="modal fade" id="editDataModal<?= $data['resto_id']; ?>"
                                                tabindex="-1" role="dialog" aria-labelledby="editDataModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editDataModalLabel">Ubah Data
                                                                Restaurant
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST" action="../ubah-aksi.php" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="resto_id" value="<?= $data['resto_id']?>">
                                                                <div class="form-group">
                                                                    <label for="nama">Nama Restaurant</label>
                                                                    <input required type="text" class="form-control"
                                                                        id="nama_resto" name="nama_resto"
                                                                        value="<?= $data['nama_resto'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="harga">Lokasi</label>
                                                                    <input required type="text" class="form-control"
                                                                        id="lokasi" name="lokasi"
                                                                        value="<?= $data['lokasi'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="number">Harga</label>
                                                                    <input required type="number" class="form-control"
                                                                        id="harga" name="harga"
                                                                        value="<?= $data['harga'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="no_telp">No Telepon</label>
                                                                    <input required type="tel" class="form-control"
                                                                        id="no_telp" name="no_telp"
                                                                        value="<?= $data['no_telp'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="number">Jam Buka</label>
                                                                    <input required type="time" class="form-control"
                                                                        id="jam_buka" name="jam_buka"
                                                                        value="<?= $data['jam_buka'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Jam Tutup</label>
                                                                    <input required type="time" class="form-control"
                                                                        id="jam_tutup" name="jam_tutup"
                                                                        value="<?= $data['jam_tutup'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="file">Foto</label>
                                                                    <input type="file" class="form-control"
                                                                        name="image"><?= $data['foto'] ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="file">Video</label>
                                                                    <!-- <input required type="file" class="form-control" id="document" name="document"> -->
                                                                    <input type="text" class="form-control" name="video">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Tutup</button>
                                                
                                                                    <button  type="submit"
                                                                        class="btn btn-primary">Ubah
                                                                    </button>
                                                                

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- end of modal ubah data -->
                                        <?php endforeach ?>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; BasoMas 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="tambahDataModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data
                        Restaurant</h5>
                    <button type="button" class="close" data-dismiss="modal" arialabel="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="../tambah.php" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama Restaurant</label>
                            <input required type="text" class="form-control" id="nama_resto" name="nama_resto">
                        </div>
                        <div class="form-group">
                            <label for="harga">Lokasi</label>
                            <input required type="text" class="form-control" id="lokasi" name="lokasi">
                        </div>
                        <div class="form-group">
                            <label for="number">Harga</label>
                            <input required type="number" class="form-control" id="harga" name="harga">
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No Telepon</label>
                            <input required type="tel" class="form-control" id="no_telp" name="no_telp">
                        </div>
                        <div class="form-group">
                            <label for="number">Jam Buka</label>
                            <input required type="time" class="form-control" id="jam_buka" name="jam_buka">
                        </div>
                        <div class="form-group">
                            <label for="">Jam Tutup</label>
                            <input required type="time" class="form-control" id="jam_tutup" name="jam_tutup">
                        </div>
                        <div class="form-group">
                            <label for="file">Foto</label>
                            <input required type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group">
                            <label for="file">Video</label>
                            <!-- <input required type="file" class="form-control" id="document" name="document"> -->
                            <input type="text" class="form-control" name="video">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>

</body>

</html>