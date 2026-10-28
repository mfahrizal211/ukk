<h1>Ubah Kategori Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                        $id = $_GET['id'];
                        if(isset($_POST['submit'])){
                            $nama_kategori = $_POST['nama_kategori'];
                            $query = mysqli_query($koneksi, "UPDATE kategori_buku SET nama_kategori='$nama_kategori' WHERE id_kategori=$id");

                            if($query){
                                echo '<script>alert("Data berhasil diubah.");</script>';
                            }else{
                                echo '<script>alert("Data gagal diubah.");</script>';
                            }
                        }
                        $query = mysqli_query($koneksi, "SELECT * FROM kategori_buku WHERE id_kategori=$id");
                        $data = mysqli_fetch_array($query);
                    ?>
                    <div class="row mb-3">
                        <div class="col-md-4">Nama Kategori</div>
                        <div class="col-md-8">
                            <input type="text" name="nama_kategori" class="form-control" required value="<?php echo $data['nama_kategori'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <button type="submit" name="submit" class="btn btn-primary">Ubah</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=kategori" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>