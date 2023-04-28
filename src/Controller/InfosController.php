<?php

namespace App\Controller;

class InfosController extends AbstractController
{
    /**
     * List items
     */
    public function index(): string
    {
        return $this->twig->render('Infos/index.html.twig', ['infos']);
    }
}
