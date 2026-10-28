<?php
    // 1. Ambil ID dari URL
    $id = $_GET['id'];

    // 2. Proses Update Data jika tombol submit ditekan
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $email = $_POST['email'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $alamat = $_POST['alamat'];
        $level = $_POST['level'];

        $query = mysqli_query($koneksi, "UPDATE user SET username='$username', password='$password', email='$email', nama_lengkap='$nama_lengkap', alamat='$alamat', level='$level' WHERE id_user=$id");

        if($query){
            echo '<script>alert("Data berhasil diubah."); location.href="?page=user";</script>';
        }else{
            echo '<script>alert("Data gagal diubah.");</script>';
        }
    }

    // 3. Ambil data lama untuk ditampilkan di form
    $query_data = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user=$id");
    $data = mysqli_fetch_array($query_data);
?>

<h1 class="mt-4">Ubah Anggota</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <div class="row mb-3">
                        <div class="col-md-4">Username</div>
                        <div class="col-md-8">
                            <input type="text" name="username" class="form-control" value="<?php echo $data['username']; ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                    <div class="col-md-4">Password</div>
                    <div class="col-md-8">
                        <input type="password" name="password" class="form-control" value="<?php echo $data['password']; ?>" required>
                    </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Email</div>
                        <div class="col-md-8">
                            <input type="email" name="email" class="form-control" value="<?php echo $data['email']; ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Nama Lengkap</div>
                        <div class="col-md-8">
                            <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $data['nama_lengkap']; ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Alamat</div>
                        <div class="col-md-8">
                            <textarea name="alamat" id="" class="form-control" rows="5">
                                <?php echo $data['alamat']; ?>
                            </textarea>
                        </div>
                    
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Level</div>
                        <div class="col-md-8">
                            <select name="level" class="form-select" required>
                                <option <?php if($data['level'] == 'user') echo 'selected'; ?> value="user">User</option>
                                <option <?php if($data['level'] == 'admin') echo 'selected'; ?> value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=user" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>