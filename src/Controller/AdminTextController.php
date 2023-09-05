<?php

namespace App\Controller;

use App\Model\Text;
use App\Store\Message;
use Illuminate\Support\Facades\Date;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AdminTextController extends Controller {
    public function main(Request $request, Response $response, $args) {

        // Récupération de toutes les pages où il y a un text
        $pagesRaw = Text::groupBy('page')->get();
        $pages = [];
        foreach($pagesRaw as $page)
        {
            $pages[] = $page['page'];
        }

        echo $this->render('dashboard/text.html.twig', ['page' => 'admin-text', 'pages' => $pages]);
        return $response;
    }

    public function postGetText(Request $request, Response $response, $args)
    {
        $page = $_POST['page'];

        $texts = Text::where(function ($query) use ($page){
            $query->where('page', '=', $page);
        })->orderBy('created_at', 'ASC')->get();


        $response->getBody()->write(json_encode($texts));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function postUpdateText(Request $request, Response $response, $args)
    {
        $id = $_POST['id'];
        $content = $_POST['content'];

        $page = Text::find($id);
        $page->content = $content;
        $page->save();

        $response->getBody()->write(json_encode('success'));
        return $response->withHeader('Content-Type', 'application/json');
    }
    public function postAddText(Request $request, Response $response, $args)
    {
        if(!empty($_POST['page']) && !empty($_POST['name']) && !empty($_POST['content']))
        {
            $page = $_POST['page'];
            $name = $_POST['name'];
            $label = $_POST['label'];
            $content = $_POST['content'];

            $text = new Text();
            $text->page = $page;
            $text->name = $name;
            $text->label = $label;
            $text->content = $content;
            $text->save();
        }

        return $response->withHeader('Location', '/dashboard-er2p/textes');
    }
    public function postDeleteText(Request $request, Response $response, $args)
    {
        $id = $_POST['id'];

        $page = Text::find($id);
        $page->delete();

        $response->getBody()->write(json_encode('success'));
        return $response->withHeader('Content-Type', 'application/json');
    }
}