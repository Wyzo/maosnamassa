<?php

error_reporting(0);

$titulo = "Maos na massa - Encomendar";
require_once 'funcoes/navbar.php';
require_once 'funcoes/carrinho.php';

if ($_SESSION["ENCOMENDA_ATIVA"] == true) {
    header("Location: checkout.php");
}

?>
    <div class="a text-center mb-4" style="background-image: url('./imagens/aleatorias/b.jpg'); height: 300px;">
        <div class="container text-center" style="width: 700px; padding-top: 90px;"></div>
        <h2 class="fw-bold text-white" style="font-size: 70px;">Encomendar</h2>
        <p class="fw-light text-white fs-2">Idealize o seu bolo</p>
    </div>
    <div class="container">
        <form method="post" action="./funcoes/validarEncomenda.php">
            <fieldset>
                <h2>Vamos começar!</h2>
                <p>Preencha os campos abaixo..</p>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <p>Tipo de bolo</p>
                            <select name="TIPO_BOLO" class="col-sm-3 mb-3 text-black form-select">
                                <option value="1">Bolo de Aniversário</option>
                                <option value="2">Primeira comunhão</option>
                                <option value="3">Casamento</option>
                            </select>
                        </div>
                        <div class="col">
                            <p>Tipo de massa</p>
                            <select name="TIPO_MASSA" class="col-sm-3 mb-3 text-black form-select">
                                <option value="1">Pão de ló</option>
                                <option value="2">Caramelo</option>
                                <option value="3">Cenoura</option>
                                <option value="4">Chocolate</option>
                                <option value="5">Iogurte</option>
                            </select>
                        </div>
                        <div class="col">
                            <p>Tipo de recheio</p>
                            <select name="TIPO_RECHEIO" class="col-sm-3 mb-3 text-black form-select">
                                <option value="1">Brigadeiro</option>
                                <option value="2">Doce d'ovo</option>
                                <option value="3">Brigadeiro de caramelo</option>
                                <option value="4">Creme russo</option>
                                <option value="5">Frutos vermelhos</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <p>Informações</p>
                        <textarea name="DETALHES" class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Escreva aqui informação sobre o peso e a decoração. Preencha com o maior detalhe possível!"></textarea>
                        <?php
                        if (isset($_GET['err'])) {
                        ?>
                            <div class="alert alert-danger text-center"><?php echo "Preencha os detalhes!"; ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <button type="submit" class="btn mt-2 btn-danger">Enviar</button>
            </fieldset>
        </form>
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
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">coisascombolo@gmail.com</a></li>
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
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3025.341241639568!2d-7.933954784341394!3d40.68848164699045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2348272b934bd5%3A0xa9ac82cb7b392147!2sLargo%20Rossio%2C%20Viseu!5e0!3m2!1spt-PT!2spt!4v1641941380433!5m2!1spt-PT!2spt" width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>
