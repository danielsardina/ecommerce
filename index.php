<?php require_once("bd.php") ?>
<?php require_once("auth_required.php") ?>

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
                    //echo "nombre: ".$producto[1]." - Precio: ".$producto[2]."<br>";
                    $html ="
                    <div>
                    <p>Nombre :$producto[1]</p>
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