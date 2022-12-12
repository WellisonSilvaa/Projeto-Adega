<?php

try{
    $conexao = new PDO("mysql:host=localhost; dbname=adega_2tb", "root", "");
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->exec("set names utf8");

}catch (PDOException $erro) {
    echo "Erro na conexão:" . $erro->getMessage();
}

define('INCLUDE_PATH', 'http://localhost/PHP+MYSQL/menu/tela1.php');

?>