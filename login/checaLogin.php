<?php

session_start();
    if($_POST){
        $email = $_POST['email'];
        $senha = $_POST['senha1'];
        

        include "conexao.php";

        try {
            $log = $conexao->prepare("SELECT cad_id, cad_nome FROM cadastrar WHERE (cad_email, cad_senha) = (?,?);");
            $log->bindParam(1, $email);
            $log->bindParam(2, $senha);
                if($log->execute()){
                    if($log->rowCount()>0){
                        if($result = $log->fetch(PDO::FETCH_ASSOC)){
                            $_SESSION['cad_id'] = $result['cad_id'];
                            $_SESSION['cad_nome'] = $result['cad_nome'];
                        }
                        header("location: ../menu/tela1.php");
                    }else{
                        $_SESSION['erro'] = $_POST['senha1'];
                        header("location: ../index.php");
                    }
                }
        }catch (PDOException $erro){
            echo "Erro na conexão: ".$erro->getMessage();
        }
    }
?>