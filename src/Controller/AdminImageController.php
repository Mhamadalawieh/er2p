<?php

namespace App\Controller;

use App\Model\Image;
use Illuminate\Database\Eloquent\Model;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AdminImageController extends Controller {
    public function main(Request $request, Response $response, $args) {

        // Récupération de toutes les pages où il y a une Image
        $pagesRaw = Image::groupBy('page')->get();
        $pages = array();
        foreach($pagesRaw as $page)
        {
            $pages[] = $page['page'];
        }

        echo $this->render('dashboard/image.html.twig', ['page' => 'admin-image', 'pages' => $pages]);
        return $response;
    }


    public function postGetImage(Request $request, Response $response, $args)
    {
        $page = $_POST['page'];

        $images = Image::where('page', '=', $page)->orderBy('created_at', 'ASC')->get();

        $response->getBody()->write(json_encode($images));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function postAddImage(Request $request, Response $response, $args)
    {
        if(!empty($_POST['page']) && !empty($_POST['name']) && !empty($_FILES['image']['name']))
        {
            $page = $_POST['page'];
            $name = $_POST['name'];
            $label = $_POST['label'];
            $file = $_FILES['image']['tmp_name'];
            $path = $_FILES['image']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $newPathDBDD = 'upload/' . uniqid() . uniqid() . '.' . $ext;
            $newPath = 'images/' . $newPathDBDD;

            move_uploaded_file($file, $newPath);

            $image = new Image();
            $image->name = $name;
            $image->label = $label;
            $image->page = $page;
            $image->path = $newPathDBDD;
            $image->save();
        }

        return $response->withHeader('Location', '/dashboard-er2p/images');
    }
    public function postUpdateImage(Request $request, Response $response, $args)
    {
        if(!empty($_POST['id']) && !empty($_FILES['image']['name']))
        {

            $id = $_POST['id'];
            $file = $_FILES['image']['tmp_name'];
            $path = $_FILES['image']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $newPathDBDD = 'upload/' . uniqid() . uniqid() . '.' . $ext;
            $newPath = 'images/' . $newPathDBDD;

            move_uploaded_file($file, $newPath);

            $image = Image::find($id);

            $toDelete =  'images/' . $image->path;
            unlink($toDelete);
            $image->path = $newPathDBDD;
            $image->save();
        }

        $response->getBody()->write(json_encode($newPath));
        return $response->withHeader('Content-Type', 'application/json');
    }
    public function postDeleteImage(Request $request, Response $response, $args)
    {
        $imageID = $_POST['id'];
        $result = Image::where('id',$imageID)->delete();

        $response->getBody()->write(json_encode($result));
        return $response->withHeader('Content-Type', 'application/json');
    }
}