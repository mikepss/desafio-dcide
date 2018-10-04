<?php

	$retorno = "";


	$dados = "";




?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<br>

<form action="webservice.php" method="POST">
	<center>
		<table>
			<tr>
				<td valign="TOP">
					<input type="hidden" name='_method' value='put'>
					<input onclick="document.getElementById('met').value='GET'" style="width:80px" type="submit" value="GET"><br>
					<input onclick="document.getElementById('met').value='POST'" style="width:80px" type="submit" value="POST"><br>
					<input style="width:80px" type="submit" value="PUT"><br>
					<input onclick="document.getElementById('met').value='DELETE'" style="width:80px" type="submit" value='DELETE'>
				</td>
				<td valign="TOP">
					<textarea placeholder="Dados" name="dados" style="width:500px; height:94px;"><?php echo $dados;?></textarea><br>
					<textarea placeholder="Retorno" style="width:500px; height:200px;"><?php echo $retorno; ?></textarea>
				</td>
			</tr>
		</table>
	</center>
</form>




</body>
</html>