<?php

  require 'Slim/Slim.php';
  \Slim\Slim::registerAutoloader();

  $app = new \Slim\Slim();
  $app->response()->header('Content-Type', 'application/json;charset=utf-8');
  
  //Retorna todos os veículos cadastrados
  $app->get('/veiculos','getVeiculos');

  //Adiciona veículos na base de dados
  $app->post('/veiculos','addVeiculos');

  //Altera veículos na base de dados de acordo com o id
  $app->post('/veiculos/:id','editVeiculos');

  //Altera veículos na base de dados de acordo com o id
  $app->get('/veiculos/deletar/:id','deleteVeiculos');

  //Retorna todos os veículos de acordo com a palavra digitada utiliza dados dos campos "veiculo","marca" e "descricao"
  $app->get('/veiculos/find/:q','getVeiculoPesquisa');

  //Retorna o veículo pelo seu ID
  $app->get('/veiculos/:id','getVeiculo');

  $app->run();



  function getConn()
    {
    return new PDO('mysql:host=localhost;dbname=desafio','root','',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
    }

  function getVeiculos()
    {
    $stmt = getConn()->query("SELECT * FROM veiculo");
    $veiculos = $stmt->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($veiculos);
    }

  function addVeiculos()
    {
      $request = \Slim\Slim::getInstance()->request();
      $veiculo = json_decode($request->getBody());
      $sql = "INSERT INTO veiculo (veiculo,marca,ano,descricao,vendido,created,updated) values (:veiculo,:marca,:ano,:descricao,:vendido,:created,:updated) ";
      $conn = getConn();
      $stmt = $conn->prepare($sql);
      $stmt->bindParam("veiculo",$veiculo->veiculo);
      $stmt->bindParam("marca",$veiculo->marca);
      $stmt->bindParam("ano",$veiculo->ano);
      $stmt->bindParam("descricao",$veiculo->descricao);
      $stmt->bindParam("vendido",$veiculo->vendido);
      $stmt->bindParam("created",$veiculo->created);
      $stmt->bindParam("updated",$veiculo->updated);
      date_default_timezone_set('America/Sao_Paulo');
      $data_atual=date('Y-m-d H:i:s');

      $veiculo->veiculo=$_POST['veiculo'];
      $veiculo->marca=$_POST['marca'];
      $veiculo->ano=$_POST['ano'];
      $veiculo->descricao=$_POST['descricao'];
      $veiculo->vendido=$_POST['vendido'];
      $veiculo->created=$data_atual;
      $veiculo->updated=$data_atual;
      $stmt->execute();
      $veiculo->id = $conn->lastInsertId();
      $json=json_encode($veiculo);
      $json= json_decode($json);
      echo $json->id;
    }

  function editVeiculos($id)
    {
      $request = \Slim\Slim::getInstance()->request();
      $veiculo = json_decode($request->getBody());
      $sql = "UPDATE veiculo SET veiculo=:veiculo,marca=:marca,ano=:ano,descricao=:descricao,vendido=:vendido,updated=:updated WHERE id=$id";
      $conn = getConn();
      $stmt = $conn->prepare($sql);
      $stmt->bindParam("veiculo",$veiculo->veiculo);
      $stmt->bindParam("marca",$veiculo->marca);
      $stmt->bindParam("ano",$veiculo->ano);
      $stmt->bindParam("descricao",$veiculo->descricao);
      $stmt->bindParam("vendido",$veiculo->vendido);
      $stmt->bindParam("updated",$veiculo->updated);
      date_default_timezone_set('America/Sao_Paulo');
      $data_atual=date('Y-m-d H:i:s');
      
      $veiculo->veiculo=$_POST['veiculo'];
      $veiculo->marca=$_POST['marca'];
      $veiculo->ano=$_POST['ano'];
      $veiculo->descricao=$_POST['descricao'];
      $veiculo->vendido=$_POST['vendido'];
      $veiculo->updated=$data_atual;
      $stmt->execute();
      echo json_encode($veiculo);
    }

  function deleteVeiculos($id)
    {
      $sql="DELETE FROM veiculo WHERE id=$id";
      $conn = getConn();
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      echo "{'message':'Veículo apagado.'}";
    }


  function getVeiculoPesquisa($q)
    {
    $conn = getConn();
    $sql = "SELECT * FROM veiculo WHERE ((veiculo LIKE '%$q%') or (marca = '$q') or (descricao LIKE '%$q%')) Order By veiculo ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $veiculo = $stmt->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($veiculo, JSON_PRETTY_PRINT);
    }

  function getVeiculo($id)
    {
    $conn = getConn();
    $sql = "SELECT * FROM veiculo WHERE id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $veiculo = $stmt->fetchObject();
    echo json_encode($veiculo, JSON_PRETTY_PRINT);
    }

?>