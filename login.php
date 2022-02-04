<?php
$titulo = "Maos na massa - Login";
require_once 'funcoes/navbar.php';
require_once 'funcoes/carrinho.php';
error_reporting(0);

if($_SESSION["LOGADO"] == "true")
{
    header("Location: index.php");
}

?>
    <div class="container p-5">
        <main class="form-signin">
            <form class="mx-auto" style="width: 30%;" action="./funcoes/validarLogin.php" method="post">
                <?php 
                if (isset($_GET['err'])) { 
                ?>
                <div class="alert alert-danger text-center"><?php echo "Login falhou!";?>
                </div>
                <?php
                } 
                ?>
                <div class="container text-center">
                    <img class="mb-4" src="./imagens/aleatorias/logotipo.png" alt="" width="102" height="auto">
                </div>
                <h1 class="h3 mb-3 fw-normal">Bem-vindo</h1>

                <div class="form-floating">
                    <input name="email" type="email" required class="form-control" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating">
                    <input name="password" type="password" required class="form-control my-2" id="floatingPassword"
                        placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <p>Novo por aqui? Clique<a href="registar.php" class="text-danger"> aqui</a> para se registar.</p>
                <button class="w-100 btn btn-lg btn-danger" type="submit">Entrar</button>
            </form>
        </main>
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
</body>

</html>