<?php
session_start();

if( isset($_SESSION["login"] )){
    header("Location: dashboard.php");
    exit;
}

require 'functions.php';

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
            header("Location: dashboard.php");
        }
    }
    $error = true;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php if(isset ($error)) : ?>
        <p style="color: red; font-style:italic;">Username / Password Salah!</p>
    <?php endif; ?>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username : </label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password : </label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>
</body>
</html>