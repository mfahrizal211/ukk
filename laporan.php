<h1 class="mt-4">Laporan Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <a href="cetak.php" target="_blank" class="btn btn-primary mb-2"><i class="fas fa-print"></i> Cetak Laporan</a>
                <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th>User</th>
                            <th>Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Status Peminjaman</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM peminjaman LEFT JOIN user ON user.id_user = peminjaman.id_user LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $data['username']; ?></td>
                                <td><?php echo $data['judul']; ?></td>
                                <td><?php echo $data['tgl_peminjaman']; ?></td>
                                <td><?php echo $data['tgl_pengembalian']; ?></td>
                                <td>
                                    <?php if ($data['status_peminjaman'] == 'dipinjam') { ?>
                                        <span class="badge bg-warning text-dark">Dipinjam</span>
                                    <?php } else { ?>
                                        <span class="badge bg-success">Dikembalikan</span>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>