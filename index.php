<?php 
    require_once("auth_required.php");
    require_once("bd.php");

    if (isset($_SESSION["email"]) && isset($_POST["producto"])) {
        $stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $_SESSION["email"]);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $user = $resultado->fetch_assoc();

        $stmt = $mysqli->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->bind_param("s", $_POST["producto"]);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $producto = $resultado->fetch_assoc();

        if($producto["stock"] >= 1 && $user["balance"] >= $producto["price"]) {
            $stmt = $mysqli->prepare("UPDATE products SET stock = stock - 1 WHERE id = ?");
            $stmt->bind_param("i", $producto["id"]);
            $stmt->execute();

            $stmt = $mysqli->prepare("UPDATE users SET balance = balance - ? WHERE email = ?");
            $stmt->bind_param("ds", $producto["price"], $user["email"]);
            $stmt->execute();

            if(isset($_SESSION["number"])) {
                $_SESSION["number"] += 1;
            } else {
                $_SESSION["number"] = 1;
            }

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
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <?php include_once("header.php") ?>
    <main>
        <h1>SS Pescados</h1>

        <div class="productos">
            <?php
            $stmt = $mysqli->prepare("SELECT * FROM products ");
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($resultado->num_rows > 0) {
                $productos = $resultado->fetch_all();
                foreach ($productos as $producto) {
                    $html ="
                    <div class='producto'>
                    <form method='POST' action='index.php'>
                    <img src='$producto[4]'/>
                    <p><b>Nombre</b>: $producto[1]</p>
                    <p><b>Precio</b>: $producto[2]€</p>
                    <p><b>Stock</b>: $producto[3]</p>
                    <input type='submit' value='Comprar'>
                    <input type='hidden' name='producto' id='producto' value='$producto[0]'>
                    </form>
                    </div>
                    ";
                    echo $html;
                }
            }
            ?>
        </div>



    </main>
    <?php include_once("footer.php") ?>
</body>

</html>