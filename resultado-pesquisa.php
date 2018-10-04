<?php 
$pesquisa=$_GET['pesquisa'];
$json_file = file_get_contents("http://localhost/desafio/webservice.php/veiculos/find/".$pesquisa);
$json_str = json_decode($json_file);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dcide Desafio</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
	<link href="css/css.css" rel="stylesheet"/>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script>
</head>
<body>

<div class="corpo">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Desafio WebService</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Ínicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="adicionar-novo.php">Adicionar novo</a>
        </li>
      </ul>
      <form action="resultado-pesquisa.php" method="get" class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar..." name="pesquisa">
        <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Procurar</button>
      </form>
    </div>
  </nav>

  <section class="cont">
  	<div class="row">
      <?php 
      $i=0;
      while($i<count($json_str)) {

      ?>
  		<div class="col-4" style="margin-bottom: 30px">
        <div class="card">
          <a href="exibir-veiculo.php?id=<?php echo $json_str[$i]->id; ?>"><img class="card-img-top" src="images/captiva.jpg" alt="Card image cap"></a>
          <div class="card-body">
            <a href="exibir-veiculo.php?id=<?php echo $json_str[$i]->id; ?>"><h6><?php echo $json_str[$i]->marca; ?> <?php echo $json_str[$i]->veiculo; ?> <?php echo $json_str[$i]->ano; ?></h6></a>
            <p class="card-text"><a href="exibir-veiculo.php?id=<?php echo $json_str[$i]->id; ?>"><?php echo substr($json_str[$i]->descricao, 0,40); ?>...</a></p>
          </div>
        </div>
  		</div>
      <?php
      $i=$i+1; 
      }
      ?>

  	</div>

  </section>
</div>

<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>