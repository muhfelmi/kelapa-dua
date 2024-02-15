<?php
session_start();

if( !isset($_SESSION["login"] )){
    header("Location: login.php");
    exit;
}

require 'functions.php';
// Ambil data dari url
$id = $_GET["id"];

// Query
$kompeni = query("SELECT * FROM perusahaan WHERE id = $id")[0];

// Cek apakah tombol submit sudah di-klik
if(isset($_POST["submit"])){
    // Memanggil fungsi ubah
    if (ubah($_POST)) {
        echo "
        <script>
            alert('Data Berhasil Di Update !!!');
            document.location.href = 'dashboard.php';
        </script>";
    } else {
        die("Query error: " . mysqli_error($conn)); // Menampilkan pesan error jika query gagal
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Update Data</h1>

    <button>
        <a href="dashboard.php">Kembali</a>
    </button>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $kompeni["id"]; ?>">
        <ul>
            <li>
                <label for="alamat">Alamat / Kota : </label>
                <input type="text" name="alamat" id="alamat" required value="<?= $kompeni["alamat"]; ?>">
            </li>
            <li>
                <label for="nama">Nama Perusahaan : </label>
                <input type="text" name="nama" id="nama" required value="<?= $kompeni["nama"]; ?>">
            </li>
            <li>
                <label for="posisi">Posisi yang dilamar : </label>
                <input type="text" name="posisi" id="posisi" required value="<?= $kompeni["posisi"]; ?>">
            </li>
            <li>
                <label for="kirim_via">Pengiriman Via : </label>
                <select name="kirim_via" id="kirim_via" value="<?= $kompeni["kirim_via"]; ?>">
                    <option value="email">Email</option>
                    <option value="gforms">Google Forms</option>
                    <option value="wa">WhatsApp</option>
                    <option value="ig">Instagram</option>
                    <option value="web">Website</option>
                    <option value="jobportal">Job Portal</option>
                    <option value="lainnya">Lainnya</option>
                </select>
            </li>
            <li>
                <label for="info_loker">Info Loker : </label>
                <select name="info_loker" id="info_loker" value="<?= $kompeni["info_loker"]; ?>">
                    <option value="ig">Instagram</option>
                    <option value="wa">WhatsApp</option>
                    <option value="email">Email</option>
                    <option value="m2m">M2M</option>
                    <option value="jobportal">Job Portal</option>
                    <option value="lainnya">Lainnya</option>
                </select>
            </li>
            <li>
                <label for="link_loker">Link Loker : </label>
                <textarea name="link_loker" id="link_loker"><?= $kompeni["link_loker"]; ?></textarea>
            </li>
            <li>
                <label for="keterangan">Keterangan : </label>
                <textarea name="keterangan" id="keterangan"><?= $kompeni["keterangan"]; ?></textarea>
            </li>
            <li>
                <label for="status_apply">Status Apply : </label>
                <select name="status_apply" id="status_apply" value="<?= $kompeni["status_apply"]; ?>">
                    <option value="sudah">Sudah</option>
                    <option value="belum">Belum</option>
                </select>
            </li>
            <li>
                <label for="date_apply">Tanggal Apply : </label>
                <input type="date" id="date_apply" name="date_apply" value="<?= $kompeni["date_apply"]; ?>">
            </li>
            <li>
                <label for="response">Respon : </label>
                <select name="response" id="response" value="<?= $kompeni["response"]; ?>">
                    <option value="lolos">Lolos</option>
                    <option value="ditolak">Ditolak</option>
                    <option value="kacang">Dikacangin</option>
                    <option value="menunggu">Menunggu</option>
                </select>
            </li>
            <li>
                <label for="alasan">Alasan : </label>
                <textarea name="alasan" id="alasan"><?= $kompeni["alasan"]; ?></textarea>
            </li>
            <li>
                <button type="submit" name="submit">UPDATE DATA !</button>
            </li>
        </ul>

    </form>
</body>
</html>