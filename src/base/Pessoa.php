<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function ($app, $container) {

    // GET All individual entities from DB
    $app->get('/pessoa/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Pessoas App: [GET] pessoas/");

        $connection = $this->db;
        $stmt = $connection->query("SELECT * FROM Users;");

        $data = $stmt->fetchAll();

        return $response->withJson($data)
            ->withStatus(200);
    });

    // POST get next id
    $app->post('/pessoa/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Pessoas App: [POST] pessoas/. Received Data: " . json_encode($args));

        $body = $request->getParsedBody();
        $connection = $this->db;
        $data = null;
        $stmt = $connection->query('SELECT AUTO_INCREMENT id
                                      FROM information_schema.TABLES 
                                     WHERE TABLE_SCHEMA=\'AulaPW\' AND 
                                           TABLE_NAME=\'Users\';');
        $data = $stmt->fetchAll();

        return $response->withJson($data)
                        ->withStatus(200);
    });

    // POST a new user to DB;
    // REMEMBER: 2 Steps!!
    $app->post('/pessoa/{id}', function (Request $request, Response $response, array $args) use ($container) {
        
        $body = $request->getParsedBody();
        
        // Sample log message
        $container->get('logger')->info("Pessoas App: [POST] pessoas/. Received Data: " . json_encode($body));
        $connection = $this->db;
        $data = null;

        $stmt = $connection->prepare('INSERT INTO Users (user_login, user_password, user_salt) VALUES (:ulogin, :upasswd, :usalt);');
        $stmt->execute(array( 
                ':ulogin'  => $body["user_login"], 
                ':upasswd' => $body["user_password"],
                ':usalt'   => $body["user_salt"])
            );
        $data = $stmt->rowCount();

        return $response->withJson($data)
                        ->withStatus(200);
    });
};
