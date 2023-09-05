<?php

namespace App\Controller;

use App\Model\Actuality;
use App\Store\Message;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController extends Controller {
    public function main(Request $request, Response $response, $args) {
        $texts = $this->getText('accueil');
        $images = $this->getImage('accueil');

        $logged = false;
        if(isset($_SESSION['login']) && $_SESSION['login'] == 'logged'){
            $logged = true;
        }
        $news = Actuality::orderBy('created_at', 'DESC')->limit(3)->get();

        echo $this->render('home.html.twig', ['logged' => $logged, 'text' => $texts, 'image' => $images, 'news' => $news]);
        return $response;
    }
}