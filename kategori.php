<h1 class="mt-4">Kategori Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <a href="?page=kategori_tambah" class="btn btn-primary mb-2">+ Tambah Data</a>
                <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th>Nama Kategori</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM kategori_buku");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $data['nama_kategori']; ?></td>
                                <td>
                                    <a href="?page=kategori_ubah&id=<?php echo $data['id_kategori']; ?>"><i class="btn btn-circle btn-primary btn-md fas fa-edit"></i></a>
                                    <a onclick="return confirm('Apakah anda yakin menghapus data ini?');"
                                        href="?page=kategori_hapus&id=<?php echo $data['id_kategori']; ?>"><i
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