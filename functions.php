<?php
require 'db_conn.php';
// Function Query
function query($query) {
    global $conn; // Menjadikan variabel $conn global agar dapat diakses di dalam fungsi
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die(mysqli_error($conn)); // Menampilkan pesan error jika query gagal
    }
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
     $alamat = htmlspecialchars($data["alamat"]);
     $nama = htmlspecialchars($data["nama"]);
     $posisi = htmlspecialchars($data["posisi"]);
     $kirim_via = htmlspecialchars($data["kirim_via"]);
     $info_loker = htmlspecialchars($data["info_loker"]);
     $link_loker = htmlspecialchars($data["link_loker"]);
     $keterangan = htmlspecialchars($data["keterangan"]);

     $status_apply = htmlspecialchars($data["status_apply"]);
     $date_apply = htmlspecialchars($data["date_apply"]);
     $response = htmlspecialchars($data["response"]);
     $alasan = htmlspecialchars($data["alasan"]);

     // Query
    $query = "INSERT INTO perusahaan (alamat, nama, posisi, kirim_via, info_loker, link_loker, keterangan, status_apply, date_apply, response, alasan)
    VALUES ('$alamat', '$nama', '$posisi', '$kirim_via', '$info_loker', '$link_loker', '$keterangan', '$status_apply', '$date_apply', '$response', '$alasan')";
 
    
    // echo $query;
    // mysqli_query($conn, $query);
    return mysqli_query($conn, $query);
    
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM perusahaan WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    $id = $data["id"];
    $alamat = htmlspecialchars($data["alamat"]);
    $nama = htmlspecialchars($data["nama"]);
    $posisi = htmlspecialchars($data["posisi"]);
    $kirim_via = htmlspecialchars($data["kirim_via"]);
    $info_loker = htmlspecialchars($data["info_loker"]);
    $link_loker = htmlspecialchars($data["link_loker"]);
    $keterangan = htmlspecialchars($data["keterangan"]);

    $status_apply = htmlspecialchars($data["status_apply"]);
    $date_apply = htmlspecialchars($data["date_apply"]);
    $response = htmlspecialchars($data["response"]);
    $alasan = htmlspecialchars($data["alasan"]);

     // Query
    $query = "UPDATE perusahaan SET
    alamat = '$alamat',
    nama = '$nama',
    posisi = '$posisi',
    kirim_via = '$kirim_via',
    info_loker = '$info_loker',
    link_loker = '$link_loker',
    keterangan = '$keterangan',
    status_apply = '$status_apply',
    date_apply = '$date_apply',
    response = '$response',
    alasan = '$alasan'
    WHERE id = $id";

    return mysqli_query($conn, $query);
}

function cari($keyword){
    $query = "SELECT * FROM perusahaan
    WHERE
    nama LIKE '%$keyword%' OR
    alamat LIKE '%$keyword%' OR
    posisi LIKE '%$keyword%'
    ";

    return query($query);
}

function registrasi($data){
    global $conn;

    $email = strtolower(stripslashes($data["email"]));
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);


    // Cek Duplicate Email
    $dupEmail = mysqli_query($conn, "SELECT username FROM users 
    WHERE email = '$email'");
    if(mysqli_fetch_assoc($dupEmail)){
        echo "<script>
        alert('Email sudah pernah digunakan!')</script>";

        return false;
    }

    // Cek Duplicate Username
    $dupUser = mysqli_query($conn, "SELECT username FROM users 
    WHERE username = '$username'");
    if(mysqli_fetch_assoc($dupUser)){
        echo "<script>
        alert('Username sudah pernah digunakan!')</script>";

        return false;
    }

    // Cek Confirm Password
    if($password !== $password2){
        echo "<script>
                alert('Konfirmasi Password Tidak Sesuai!');
                </script>";

        return false;
    }

    // Encrypt Password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Simpan ke Database
    mysqli_query($conn, "INSERT INTO users (email, username, password)
    VALUES ('$email', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
?>
