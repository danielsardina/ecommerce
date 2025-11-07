<?php
session_start();
require_once("bd.php");
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"]; 

    $resultado = $mysqli->query("SELECT * FROM users WHERE email='$email' ");
    if ($resultado->num_rows > 0) {
        $user = $resultado->fetch_assoc();
        if (password_verify($password, $user["password"])) {
            $_SESSION["name"] = $user["name"];
            $_SESSION["email"] = $user["email"];
            header('Location: index.php');
            exit();
        }
    }
    $_SESSION['login_error'] = 'Contraseña o email incorrectos';
   
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
    <div class="form-box" id="login-form">
        <form action="login.php" method="post">
            <h2>Login</h2>
            
            <?php if (isset($_SESSION['login_error'])): ?>
                    <?php
                    echo $_SESSION['login_error'];
                    unset($_SESSION['login_error']); 
                    ?>
            <?php endif; ?>

            <input type="email" name="email" placeholder="Email" required 
                   value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>

</html>