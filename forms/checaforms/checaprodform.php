<?php

session_start();

    if(isset($_SESSION['cad_id'])){

include "../../login/conexao.php";

$pro_nome = filter_input(INPUT_POST, 'pro_nome', FILTER_DEFAULT);
$pro_tel = filter_input(INPUT_POST, 'pro_tel', FILTER_DEFAULT);
$pro_log = filter_input(INPUT_POST, 'pro_log', FILTER_DEFAULT);
$pro_num = filter_input(INPUT_POST, 'pro_num', FILTER_DEFAULT);
$pro_bai = filter_input(INPUT_POST, 'pro_bai', FILTER_DEFAULT);
$pro_cid = filter_input(INPUT_POST, 'pro_cid', FILTER_DEFAULT);
$pro_est = filter_input(INPUT_POST, 'pro_est', FILTER_DEFAULT);
$pro_cap = filter_input(INPUT_POST, 'pro_cap', FILTER_DEFAULT);
$fk_reg_id = filter_input(INPUT_POST, 'fk_reg_id', FILTER_DEFAULT);
$pro_cad_id = $_SESSION['cad_id'];


$prosalvar = $conexao->prepare("INSERT INTO produtor (pro_nome, pro_tel, pro_log, pro_num, pro_bai, pro_cid, pro_est, pro_cap, fk_reg_id, pro_cad_id) VALUES (:pro_nome, :pro_tel, :pro_log, :pro_num, :pro_bai, :pro_cid, :pro_est, :pro_cap, :fk_reg_id, :pro_cad_id)");

$prosalvar->bindValue(':pro_nome', $pro_nome);
$prosalvar->bindValue(':pro_tel', $pro_tel);
$prosalvar->bindValue(':pro_log', $pro_log);
$prosalvar->bindValue(':pro_num', $pro_num);
$prosalvar->bindValue(':pro_bai', $pro_bai);
$prosalvar->bindValue(':pro_cid', $pro_cid);
$prosalvar->bindValue(':pro_est', $pro_est);
$prosalvar->bindValue(':pro_cap', $pro_cap);
$prosalvar->bindValue(':fk_reg_id', $fk_reg_id);
$prosalvar->bindValue(':pro_cad_id', $pro_cad_id);


    if($prosalvar->execute()){
        echo "Dados dos Salvos!";
        header("refresh:3, ../../menu/pagprodutor.php");
    }else{
        echo "ERRO";
    }


    }else{
        header("location:../../index.php");
    }

?>