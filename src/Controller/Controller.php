<?php

namespace App\Controller;

use App\Model\Image;
use App\Model\Text;
use Psr\Container\ContainerInterface;

class Controller {

    protected $container;
    public $imagePath;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    public function render($template, $args = []) {
        return $this->container->get('twig')->render($template, $args);
    }

    public function logger() {
        return $this->container->get('logger');
    }

    public function ffmpeg() {
        return $this->container->get('ffmpeg');
    }

    public function messaging() {
        return $this->container->get('messaging');
    }

    public function mailer() {
        return $this->container->get('mailer');
    }

    public function getText($page){
        $texts = Text::where(function ($query) use ($page){
            $query->where('page', '=', $page)
                ->orWhere('page', '=', 'global');
        })->get();
        $textArray = [];
        foreach ($texts as $text) {
            if($text->page == 'global'){
                $textArray['global'][$text->name] = $text->content;
            } else {
                $textArray[$text->name] = $text->content;
            }
        }
        return $textArray;
    }

    public function getImage($page){
        $images = Image::where(function ($query) use ($page){
            $query->where('page', '=', $page)
                ->orWhere('page', '=', 'global');
        })->get();
        $imageArray = [];
        foreach ($images as $image) {
            if($image->page == 'global'){
                $imageArray['global'][$image->name]['style'] = 'style=background-image:url(/images/' .$image->path . ')';
                $imageArray['global'][$image->name]['src'] = 'src=/images/' .$image->path;
                $imageArray['global'][$image->name]['url'] = '/images/' .$image->path;
            } else {
                $imageArray[$image->name]['style'] = 'style=background-image:url(/images/' .$image->path . ')';
                $imageArray[$image->name]['src'] = 'src=/images/' .$image->path;
                $imageArray[$image->name]['url'] = '/images/' .$image->path;
            }
        }
        return $imageArray;
    }
}