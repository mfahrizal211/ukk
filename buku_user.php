<?php
// 1. Logika Pengurutan (Letakkan di bagian paling atas file)
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'default';
$orderby = "buku.id_buku DESC"; // Urutan default (terbaru)

switch ($sort) {
    case 'az':
        $orderby = "buku.judul ASC";
        break;
    case 'za':
        $orderby = "buku.judul DESC";
        break;
    case 'kategori':
        $orderby = "kategori_buku.nama_kategori ASC";
        break;
}

// 2. Query dengan Order By
$query = mysqli_query($koneksi, "SELECT * FROM buku 
                                 LEFT JOIN kategori_buku ON buku.id_kategori = kategori_buku.id_kategori 
                                 ORDER BY $orderby");
?>

<div class="d-flex justify-content-between align-items-center mt-4 mb-4">
    <h1 class="mb-0">Daftar Buku</h1>

    <div class="dropdown">
        <button class="btn btn-outline-primary dropdown-toggle shadow-sm" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-filter me-1"></i> Urutkan
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item <?php echo $sort == 'default' ? 'active' : ''; ?>" href="?page=buku_user&sort=default">Terbaru</a></li>
            <li><a class="dropdown-item <?php echo $sort == 'az' ? 'active' : ''; ?>" href="?page=buku_user&sort=az">Judul A - Z</a></li>
            <li><a class="dropdown-item <?php echo $sort == 'za' ? 'active' : ''; ?>" href="?page=buku_user&sort=za">Judul Z - A</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item <?php echo $sort == 'kategori' ? 'active' : ''; ?>" href="?page=buku_user&sort=kategori">Berdasarkan Kategori</a></li>
        </ul>
    </div>
</div>

<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php
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
    ?>
</div>