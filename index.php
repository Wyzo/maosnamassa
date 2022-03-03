<?php

$titulo = "Maos na massa - Index";
require_once 'funcoes/navbar.php';
//require_once 'funcoes/carrinho.php';
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
    <?php
    include_once './funcoes/footer.php';
    ?>
</body>
</html>