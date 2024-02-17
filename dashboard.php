<?php 
session_start();
require 'functions.php';

if( !isset($_SESSION["login"] )){
    header("Location: login.php");
    exit;
}
$kompeni = query("SELECT * FROM perusahaan");

// Search Feature
if( isset($_POST["cari"])) {
    $kompeni = cari($_POST["keyword"]);
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- User CSS -->
    <link rel="stylesheet" href="style/style.css">
    <title>Dashboard Pengguna</title>
</head>

    <nav class="navbar bg-info mb-3 py-3">
    <div class="container-fluid">
        <a class="navbar-brand fw-medium">Dashboard</a>
        <form class="d-flex" role="search">
            <input class="form-control px-5" name="keyword" id="keyword" type="search" placeholder="Search" aria-label="Search">
        </form>
        <a class="btn btn-danger" href="logout.php">Logout</a>
    </div>
    </nav>

<body>
    <div class="container-fluid">
        <h1>List Lamaran Perusahaan</h1>
        <a class="btn btn-primary" href="tambah.php" role="button">Tambah Data</a>
    </div>

<div class="container-xxl mt-4" id="container">
    <table class="table table-striped">
        <tr>
            <th>No.</th>
            <th>Action</th>
            <!-- <th>Gambar</th> -->
            <th>Alamat</th>
            <th>Perusahaan</th>
            <th>Posisi</th>
            <th>Kirim Via</th>
            <th>Info Loker</th>
            <th>Link Loker</th>
            <th>Keterangan</th>
            <th>Status Apply</th>
            <th>Tanggal Apply</th>
            <th>Response</th>
            <th>Alasan</th>
        </tr>

        <?php $no = 1; ?>
        <?php foreach ($kompeni as $row) : ?>
        <tr>
            <td><?= $no++; ?></td> <!-- Menampilkan nomor urutan dan kemudian menambahkan variabel $no -->
            <td>
                <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |
                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah yakin ingin menghapus data?')">Hapus</a>
            </td>
            <!-- <td>Gambar.png</td> -->
            <td><?= $row["alamat"]; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["posisi"]; ?></td>
            <td><?= $row["kirim_via"]; ?></td>
            <td><?= $row["info_loker"]; ?></td>
            <td><a href="<?= $row["link_loker"]; ?>"><?= $row["link_loker"]; ?></a></td>
            <td><?= $row["keterangan"]; ?></td>

            <td><?= $row["status_apply"]; ?></td>
            <td><?= $row["date_apply"]; ?></td>
            <td><?= $row["response"]; ?></td>
            <td><?= $row["alasan"]; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
 
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    
    <!-- User JS -->
    <script src="js/script.js"></script>
</body>
</html>