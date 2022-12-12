<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../PHP+MYSQL/css/style.css">
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
                        <h1>Adega 2B</h1>

                    </div>
                            <form class="login-card-form" action="login/checaLogin.php" method="post">
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">mail</span>
                        <input type="text" placeholder="Entre com Email" name="email" required autofocus>
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">lock</span>
                        <input type="password" placeholder="Senha" name="senha1" required>
                    </div>

                    <?php
                        session_start();
                        if(isset($_SESSION['erro'])){
                            echo "<p class='erro'>Usuário ou senhas incorretas</p>";
                            echo "<style>
                                    p.erro{
                                            color: red;
                                            font-size: 8pt;
                                            margin-left: 20px;
                                          }
                                  </style>";

                        }
                        session_destroy();

                        ?>

                    <div class="form-item-other">
                        <div class="checkbox">
                            <input type="checkbox" name="rememberMe" id="rememberMe">
                            <label for="rememberMe">Remember Me</label>
                        </div>
                        <a href="#">Esqueceu a Senha?</a>
                    </div>
                        <input type="submit" value="Entrar">
                            </form>
                    <div class="login-card-footer">
                        Não tem uma conta? <a href="../PHP+MYSQL/login/cadastrar.php">Criar Conta grátis</a>
                    </div>
                </div>
            </div>
</body>
</html>