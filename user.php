<h1 class="mt-4">Anggota</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <a href="?page=user_tambah" class="btn btn-primary mb-2">+ Tambah Anggota</a>
                <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM user");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $data['username']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td><?php echo $data['nama_lengkap']; ?></td>
                                <td><?php echo $data['alamat']; ?></td>
                                <td><?php echo $data['level']; ?></td>
                                <td>
                                    <a href="?page=ulasan_ubah&id=<?php echo $data['id_user']; ?>"><i class="btn btn-circle btn-primary btn-md fas fa-edit"></i></a>
                                    <a onclick="return confirm('Apakah anda yakin menghapus data ini?');"
                                        href="?page=ulasan_hapus&id=<?php echo $data['id_user']; ?>"><i
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