<?php
error_reporting(0);
$titulo = "Maos na massa - Encomendas";
require_once 'funcoes/navbar.php';

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
    <?php
    include_once './funcoes/footer.php';
    ?>
</body>
</html>