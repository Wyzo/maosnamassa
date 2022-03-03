<?php
$titulo = "Maos na massa - Login";
require_once 'funcoes/navbar.php';
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
    <?php
    include_once './funcoes/footer.php';
    ?>
</body>

</html>