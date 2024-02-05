<?php

namespace App\Controller;

use App\Entity\Plats;
use App\Entity\Categories;
use App\Repository\PlatsRepository;
use App\Repository\CategoriesRepository;

use App\Service\PanierService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{


    #[Route('/panier', name: 'app_panier')]
    public function index(PanierService $panierService): Response
    {
        
        return $this->render('panier/index.html.twig', [
            'panier' => $panierService->getTotal()
        ]);
    }


    #[Route('/panier/add/{plats_id}', name: 'app_panier_add')]
    public function addToRoute(PanierService $panierService, int $plats_id): Response
    {
        $panierService->addToPanier($plats_id);
        return $this->redirectToRoute('app_panier');
    }


    #[Route('/panier/removeAll', name: 'app_panier_removeAll')]
    public function removeAll(PanierService $panierService): Response
    {
        $panierService->removePanierAll();
        return $this->redirectToRoute('app_accueil');
    }


    #[Route('/panier/remove/{plats_id}', name: 'app_panier_remove')]
    public function removeToPanier(PanierService $panierService, int $plats_id): Response
    {
        $panierService->removeToPanier($plats_id);
        return $this->redirectToRoute('app_panier');
    }



    #[Route('/panier/decrease/{plats_id}', name: 'app_panier_decrease')]
    public function decreaseToRoute(PanierService $panierService, int $plats_id): Response
    {
        $panierService->decreaseToPanier($plats_id);
        return $this->redirectToRoute('app_panier');
    }
}

