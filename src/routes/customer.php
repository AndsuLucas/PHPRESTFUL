<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

$app->get('/api/customers/', function(Request $request, Response $response){
	$id = (int)addslashes($request->getAttribute("id"));

	$sql = "SELECT * FROM customers";

	try {
		
		$database = Db::connect();
		$query =  $database->query($sql);
		$select = $query->fetchAll();
		echo json_encode($select);
		
	} catch (PDOException $e) {
		echo '{
				"error":
					{"text":'.$e->getMessage().'}
			}';
	}
});

$app->post('/api/customers/add', function(Request $request, Response $response){
	$first_name = addslashes((string)$request->getParam("first_name"));
	$last_name = addslashes((string)$request->getParam("last_name"));
	$email = addslashes((string)$request->getParam("email"));

	
	
	$sql = "
		INSERT INTO customers SET first_name = ? , last_name = ?, email = ?
	";

	try {
		
		
		$database = Db::connect();
		$query =  $database->prepare($sql);
		$query->bindValue(1, $first_name);
		$query->bindValue(2, $last_name);
		$query->bindValue(3, $email);

		$resultado = $query->execute();
		echo json_encode('{"notice":{
			"text":"user add"
		}}');

	} catch (PDOException $e) {
		echo '{
				"error":
					{"text":'.$e->getMessage().'}
			}';
	}
});

$app->put('/api/customers/update/{id}', function(Request $request, Response $response){
	$id = $request->getAttribute("id");
	$first_name = addslashes((string)$request->getParam("first_name"));
	$last_name = addslashes((string)$request->getParam("last_name"));
	$email = addslashes((string)$request->getParam("email"));

	
	
	$sql = "
		UPDATE customers SET first_name = ?, last_name = ?, email  = ?
	";

	try {
		
		
		$database = Db::connect();
		$query =  $database->prepare($sql);
		$query->bindValue(1, $first_name);
		$query->bindValue(2, $last_name);
		$query->bindValue(3, $email);

		$resultado = $query->execute();
		echo json_encode('{"notice":{
			"text":"update"
		}}');

	} catch (PDOException $e) {
		echo '{"error":{"text":'.$e->getMessage().'}}';
	}
});

$app->delete('/api/customers/delete/{id}', function(Request $request, Response $response){
	$id = $request->getAttribute("id");

	
	$sql = "
		DELETE FROM customers WHERE id = ?
	";

	try {
		
		
		$database = Db::connect();
		$query =  $database->prepare($sql);
		$query->bindValue(1, $id);
		
		$resultado = $query->execute();
		
		echo json_encode('{"notice":{
			"text":"user delete"
		}}');

	} catch (PDOException $e) {
		echo '{
				"error":
					{"text":'.$e->getMessage().'}
			}';
	}
});