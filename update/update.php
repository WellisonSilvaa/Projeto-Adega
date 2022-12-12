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

<?php  

    include "../login/conexao.php";

    $alt = filter_input(INPUT_GET, 'comando', FILTER_DEFAULT);

    if($alt == 3){
        $vin_id = filter_input(INPUT_GET, 'vin_id', FILTER_DEFAULT);
        $att = $conexao->prepare("SELECT * FROM vinho WHERE vin_id = :vin_id AND vin_cad_id = $_SESSION[cad_id]");
        $att->bindValue(":vin_id", $vin_id);
        $att->execute();

        if($result = $att->fetch(PDO::FETCH_ASSOC)){
            $vin_id = $result['vin_id'];
            $vin_nome = $result['vin_nome'];
            $vin_ano = $result['vin_ano'];
            $vin_cor = $result['vin_cor'];
            $vin_grau = $result['vin_grau'];
            $vin_preco = $result['vin_preco'];
            $vin_pro_id = $result['vin_pro_id'];
        
        
?>  

            <div class="login-card-container">
                <div class="login-card">
                        <div class="login-card-logo">
                            <img src="img/bebida.png" alt="">
                        </div>
                    <div class="login-card-header">
                        <h1>Cadastro de Vinho</h1>

                    </div>
                            <form class="login-card-form" action="checaupdate.php?vin_id=<?php echo $vin_id;?>&comando=1" method="post">
                    <div class="form-item">
                        
                        <input type="text" placeholder="Nome do Vinho" name="vin_nome" required autofocus value="<?php echo $vin_nome?>">
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">lock</span>
                        <input type="number" placeholder="Preço" name="vin_preco" required value="<?php echo $vin_preco?>">
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">lock</span>
                        <input type="number" placeholder="Ano" name="vin_ano" required value="<?php echo $vin_ano?>">
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">lock</span>
                        <input type="text" placeholder="Cor" name="vin_cor" required value="<?php echo $vin_cor?>">
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">lock</span>
                        <input type="number" placeholder="Grau" name="vin_grau" required value="<?php echo $vin_grau?>">
                    </div>
                    <div class="form-item">
                        <label for="">Produtor</label>
                        <select name="vin_pro_id">
                            <?php
        } 
                             
                             $sql = "SELECT * FROM produtor WHERE pro_onoff = 0 AND pro_cad_id = $_SESSION[cad_id]";
                             $res = $conexao->prepare($sql);
                             $res->execute();
                            
                             while($result = $res->fetch(PDO::FETCH_ASSOC)){
                                $pro_nome = $result['pro_nome'];
                                $pro_id = $result['pro_id'];
                                if($vin_pro_id == $pro_id){

                            ?>
                            <option selected value="<?php echo $pro_id ?>"><?php echo $pro_nome?></option>
                            <?php
                             }else{
                                 ?>
                                  <option value="<?php echo $pro_id ?>"><?php echo $pro_nome?></option>
                                 <?php
                             }
                            }
                            ?>
                        </select>
                    </div>
                    
                        <input type="submit" value="Salvar">
                            </form>
                    <div class="login-card-footer">
                        Não tem um email? <a href="https://accounts.google.com/signup" target="_blank">Criar conta Google</a>
                    </div>
                </div>
            </div>

    <?php 
            
        }else if($alt == 1){
            $reg_cad_id = $_SESSION['cad_id'];
            $reg_id = filter_input(INPUT_GET, 'reg_id', FILTER_DEFAULT);
        $att = $conexao->prepare('SELECT * FROM regiao WHERE reg_id = :reg_id AND reg_cad_id = :reg_cad_id');
        $att->bindValue(":reg_id", $reg_id);
        $att->bindValue(":reg_cad_id", $reg_cad_id);
        $att->execute();

        if($result = $att->fetch(PDO::FETCH_ASSOC)){
            $reg_id = $result['reg_id'];
            $reg_nome = $result['reg_nome'];

    ?>

<div class="login-card-container">
                <div class="login-card">
                        <div class="login-card-logo">
                            <img src="img/bebida.png" alt="">
                        </div>
                    <div class="login-card-header">
                        <h1>Cadastro</h1>

                    </div>
                            <form class="login-card-form" action="checaupdate.php?reg_id=<?php echo $reg_id;?>&comando=2" method="post">
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">mail</span>
                        <input type="text" placeholder="Nome da Região" name="reg_nome" required autofocus value="<?php echo $reg_nome ?>">
                    </div>
                    
                    
                        <input type="submit" value="Cadastrar">
                            </form>
                    <div class="login-card-footer">
                        Não tem um email? <a href="https://accounts.google.com/signup" target="_blank">Criar conta Google</a>
                    </div>
                </div>
            </div>


    <?php
        }
    }elseif($alt == 2){
        $pro_cad_id = $_SESSION['cad_id'];
        $pro_id = filter_input(INPUT_GET, 'pro_id', FILTER_DEFAULT);
        $att = $conexao->prepare('SELECT * FROM produtor WHERE pro_id = :pro_id AND pro_cad_id = :pro_cad_id');
        $att->bindValue(":pro_id", $pro_id);
        $att->bindValue(":pro_cad_id", $pro_cad_id);
        $att->execute();

        if($result = $att->fetch(PDO::FETCH_ASSOC)){
            $pro_id = $result['pro_id'];
            $pro_nome = $result['pro_nome'];
            $pro_log = $result['pro_log'];
            $pro_num = $result['pro_num'];
            $pro_bai = $result['pro_bai'];
            $pro_cid = $result['pro_cid'];
            $pro_est = $result['pro_est'];
            $pro_cap = $result['pro_cap'];
            $pro_tel = $result['pro_tel'];
            $fk_reg_id = $result['fk_reg_id'];
           
    ?>

<div class="login-card-container">
                <div class="login-card">
                        <div class="login-card-logo">
                            <img src="img/bebida.png" alt="">
                        </div>
                    <div class="login-card-header">
                        <h1>Cadastro de Produtor</h1>
                    
                    </div>
                            <form class="login-card-form" action="checaupdate.php?pro_id=<?php echo $pro_id;?>&comando=3" method="post">
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">lock</span>
                        <input type="text" placeholder="Nome do Produtor" name="pro_nome" required autofocus value="<?php echo $pro_nome?>">
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">mail</span>
                        <input type="number" placeholder="telefone" name="pro_tel" required value="<?php echo $pro_tel?>">
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">lock</span>
                        <input type="text" placeholder="Nome da Rua" name="pro_log" required value="<?php echo $pro_log?>">
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">lock</span>
                        <input type="number" placeholder="Nº" name="pro_num" required value="<?php echo $pro_num?>">
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">lock</span>
                        <input type="text" placeholder="Bairro" name="pro_bai" required value="<?php echo $pro_bai?>">
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">lock</span>
                        <input type="text" placeholder="Cidade" name="pro_cid" required value="<?php echo $pro_cid?>">
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">lock</span>
                        <input type="text" placeholder="Estado" name="pro_est" required value="<?php echo $pro_est?>">
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">lock</span>
                        <input type="number" placeholder="Cep" name="pro_cap" required value="<?php echo $pro_cap?>">
                    </div>
                    <div class="form-item">
                        <label for="">Região</label>
                        <select name="fk_reg_id">
                            <?php
                            
                            $sql = "SELECT * FROM regiao WHERE reg_onoff = 0 AND reg_cad_id = $_SESSION[cad_id]";
                            $res = $conexao->prepare($sql);
                            $res->execute();
                           
                            while($result = $res->fetch(PDO::FETCH_ASSOC)){
                               $reg_nome = $result['reg_nome'];
                               $reg_id = $result['reg_id'];
                               if($fk_reg_id == $reg_id){

                           ?>
                           <option selected value="<?php echo $reg_id ?>"><?php echo $reg_nome?></option>
                           <?php
                            }else{
                                ?>
                                 <option value="<?php echo $reg_id ?>"><?php echo $reg_nome?></option>
                                <?php
                            }
                           }
                            ?>
                        </select>
                    </div>
                    
                        <input type="submit" value="Salvar">
                            </form>
                    <div class="login-card-footer">
                        Não tem um email? <a href="https://accounts.google.com/signup" target="_blank">Criar conta Google</a>
                    </div>
                </div>
            </div>

    <?php
        }
    }
    ?>
</body>
</html>


<?php
    }else{
        header("location: ../index.php");
    }
?>