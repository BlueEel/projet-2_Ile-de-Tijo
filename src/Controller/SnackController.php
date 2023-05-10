<?php

namespace App\Controller;

class SnackController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        return $this->twig->render('Snack/index.html.twig');
    }
}