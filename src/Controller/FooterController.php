<?php

namespace App\Controller;

class FooterController extends AbstractController
{
    /**
     * List items
     */
    public function index(): string
    {
        return $this->twig->render('Home/index.html.twig');
    }
}
