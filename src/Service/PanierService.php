<?php

namespace App\Service;

use App\Entity\Plats;
use App\Entity\Categories;
use App\Repository\PlatsRepository;
use App\Repository\CategoriesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class PanierService {

    private RequestStack $requestStack;
    private EntityManagerInterface $em;

    public function __construct(RequestStack $requestStack, EntityManagerInterface $em ){
        $this->requestStack = $requestStack; 
        $this->em = $em; 
    }


    public function addToPanier(int $id): void{

        $panier = $this->getSession()->get('panier', []);
        if(!empty($panier[$id])){
            $panier[$id]++;
        }else{
            $panier[$id] = 1;
        }


        $this->getSession()->set('panier', $panier);
    }
           

    public function removePanierAll(){
        return $this->getSession()->remove('panier');
    }



    public function removeToPanier(int $id){
        $panier = $this->requestStack->getSession()->get('panier', []);
        unset($panier[$id]);
        return $this->getSession()->set('panier', $panier);
    }





    public function getTotal() : array {
        $panier = $this->getSession()->get('panier');
        $panierData = [];
        if($panier){
            foreach($panier as $plats_id => $quantite){
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



    public function decreaseToPanier(int $id){
        $panier = $this->getSession()->get('panier', []);
        if($panier[$id] > 1){
            $panier[$id]--;
        }else{
            unset($panier[$id]);
        }


        $this->getSession()->set('panier', $panier);
    }



    private function getSession() : SessionInterface{
        return $this->requestStack->getSession();
    }

}







?>