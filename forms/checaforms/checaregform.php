<?php

session_start();

    if(isset($_SESSION['cad_id'])){

include "../../login/conexao.php";

$reg_nome = filter_input(INPUT_POST, 'reg_nome', FILTER_DEFAULT);
$reg_cad_id = $_SESSION['cad_id'];

$regsalvar = $conexao->prepare("INSERT INTO regiao (reg_nome, reg_cad_id) VALUES (:reg_nome, :reg_cad_id)");
$regsalvar->bindValue(':reg_nome', $reg_nome);
$regsalvar->bindValue(':reg_cad_id', $reg_cad_id);

if($regsalvar->execute()){
    echo "DADOS SALVOS COMSUCESSO";
    header("refresh: 3, ../../menu/pagregiao.php");
}else{
    echo "ERRO DE INSERT";
}


    }else{
        header("location: ../../index.php");
    }

?>