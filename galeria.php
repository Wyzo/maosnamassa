<?php
$titulo = "Maos na massa - Galeria";
require_once 'funcoes/navbar.php';
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" href="./imagens/Logotipo.png">
    <title>Mãos na massa - Ajuda</title>
</head>
<style>
    /* width */
    ::-webkit-scrollbar {
            width: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #ffffff;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #c92b4d;
        }
</style>
<body>
    <div class="a text-center mb-4" style="background-image: url('./imagens/aleatorias/background.jpg'); height: 300px;">
        <div class="container text-center" style="width: 700px; padding-top: 90px;"></div>
        <h2 class="fw-bold text-white" style="font-size: 70px;">Galeria</h2>
        <p class="fw-light text-white fs-2">Área de exposição</p>
    </div>

    <div class="a">
        <div class="container">
            <div class="row">
                <?php

                $dir_path = "./imagens/galeria/";
                $extensions_array = array('jpg', 'png', 'jpeg');

                if (is_dir($dir_path)) {
                    $files = scandir($dir_path);

                    for ($i = 0; $i < count($files); $i++) {
                        if ($files[$i] != '.' && $files[$i] != '..') {
                            $file = pathinfo($files[$i]);
                            $extension = $file['extension'];

                            if (in_array($extension, $extensions_array)) {
                                // show image
                                echo '<div class="col-sm-6 col-md-4 mb-3">';
                                    echo "<img src='$dir_path$files[$i]' class='fluid img-thumbnail'><br>";
                                echo '</div>';
                            }
                        }
                    }
                }

                ?>
            </div>
        </div>
    </div>
    <?php
    include_once './funcoes/footer.php';
    ?>
    <script src="https://kit.fontawesome.com/52c6714f28.js" crossorigin="anonymous"></script>
</body>

</html>