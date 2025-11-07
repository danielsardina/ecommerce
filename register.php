<?php

session_start();
require_once("bd.php");

if(isset($_POST["email"]) && isset($_POST["name"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $name = $_POST["name"];
    $password = password_hash($_POST["password"] ?? "", PASSWORD_DEFAULT);

    $checkEmail = $mysqli->query("SELECT email FROM users WHERE email = '$email'");
    if($checkEmail->num_rows > 0) {
        echo "Ya existe una cuenta con el mismo email";
    } else {
        $mysqli->query("INSERT INTO users (email, name, password) VALUES ('$name', '$email', '$password');");
        header("Location: index.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <main>
        <form action="register.php" method="post">
            <input type="text" name="email" placeholder="Email" required>
            <input type="text" name="name" placeholder="Nombre" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <input type="submit" name="register" value="Register">
        </form>
    </main>
</body>
</html>