<?php
    session_start();
    if($_POST){
        if($_POST['senha1'] == $_POST['senha2']){
        $cad_nome = $_POST['cad_nome'];
        $email = $_POST['email'];
        $senha1 = $_POST['senha1'];
        $senha2 = $_POST['senha2'];

        include "conexao.php";

        try {
            $stmt = $conexao->prepare("INSERT INTO cadastrar(cad_nome, cad_email, cad_senha) VALUES (?,?,?);");
            $stmt->bindParam(1, $cad_nome);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $senha1);
                if($stmt->execute()){
                    if($stmt->rowCount()>0){
                        echo "Cadastro realizado com sucesso!";
                        header("refresh: 3, ../index.php");
                    }else{
                        echo "ERRO: Não foi possivel executar a declaração sql";
                    }
                }else{
                    echo "Erro na execução docadastro";
                }
        }catch (PDOException $erro){
            echo "Erro na conexão: ".$erro->getMessage();
        }
    
    }else{
        $_SESSION['erro'] = $_POST['senha1'];
        header("location: cadastrar.php");
    }

    }

?>