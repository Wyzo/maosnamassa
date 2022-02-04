<?php
error_reporting(0);

if($_SESSION["LOGADO"] == true)
{
    header("Location: index.php");
}
$titulo = "Maos na massa - Registar";
require_once 'funcoes/navbar.php';
require_once 'funcoes/carrinho.php';
?>
    <div class="container w-50" style="margin-top: 80px; margin-bottom: 80px;">
        <div class="row g-5">
            <div class="col-12">
                <form class="needs-validation mt-3" action="./funcoes/criarConta.php" method="post" novalidate="">
                    <?php 
                    if (isset($_GET['err'])) { 
                    ?>
                    <div class="alert alert-danger text-center"><?php echo "Já existe uma conta com os mesmos dados!";?>
                    </div>
                    <?php
                    } 
                    ?>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Nome</label>
                            <input name="nome" type="text" class="form-control" id="firstName" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Sobrenome</label>
                            <input name="sobrenome" type="text" class="form-control" id="lastName" required>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" id="email"
                                placeholder="exemplo@gmail.com" required>
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control
                                placeholder="............" required>
                        </div>
                        <div class="col-12">
                            <label for="phone" class="form-label">Telefone</label>
                            <input name="telefone" type="phone" class="form-control" id="phone" placeholder="961442777"
                                required>
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label">Morada</label>
                            <input name="morada" type="text" class="form-control" id="address"
                                placeholder="Viseu Rua S.Estevão 3500-090" required>
                        </div>
                        <hr class="my-4">
                    </div>
                    <div class="container text-center">
                        <button class="w-100 btn btn-lg btn-danger" type="submit">Criar conta</button>
                    </div>
                </form>
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
                            <li class="nav-item mb-2"><a href="encomendar.php"
                                    class="nav-link p-0 text-white">Encomendar</a>
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