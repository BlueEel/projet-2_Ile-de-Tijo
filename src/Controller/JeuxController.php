<?php

namespace App\Controller;

class JeuxController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        return $this->twig->render('jeux/index.html.twig');
    }
}
