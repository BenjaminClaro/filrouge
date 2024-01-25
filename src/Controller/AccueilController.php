<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\PlatsRepository;
use App\Repository\CategoriesRepository;


class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(PlatsRepository $platRepository, CategoriesRepository $categorieRepository ): Response
    {

        $categories = $categorieRepository->findAll();
        $plats = $platRepository->findAll();

        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'plat' => $plats,
            'categorie' => $categories,
 
        ]);

        
    }



}
