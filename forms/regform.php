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
                        <h1>Cadastro</h1>

                    </div>
                            <form class="login-card-form" action="checaforms/checaregform.php" method="post">
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">mail</span>
                        <input type="text" placeholder="Nome da Região" name="reg_nome" required autofocus>
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