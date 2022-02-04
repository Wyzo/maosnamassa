<?php
error_reporting(0);
$titulo = "Maos na massa - Encomendas";
require_once 'funcoes/navbar.php';
require_once 'funcoes/carrinho.php';

if($_SESSION["LOGADO"] == "false")
{
    header("Location: index.php");
}

?>
    <div class="container my-5 ">
        <div class="row">
            <div class="col-3 text-start">
                <div class="container">
                <?php
                    error_reporting(0);

                    if ($_SESSION["LOGADO"] == "true") {
                        echo '<a href="#" class="nav-link fw-light fs-6 text-black">' . $_SESSION["email"] . '</a>';
                        echo '<a class="text-black" href="./funcoes/logout.php">Logout</a>';
                    }
                    ?>
                    <div class="list-group text-start my-5">
                        <h2>Painel da conta</h2>
                        <a href="perfil.php" class="list-group-item list-group-item-action" aria-current="true">
                            Informações
                        </a>
                        <a href="perfilEncomendas.php" class="list-group-item list-group-item-action  bg-danger text-white">Encomendas</a>
                        <a href="perfilMoradas.php" class="list-group-item list-group-item-action">Moradas</a>
                    </div>
                    <p class="text-start">Precisas de ajuda? Clica <a href="../ajuda.php" class="text-danger">aqui</a>
                        para acederes à área de suporte ao cliente!</p>
                </div>
            </div>
            <div class="col">
        <div class="container mt-3">
        <h2>Encomendas</h2>
                <?php

                require_once 'funcoes/db.php'; 
                
                $email = $_SESSION["email"];
                $sql = "SELECT * FROM utilizadores WHERE email = '$email'";

                $result = $link->query($sql);
                $row = $result->fetch();

                $id = $row["id"];
                unset($sql);    
                $sql = "SELECT * FROM encomendas WHERE id_cliente='$id'";
                $result = $link->query($sql);
                if ($result->rowCount() <= 0) {
                    echo "Não tem encomendas ativas";
                }
                else
                {
                    foreach ($result as $row) {
                        echo "        <p>Dados disponíveis</p>
                        <table class='table table-warning'>
                            <thead>
                                <tr>
                                    <th>id do encomenda</th>
                                    <th>id do cliente</th>
                                    <th>Detalhes</th>
                                    <th>Tipo de massa</th>
                                    <th>Tipo de recheio</th>
                                    <th>Tipo de bolo</th>
                                    <th>Data</th>
                                    <th>Preço</th>
                                    <th>Morada de envio</th>
                                    <th>Estado da encomenda</th>
                                </tr>
                            </thead>
                            <tbody>";
                        echo "<tr>";
                        echo "<td>" . $row["id_encomenda"] . "</td>";
                        echo "<td>" . $row["id_cliente"] . "</td>";
                        echo "<td>" . $row["detalhes"] . "</td>";
                        echo "<td>" . $row["tipo_massa"] . "</td>";
                        echo "<td>" . $row["tipo_recheio"] . "</td>";
                        echo "<td>" . $row["tipo_bolo"] . "</td>";
                        echo "<td>" . $row["data_compra"] . "</td>";
                        echo "<td>" . $row["preco"] . "</td>";
                        echo "<td>" . $row["morada_envio"] . "</td>";
                        echo "<td>" . $row["estado_encomenda"] . "</td>";
                        echo "</tr>";
                        echo "
                        </tbody>
                    </table>";
                    }
                }
                ?>
    </div>
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
</body>
</html>