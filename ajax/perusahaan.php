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

<div class="table-responsive-xl mt-4" id="container">
    <table class="table table-hover text-center align-middle">
        <thead class="table-dark align-middle">
            <tr>
                <th>No</th>
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
        </thead>

        <?php $no = 1; ?>
        <?php foreach ($kompeni as $row) : ?>
        <tbody class="">
            <tr>
                <td class="fw-bold"><?= $no++; ?></td> <!-- Menampilkan nomor urutan dan kemudian menambahkan variabel $no -->
                <td>
                    <div class="container d-flex flex-column py-2">
                        <a class="btn btn-primary" href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a>
                        <a class="btn btn-danger" href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah yakin ingin menghapus data?')">Hapus</a>
                    </div>
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
        </tbody>
        
        <?php endforeach; ?>
    </table>
</div>