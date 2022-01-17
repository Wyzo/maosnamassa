<?php
session_start();

?>
</html>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" href="./imagens/aleatorias/logotipo.png">
    <title>Mãos na massa - Página</title>
</head>

<body style="background-color: #f1f1f1;">
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
<nav class="navbar navbar-expand-lg py-3 navbar-dark bg-light shadow align-middle">
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
                    <?php
                    error_reporting(0);
        
                    if($_SESSION["LOGADO"] == "true")
                    {
                        echo '<li class="nav-item"><a href="encomendar.php" class="nav-link text-danger mr-5">Encomendar</a></li>';
                        if($_SESSION["TIPO_CONTA"] == "admin")
                        {
                            echo '<li class="nav-item"><a href="dashboard.php" class="nav-link text-danger">dashboard</a></li>';
                            echo '<ul class="text-right nav navbar-nav flex-row justify-content-md-center justify-content-end flex-nowrap ms-auto">
                            <li class="nav-item align-end"><a href="perfil.php" class="nav-link text-danger">' . $_SESSION["email"] . '</a></li>
                            <img src="./imagens/profilepics/admin.jpg" alt="mdo" width="32" height="32" class="rounded-circle">
                            </ul>';
                            if($_SESSION["ENCOMENDA_ATIVA"] == true)
                            {
                              echo '<li class="nav-item mx-2"><a href="checkout.php" class="nav-link text-white fw-bold bg-danger" style="border-radius: 15px;"><i class="fas fa-shopping-cart"></i> Carrinho</a></li>
                              </body>';
                            }
                        }
                        else
                        {
                            echo '<ul class="text-right nav navbar-nav flex-row justify-content-md-center flex-nowrap ms-auto">
                            <li class="nav-item align-end"><a href="perfil.php" class="nav-link text-danger">' . $_SESSION["email"] . '</a></li>
                            <img href="perfil.php" src="./imagens/profilepics/utilizador.jpg" alt="mdo" width="32" height="32" class="rounded-circle">
                            </ul>';
                            if($_SESSION["ENCOMENDA_ATIVA"] == true)
                            {
                                echo '<li class="nav-item mx-2"><a href="checkout.php" class="nav-link text-white fw-bold bg-danger" style="border-radius: 15px;"><i class="fas fa-shopping-cart"></i> Carrinho</a></li>
                                </body>';
                            }
                        }
                        echo '<li class="nav-item"><a href="./funcoes/logout.php" class="nav-link text-danger">Sair</a></li>';
                    }
                    else
                    {
                        echo '<li class="nav-item"><a href="login.php" class="nav-link text-danger">Entrar/Registrar</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <div style="background-image: url('./imagens/aleatorias/bolo3.jpg'); height: 700px; background-size: cover; ">
        <div class="container" style="width: 700px; padding-top: 250px;">
            <h2 class="fw-bold text-white" style="font-size: 70px;">Mãos na massa</h2>
            <p class="fw-light text-white fs-2">Confeitaria tradicional portugesa</p>
            <hr class="bg-danger" style="height: 10px; width: 200px; opacity: 100;" />
        </div>
    </div>


    <div class="container text-black my-3 fw-bold">
        <div class="container text-center p-3">
            <h2>O que podemos fazer por si?</h2>
        </div>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <div class="row align-items-center mx-2 my-2" style="width: 600px; background-color: #FCFCFC;">
                <div class="col text-center mx-3">
                    <i class="fas fa-birthday-cake fa-6x" style="color:rgb(255, 0, 98)"></i>
                </div>
                <div class="col">
                    <h2 class="fs-3 fw-bold text-black">Bolos</h2>
                    <p class="fw-light">Criamos bolos personalizados ao gosto do cliente.</p>
                </div>
            </div>

            <div class="row align-items-center mx-2 my-2 p-4" style="width: 600px; background-color: #FCFCFC;">
                <div class="col text-center mx-3">
                    <i class="fas fa-cookie-bite fa-6x" style="color:rgb(255, 0, 98)"></i>
                </div>
                <div class="col">
                    <h2 class="fs-3 fw-bold text-black">Pastelaria</h2>
                    <p class="fw-light">Possuímos uma grande variedade de produtos de pastelaria.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="a text-center mb-4" style="background-image: url('./imagens/aleatorias/aa.jpg'); height: 500px;">
        <div class="container text-center" style="width: 700px; padding-top: 210px;"></div>
        <h2 class="fw-bold text-white" style="font-size: 70px;">Pastelaria</h2>
        <p class="fw-light text-white fs-2">Diversos produtos de pastelaria</p>
    </div>
    </div>

    <div class="a text-center" style="background-image: url('./imagens/aleatorias/b.jpg'); height: 500px;">
        <div class="container text-center" style="width: 700px; padding-top: 210px;"></div>
        <h2 class="fw-bold text-white" style="font-size: 70px;">Bolos personalizados</h2>
        <p class="fw-light text-white fs-2">Detalhados ao gosto do cliente</p>
    </div>
    </div>

    <div class="container text-center p-5">
        <div class="container mb-5">
            <h2>O que garantimos?</h2>
        </div>
        <div class="1 d-inline-block text-center mx-5">
            <i class="fas fa-star fa-6x" style="color:rgb(255, 0, 98)"></i>
            <h2 class="fs-3 fw-light text-black">Feedback</h2>
        </div>
        <div class="1 d-inline-block text-center mx-5">
            <i class="fas fa-gem fa-6x" style="color:rgb(255, 0, 98)"></i>
            <h2 class="fs-3 fw-light text-black">Qualidade</h2>
        </div>
        <div class="1 d-inline-block text-center mx-5">
            <i class="fas fa-clock fa-6x" style="color:rgb(255, 0, 98)"></i>
            <h2 class="fs-3 fw-light text-black">Rapidez</h2>
        </div>
    </div>
    <div class="a" style="background-color: #910037; color: #FFFFFF">
        <div class="container">
            <footer class="py-5">
                <div class="row">

                    <div class="col-2">
                        <h5>Acesso Rápido</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="galeria.php" class="nav-link p-0 text-white">Galeria</a>
                            </li>
                            <li class="nav-item mb-2"><a href="encomendar.php" class="nav-link p-0 text-white">Encomendar</a>
                            </li>
                            <li class="nav-item mb-2"><a href="ajuda.php" class="nav-link p-0 text-white">Ajuda</a></li>
                        </ul>
                    </div>
                    <div class="col-2">
                        <h5>Apoio ao cliente</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">(+351 961442777))</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-white">coisascombolo@gmail.com</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Messenger</a></li>
                        </ul>
                    </div>
                    <div class="col-2">
                        <h5>Quem somos</h5>
                        <ul class="nav flex-column">
                            <p>Somos uma empresa de confeitaria tradicional portuguesa, de cake disign.</p>
                        </ul>
                    </div>
                    <div class="col-4 offset-1">
                        <h2>Venha nos visitar!</h2>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3025.341241639568!2d-7.933954784341394!3d40.68848164699045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2348272b934bd5%3A0xa9ac82cb7b392147!2sLargo%20Rossio%2C%20Viseu!5e0!3m2!1spt-PT!2spt!4v1641941380433!5m2!1spt-PT!2spt"
                            width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/52c6714f28.js" crossorigin="anonymous"></script>
</body>
</html>