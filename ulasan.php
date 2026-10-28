<h1 class="mt-4">Ulasan Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <a href="?page=ulasan_tambah" class="btn btn-primary mb-2">+ Tambah Data</a>
                <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <?php if ($_SESSION['user']['level'] == 'Admin') { ?>
                                <th>User</th>
                            <?php } ?>
                            <th>Buku</th>
                            <th>Ulasan</th>
                            <th>Rating</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        if ($_SESSION['user']['level'] == 'Admin') {
                            $query = mysqli_query($koneksi, "SELECT * FROM ulasan_buku 
                            LEFT JOIN user ON user.id_user = ulasan_buku.id_user 
                            LEFT JOIN buku ON buku.id_buku = ulasan_buku.id_buku");
                        } else {
                            $query = mysqli_query($koneksi, "SELECT * FROM ulasan_buku LEFT JOIN user ON user.id_user = ulasan_buku.id_user LEFT JOIN buku ON buku.id_buku = ulasan_buku.id_buku WHERE ulasan_buku.id_user =" . $_SESSION['user']['id_user']);
                        }

                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <?php if ($_SESSION['user']['level'] == 'Admin') { ?>
                                    <td><?php echo $data['nama_lengkap']; ?></td>
                                <?php } ?>
                                <td><?php echo $data['judul']; ?></td>
                                <td><?php echo $data['ulasan']; ?></td>
                                <td><?php echo $data['rating']; ?></td>
                                <td>
                                    <a href="?page=ulasan_ubah&id=<?php echo $data['id_ulasan']; ?>"><i class="btn btn-circle btn-primary btn-md fas fa-edit"></i></a>
                                    <a onclick="return confirm('Apakah anda yakin menghapus data ini?');"
                                        href="?page=ulasan_hapus&id=<?php echo $data['id_ulasan']; ?>"><i
                                            class="btn btn-circle btn-danger btn-md fas fa-trash"></i></a>
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