<?php
$id_buku = $_GET['id'];

// Query untuk mengambil data buku yang spesifik
$query_buku = mysqli_query($koneksi, "SELECT * FROM buku 
                        LEFT JOIN kategori_buku ON kategori_buku.id_kategori = buku.id_kategori WHERE id_buku = '$id_buku'");
$buku = mysqli_fetch_array($query_buku);

// Jika data tidak ditemukan
if (!$buku) {
    echo "Buku tidak ditemukan!";
    exit;
}

$query_ulasan = mysqli_query($koneksi, "SELECT * FROM ulasan_buku
                                        LEFT JOIN user ON user.id_user = ulasan_buku.id_user 
                                        LEFT JOIN buku ON buku.id_buku = ulasan_buku.id_buku
                                        WHERE buku.id_buku = '$id_buku'");
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="?page=buku_user">Daftar Buku</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Buku</li>
                </ol>
            </nav>

            <h1 class="display-5 fw-bold"><?php echo $buku['judul']; ?></h1>
            <p class="text-muted fs-5">Oleh: <span class="text-primary"><?php echo $buku['penulis']; ?></span></p>

            <hr>

            <div class="row mb-3">
                <div class="col-sm-3 fw-bold">Kategori</div>
                <div class="col-sm-9"><?php echo $buku['nama_kategori']; ?></span></div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 fw-bold">Tahun Terbit</div>
                <div class="col-sm-9"><?php echo $buku['tahun_terbit']; ?></div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 fw-bold">Penerbit</div>
                <div class="col-sm-9"><?php echo $buku['penerbit']; ?></div>
            </div>

            <div class="mt-4">
                <h5 class="fw-bold">Deskripsi / Sinopsis:</h5>
                <p class="text-secondary" style="line-height: 1.8; text-align: justify;">
                    <?php echo nl2br($buku['deskripsi']); ?>
                </p>
            </div>

            <div class="mt-5">
                <a href="?page=peminjaman_user&&id=<?php echo $buku['id_buku']; ?>" class="btn btn-primary btn-sm px-4 me-2">Pinjam Buku</a>
                <a href="?page=ulasan_tambah&&id=<?php echo $buku['id_buku']; ?>" class="btn btn-outline-primary btn-sm px-4 me-2">Ulas Buku</a>
                <a href="?page=buku_user" class="btn btn-outline-secondary btn-sm px-4">Kembali</a>
            </div>

            <hr>

            <?php
            // Cek jika ada ulasan
            if (mysqli_num_rows($query_ulasan) > 0) {
                while ($row_ulasan = mysqli_fetch_array($query_ulasan)) {
            ?>
                    <div class="card mb-3 border-0 bg-light">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="fw-bold mb-0 text-dark"><?php echo $row_ulasan['username']; ?></h5>
                                <div class="text-nowrap">
                                    <?php
                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i <= $row_ulasan['rating']) {
                                            echo '<i class="fas fa-star text-warning me-1" style="font-size: 0.85rem;"></i>';
                                        } else {
                                            echo '<i class="far fa-star text-muted me-1" style="font-size: 0.85rem;"></i>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <p class="card-text fst-italic">"<?php echo $row_ulasan['ulasan']; ?>"</p>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo '<div class="alert alert-light border text-center text-muted">Belum ada ulasan untuk buku ini.</div>';
            }
            ?>
        </div>
    </div>
</div>