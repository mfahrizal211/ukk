<div class="container mt-5">
    <h1 class="mt-4">Peminjaman Buku</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="post">
                        <?php
                        if (isset($_POST['submit'])) {
                            $id_buku = $_POST['id_buku'];
                            $id_user = $_SESSION['user']['id_user'];
                            $tgl_peminjaman = $_POST['tgl_peminjaman'];
                            //$status_peminjaman = $_POST['status_peminjaman'];
                            $query = mysqli_query($koneksi, "INSERT INTO peminjaman (id_buku, id_user, tgl_peminjaman, tgl_pengembalian, status_peminjaman) VALUES ('$id_buku', '$id_user', '$tgl_peminjaman', NULL, 'dipinjam')");


                            if ($query) {
                                echo '<script>alert("Data berhasil ditambahkan.");</script>';
                            } else {
                                echo '<script>alert("Data gagal ditambahkan.");</script>';
                            }
                        }
                        ?>

                        <div class="row mb-3">
                            <div class="col-md-4">Buku</div>
                            <div class="col-md-8">
                                <select name="id_buku" class="form-select">
                                    <option value="">-- Pilih Buku --</option>
                                    <?php
                                    // 1. Ambil ID dari URL 
                                    $id_dari_url = isset($_GET['id']) ? $_GET['id'] : '';

                                    $buk = mysqli_query($koneksi, "SELECT * FROM buku");
                                    while ($buku = mysqli_fetch_array($buk)) {
                                    ?>
                                        <option
                                            <?php
                                            // 2. Bandingkan id_buku dari database dengan id dari URL
                                            if ($id_dari_url == $buku['id_buku']) {
                                                echo 'selected';
                                            }
                                            ?>
                                            value="<?php echo $buku['id_buku']; ?>">
                                            <?php echo $buku['judul']; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">Tanggal Pinjam</div>
                            <div class="col-md-8">
                                <input type="date" name="tgl_peminjaman" class="form-control" value="<?php echo date("Y-m-d") ?>" required>
                            </div>
                        </div>
                        <!-- <div class="row mb-3">
                            <div class="col-md-4">Status Peminjaman</div>
                            <div class="col-md-8">
                                <select name="status_peminjaman" class="form-select">
                                    <option value="dipinjam">Dipinjam</option>
                                </select>
                            </div>
                        </div> -->

                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-8">
                                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <a href="?page=buku_user" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>