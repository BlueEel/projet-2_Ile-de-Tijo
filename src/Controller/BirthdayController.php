<?php

namespace App\Controller;

class BirthdayController extends AbstractController
{
    public function index(): string
    {
        return $this->twig->render('Birthday/index.html.twig');
    }
}
