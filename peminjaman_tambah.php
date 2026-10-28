<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    if (isset($_POST['submit'])) {
                        $id_buku = $_POST['id_buku'];
                        $id_user = $_POST['id_user'];
                        $tgl_peminjaman = $_POST['tgl_peminjaman'];
                        //$tgl_pengembalian = $_POST['tgl_pengembalian'];
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
                        <?php
                        if ($_SESSION['user']['level'] == 'Admin') {
                        ?>
                            <div class="col-md-4">User</div>
                            <div class="col-md-8">
                                <select name="id_user" class="form-select">
                                    <option value="">-- Pilih User --</option>
                                    <?php
                                    $use = mysqli_query($koneksi, "SELECT * FROM user");
                                    while ($user = mysqli_fetch_array($use)) {
                                    ?>
                                        <option value="<?php echo $user['id_user']; ?>">
                                            <?php echo $user['username']; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            <?php } else { ?>
                                <input type="text" name="id_user" value="<?= $_SESSION['user']['id_user']; ?>" hidden>
                            <?php } ?>
                            </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Buku</div>
                        <div class="col-md-8">
                            <select name="id_buku" class="form-select">
                                <option value="">-- Pilih Buku --</option>
                                <?php
                                $buk = mysqli_query($koneksi, "SELECT * FROM buku");
                                while ($buku = mysqli_fetch_array($buk)) {
                                ?>
                                    <option value="<?php echo $buku['id_buku']; ?>">
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
                            <input type="date" name="tgl_peminjaman" class="form-control" required>
                        </div>
                    </div>

                    <!-- <div class="row mb-3">
                        <div class="col-md-4">Tanggal Pengembalian</div>
                        <div class="col-md-8">
                            <input type="date" name="tgl_pengembalian" class="form-control">
                        </div>
                    </div> -->

                    <!-- <div class="row mb-3">
                        <div class="col-md-4">Status Peminjaman</div>
                        <div class="col-md-8">
                            <select name="status_peminjaman" class="form-select">
                                <option value="dipinjam">Dipinjam</option>
                                <!<option value="dikembalikan">Dikembalikan</option> -->
                    <!-- </select>
                        </div>
                    </div> -->

                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=peminjaman" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>