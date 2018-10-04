<?php 

namespace Model

class Veiculos {
	public function exibir($request, $response) {
	$stmt = getConn()->query("SELECT * FROM veiculo");
    $veiculos = $stmt->fetchAll(PDO::FETCH_OBJ);
    return withJson($veiculos);
	}
}