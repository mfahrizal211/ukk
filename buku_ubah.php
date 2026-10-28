<?php
    // 1. Ambil ID dari URL
    $id = $_GET['id'];

    // 2. Proses Update Data jika tombol submit ditekan
    if(isset($_POST['submit'])){
        $id_kategori = $_POST['id_kategori'];
        $judul = $_POST['judul'];
        $penulis = $_POST['penulis'];
        $penerbit = $_POST['penerbit'];
        $tahun_terbit = $_POST['tahun_terbit'];
        $deskripsi = $_POST['deskripsi'];

        $query = mysqli_query($koneksi, "UPDATE buku SET id_kategori='$id_kategori', judul='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun_terbit', deskripsi='$deskripsi' WHERE id_buku=$id");

        if($query){
            echo '<script>alert("Data berhasil diubah."); location.href="?page=buku";</script>';
        }else{
            echo '<script>alert("Data gagal diubah.");</script>';
        }
    }

    // 3. Ambil data lama untuk ditampilkan di form
    $query_data = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku=$id");
    $data = mysqli_fetch_array($query_data);
?>

<h1 class="mt-4">Ubah Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <div class="row mb-3">
                        <div class="col-md-4">Kategori</div>
                        <div class="col-md-8">
                            <select name="id_kategori" class="form-select" required>
                                <option value="">-- Pilih Kategori --</option> 
                                <?php
                                    $kat = mysqli_query($koneksi, "SELECT * FROM kategori_buku");
                                    while($nama_kategori = mysqli_fetch_array($kat)){
                                        ?>
                                        <option <?php if($data['id_kategori'] == $nama_kategori['id_kategori']) echo 'selected'; ?> value="<?php echo $nama_kategori['id_kategori']; ?>">
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
                            <input type="text" name="judul" class="form-control" value="<?php echo $data['judul']; ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Penulis</div>
                        <div class="col-md-8">
                            <input type="text" name="penulis" class="form-control" value="<?php echo $data['penulis']; ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Penerbit</div>
                        <div class="col-md-8">
                            <input type="text" name="penerbit" class="form-control" value="<?php echo $data['penerbit']; ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Tahun Terbit</div>
                        <div class="col-md-8">
                            <input type="number" name="tahun_terbit" class="form-control" value="<?php echo $data['tahun_terbit']; ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Deskripsi</div>
                        <div class="col-md-8">
                            <textarea name="deskripsi" class="form-control" rows="5"><?php echo $data['deskripsi']; ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=buku" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>