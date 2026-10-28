<?php
function cari($keyword, $koneksi)
{

    $keyword = mysqli_real_escape_string($koneksi, $keyword);

    $queryStr = "SELECT * FROM buku 
                 LEFT JOIN kategori_buku ON buku.id_kategori = kategori_buku.id_kategori
                 WHERE
                 judul LIKE '%$keyword%' OR
                 penulis LIKE '%$keyword%' OR
                 penerbit LIKE '%$keyword%' OR
                 nama_kategori LIKE '%$keyword%' OR
                 tahun_terbit LIKE '%$keyword%'";

    return mysqli_query($koneksi, $queryStr);
}

if (isset($_GET['keyword']) && $_GET['keyword'] != "") {
    $query = cari($_GET['keyword'], $koneksi);
} else {
    $query = mysqli_query($koneksi, "SELECT * FROM buku 
                                     LEFT JOIN kategori_buku ON buku.id_kategori = kategori_buku.id_kategori");
}
?>
<h3 class="h3">Hasil Pencarian</h3>
<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php
    // Cek apakah ada data yang ditemukan
    if (mysqli_num_rows($query) > 0) {
        while ($data = mysqli_fetch_array($query)) {
    ?>
            <div class="col">
                <div class="card h-100 shadow-lg d-flex flex-column border-0">
                    <div class="card-body flex-grow-1">
                        <h5 class="card-title fw-bold text-dark"><?php echo $data['judul']; ?></h5>
                        <h6 class="card-subtitle mb-3 px-2 py-1 bg-light d-inline-block rounded text-muted" style="font-size: 0.8rem;">
                            <?php echo $data['nama_kategori']; ?>
                        </h6>

                        <p class="card-text text-secondary" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; line-clamp: 3; font-size: 0.9rem;">
                            <?php echo $data['deskripsi']; ?>
                        </p>
                    </div>

                    <div class="card-footer bg-transparent border-0 pb-3 mt-auto">
                        <a href="?page=buku_detail&&id=<?php echo $data['id_buku']; ?>" class="btn btn-sm btn-outline-primary px-3">Detail</a>
                        <a href="?page=peminjaman_user&&id=<?php echo $data['id_buku']; ?>" class="btn btn-sm btn-primary px-3">Pinjam</a>
                    </div>
                </div>
            </div>
    <?php
        }
    } else {
        // Tampilkan pesan jika data kosong
        echo '<div class="col-12"><div class="alert alert-warning">Buku dengan kata kunci tersebut tidak ditemukan.</div></div>';
    }
    ?>
</div>