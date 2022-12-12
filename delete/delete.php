<?php

    session_start();

        if(isset($_SESSION['cad_id'])){

    include "../login/conexao.php";
        $alt1 = filter_input(INPUT_GET, 'comando', FILTER_DEFAULT);
        if($alt1 == 1){
            $reg_cad_id = $_SESSION['cad_id'];
            $reg_id = filter_input(INPUT_GET, 'reg_id', FILTER_DEFAULT);
            $del = $conexao->prepare('UPDATE regiao SET reg_onoff= 1 WHERE reg_id = :reg_id AND  reg_cad_id = :reg_cad_id');
            $del->bindValue(':reg_id', $reg_id);
            $del->bindValue(':reg_cad_id', $reg_cad_id);
            $del->execute();
                if  ($del->execute()){
                    echo "EXCLUIDO COM SUCESSO " .$reg_id;
                    header("refresh: 3, ../menu/pagregiao.php");
                }else{
                    echo "NÂO EXCLUIDO";
                }
        }elseif($alt1 == 2){
            $pro_cad_id = $_SESSION['cad_id'];
            $pro_id = filter_input(INPUT_GET, 'pro_id', FILTER_DEFAULT);
            $del = $conexao->prepare('UPDATE produtor SET pro_onoff= 1 WHERE pro_id = :pro_id AND  pro_cad_id = :pro_cad_id');
            $del->bindValue(':pro_id', $pro_id);
            $del->bindValue(':pro_cad_id', $pro_cad_id);
            $del->execute();
                if  ($del->execute()){
                    echo "EXCLUIDO COM SUCESSO " .$pro_id;
                    header("refresh: 3, ../menu/pagprodutor.php");
                }else{
                    echo "NÂO EXCLUIDO";
                }
        }elseif($alt1 == 3){
            $vin_cad_id = $_SESSION['cad_id'];
            $vin_id = filter_input(INPUT_GET, 'vin_id', FILTER_DEFAULT);
            $del = $conexao->prepare("UPDATE vinho SET vin_onoff= 1 WHERE vin_id = :vin_id AND vin_cad_id = :vin_cad_id");
            $del->bindValue(':vin_id', $vin_id);
            $del->bindValue(':vin_cad_id', $vin_cad_id);
            $del->execute();
                if  ($del->execute()){
                    echo "EXCLUIDO COM SUCESSO " .$vin_id;
                    header("refresh: 3, ../menu/pagvinho.php");
                }else{
                    echo "NÂO EXCLUIDO";
                }
        }
        


    }else{
        header("location: ../index.php");
    }
?>