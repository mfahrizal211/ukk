<h1>Tambah Kategori Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                        if(isset($_POST['submit'])){
                            $nama_kategori = $_POST['nama_kategori'];
                            $query = mysqli_query($koneksi, "INSERT INTO kategori_buku(nama_kategori) VALUES ('$nama_kategori')");

                            if($query){
                                echo '<script>alert("Data berhasil ditambahkan.");</script>';
                            }else{
                                echo '<script>alert("Data gagal ditambahkan.");</script>';
                            }
                        }
                    ?>
                    <div class="row mb-3">
                        <div class="col-md-4">Nama Kategori</div>
                        <div class="col-md-8">
                            <input type="text" name="nama_kategori" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=kategori" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>