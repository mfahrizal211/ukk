<?php
$id = $_GET['id'];
$tgl_sekarang = date('Y-m-d');

$query = mysqli_query($koneksi, "UPDATE peminjaman SET 
status_peminjaman = 'proses',
tgl_pengembalian = '$tgl_sekarang' 
WHERE id_peminjaman = '$id'");

if ($query) {
    echo '<script>
        alert("Pengembalian buku menunggu persetujuan Admin.");
        window.location.href = "?page=peminjaman";
    </script>';
} else {
    echo '<script>
        alert("Buku gagal dikembalikan.");
        window.location.href = "?page=peminjaman";
    </script>';
}
