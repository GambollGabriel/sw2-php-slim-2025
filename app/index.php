<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

use Slim\Views\PhpRenderer;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

$app->get(
    '/',
    function(
        Request $request,
        Response $response,
        $args
    ){
        $response->getBody()->write("Olá mundo!");
        return $response;
});

$app->get(
    '/mensagem/{nome}',
    function(
        Request $request,
        Response $response,
        $args
    ){
        $response->getBody()->write("Boa noite!");
        return $response;
});

$app->get(
    '/hello',
    function(
        Request $request,
        Response $response,
        $args
    ){
        $renderer = new PhpRenderer(__DIR__ . '/templates');
        $msg = 'Nova mensagem';
        return $renderer->render($response, 'hello.php', ['mensagem' => $msg]);
});


$app->run();

//Tipo um condominio como uma portaria, sempre vai passar pelo 