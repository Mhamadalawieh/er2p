<?php

namespace App\Controller;

use App\Model\Actuality;
use App\Store\Message;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AdminNewsController extends Controller
{
    public function main(Request $request, Response $response, $args)
    {

        // Récupération de toutes les pages où il y a une actuality
        $news = Actuality::orderBy('created_at', 'DESC')->get();

        echo $this->render('dashboard/news.html.twig', ['page' => 'admin-news', 'news' => $news]);
        return $response;
    }

    public function postAddNews(Request $request, Response $response, $args)
    {
        if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_FILES['actuality']['name'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $file = $_FILES['actuality']['tmp_name'];
            $path = $_FILES['actuality']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $newPathDBDD = 'upload/' . uniqid() . uniqid() . '.' . $ext;
            $newPath = 'images/' . $newPathDBDD;

            move_uploaded_file($file, $newPath);

            $actuality = new Actuality();
            $actuality->title = $title;
            $actuality->description = $description;
            if ($_POST['date']) {
                $actuality->created_at = $_POST['date'];
            }
            $actuality->description = $description;
            $actuality->path = $newPathDBDD;
            $actuality->save();
        }

        return $response->withHeader('Location', '/dashboard-er2p/actus');
    }

    public function postDeleteNews(Request $request, Response $response, $args)
    {
        $actualityID = $_POST['id'];
        $result = Actuality::where('id', $actualityID)->delete();

        $response->getBody()->write(json_encode($result));
        return $response->withHeader('Content-Type', 'application/json');
    }
}