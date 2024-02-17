<?php
session_start();
require 'functions.php';

// Set Cookie
if(isset($_COOKIE["id"]) && isset($_COOKIE["key"])){
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];

    // Ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // Cek cookie dan username
    if($key === hash('sha256', $row["username"])){
        $_SESSION["login"] = true;
    }
}

// Cek Session
if( isset($_SESSION["login"] )){
    header("Location: dashboard.php");
    exit;
}


if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users
    WHERE username = '$username'");

    // Cek Username
    if(mysqli_num_rows($result) == 1){
        // Cek Password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){
            // Set Session
            $_SESSION["login"] = true;
            // Cek Remember Me
            if(isset($_POST["remember"])){
                // Membuat Cookie

                setcookie('id', $row["id"], time() + 600);
                setcookie('key', hash('sha256', $row['username']), time() + 600);
            }


            header("Location: dashboard.php");
        }
    }
    $error = true;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta name="author" content="iFelz" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="This is a login page template based on Bootstrap 5" />

    <link rel="stylesheet" href="style/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    
    <title>Login</title>
</head>
<body>
    <!-- <h1>Login</h1> -->

    <?php if(isset ($error)) : ?>
        <p style="color: red; font-style:italic;">Username / Password Salah!</p>
    <?php endif; ?>

    <section class="h-100">
      <div class="container h-100">
        <div class="row justify-content-sm-center h-100">
          <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
            <div class="text-center my-5">
              <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="logo" width="100" />
            </div>
            <div class="card shadow-lg">
              <div class="card-body p-5">
                <h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
                <form action="" method="POST" class="needs-validation" novalidate="" autocomplete="off">
                  <div class="mb-3">
                    <label class="mb-2 text-muted" for="username">Username</label>
                    <input id="username" type="text" class="form-control" name="username" value="" required autofocus />
                    <!-- <div class="invalid-feedback">Email is invalid</div> -->
                  </div>

                  <div class="mb-3">
                    <div class="mb-2 w-100">
                      <label class="text-muted" for="password">Password</label>
                      <a href="forgot.html" class="float-end"> Forgot Password? </a>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" required />
                    <div class="invalid-feedback">Password is required</div>
                  </div>

                  <div class="d-flex align-items-center">
                    <div class="form-check">
                      <input type="checkbox" name="remember" id="remember" class="form-check-input" />
                      <label for="remember" class="form-check-label">Remember Me</label>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary ms-auto">Login</button>
                  </div>
                </form>
              </div>
              <div class="card-footer py-3 border-0">
                <div class="text-center">Don't have an account? <a href="register.php" class="text-dark">Create One</a></div>
              </div>
            </div>
            <div class="text-center mt-5 text-muted">Copyright &copy; 2024 &mdash; iFelz</div>
          </div>
        </div>
      </div>
    </section>
</body>
</html>