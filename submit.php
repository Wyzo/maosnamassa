<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" href="./imagens/Logotipo.png">
    <title>Mãos na massa - submit</title>
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
<nav class="navbar navbar-expand-lg navbar-dark bg-danger shadow" style="font-size: 13px;">
        <div class="container">
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>

            <div id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="#" class="nav-link text-white">@ Sobre a Mãos na Massa</a></li>
                    <li class="nav-item active"><a href="ajuda.php" class="nav-link text-white">Ajuda</a></li>
                </ul>
            </div>
        </div>
    </nav>
<nav class="navbar navbar-expand-lg py-3 navbar-dark shadow align-middle" style="background-image: url('./imagens/aleatorias/teste.png'); background-size: cover;">
        <div class="container">
            <a href="index.php" class="navbar-brand">
                <img src="./imagens/aleatorias/logotipo.png" width="45" alt="" class="d-inline-block align-middle mr-2"
                    style="width: 100px;">
            </a>

            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto align-middle">
                    <li class="nav-item"><a href="galeria.php" class="nav-link text-danger">Galeria</a></li>
                    <li class="nav-item"><a href="pastelaria.php" class="nav-link text-danger">Pastelaria</a></li>
                    <?php
                    error_reporting(0);
        
                    if($_SESSION["LOGADO"] == "true")
                    {
                        echo '<li class="nav-item"><a href="encomendar.php" class="nav-link text-danger mr-5">Encomendar</a></li>';
                        if($_SESSION["TIPO_CONTA"] == "admin")
                        {
                            echo '<li class="nav-item"><a href="dashboard.php" class="nav-link text-danger">dashboard</a></li>';
                            if($_SESSION["ENCOMENDA_ATIVA"] == true)
                            {
                              echo '<li class="nav-item mx-2"><a href="checkout.php" class="nav-link text-white fw-bold bg-danger" style="border-radius: 15px;"><i class="fas fa-shopping-cart"></i> Carrinho</a></li>
                              </body>';
                            }
                        }
                        else
                        {
                            if($_SESSION["ENCOMENDA_ATIVA"] == true)
                            {
                                echo '<li class="nav-item mx-2"><a href="checkout.php" class="nav-link text-white fw-bold bg-danger" style="border-radius: 15px;"><i class="fas fa-shopping-cart"></i> Carrinho</a></li>
                                </body>';
                            }
                        }
                    }
                    else
                    {
                        echo '<li class="nav-item"><a href="login.php" class="nav-link text-danger">Entrar/Registrar</a></li>';
                    }
                    ?>
                </ul>
            </div>
            <div class="containe text-end">
                <?php
                if ($_SESSION["LOGADO"] == "true") {
                    echo '<ul class="text-right nav navbar-nav flex-row justify-content-md-center justify-content-end flex-nowrap ms-auto">
                    <li class="nav-item align-end"><a href="perfil.php" class="nav-link text-danger">' . $_SESSION["email"] . '</a></li>
                    <img src="./imagens/profilepics/admin.jpg" alt="mdo" width="32" height="32" class="rounded-circle">
                    <li class="nav-item"><a href="./funcoes/logout.php" class="nav-link text-danger">Sair</a></li>
                    </ul>';
                }
                ?>
            </div>
        </div>
    </nav>
    <div class="container text-center" style="margin-top: 200px;">
        <img src="./imagens/aleatorias/certo.png" width="45" alt="" class="d-inline-block align-middle mr-2" style="width: 100px;">
        <h1>A sua mensagem foi enviada</h1>
        <p>Iremos responder à sua mensagem em alguns dias</p>
    </div>
    
</body>

</html>