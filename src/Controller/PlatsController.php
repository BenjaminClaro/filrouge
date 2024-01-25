<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Templates\Categories\index;
use App\Repository\PlatsRepository;
use App\Repository\CategoriesRepository;


class PlatsController extends AbstractController
{
    #[Route('/plats', name: 'app_plats')]
    public function index(PlatsRepository $platRepository, CategoriesRepository $categorieRepository ): Response
    {
        $categories = $categorieRepository->findAll();
        $plats = $platRepository->findAll();


        return $this->render('plats/index.html.twig', [
            'controller_name' => 'PlatsController',
            'plat' => $plats,
        ]);
    }

    #[Route('/plats/{categorie_id}', name: 'app_plats_id', methods:['GET'])]
    public function index2(PlatsRepository $platRepository, CategoriesRepository $categorieRepository, int $categorie_id ): Response
    {

        $categories = $categorieRepository->find($categorie_id);


        return $this->render('plats/plats_id.html.twig', [
            'controller_name' => 'PlatsController',
            'plat' => $platRepository->findBy(['categorie'=>$categorie_id]),
        ]);
    }
}
