<?php

namespace App\Controller;

class GalerieController extends AbstractController
{
    public function index(): string
    {
        return $this->twig->render('Galerie/index.html.twig');
    }
}
