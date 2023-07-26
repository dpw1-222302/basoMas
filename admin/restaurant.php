<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/myadmin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <!-- Content -->
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h4>Restaurant</h4>
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
                                <div class="modal fade" id="editDataModal" tabindex="-1" role="dialog"
                                    aria-labelledby="editDataModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editDataModalLabel">Ubah Data Restaurant
                                                </h5>
                                                <button type="button" class="close" datadismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="produk/ubah.php">
                                                <div class="modal-body">
                                                    <input type="hidden" name="produk_id" value="">
                                                    <div class="form-group">
                                                        <label for="nama">Nama Restaurant</label>
                                                        <input required type="text" class="form-control" id="nama_resto"
                                                            name="nama_resto">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="harga">Lokasi</label>
                                                        <input required type="text" class="form-control" id="lokasi"
                                                            name="lokasi">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="number">Harga</label>
                                                        <input required type="number" class="form-control" id="harga"
                                                            name="harga">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="no_telp">No Telepon</label>
                                                        <input required type="tel" class="form-control" id="no_telp"
                                                            name="no_telp">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="number">Jam Buka</label>
                                                        <input required type="time" class="form-control" id="jam_buka"
                                                            name="jam_buka">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Jam Tutup</label>
                                                        <input required type="time" class="form-control" id="jam_tutup"
                                                            name="jam_tutup">
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
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Hapus Data -->
                                <div class="modal fade" id="hapusDataModal" tabindex="-1" role="dialog"
                                    aria-labelledby="hapusDataModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="hapusDataModalLabel">
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
                                                <a href="" class="btn btn-danger">Hapus</a>
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