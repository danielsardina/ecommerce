<?php
if (isset($_SESSION["email"])) {
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $_SESSION["email"]);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $user = $resultado->fetch_assoc();
}
?>

<header>
    <nav>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
        <a href="logout.php">Logout</a>
    </nav>
    <div>
        <?= "<p class='user-info'>" . $user['name'] . " : <span>" . $user["balance"] . "€</span></p>" ?>
    </div>
</header>