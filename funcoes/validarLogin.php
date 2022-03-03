<?php
session_start();
require_once 'db.php';

$email = $_POST["email"];
$sql = "SELECT * FROM utilizadores WHERE email = '$email'";

if ($result = $link->query($sql)) {
    //Encontrou a conta
    if ($result->rowCount() > 0) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $dadosConta = "SELECT * FROM utilizadores WHERE password='$password' and email='$email'";

        if ($result = $link->query($dadosConta))
        {
            if ($result->rowCount() > 0)
            {
                $row = $result->fetch();
                if($row['tipoconta'] == 0)
                {
                    header('location:../index');
                    $_SESSION["TIPO_CONTA"] = "utilizador";
                    $_SESSION["LOGADO"] = "true";
                    $_SESSION["email"] = $email;
                }
                else
                {
                    header('location:../index');
                    $_SESSION["TIPO_CONTA"] = "admin";
                    $_SESSION["LOGADO"] = "true";
                    $_SESSION["email"] = $email;
                }
            } else {
            header("Location: ../login?err=true");
        }
    } else {
        header("Location: ../login?err=true");  
    }
}
} else {
    header("Location: ../login?err=true");
}

unset($link);
?>