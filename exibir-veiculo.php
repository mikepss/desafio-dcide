<?php 
$id=$_GET['id'];

$json_file = file_get_contents("http://localhost/desafio/webservice.php/veiculos/".$id);
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
<script type="text/javascript">
  $(document).ready(function(){
		$('#formularioedit').validate({
			rules: {
			},
			messages: {

			},
			submitHandler: function( form ){
				var dados = $( form ).serialize();

				$.ajax({
					type: "POST",
					url: "http://localhost/desafio/webservice.php/veiculos/<?php echo $id; ?>",
					data: dados,
					success: function( data )
					{
						window.location.reload();
					}
				});

				return false;
			}
		});
	});
  
  </script>
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
        <li class="nav-item">
          <a class="nav-link" href="index.php">Início</a>
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
  		<div class="col-8">
  		<h4 class="titulo"><?php echo $json_str->marca; ?> <?php echo $json_str->veiculo; ?> <?php echo $json_str->ano; ?></h4>

  		<img src="images/captiva.jpg" width="100%"><br><br>

  		<div class="row">
  			<div class="col-6">
  				<span class="tit-dados">Marca:</span> <?php echo $json_str->marca; ?><br><br>
  				<span class="tit-dados">Modelo:</span> <?php echo $json_str->veiculo; ?><br><br>
  				<span class="tit-dados">Ano Fabricação:</span> <?php echo $json_str->ano; ?>
  			</div>

  			<div class="col-6">
  				<span class="tit-dados">Condição:</span> <?php if ($json_str->vendido==0) {echo "Disponível";} else {echo "Vendido";} ?><br><br>
  				<span class="tit-dados">Data de criação:</span> <?php echo date('d/m/Y', strtotime($json_str->created)); ?><br><br>
  				<span class="tit-dados">Última atualização:</span> <?php echo date('d/m/Y', strtotime($json_str->updated)); ?>
  			</div>

  			<div class="col-8 mobile-on">
        <hr class="my-4">
        <span class="tit-dados">DESCRIÇÃO:</span><br>
        <?php echo $json_str->descricao; ?>
        </div>
  		</div>
  		</div>

  		<div class="col-4">
  			<div class="formulario-edicao">
  				<div class="cont">
  				<h6 class="tit-edit">Editar veículo</h6>
  				<span class="desc-edit">preencha os dados abaixo para editar o veículo.</span>
  				<br><br>
  				<form action="" id="formularioedit" method="POST">
  				<input class="form-control form-control-sm" type="text" placeholder="Digite o nome do veículo" name="veiculo" value="<?php echo $json_str->veiculo; ?>" required><br>
  				<input class="form-control form-control-sm" type="text" placeholder="Digite a marca do veículo" name="marca" value="<?php echo $json_str->marca; ?>" required><br>
  				<input class="form-control form-control-sm" type="text" placeholder="Digite o ano do veículo" name="ano" value="<?php echo $json_str->ano; ?>" required><br>
  				<select class="form-control form-control-sm" name="vendido" required>
  				<option value="<?php echo $json_str->vendido; ?>"><?php if ($json_str->vendido==0) {echo "Disponível";} else {echo "Vendido";} ?></option>
  				<option value="0">Disponível</option>
  				<option value="1">Vendido</option>
  				</select><br>
  				<textarea class="form-control form-control-sm" name="descricao" id="alerta" rows="5" placeholder="Descreva os opcionais do veículo..." required><?php echo $json_str->descricao; ?></textarea><br>
  				<button type="submit" class="btn btn-outline-info btn-block">Alterar Dados</button>
  				</form>
  				</div>
  			</div>
  		</div>
  	</div>

  	<hr class="my-4">

  	<div class="row">
  		<div class="col-8 mobile-off">
  			<span class="tit-dados">DESCRIÇÃO:</span><br>
  			<?php echo $json_str->descricao; ?>
  		</div>

  		<div class="col-4">
  			<br>
  			<form action="http://localhost/desafio/webservice.php/veiculos/deletar/<?php echo $id; ?>" method="get" id="formularioexcl">
  			<input type="hidden" value="<?php echo $id; ?>">
  			<button type="submit" class="btn btn-danger btn-lg btn-block">Excluir Veículo</button>
  			</form>
  		</div>
  	</div>

  </section>
</div>

<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>