<?php
session_start();

if( !isset($_SESSION["login"] )){
    header("Location: login.php");
    exit;
}

require 'functions.php';

// Cek apakah tombol submit sudah di-klik
if(isset($_POST["submit"])){
    // Memanggil fungsi tambah
    if (tambah($_POST)) {
        echo "
        <script>
            alert('Data Berhasil Disimpan !');
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
    <h1>Tambah Data Perusahaan</h1>

    <button>
        <a href="dashboard.php">Kembali</a>
    </button>

    <form action="" method="post">
        <ul>
            <li>
                <label for="alamat" class="form-label">Alamat / Kota : </label>
                <input type="text" name="alamat" id="alamat" required>
            </li>
            <li>
                <label for="nama">Nama Perusahaan : </label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="posisi">Posisi yang dilamar : </label>
                <input type="text" name="posisi" id="posisi" required>
            </li>
            <li>
                <label for="kirim_via">Pengiriman Via : </label>
                <select name="kirim_via" id="kirim_via">
                    <option value="def" selected>SILAHKAN DIGANTI</option>
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
                <select name="info_loker" id="info_loker">
                    <option value="def" selected>SILAHKAN DIGANTI</option>
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
                <textarea name="link_loker" id="link_loker"></textarea>
            </li>
            <li>
                <label for="keterangan">Keterangan : </label>
                <textarea name="keterangan" id="keterangan"></textarea>
            </li>
            <li>
                <label for="status_apply">Status Apply : </label>
                <select name="status_apply" id="status_apply">
                    <option value="sudah">Sudah</option>
                    <option value="belum" selected>Belum</option>
                </select>
            </li>
            <li>
                <label for="date_apply">Tanggal Apply : </label>
                <input type="date" id="date_apply" name="date_apply"/>
            </li>
            <li>
                <label for="response">Respon : </label>
                <select name="response" id="response">
                    <option value="lolos">Lolos</option>
                    <option value="ditolak">Ditolak</option>
                    <option value="kacang">Dikacangin</option>
                    <option value="menunggu" selected>Menunggu</option>
                </select>
            </li>
            <li>
                <label for="alasan">Alasan : </label>
                <textarea name="alasan" id="alasan"></textarea>
            </li>
            <li>
                <button type="submit" name="submit">Submit !</button>
            </li>
        </ul>

    </form>
</body>
</html>