<?php

namespace App\Service;

use App\Entity\Plats;
use App\Entity\Categories;
use App\Repository\PlatsRepository;
use App\Repository\CategoriesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class UserService {

    private RequestStack $requestStack;
    private EntityManagerInterface $em;

    public function __construct(RequestStack $requestStack, EntityManagerInterface $em ){
        $this->requestStack = $requestStack; 
        $this->em = $em; 
    }



    public function getUser() : array {
        $user = $this->getSession()->get('commande');
        $commandeData = [];
        if($user){
            foreach($user as $utilisateur_id => $quantite){
                $plats = $this->em->getRepository(Plats::class)->findOneBy(['id' => $plats_id]);
                if(!$plats){
                    //a
                }

                $panierData[] = [
                    'plat' => $plats,
                    'quantité' => $quantite
                ];
            }
        }
        return $panierData;
    }





    private function getSession() : SessionInterface{
        return $this->requestStack->getSession();
    }

}







?>