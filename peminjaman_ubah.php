<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    $id = $_GET['id'];
                    if (isset($_POST['submit'])) {
                        $id_buku = $_POST['id_buku'];
                        $id_user = $_SESSION['user']['id_user'];
                        $tgl_peminjaman = $_POST['tgl_peminjaman'];
                        $tgl_pengembalian = $_POST['tgl_pengembalian'];
                        //$status_peminjaman = $_POST['status_peminjaman'];
                        if ($tgl_pengembalian == "") {
                            $query = mysqli_query($koneksi, "UPDATE peminjaman SET id_buku='$id_buku', tgl_peminjaman='$tgl_peminjaman', tgl_pengembalian='$tgl_pengembalian', status_peminjaman='dipinjam' WHERE id_peminjaman=$id");
                        } else {
                            $query = mysqli_query($koneksi, "UPDATE peminjaman SET id_buku='$id_buku', tgl_peminjaman='$tgl_peminjaman', tgl_pengembalian='$tgl_pengembalian', status_peminjaman='dikembalikan' WHERE id_peminjaman=$id");
                        }
                        if ($query) {
                            echo '<script>alert("Data berhasil diubah.");</script>';
                        } else {
                            echo '<script>alert("Data gagal diubah.");</script>';
                        }
                    }
                    $query = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman=$id");
                    $data = mysqli_fetch_array($query);
                    ?>

                    <div class="row mb-3">
                        <div class="col-md-4">Buku</div>
                        <div class="col-md-8">
                            <select name="id_buku" class="form-select">
                                <option value="">-- Pilih Buku --</option>
                                <?php
                                $buk = mysqli_query($koneksi, "SELECT * FROM buku");
                                while ($buku = mysqli_fetch_array($buk)) {
                                ?>
                                    <option <?php if ($data['id_buku'] == $buku['id_buku']) echo 'selected'; ?> value="<?php echo $buku['id_buku']; ?>">
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
                            <input type="date" name="tgl_peminjaman" class="form-control" value="<?php echo $data['tgl_peminjaman']; ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">Tanggal Pengembalian</div>
                        <div class="col-md-8">
                            <input type="date" name="tgl_pengembalian" class="form-control" value="<?php echo $data['tgl_pengembalian']; ?>">
                        </div>
                    </div>

                    <!-- <div class="row mb-3">
                        <div class="col-md-4">Status Peminjaman</div>
                        <div class="col-md-8">
                            <select name="status_peminjaman" class="form-select" required>
                                <option <?php if ($data['status_peminjaman'] == 'dipinjam') echo 'selected'; ?> value="dipinjam">Dipinjam</option>
                                <option <?php if ($data['status_peminjaman'] == 'dikembalikan') echo 'selected'; ?> value="dikembalikan">Dikembalikan</option>
                            </select>
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