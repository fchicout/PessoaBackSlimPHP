<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function ($app, $container) {

    // All individual entities
    $app->get('/pessoas/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Pessoas App: [GET] pessoas/");

        $connection = $this->db;
        $stmt = $connection->query("SELECT * FROM Users;");

        $data = $stmt->fetchAll();

        return $response->withJson($data);
    });
};