<h1 class="mt-4">Ubah Ulasan</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    // 1. Ambil ID Ulasan dari URL
                    $id = $_GET['id'];

                    if (isset($_POST['submit'])) {
                        $id_buku = $_POST['id_buku'];
                        $ulasan = $_POST['ulasan'];
                        $rating = $_POST['rating'];

                        // 2. Query UPDATE berdasarkan ID Ulasan
                        $query = mysqli_query($koneksi, "UPDATE ulasan_buku SET id_buku='$id_buku', ulasan='$ulasan', rating='$rating' WHERE id_ulasan=$id");

                        if ($query) {
                            echo '<script>alert("Data berhasil diubah.");
                                 window.location.href="?page=ulasan";
                                 </script>';
                        } else {
                            echo '<script>alert("Data gagal diubah.");</script>';
                        }
                    }

                    // 3. Ambil data lama untuk ditampilkan di form
                    $query_data = mysqli_query($koneksi, "SELECT * FROM ulasan_buku WHERE id_ulasan=$id");
                    $data = mysqli_fetch_array($query_data);
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
                        <div class="col-md-4">Ulasan</div>
                        <div class="col-md-8">
                            <textarea name="ulasan" class="form-control" rows="5"><?php echo $data['ulasan']; ?></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">Rating</div>
                        <div class="col-md-8">
                            <select name="rating" class="form-select">
                                <?php
                                for ($i = 1; $i <= 5; $i++) {
                                ?>
                                    <option <?php if ($data['rating'] == $i) echo 'selected'; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=ulasan" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>