<?php

namespace App\Controller;

use App\Model\Setting;
use App\Store\Message;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ContactController extends Controller {
    public function main(Request $request, Response $response, $args) {
        $texts = $this->getText('contact');
        $images = $this->getImage('contact');




        echo $this->render('contact.html.twig', ['text' => $texts, 'image' => $images]);
        return $response;
    }

    public function postMessage(Request $request, Response $response, $args)
    {
        $email = Setting::where('name','email')->first()->content;
        if(!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['message']))
        {
            // ENVOIE D'EMAIL
        }

        $response->getBody()->write(json_encode(''));
        return $response->withHeader('Content-Type', 'application/json');
    }
}