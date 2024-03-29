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
    <meta charset="UTF-8" />
    <meta name="author" content="iFelz" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="This is a login page template based on Bootstrap 5" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="stylesheet" href="style/style-tambah.css" />

    <title>KELAPA | Tambah Data</title>
  </head>
  <body>
    <nav class="navbar bg-info mb-3">
            <div class="container-fluid d-flex justify-content-between">
                <a class="navbar-brand fw-medium">Tambah Data</a>
                <a class="btn btn-warning" href="dashboard.php">Kembali</a>
            </div>
        </nav>

    <section class="h-100 mb-5">
      <div class="container h-100">
        <div class="row justify-content-sm-center h-100">
          <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-9 col-sm-9">
            <div class="text-center my-5">
              <!-- <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="logo" width="100" /> -->
            </div>
            <div class="card shadow-lg">
              <div class="card-body p-5">
                <h1 class="fs-4 card-title fw-bold mb-4 text-center">Tambah Data</h1>
                <form action="" method="POST" class="needs-validation" autocomplete="off">
                  <div class=" mb-3">
                    <label for="alamat" class="form-label d-block">Alamat / Kota : </label>
                    <input type="text" name="alamat" id="alamat" required />
                  </div>

                  <div class="mb-3">
                    <label class="form-label form-label d-block" for="nama">Nama Perusahaan : </label>
                    <input type="text" name="nama" id="nama" required />
                  </div>

                  <div class="mb-3">
                    <label class="form-label d-block" for="posisi">Posisi yang dilamar : </label>
                    <input type="text" name="posisi" id="posisi" required />
                  </div>

                  <div class="mb-3">
                    <label class="form-label d-block" for="kirim_via">Pengiriman Via : </label>
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
                  </div>

                  <div class="mb-3">
                    <label class="form-label d-block" for="info_loker">Info Loker : </label>
                    <select name="info_loker" id="info_loker">
                      <option value="def" selected>SILAHKAN DIGANTI</option>
                      <option value="ig">Instagram</option>
                      <option value="wa">WhatsApp</option>
                      <option value="email">Email</option>
                      <option value="m2m">M2M</option>
                      <option value="jobportal">Job Portal</option>
                      <option value="lainnya">Lainnya</option>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label class="form-label d-block" for="link_loker">Link Loker : </label>
                    <textarea name="link_loker" id="link_loker"></textarea>
                  </div>

                  <div class="mb-3">
                    <label class="form-label d-block" for="keterangan">Keterangan : </label>
                    <textarea name="keterangan" id="keterangan"></textarea>
                  </div>

                  <div class="mb-3">
                    <label class="d-block" for="status_apply">Status Apply : </label>
                    <select name="status_apply" id="status_apply">
                      <option value="sudah">Sudah</option>
                      <option value="belum" selected>Belum</option>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label class="d-block" for="date_apply">Tanggal Apply : </label>
                    <input type="date" id="date_apply" name="date_apply" />
                  </div>

                  <div class="mb-3">
                    <label class="d-block" for="response">Respon : </label>
                    <select name="response" id="response">
                      <option value="lolos">Lolos</option>
                      <option value="ditolak">Ditolak</option>
                      <option value="kacang">Dikacangin</option>
                      <option value="menunggu" selected>Menunggu</option>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label class="d-block" for="alasan">Alasan : </label>
                    <textarea name="alasan" id="alasan"></textarea>
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary ms-auto">Tambah Data</button>
                </form>
              </div>
              <div class="card-footer py-3 border-0">
                <div class="text-center">Pastikan data yang di input sudah benar!</div>
              </div>
            </div>
            <!-- <div class="text-center mt-5 text-muted">Copyright &copy; 2024 &mdash; iFelz</div> -->
          </div>
        </div>
      </div>
    </section>

    <footer class="footer fixed-bottom bg-info text-white text-center pb-1 pt-2">
    <p>Created with <i class="bi bi-heart-pulse-fill text-danger"></i> by <a href="#" class="text-white fw-bold">iFelz</a></p>
    </footer>

  </body>
</html>
