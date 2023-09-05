<?php

namespace App\Controller;

use App\Store\Message;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UsController extends Controller {
    public function main(Request $request, Response $response, $args) {
        $texts = $this->getText('qui-sommes-nous');
        $images = $this->getImage('qui-sommes-nous');




        echo $this->render('us.html.twig', ['text' => $texts, 'image' => $images]);
        return $response;
    }
}