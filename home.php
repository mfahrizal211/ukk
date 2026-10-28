<?php if ($_SESSION['user']['level'] == 'User') { ?>
    <div class="row">
        <div class="col-12">
            <div class="card bg-primary text-white mb-4 h5 shadow-lg">
                <div class="card-body">
                    <h1>Selamat Datang, <?= $_SESSION['user']['username'] ?></h1>
                    <h5 class="h5 mb-4">“Membaca, membuka jendela dunia.”</h5>
                    <a href="?page=buku_user" class="btn btn-sm btn-outline-light px-4 py-1 rounded-pill">Pinjam Buku</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($_SESSION['user']['level'] == 'Admin') { ?>
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6 ">
            <div class="card bg-primary text-white mb-4 h5">
                <div class="card-body">
                    <?php
                    echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user"));
                    ?>
                    Total User
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="?page=user"></a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning h5 text-white mb-4">
                <div class="card-body">
                    <?php
                    echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM buku"));
                    ?>
                    Total Buku
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="?page=buku"></a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4 h5">
                <div class="card-body">
                    <?php
                    echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM peminjaman"));
                    ?>
                    Total Peminjam
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="?page=peminjaman"></a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4 h5">
                <div class="card-body">
                    <?php
                    echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM kategori_buku"));
                    ?>
                    Total Kategori Buku
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="?page=kategori"></a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<div class="card shadow-lg d-inline-block w-auto">
    <div class="card-body">
        <table class="table table-borderless shadow-sm rounded overflow-hidden" style="width: auto;">
            <thead>
                <tr>
                    <th colspan="3" class="h5 text-center text-white py-3 bg-primary"
                        style="border-radius: 10px 10px 0 0;">
                        <i class="fa-solid fa-circle-user me-2"></i> Informasi Akun
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="align-middle">
                    <td width="200" class="ps-3">Nama</td>
                    <td width="1">:</td>
                    <td class="fw-bold"><?php echo $_SESSION['user']['nama_lengkap']; ?></td>
                </tr>
                <tr>
                    <td class="ps-3">Level</td>
                    <td>:</td>
                    <td><span class="badge bg-primary text-light"><?php echo $_SESSION['user']['level']; ?></span></td>
                </tr>
                <tr>
                    <td class="ps-3">Tanggal Login</td>
                    <td>:</td>
                    <td><?php echo date('d-m-Y'); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>