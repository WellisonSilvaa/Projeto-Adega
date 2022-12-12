<?php

session_start();

if(isset($_SESSION['cad_id'])){

include "../login/conexao.php";

$alt = filter_input(INPUT_GET, 'comando', FILTER_DEFAULT);

if($alt == 1){
$vin_id = filter_input(INPUT_GET, 'vin_id', FILTER_DEFAULT);
$vin_nome = filter_input(INPUT_POST, 'vin_nome', FILTER_DEFAULT);
$vin_preco = filter_input(INPUT_POST, 'vin_preco', FILTER_DEFAULT);
$vin_ano = filter_input(INPUT_POST, 'vin_ano', FILTER_DEFAULT);
$vin_cor = filter_input(INPUT_POST, 'vin_cor', FILTER_DEFAULT);
$vin_grau = filter_input(INPUT_POST, 'vin_grau', FILTER_DEFAULT);
$vin_pro_id = filter_input(INPUT_POST, 'vin_pro_id', FILTER_DEFAULT);

$vinsalvar = $conexao->prepare("UPDATE vinho SET vin_nome=:vin_nome, vin_preco=:vin_preco, vin_ano=:vin_ano, vin_cor=:vin_cor, vin_grau=:vin_grau, vin_pro_id=:vin_pro_id WHERE vin_id=:vin_id AND vin_cad_id = $_SESSION[cad_id]");

$vinsalvar->bindValue(':vin_id', $vin_id);
$vinsalvar->bindValue(':vin_nome', $vin_nome);
$vinsalvar->bindValue(':vin_preco', $vin_preco);
$vinsalvar->bindValue(':vin_ano', $vin_ano);
$vinsalvar->bindValue(':vin_cor', $vin_cor);
$vinsalvar->bindValue(':vin_grau', $vin_grau);
$vinsalvar->bindValue(':vin_pro_id', $vin_pro_id);


    if($vinsalvar->execute()){
        echo "Dados Atualizados!";
        header("refresh:3, ../menu/pagvinho.php");
    }else{
        echo "ERRO";
    }

}elseif($alt == 2){

    $reg_id = filter_input(INPUT_GET, 'reg_id', FILTER_DEFAULT);
    $reg_nome = filter_input(INPUT_POST, 'reg_nome', FILTER_DEFAULT);

    $regsalvar = $conexao->prepare("UPDATE regiao SET reg_nome=:reg_nome WHERE reg_id=:reg_id AND reg_cad_id = $_SESSION[cad_id]");
    $regsalvar->bindValue(':reg_id', $reg_id);
    $regsalvar->bindValue(':reg_nome', $reg_nome);
    
    if($regsalvar->execute()){
        echo "DADOS SALVOS COMSUCESSO";
        header("refresh: 3, ../menu/pagregiao.php");
    }else{
        echo "ERRO DE INSERT";
    }

}elseif($alt == 3){
    $pro_id = filter_input(INPUT_GET, 'pro_id', FILTER_DEFAULT);
    $pro_nome = filter_input(INPUT_POST, 'pro_nome', FILTER_DEFAULT);
    $pro_tel = filter_input(INPUT_POST, 'pro_tel', FILTER_DEFAULT);
    $pro_log = filter_input(INPUT_POST, 'pro_log', FILTER_DEFAULT);
    $pro_num = filter_input(INPUT_POST, 'pro_num', FILTER_DEFAULT);
    $pro_bai = filter_input(INPUT_POST, 'pro_bai', FILTER_DEFAULT);
    $pro_cid = filter_input(INPUT_POST, 'pro_cid', FILTER_DEFAULT);
    $pro_est = filter_input(INPUT_POST, 'pro_est', FILTER_DEFAULT);
    $pro_cap = filter_input(INPUT_POST, 'pro_cap', FILTER_DEFAULT);
    $fk_reg_id = filter_input(INPUT_POST, 'fk_reg_id', FILTER_DEFAULT);
    
    
    $prosalvar = $conexao->prepare("UPDATE produtor SET pro_nome=:pro_nome, pro_log=:pro_log, pro_num=:pro_num, pro_bai=:pro_bai, pro_cid=:pro_cid, pro_est=:pro_est, pro_cap=:pro_cap, pro_tel=:pro_tel, fk_reg_id=:fk_reg_id WHERE pro_id=:pro_id AND pro_cad_id = $_SESSION[cad_id]");
    
    $prosalvar->bindValue(':pro_id', $pro_id);
    $prosalvar->bindValue(':pro_nome', $pro_nome);
    $prosalvar->bindValue(':pro_tel', $pro_tel);
    $prosalvar->bindValue(':pro_log', $pro_log);
    $prosalvar->bindValue(':pro_num', $pro_num);
    $prosalvar->bindValue(':pro_bai', $pro_bai);
    $prosalvar->bindValue(':pro_cid', $pro_cid);
    $prosalvar->bindValue(':pro_est', $pro_est);
    $prosalvar->bindValue(':pro_cap', $pro_cap);
    $prosalvar->bindValue(':fk_reg_id', $fk_reg_id);
    
    
        if($prosalvar->execute()){
            echo "Dados Atualizados!!!";
            header("refresh:3, ../menu/pagprodutor.php");
        }else{
            echo "ERRO";
        }
     
}

}else{
    header("location: ../index.php");
}

?>