<?php

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;

class AuthMiddleware {

    public function __invoke(Request $request, RequestHandler $handler) {
        $response = new Response();

        if (!isset($_SESSION['login'])) {
            return $response->withHeader('Location', '/dashboard-er2p/connexion');
        }

        return $handler->handle($request);
    }
}