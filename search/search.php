<?php

session_start();
if(isset($_SESSION['cad_id'])){

    include "../login/conexao.php";

    $comando = filter_input(INPUT_GET, 'comando', FILTER_DEFAULT);

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
          <a class="nav-link active" aria-current="page" href="../menu/pagvinho.php">Vinho</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../menu/pagprodutor.php">Produtor</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../menu/pagregiao.php">Região</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Perfil
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Meu Perfil</a></li>
            <li><a class="dropdown-item" href="#">Configurações</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../menu/sair.php">Sair</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search" action="../search/search.php?comando=1" method="get">
        <input class="form-control me-2" name="pesquisar_vinho" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<?php

if($comando == 1){
    $cad_id = $_SESSION['cad_id'];
    $pesquisar_vinho = filter_input(INPUT_POST, 'pesquisar_vinho', FILTER_DEFAULT);
    

    $vinSearch = $conexao->prepare('SELECT * FROM vinho, produtor  WHERE vin_nome LIKE "%":pesquisar_vinho "%" AND pro_id = vin_pro_id AND vin_onoff = 0 AND vin_cad_id = :cad_id;');
    $vinSearch->bindValue(':pesquisar_vinho', $pesquisar_vinho);
    $vinSearch->bindValue(':cad_id', $cad_id);
    $vinSearch->execute();
      if($vinSearch->rowCount()>0){
?>

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

                    while($result = $vinSearch->fetch(PDO::FETCH_ASSOC)){
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
                    }else{
                        echo "DADOS NAO ENCONTRADOS";
                    }


          ?>

                  </tbody>
                </table>
                
            </section>

            <div class="card-button">
                <div>
                    <button><a class="button" href="../menu/pagvinho.php">Voltar</a></button>
                </div>
            </div>

          <?php

  }elseif($comando == 2){

                  $cad_id = $_SESSION['cad_id'];
                  $pesquisar_produtor = filter_input(INPUT_POST, 'pesquisar_produtor', FILTER_DEFAULT);
                  print_r($cad_id, $pesquisar_produtor);

                  $proSearch =$conexao->prepare('SELECT * FROM produtor, regiao WHERE pro_nome LIKE "%":pesquisar_produtor "%" AND reg_id = fk_reg_id AND pro_onoff = 0 AND pro_cad_id = :cad_id;');
                  $proSearch->bindValue(':cad_id', $cad_id);
                  $proSearch->bindValue(':pesquisar_produtor', $pesquisar_produtor);
                  $proSearch->execute();
                    if($proSearch->rowCount()>0){
        ?>
      </header>
           
           <section class="container-lg">
              <table class="table">
              
                 <thead>
                   <tr>
                             <th scope="col">Nome</th>
                             <th scope="col">Rua</th>
                             <th scope="col">Nº</th>
                             <th scope="col">Bairro</th>
                             <th scope="col">Cidade</th>
                             <th scope="col">Estado</th>
                             <th scope="col">Cep</th>
                             <th scope="col">Telefone</th>
                             <th scope="col">Região</th>
                             <th scope="col">Editar</th>
                             <th scope="col">Excluir</th>
                     </tr>
                 </thead>
                 <tbody>
                   <?php
                       while($result = $proSearch->fetch(PDO::FETCH_ASSOC))
                       {
                           $pro_id = $result['pro_id'];
                           $pro_nome = $result['pro_nome'];
                           $pro_log = $result['pro_log'];
                           $pro_num = $result['pro_num'];
                           $pro_bai = $result['pro_bai'];
                           $pro_cid = $result['pro_cid'];
                           $pro_est = $result['pro_est'];
                           $pro_cap = $result['pro_cap'];
                           $pro_tel = $result['pro_tel'];
                           $reg_nome = $result['reg_nome'];
                   ?>
                   <tr>
                       
                       <td ><?php echo $pro_nome?></td>
                       <td ><?php echo $pro_log?></td>
                       <td ><?php echo $pro_num?></td>
                       <td ><?php echo $pro_bai?></td>
                       <td ><?php echo $pro_cid?></td>
                       <td ><?php echo $pro_est?></td>
                       <td ><?php echo $pro_cap?></td>
                       <td ><?php echo $pro_tel?></td>
                       <td ><?php echo $reg_nome?></td>
                       <td ><div><a class="button-edit" href="../update/update.php?pro_id=<?= $pro_id ?>&comando=2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
 <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
</svg></a></div></th>
                       <td><div><a class="button-exit" href="../delete/delete.php?pro_id=<?= $pro_id ?>&comando=2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
 <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
</svg></a></div></th>
                   </tr>

        <?php
                    }
                    
                }else{
                  echo "DADOS NÂO ENCONTADOS";
                  }

                  ?>
                  
                  </tbody>
                </table>
                
            </section>

            <div class="card-button">
                <div>
                    <button><a class="button" href="../menu/pagprodutor.php">Voltar</a></button>
                </div>
            </div>
                  
    <?php
    
    }else{

      $cad_id = $_SESSION['cad_id'];
      $pesquisar_regiao = filter_input(INPUT_POST, 'pesquisar_regiao', FILTER_DEFAULT);

      $regSearch =$conexao->prepare('SELECT reg_nome,reg_id FROM regiao WHERE reg_nome LIKE "%":pesquisar_regiao "%" AND reg_onoff = 0 AND reg_cad_id = :cad_id;');
      $regSearch->bindValue(':cad_id', $cad_id);
      $regSearch->bindValue(':pesquisar_regiao', $pesquisar_regiao);
      $regSearch->execute();
      if($regSearch->rowCount()>0){

    

    ?>

</header>
           
           <section class="container-lg">
           <table class="table">
             <thead>
               <tr>
                 <th scope="col">Região</th>
                 <th scope="col">Editar</th>
                 <th scope="col">Excluir</th>
               </tr>
             </thead>
             <tbody>
                  <?php
                  while($result = $regSearch->fetch(PDO::FETCH_ASSOC)){
                       $reg_id = $result['reg_id'];
                       $reg_nome = $result['reg_nome'];
                   ?>
                  <tr>
                       
                       <td ><?php echo $reg_nome?></th>
                       <td ><div><a class="button-edit" href="../update/update.php?reg_id=<?= $reg_id ?>&comando=1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
 <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
</svg></a></button></div></td>
                       <td ><div><a class="button-exit" href="../delete/delete.php?reg_id=<?= $reg_id ?>&comando=1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
 <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
</svg></a></button></div></td>
                  </tr>
                  
                  <?php
                      }
                    }else{
                    echo "DADOS NÂO ENCONTRADOS";
                    }
                  }
                  ?>
              
              </tbody>
           </table>
           </section>

           <div class="card-button">
               <div>
                   <button><a class="button" href="../menu/pagregiao.php">Voltar</a></button>
               </div>
           </div>

                 
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- <script src="../js/bootstrap.min.js"></script>   -->
    <script src="../js/main.js"></script>
<body>
</html>

<?php



}else{
    header("location: ../index.php");
}
?>