<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require 'bootstrap.php';
// GET /books — Status 200 (Ok)
// GET /books/id — Status 200 (Ok)
// POST /books — Status 201 (Created)
// PUT /books/id — Status 200 (Ok)
// DELETE /books/id — Status 204 (No Content)
// Usar PDO para conexao com banco

// Rotas escritas de várias formas para testar qual a melhor e menor

$app->get('/curso/{aula}/{licao}', function (Request $request, Response $response) use ($app) {
	// A rota pode ser obtida de outra forma mais direta
	$route = $request->getAttribute('route');
	$aula = $route->getArgument('aula');
	$licao = $route->getArgument('licao');
	// Conectar com PDO ou fazer o doctrine funcionar

    $response->getBody()->write("Exibindo informações da aula {$aula} e licao {$licao} ");
    return $response;
});

$app->get('/curso', function($req, $res) {
	$res->write("Teste");
	return $res;
});

$app->post('/aluno/{name}', function($request, $response, $args) {
	$route = $request->getAttribute('route');
	$name = $route->getArgument('name');
	// Conexao

	$response->write("Teste {$name}");
	return $response;
});

// Adicionar outras rotas dependendo da necessidade


$app->run();
?>