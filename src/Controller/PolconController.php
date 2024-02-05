<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PolconController extends AbstractController
{
    #[Route('/polcon', name: 'app_polcon')]
    public function index(): Response
    {
        return $this->render('polcon/index.html.twig', [
            'controller_name' => 'PolconController',
        ]);
    }
}
