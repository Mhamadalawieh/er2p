<?php

namespace App\Controller;

use App\Model\Setting;
use App\Store\Message;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AdminController extends Controller {
    public function main(Request $request, Response $response, $args) {

        echo $this->render('dashboard/home.html.twig', ['page' => 'admin-home']);
        return $response;
    }
    public function login(Request $request, Response $response, $args) {
        $images = $this->getImage('accueil');

        echo $this->render('dashboard/login.html.twig', ['image' => $images]);
        return $response;
    }
    public function postLogin(Request $request, Response $response, $args)
    {
        $idForm = $_POST['id'];
        $passwordFrom = $_POST['password'];

        $id = Setting::where('name','id')->first()->content;
        $password = Setting::where('name','password')->first()->content;

        if($id == $idForm){
            if(password_verify($passwordFrom, $password)){
                $_SESSION['login'] = 'logged';
                return $response->withHeader('Location', '/dashboard-er2p/accueil');
            } else {
                return $response->withHeader('Location', '/dashboard-er2p/connexion?error=password');
            }
        } else {
            return $response->withHeader('Location', '/dashboard-er2p/connexion?error=id');
        }
    }
    public function logout(Request $request, Response $response, $args)
    {
        session_unset();
        return $response->withHeader('Location', '/');
    }
}