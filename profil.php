<h1 class="mt-4">Profil</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table" id="" width="100%" cellspacing="0">
                    <tbody>
                        <?php
                        ?>
                        <tr>
                            <td style="width: 150px; vertical-align: top;">Username</td>
                            <td style="width: 10px; vertical-align: top;">:</td>
                            <td style="font-weight: bold;"><?= $_SESSION['user']['username'] ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px; vertical-align: top;">Nama Lengkap</td>
                            <td style="width: 10px; vertical-align: top;">:</td>
                            <td style="font-weight: bold;"><?= $_SESSION['user']['nama_lengkap'] ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px; vertical-align: top;">Email</td>
                            <td style="width: 10px; vertical-align: top;">:</td>
                            <td style="font-weight: bold;"><?= $_SESSION['user']['email'] ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px; vertical-align: top;">Alamat</td>
                            <td style="width: 10px; vertical-align: top;">:</td>
                            <td style="font-weight: bold;"><?= $_SESSION['user']['alamat'] ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px; vertical-align: top;">Status</td>
                            <td style="width: 10px; vertical-align: top;">:</td>
                            <td style="font-weight: bold;"><?= $_SESSION['user']['level'] ?></td>
                        </tr>
                        <?php

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>