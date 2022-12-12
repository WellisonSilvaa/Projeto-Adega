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
                        <h1>Cadastro de Vinho</h1>

                    </div>
                            <form class="login-card-form" action="checaforms/checavinhoform.php" method="post">
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">mail</span>
                        <input type="text" placeholder="Nome do Vinho" name="vin_nome" required autofocus>
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">lock</span>
                        <input type="number" placeholder="Preço" name="vin_preco" required>
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">lock</span>
                        <input type="number" placeholder="Ano" name="vin_ano" required>
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">lock</span>
                        <input type="text" placeholder="Cor" name="vin_cor" required>
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">lock</span>
                        <input type="number" placeholder="Grau" name="vin_grau" required>
                    </div>
                    <div class="form-item">
                        <label for="">Produtor</label>
                        <select name="vin_pro_id">
                            <?php
                            
                            session_start();
                             include "../login/conexao.php";

                             $sql = "SELECT pro_nome, pro_id FROM produtor WHERE pro_onoff = 0 AND  pro_cad_id = $_SESSION[cad_id]";
                             $res = $conexao->prepare($sql);
                             $res->execute();
                            
                             while($result = $res->fetch(PDO::FETCH_ASSOC)){
                                $pro_nome = $result['pro_nome'];
                                $pro_id = $result['pro_id'];
                            ?>
            
                            <option value="<?php echo $pro_id ?>"><?php echo $pro_nome?></option>
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