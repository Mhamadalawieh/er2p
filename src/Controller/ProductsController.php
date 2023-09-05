<?php

namespace App\Controller;

use App\Model\Setting;
use App\Store\Message;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ProductsController extends Controller {
    public function product1(Request $request, Response $response, $args) {
        $texts = $this->getText('produits');
        $images = $this->getImage('produitsproduits');

        echo $this->render('products/product1.html.twig', ['text' => $texts, 'image' => $images]);
        return $response;
    }
    public function product2(Request $request, Response $response, $args) {
        $texts = $this->getText('produits');
        $images = $this->getImage('produits');

        echo $this->render('products/product2.html.twig', ['text' => $texts, 'image' => $images]);
        return $response;
    }
    public function product3(Request $request, Response $response, $args) {
        $texts = $this->getText('produits');
        $images = $this->getImage('produits');

        echo $this->render('products/product3.html.twig', ['text' => $texts, 'image' => $images]);
        return $response;
    }
    public function product4(Request $request, Response $response, $args) {
        $texts = $this->getText('produits');
        $images = $this->getImage('produits');

        echo $this->render('products/product4.html.twig', ['text' => $texts, 'image' => $images]);
        return $response;
    }


}