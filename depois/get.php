<?php
  use \Psr\Http\Message\ServerRequestInterface as Request;
  use \Psr\Http\Message\ResponseInterface as Response;
  //Retorna todos os veículos cadastrados
  $app->get('/veiculos',function (Request $request, Response $response)
    {
    $stmt = getConn()->query("SELECT * FROM veiculo");
    $veiculos = $stmt->fetchAll(PDO::FETCH_OBJ);
    return withJson($veiculos);
    });
