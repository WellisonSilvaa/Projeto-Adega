<?php

session_start();

if(isset($_SESSION['cad_id'])){

include "../login/conexao.php";

$sql = "SELECT * FROM vinho, produtor WHERE pro_id = vin_pro_id AND vin_onoff = 0 AND vin_cad_id = $_SESSION[cad_id];";
$res = $conexao->prepare($sql);
$res->execute();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/menustyle.css">


    <title>Tela 1</title>
</head>
<body>

        <header>
        <nav class="navbar navbar-expand-lg ">
  <div class="container-fluid">
  <a class="navbar-brand" href="tela1.php">
      <img src="../img/bebida.png" alt="Bootstrap" width="60" height="45">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="pagvinho.php">Vinho</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pagprodutor.php">Produtor</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pagregiao.php">Região</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Perfil
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search" action="../search/search.php?comando=1" method="post">
        <input class="form-control me-2" name="pesquisar_vinho" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

        </header>
           <section class="container-lg">
                <table class="table">
                    
                        <thead>
                          <tr>
                              <th scope="col">Nome</th>
                              <th scope="col">Ano</th>
                              <th scope="col">Cor</th>
                              <th scope="col">Grau</th>
                              <th scope="col">Preço</th>
                              <th scope="col">Produtor</th>
                              <th scope="col">Editar</th>
                              <th scope="col">Excluir</th>
                          </tr>
                        </thead>
                       <tbody>

                    <?php

                    while($result = $res->fetch(PDO::FETCH_ASSOC)){
                        $vin_id = $result['vin_id'];
                        $vin_nome = $result['vin_nome'];
                        $vin_ano = $result['vin_ano'];
                        $vin_cor = $result['vin_cor'];
                        $vin_grau = $result['vin_grau'];
                        $vin_preco = $result['vin_preco'];
                        $vin_pro_id = $result['vin_pro_id'];
                        $pro_nome = $result['pro_nome'];
                    
                    ?>
                    
                        <tr>
                            <td><?php echo $vin_nome?></td>
                            <td><?php echo $vin_ano?></td>
                            <td><?php echo $vin_cor?></td>
                            <td><?php echo $vin_grau?></td>
                            <td><?php echo $vin_preco?></td>
                            <td><?php echo $pro_nome?></td>
                            <td><div><a class="button-edit" href="../update/update.php?vin_id=<?= $vin_id ?>&comando=3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
  <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
</svg></a></button></div></td>
                            <th><div><a class="button-exit" href="../delete/delete.php?vin_id=<?= $vin_id ?>&comando=3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
</svg></a></button></div></td>
                        </tr>
                           
                    
                
                    <?php
                    }
                    ?> 
                    </tbody>
                </table>
                
            </section>

            <div class="card-button">
                <div>
                    <button><a class="button" href="../forms/vinhoform.php">Cadastrar</a></button>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- <script src="../js/bootstrap.min.js"></script>   -->
    <script src="../js/main.js"></script>
</body>
</html>

<?php
}else{
    header("location: ../index.php");
}
?>