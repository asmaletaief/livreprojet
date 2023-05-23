<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Main2Controller extends AbstractController
{
    #[Route('/main2', name: 'app_main2')]
    public function index(): Response
    {
        return $this->render('main2/index.html.twig', [
            'controller_name' => 'Main2Controller',
        ]);
    }
}
