<div class="modal" id="carrinho">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Carrinho de compras</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>nome</th>
                                    <th>preco</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                session_start();
                                require_once 'funcoes/db.php';
                                error_reporting(1);

                                $email = $_SESSION["email"];

                                $sql = "SELECT * FROM utilizadores WHERE email = '$email'";
                                $result = $link->query($sql);
                                $row = $result->fetch();
                                $id = $row["id"];


                                $sql = "SELECT * FROM carrinho WHERE id_utilizador = $id";
                                $result = $link->query($sql);
                                $row = $result->fetch();
                                $idcarrinho = $row["id"];

                                $sql = "SELECT * FROM carrinho_compras WHERE id_carrinho = $idcarrinho";
                                $result = $link->query($sql);

                                if ($result->rowCount() > 0) {
                                    foreach ($link->query($sql) as $row) {
                                        $imgNome = $row["img_nome"];
                                        $idproduto = $row["id_produto"];

                                        $sql = "SELECT * FROM produtos WHERE id = $idproduto";
                                        $result = $link->query($sql);
                                        $row = $result->fetch();

                                        echo "<tr>";
                                        echo "<td>" . $row["id"] . "</td>";
                                        echo "<td>" . $row["nome"] . "</td>";
                                        echo "<td>" . $row["preco"] . "€</td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Confirmar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>