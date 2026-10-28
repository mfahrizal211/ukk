<h1>Tambah Anggota</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    if (isset($_POST['submit'])) {
                        $username = $_POST['username'];
                        $password = md5($_POST['password']);
                        $email = $_POST['email'];
                        $nama_lengkap = $_POST['nama_lengkap'];
                        $alamat = $_POST['alamat'];
                        $level = $_POST['level'];
                        $query = mysqli_query($koneksi, "INSERT INTO user(username, password, email, nama_lengkap, alamat, level) VALUES ('$username', '$password', '$email', '$nama_lengkap', '$alamat', '$level')");

                        if ($query) {
                            echo '<script>alert("Selamat pendaftaran berhasil.");</script>';
                        } else {
                            echo '<script>alert("Maaf pendaftaran gagal. Silahkan ulangi!");</script>';
                        }
                    }
                    ?>
                    <div class="row mb-3">
                        <div class="col-md-4">Username</div>
                        <div class="col-md-8">
                            <input type="text" name="username" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">

                        <div class="col-md-4">Password</div>
                        <div class="col-md-8">
                            <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Email</div>
                        <div class="col-md-8">
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Nama Lengkap</div>
                        <div class="col-md-8">
                            <input type="text" name="nama_lengkap" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Alamat</div>
                        <div class="col-md-8">
                            <textarea name="alamat" id="" class="form-control" rows="5">

                            </textarea>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Level</div>
                        <div class="col-md-8 form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="level">
                                <option selected>Pilih Level</option>
                                <option value="User">User</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">

                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=user" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>