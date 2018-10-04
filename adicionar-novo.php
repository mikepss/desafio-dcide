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
		$('#formulario').validate({
			rules: {
			},
			messages: {

			},
			submitHandler: function( form ){
				var dados = $( form ).serialize();

				$.ajax({
          type: "POST",
          url: "http://localhost/desafio/webservice.php/veiculos",
          data: dados,
          success: function( data )
          {
            window.location.href="exibir-veiculo.php?id="+data;
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
        <li class="nav-item active">
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
  		<div class="col-12">
  			<div class="formulario-edicao">
  				<div class="cont">
  				<h6 class="tit-edit">Adicionar novo veículo</h6>
  				<span class="desc-edit">preencha os dados abaixo para inserir o veículo.</span>
  				<br><br>
  				<form action="" id="formulario" method="POST">
  				<input class="form-control form-control-sm" type="text" placeholder="Digite o nome do veículo" name="veiculo" required><br>
  				<input class="form-control form-control-sm" type="text" placeholder="Digite a marca do veículo" name="marca" required><br>
  				<input class="form-control form-control-sm" type="text" placeholder="Digite o ano do veículo" name="ano" required><br>
  				<select class="form-control form-control-sm" name="vendido" required>
  				<option value="">Selecione a condição do veículo...</option>
  				<option value="0">Disponível</option>
  				<option value="1">Vendido</option>
  				</select><br>
  				<textarea class="form-control form-control-sm" name="descricao" id="alerta" rows="5" placeholder="Descreva os opcionais do veículo..." required></textarea><br>
  				<button type="submit" class="btn btn-outline-info btn-block">Adicionar Veículo</button>
  				</form>
  				</div>
  			</div>
  		</div>
  	</div>

  </section>
</div>

<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>