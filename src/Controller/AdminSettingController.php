<?php

namespace App\Controller;

use App\Store\Message;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AdminSettingController extends Controller {
    public function main(Request $request, Response $response, $args) {


        echo $this->render('dashboard/settings.html.twig', ['page' => 'admin-setting']);
        return $response;
    }
}