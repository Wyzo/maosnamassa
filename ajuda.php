<?php
$titulo = "Maos na massa - Ajuda";
require_once 'funcoes/navbar.php';
require_once 'funcoes/carrinho.php';
?>
    <div class="a text-center mb-4" style="background-image: url('./imagens/aleatorias/aa.jpg'); height: 300px;">
        <div class="container text-center" style="width: 700px; padding-top: 90px;"></div>
        <h2 class="fw-bold text-white" style="font-size: 70px;">Ajuda</h2>
        <p class="fw-light text-white fs-2">Área de suporte ao cliente</p>
    </div>

    <div class="container">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <form action="./funcoes/validarMensagem.php" method="post">
                        <?php 
                        if (isset($_GET['err'])) { 
                        ?>
                        <div class="alert alert-danger text-center"><?php echo "Dados inválidos!";?>
                        </div>
                        <?php
                        } 
                        ?>
                    <div class="mb-3">
                        <input type="email" name="EMAIL" class="form-control mb-3" id="exampleFormControlInput1"
                            placeholder="Email">
                        <div class="row">
                            <div class="col">
                                <input type="number" name="TELEFONE" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Telefone">
                            </div>
                            <div class="col">
                                <input class="form-control" name="NOME" id="exampleFormControlInput1"
                                    placeholder="Nome">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" name="COMENT" id="exampleFormControlTextarea1" rows="8"
                            placeholder="Escreva aqui o seu comentário"></textarea>
                    </div>
                    <a href="submit.php"><button href="" type="submit"
                            class="btn btn-danger btn-lg px-4 me-md-2">Enviar</button></a>

                </form>
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3 text-danger">Apoio ao cliente</h1>
                <p class="lead">A Panike irá entrar em contacto consigo para o ajudar a responder à sua dúvida ou
                    problema.
                    Por favor, valide os seus dados e indique a sua dúvida ou problema.</p>
                <h2>Dados para contacto</h2>
                <p class="text-danger">Morada: Pascoal, Viseu</p>
                <h2>Outros dados</h2>
                <p class="text-danger">Telefone: 967 142 612</p>
                <p class="text-danger">Email: maosnamassa@gmail.com</p>
            </div>
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