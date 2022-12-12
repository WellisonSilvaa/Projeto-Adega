<?php

session_start();

    if(isset($_SESSION['cad_id'])){

include "../../login/conexao.php";

$vin_cad_id = $_SESSION['cad_id'];
$vin_nome = filter_input(INPUT_POST, 'vin_nome', FILTER_DEFAULT);
$vin_preco = filter_input(INPUT_POST, 'vin_preco', FILTER_DEFAULT);
$vin_ano = filter_input(INPUT_POST, 'vin_ano', FILTER_DEFAULT);
$vin_cor = filter_input(INPUT_POST, 'vin_cor', FILTER_DEFAULT);
$vin_grau = filter_input(INPUT_POST, 'vin_grau', FILTER_DEFAULT);
$vin_pro_id = filter_input(INPUT_POST, 'vin_pro_id', FILTER_DEFAULT);

$vinsalvar = $conexao->prepare("INSERT INTO vinho (vin_nome, vin_preco, vin_ano, vin_cor, vin_grau, vin_pro_id, vin_cad_id) VALUES (:vin_nome, :vin_preco, :vin_ano, :vin_cor, :vin_grau, :vin_pro_id, :vin_cad_id)");

$vinsalvar->bindValue(':vin_nome', $vin_nome);
$vinsalvar->bindValue(':vin_preco', $vin_preco);
$vinsalvar->bindValue(':vin_ano', $vin_ano);
$vinsalvar->bindValue(':vin_cor', $vin_cor);
$vinsalvar->bindValue(':vin_grau', $vin_grau);
$vinsalvar->bindValue(':vin_pro_id', $vin_pro_id);
$vinsalvar->bindValue(':vin_cad_id', $vin_cad_id);


    if($vinsalvar->execute()){
        echo "Dados dos Salvos!";
        header("refresh:3, ../../menu/pagvinho.php");
    }else{
        echo "ERRO";
    }


}else{
    header("location: ../../index.php");
}

?>