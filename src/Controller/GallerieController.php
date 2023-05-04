<?php

namespace App\Controller;

class GallerieController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        return $this->twig->render('gallerie/index.html.twig');
    }
}
