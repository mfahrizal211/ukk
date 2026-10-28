<?php
$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM ulasan_buku WHERE id_ulasan='$id'");

if ($query) {
?>
    <script>
        alert('Data berhasil dihapus.');
        location.href = "index.php?page=ulasan";
    </script>
<?php
} else {
    echo "Gagal hapus: " . mysqli_error($koneksi);
}
?>