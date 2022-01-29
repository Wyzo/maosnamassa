<?php

define('DB_SERVER', "localhost");
define('DB_USERNAME', "francisco_duarte");
define('DB_PASSWORD', "2Cmr/_*fScZY[6_W");
define('DB_NAME', "maosnamassa");

try {
    $db = "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8";
    $link = new PDO($db, DB_USERNAME, DB_PASSWORD);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOexception $error) {
    die("Não foi possível ligar à base de dados. Erro: " . $error->getMessage());
}

?>