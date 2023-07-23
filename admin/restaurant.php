<?php

include '../connect.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <!-- Sidebar -->
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-1 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Restaurant</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Restaurant</h2>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahDataModal">
                        Tambah Data
                    </button>
                </div>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered">
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
                            include '../connect.php';
                            // menggunakan query sql agar menampilkan data produk dan join kedalam tabel user agar mendapatkan siapa pemilik produk
                            $query = "SELECT * FROM restaurant";
                            $datas = $conn->query($query);
                            foreach ($datas as $data):
                                ?>
                                <tr>
                                    <td>
                                        <?= $data['nama_resto'] ?>
                                    </td>
                                    <td>
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
                                        <img src="../assets/upload/restaurant/<?= $data['foto'] ?>"
                                            alt="<?= $data['nama_resto'] ?>" style="width:100px;">
                                    </td>
                                    <td>
                                        <?= $data['video'] ?>
                                    </td>
                                    <td>

                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#editDataModal">Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#hapusDataModal">Hapus</button>
                                    </td>
                                </tr>

                                <!-- Modal ubah data -->
                                <div class="modal fade" id="editDataModal<?=
                                    $data['produk_id'] ?>" tabindex="-1" role="dialog"
                                    aria-labelledby="editDataModalLabel" ariahidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editDataModalLabel">Tambah Data Pengguna</h5>
                                                <button type="button" class="close" datadismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="produk/ubah.php">
                                                <div class="modal-body">
                                                    <input type="hidden" name="produk_id" value="<?= $data['produk_id'] ?>">
                                                    <div class=" form-group">
                                                        <label for="nama">Nama</label>
                                                        <input required type="text" class="formcontrol" id="nama"
                                                            name="nama" value="<?= $data['nama']
                                                                ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="harga">Harga</label>
                                                        <input required type="number" class="formcontrol" id="harga"
                                                            name="harga" value="<?= $data['harga']
                                                                ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="number">Stok</label>
                                                        <input required type="number" class="formcontrol" id="number"
                                                            name="stok" value="<?= $data['stok'] ?>">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btnprimary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Hapus Data -->
                                <div class="modal fade" id="hapusDataModal<?=
                                    $data['produk_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="hapusDataModalLabel<?=
                                     $data['produk_id'] ?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="hapusDataModalLabel<?= $data['produk_id'] ?>">
                                                    Konfirmasi Penghapusan</h5>
                                                <button type="button" class="close" datadismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus data pengguna
                                                ini?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Batal</button>
                                                <a href="produk/hapus.php?id=<?=
                                                    $data['produk_id'] ?>" class="btn btn-danger">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <!-- Modal tambah data -->
    <div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="tambahDataModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data
                        Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" arialabel="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="tambah.php" enctype="multipart/form-data">
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
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>