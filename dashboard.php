<?php 
session_start();

if( !isset($_SESSION["login"] )){
    header("Location: login.php");
    exit;
}
// Panggil koneksi
require 'functions.php';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- User CSS -->
    <link rel="stylesheet" href="style/style.css">
    <title>Dashboard Pengguna</title>
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>List Lamaran Perusahaan</h1>

    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="Mau Cari Apa..." autocomplete="off">
        <button type="submit" name="cari">Search !</button>
    </form>

    <br>

        <a class="btn btn-primary" href="tambah.php" role="button">Tambah Data</a>

    <br><br>

<div class="container">
    <table class="table table-striped" border="1" cellpadding="10" cellspacing="0">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>