<?php

    session_start();

    if(isset($_SESSION['cad_id'])){

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />

    <title>Login</title>
</head>
<body>
    
            <div class="login-card-container">
                <div class="login-card">
                        <div class="login-card-logo">
                            <img src="img/bebida.png" alt="">
                        </div>
                    <div class="login-card-header">
                        <h1>Cadastro de Produtor</h1>
                    
                    </div>
                            <form class="login-card-form" action="../forms/checaforms/checaprodform.php" method="post">
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">lock</span>
                        <input type="text" placeholder="Nome do Produtor" name="pro_nome" required autofocus>
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">mail</span>
                        <input type="number" placeholder="telefone" name="pro_tel" required >
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">lock</span>
                        <input type="text" placeholder="Nome da Rua" name="pro_log" required>
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">lock</span>
                        <input type="number" placeholder="Nº" name="pro_num" required>
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">lock</span>
                        <input type="text" placeholder="Bairro" name="pro_bai" required>
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">lock</span>
                        <input type="text" placeholder="Cidade" name="pro_cid" required>
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">lock</span>
                        <input type="text" placeholder="Estado" name="pro_est" required>
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">lock</span>
                        <input type="number" placeholder="Cep" name="pro_cap" required>
                    </div>
                    <div class="form-item">
                        <label for="">Região</label>
                        <select name="fk_reg_id">
                            <?php
                            
                             include "../login/conexao.php";

                             $sql = "SELECT reg_nome, reg_id FROM regiao WHERE reg_onoff = 0 AND reg_cad_id = $_SESSION[cad_id]";
                             $res = $conexao->prepare($sql);
                             $res->execute();
                            
                             while($result = $res->fetch(PDO::FETCH_ASSOC)){
                                $reg_nome = $result['reg_nome'];
                                $reg_id = $result['reg_id'];
                            ?>
            
                            <option value="<?php echo $reg_id ?>"><?php echo $reg_nome?></option>
                            <?php
                             }
                            ?>
                        </select>
                    </div>
                    
                        <input type="submit" value="Cadastrar">
                            </form>
                    <div class="login-card-footer">
                        Não tem um email? <a href="https://accounts.google.com/signup" target="_blank">Criar conta Google</a>
                    </div>
                </div>
            </div>
</body>
</html>

<?php
    }else{
        header("location: ../index.php");
    }
?>
