<?php
include "koneksi.php";

if (isset($_POST['register'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $password = md5($_POST['password']);
    $level = 'User'; // Set default level jika kolom level dikomentari

    $insert = mysqli_query($koneksi, "INSERT INTO user (nama_lengkap, username, email, alamat, password, level) VALUES ('$nama_lengkap', '$username', '$email', '$alamat', '$password', '$level')");

    if ($insert) {
        echo '<script>alert("Selamat pendaftaran berhasil. Silahkan Login!"); location.href="login.php"</script>';
    } else {
        echo '<script>alert("Maaf pendaftaran gagal. Silahkan ulangi!");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Daftar | Perpustakaan Digital 2026</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            position: relative;
            overflow-x: hidden;
        }

        #layoutAuthentication {
            flex: 1;
            z-index: 2;
            position: relative;
        }

        .wave-container {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            line-height: 0;
            z-index: 1;
        }

        .card {
            backdrop-filter: blur(5px);
            background: rgba(255, 255, 255, 0.9);
        }
    </style>
</head>

<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container mt-4 mb-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header bg-primary text-white">
                                    <h4 class="text-center font-weight-light my-2">Daftar Akun Perpustakaan</h4>
                                </div>
                                <div class="card-body p-4">
                                    <form method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="text" placeholder="Nama Lengkap" name="nama_lengkap" required />
                                            <label>Nama Lengkap</label>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" type="text" placeholder="Username" name="username" required />
                                                    <label>Username</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" type="email" placeholder="Email" name="email" required />
                                                    <label>Email</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" style="height: 100px" name="alamat" placeholder="Alamat" required></textarea>
                                            <label>Alamat</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Password" required />
                                            <label for="inputPassword">Password</label>
                                        </div>

                                        <div class="mt-4 mb-0">
                                            <div class="d-grid">
                                                <button name="register" value="submit" class="btn btn-primary btn-block py-2" type="submit">Buat Akun Sekarang</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small">Sudah punya akun? <a href="login.php" class="text-primary fw-bold text-decoration-none">Login di sini</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <div class="wave-container">
        <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 590" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%">
                    <stop offset="5%" stop-color="#0693e3"></stop>
                    <stop offset="95%" stop-color="#8ED1FC"></stop>
                </linearGradient>
            </defs>
            <path d="M 0,600 L 0,150 C 96.84210526315789,196.86124401913878 193.68421052631578,243.72248803827753 282,224 C 370.3157894736842,204.27751196172247 450.1052631578948,117.97129186602871 535,117 C 619.8947368421052,116.02870813397129 709.8947368421053,200.39234449760767 812,199 C 914.1052631578947,197.60765550239233 1028.3157894736842,110.45933014354067 1135,88 C 1241.6842105263158,65.54066985645933 1340.842105263158,107.77033492822966 1440,150 L 1440,600 L 0,600 Z" stroke="none" stroke-width="0" fill="url(#gradient)" fill-opacity="0.53"></path>
            <path d="M 0,600 L 0,350 C 107.33014354066987,366.7081339712919 214.66028708133973,383.4162679425837 309,366 C 403.33971291866027,348.5837320574163 484.688995215311,297.0430622009569 561,291 C 637.311004784689,284.9569377990431 708.5837320574165,324.41148325358853 821,354 C 933.4162679425835,383.58851674641147 1086.9760765550238,403.311004784689 1197,401 C 1307.0239234449762,398.688995215311 1373.5119617224882,374.3444976076555 1440,350 L 1440,600 L 0,600 Z" stroke="none" stroke-width="0" fill="url(#gradient)" fill-opacity="1"></path>
        </svg>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>