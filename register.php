<?php

require_once("bd.php");

if(isset($_POST["email"]) && isset($_POST["name"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $name = $_POST["name"];
    $password = password_hash($_POST["password"] ?? "", PASSWORD_DEFAULT);

    $stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email,);
    $stmt->execute();
    $checkEmail = $stmt->get_result();

    $error = "";

    if($checkEmail->num_rows > 0) {
            $error = "Ya existe una cuenta con el mismo email";
    } else {
        $stmt = $mysqli->prepare("INSERT INTO users (email, name, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss",$email, $name, $password);

        if($stmt->execute()) {
            header("Location: index.php");
            exit();
        }else {
            $error =  "error al registrar el usuario";
        }
    }
    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
    <main>
        <div class="form-box">
            <form action="register.php" method="post">
                <h2>Register</h2>
                <?= !empty($error) ? $error : ""  ?>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="name" placeholder="Nombre" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <input type="submit" name="register" value="Register">
            </form>
        </div>
    </main>
</body>
</html>