<h1 class="mt-4">Tambah Ulasan</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    if (isset($_GET['id'])) {
                        $id_dari_url = $_GET['id'];
                    } else {
                        $id_dari_url = '';
                    }

                    if ($_SESSION['user']['level'] == 'Admin') {
                        $link_tujuan = "?page=ulasan";
                    } else {
                        $link_tujuan = "?page=buku_detail&&id=$id_dari_url";
                    }

                    if (isset($_POST['submit'])) {
                        $id_buku = $_POST['id_buku'];
                        $id_user = $_SESSION['user']['id_user'];
                        $ulasan = $_POST['ulasan'];
                        $rating = $_POST['rating'];

                        $query = mysqli_query($koneksi, "INSERT INTO ulasan_buku (id_buku, id_user, ulasan, rating) VALUES ('$id_buku', '$id_user', '$ulasan', '$rating')");

                        if ($query) {
                            echo '<script>
                                    alert("Data berhasil ditambahkan.");
                                    window.location.href="' . $link_tujuan . '";
                                  </script>';
                        } else {
                            echo '<script>alert("Data gagal ditambahkan.");</script>';
                        }
                    }
                    ?>

                    <div class="row mb-3">
                        <div class="col-md-4">Buku</div>
                        <div class="col-md-8">
                            <select name="id_buku" class="form-select" required>
                                <option value="">-- Pilih Buku --</option>
                                <?php
                                $buk = mysqli_query($koneksi, "SELECT * FROM buku");
                                while ($buku = mysqli_fetch_array($buk)) {
                                    // Logic agar otomatis terpilih jika datang dari detail buku
                                    $selected = ($id_dari_url == $buku['id_buku']) ? 'selected' : '';
                                    echo "<option value='{$buku['id_buku']}' $selected>{$buku['judul']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">Ulasan</div>
                        <div class="col-md-8">
                            <textarea name="ulasan" class="form-control" rows="5" required></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">Rating</div>
                        <div class="col-md-8">
                            <select name="rating" class="form-select">
                                <?php
                                for ($i = 1; $i <= 5; $i++) {
                                    echo "<option value='$i'>$i</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="<?= $link_tujuan ?>" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>