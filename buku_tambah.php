<h1>Tambah Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    if (isset($_POST['submit'])) {
                        $id_kategori = $_POST['id_kategori'];
                        $judul = $_POST['judul'];
                        $penulis = $_POST['penulis'];
                        $penerbit = $_POST['penerbit'];
                        $tahun_terbit = $_POST['tahun_terbit'];
                        $deskripsi = $_POST['deskripsi'];
                        $query = mysqli_query($koneksi, "INSERT INTO buku(id_kategori, judul, penulis, penerbit, tahun_terbit, deskripsi) VALUES ('$id_kategori', '$judul', '$penulis', '$penerbit', '$tahun_terbit', '$deskripsi')");

                        if ($query) {
                            echo '<script>
                            alert("Data berhasil ditambahkan.");</script>';
                        } else {
                            echo '<script>alert("Data gagal ditambahkan.");</script>';
                        }
                    }
                    ?>
                    <div class="row mb-3">
                        <div class="col-md-4">Kategori</div>
                        <div class="col-md-8">
                            <select name="id_kategori" class="form-select">
                                <option value="">-- Pilih Kategori --</option> <?php
                                                                                $kat = mysqli_query($koneksi, "SELECT * FROM kategori_buku");
                                                                                while ($nama_kategori = mysqli_fetch_array($kat)) {
                                                                                ?>
                                    <option value="<?php echo $nama_kategori['id_kategori']; ?>">
                                        <?php echo $nama_kategori['nama_kategori']; ?>
                                    </option>
                                <?php
                                                                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Judul</div>
                        <div class="col-md-8">
                            <input type="text" name="judul" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">

                        <div class="col-md-4">Penulis</div>
                        <div class="col-md-8">
                            <input type="text" name="penulis" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">

                        <div class="col-md-4">Penerbit</div>
                        <div class="col-md-8">
                            <input type="text" name="penerbit" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Tahun Terbit</div>
                        <div class="col-md-8">
                            <input type="number" name="tahun_terbit" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Deskripsi</div>
                        <div class="col-md-8">
                            <textarea name="deskripsi" id="" class="form-control" rows="5">

                            </textarea>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">

                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=buku" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>