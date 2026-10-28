<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <a href="?page=peminjaman_tambah" class="btn btn-primary mb-2">
                    + Pinjam Buku
                </a>
                <a href="cetak.php" target="_blank" class="btn btn-outline-primary mb-2"><i class="fas fa-print"></i> Cetak Laporan</a>
                <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Status Peminjaman</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $id_user_login = $_SESSION['user']['id_user'];

                        if ($_SESSION['user']['level'] == 'Admin') {
                            $query = mysqli_query($koneksi, "SELECT * FROM peminjaman 
                                LEFT JOIN user ON user.id_user = peminjaman.id_user 
                                LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku
                                ORDER BY 
                                CASE status_peminjaman
                                WHEN 'proses' THEN 1
                                WHEN 'dipinjam' THEN 2
                                WHEN 'dikembalikan' THEN 3 END
                                ");
                        } else {
                            $query = mysqli_query($koneksi, "SELECT * FROM peminjaman 
                                LEFT JOIN user ON user.id_user = peminjaman.id_user 
                                LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku 
                                WHERE peminjaman.id_user = $id_user_login
                                ORDER BY 
                                CASE status_peminjaman
                                WHEN 'dipinjam' THEN 1
                                WHEN 'proses' THEN 2
                                WHEN 'dikembalikan' THEN 3 END
                                ");
                        }

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
                                        <span class="badge bg-primary text-white">Dipinjam</span>
                                    <?php } elseif ($data['status_peminjaman'] == 'proses') { ?>
                                        <span class="badge bg-warning text-dark">Proses Pengembalian</span>
                                    <?php } else { ?>
                                        <span class="badge bg-success">Dikembalikan</span>
                                    <?php } ?>
                                </td>

                                <?php if ($_SESSION['user']['level'] == 'Admin') { ?>
                                    <td class="text-center">
                                        <a href="?page=peminjaman_ubah&id=<?php echo $data['id_peminjaman']; ?>" class="btn btn-primary btn-sm">
                                            Edit
                                        </a>
                                        <a onclick="return confirm('Apakah anda yakin menghapus data ini?');"
                                            href="?page=peminjaman_hapus&id=<?php echo $data['id_peminjaman']; ?>" class="btn btn-danger btn-sm">
                                            Hapus
                                        </a>
                                        <?php if ($data['status_peminjaman'] == 'proses') { ?>
                                            <a href="?page=peminjaman_selesai&id=<?php echo $data['id_peminjaman']; ?>" class="btn btn-success btn-sm">
                                                Dikembalikan
                                            </a>
                                        <?php } elseif ($data['status_peminjaman'] == 'dikembalikan') { ?>
                                            <span class="badge bg-secondary">Selesai</span>
                                        <?php } ?>
                                    </td>
                                    <?php } else {
                                    if ($data['status_peminjaman'] == 'dipinjam') {
                                    ?>
                                        <td class="text-center">
                                            <a href="?page=peminjaman_status_proses&id=<?php echo $data['id_peminjaman']; ?>" class="btn btn-success btn-sm">
                                                Kembalikan
                                            </a>
                                        </td>
                                    <?php
                                    }
                                    if ($data['status_peminjaman'] == 'dikembalikan') {
                                    ?>
                                        <!-- <td class="text-center">
                                            <a href="?page=peminjaman_status_proses&id=<?php echo $data['id_peminjaman']; ?>" class="btn btn-outline-primary btn-sm">
                                                Ulas Buku
                                            </a>
                                        </td> -->
                                <?php
                                    }
                                } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>