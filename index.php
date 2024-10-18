<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Belajar CRUD Apotek dengan PHP Native</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="assets\bootstrap-5.3.3-dist\css\bootstrap.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Apotek CRUD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="?p=home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?p=obat">Data Obat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?p=about">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        <main>
            <?php 
            include 'apps/koneksi.php';

            $page = $_GET['p'] ?? '';
            $act = $_GET['a'] ?? '';

            if (!empty($page)) {
                $file = "pages/$page/" . (!empty($act) ? $act : "view") . ".php";
                if (file_exists($file)) {
                    require $file;
                } else {
                    echo "<div class='alert alert-danger'>Halaman tidak tersedia</div>";
                }
            } else {
                echo "<script> document.location.href='./?p=home'</script>";
            }
            ?>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center text-lg-start mt-5">
        <div class="text-center p-3">
            © 2024 Apotek CRUD: 
            <a class="text-dark" href="#">apotekcrud.com</a>
        </div>
    </footer>

    <!-- Link to Bootstrap JS -->
    <script src="assets\bootstrap-5.3.3-dist\js\bootstrap.bundle.min.js"></script>
</body>
</html>
