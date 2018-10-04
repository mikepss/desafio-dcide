<?php
include("inc/conexao.php");

if (!$link) {
	echo '[{"erro": "Não foi possível conectar ao banco de dados"';
	echo '}]';
} else {
	$sql="SELECT * FROM veiculo";
	$result=mysqli_query($link, $sql);
	$linhas=mysqli_num_rows($result);

	if (!$result) {
		echo '[{"erro": "Houve um erro com sua busca."';
		echo '}]';
	} else if($linhas<1) {
		echo '[{"erro": "Não foi encontrado nenhum veículo em sua busca."';
		echo '}]';
	} else {
		for($i=0; $i<$linhas; $i++) {
			$dados[]=mysqli_fetch_assoc($result);
		}

		$json=json_encode($dados, JSON_PRETTY_PRINT);

		echo $json;

	}
}
?>