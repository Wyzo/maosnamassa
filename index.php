<?php

$titulo = "Maos na massa - Página principal";
require_once 'funcoes/navbar.php';
require_once 'funcoes/carrinho.php';
?>
    <div style="background-image: url('./imagens/aleatorias/bolo3.jpg'); height: 700px; background-size: cover; ">
        <div class="container" style="width: 700px; padding-top: 250px;">
            <h2 class="fw-bold text-white" style="font-size: 70px;">Mãos na massa</h2>
            <p class="fw-light text-white fs-2">Confeitaria tradicional portuguesa</p>
            <hr class="bg-danger" style="height: 10px; width: 200px; opacity: 100;" />
        </div>
    </div>


    <div class="container text-black my-3 fw-bold">
        <div class="container text-center p-3">
            <h2>O que podemos fazer por si?</h2>
        </div>
        <div class="row text-center">
            <div class="col mx-2 p-3" style="background-color: #FCFCFC;">
                <div class="esquerda d-inline-block mx-5">
                    <i class="fas fa-birthday-cake fa-6x" style="color:rgb(255, 0, 98)"></i>
                </div>
                <div class="direita d-inline-block text-start" style="width: 300px">
                    <h2 class="fs-3 fw-bold text-black">Bolos</h2>
                    <p class="fw-light">Criamos bolos personalizados ao gosto do cliente.</p>
                </div>
            </div>
            <div class="col mx-2 p-3" style="background-color: #FCFCFC;">
                <div class="esquerda d-inline-block mx-5">
                    <i class="fas fa-cookie-bite fa-6x" style="color:rgb(255, 0, 98)"></i>
                </div>
                <div class="direita d-inline-block text-start" style="width: 300px">
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