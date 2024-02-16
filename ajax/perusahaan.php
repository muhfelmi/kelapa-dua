<?php 
require '../functions.php';

$keyword = $_GET["keyword"];
$query = "SELECT * FROM perusahaan WHERE
nama LIKE '%$keyword%' OR
alamat LIKE '%$keyword%' OR
posisi LIKE '%$keyword%'
";
$kompeni = query($query);


?>

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