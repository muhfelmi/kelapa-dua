<?php 
require 'functions.php';

if(isset($_POST["register"])){

    if(registrasi($_POST) > 0){
        echo "<script>
        alert('Pendaftaran Akun Berhasil');
        </script>";
    }
    else {
        echo mysqli_error($conn);
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        label {
            display: block;
        }
    </style>
    <title>Register Form</title>
</head>
<body>
    
    <h1>Register Form</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email">
            </li>
            <li>
                <label for="username">Username : </label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password : </label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <label for="password2">Confirm Password : </label>
                <input type="password" name="password2" id="password2">
            </li>
            <li>
                <button type="submit" name="register">Register!</button>
            </li>
        </ul>
    </form>
</body>
</html>