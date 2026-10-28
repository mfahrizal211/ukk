<?php
if (getenv('VERCEL')) {
    require_once __DIR__ . '/koneksi_online.php';
} else {
    require_once __DIR__ . '/koneksi.php';
}
if (!isset($_SESSION['user'])) {
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Perpustakaan Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed <?php echo ($_SESSION['user']['level'] == 'User') ? 'sb-sidenav-toggled' : ''; ?>">
    <nav class="sb-topnav navbar navbar-expand navbar-primary bg-light">
        <a class="navbar-brand ps-3" href="index.php">Perpustakaan Digital</a>

        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <div class="collapse navbar-collapse w-100 order-1 order-lg-0" id="navbarNav">
            <?php if ($_SESSION['user']['level'] == 'User') { ?>
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link text-dark fw-semibold" href="?">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link text-dark fw-semibold" href="?page=buku_user">Buku</a></li>
                    <li class="nav-item"><a class="nav-link text-dark fw-semibold" href="?page=peminjaman">Peminjaman</a></li>
                </ul>
        </div>
    <?php }
    ?>
    <?php if ($_SESSION['user']['level'] == 'Admin') { ?>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input hidden class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button hidden class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
    <?php } else { ?>
        <form action="index.php" method="GET" class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input type="hidden" name="page" value="pencarian">

                <input name="keyword" autofocus autocomplete="off" class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>
    <?php } ?>
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user fa-fw"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="?page=profil">Profil</a></li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
        </li>
    </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="?">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Navigasi</div>
                        <?php if ($_SESSION['user']['level'] == 'User') {
                        ?>
                            <a class="nav-link" href="?page=profil">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Profil
                            </a>
                            <!-- <a class="nav-link" href="?page=buku_user">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Buku
                            </a>
                            <a class="nav-link" href="?page=peminjaman">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Peminjaman
                            </a> -->
                            <a class="nav-link text-danger" href="logout.php">
                                <div class="sb-nav-link-icon text-danger"><i class="fa-solid fa-arrow-right-from-bracket"></i></div>
                                Logout
                            </a>
                        <?php
                        } else {
                        ?>

                            <a class="nav-link" href="?page=user">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Anggota
                            </a>
                            <a class="nav-link" href="?page=kategori">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Kategori
                            </a>
                            <a class="nav-link" href="?page=buku">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Buku
                            </a>
                            <a class="nav-link" href="?page=peminjaman">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Peminjaman
                            </a>
                            <a class="nav-link" href="?page=ulasan">
                                <div class="sb-nav-link-icon"><i class="fas fa-comment"></i></div>
                                Ulasan
                            </a>

                            <!-- <a class="nav-link" href="?page=laporan">
                                <div class="sb-nav-link-icon"><i class="fas fa-print"></i></div>
                                Laporan Peminjaman
                            </a> -->
                            <a class="nav-link text-danger" href="logout.php">
                                <div class="sb-nav-link-icon text-danger"><i class="fa-solid fa-arrow-right-from-bracket"></i></div>
                                Logout
                            </a>
                        <?php } ?>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php echo $_SESSION['user']['nama_lengkap']; ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <?php
                    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
                    if (file_exists($page . '.php')) {
                        include $page . '.php';
                    } else {
                        include '404.php';
                    }
                    ?>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Perpustakaan Digital 2026</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>
