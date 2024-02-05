<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use App\Entity\Categories;
use App\Entity\Plats;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categorie1 = new Categories();
        $categorie1 -> setlibelle('Burger')
                -> setimage('burger_cat.jpg')
                -> setacive(1);

        $manager->persist($categorie1);

        $categorie2 = new Categories();
        $categorie2 -> setlibelle('Pizza')
                -> setimage('pizza_cat.jpg')
                -> setacive(1);

        $manager->persist($categorie2);

        $categorie3 = new Categories();
        $categorie3 -> setlibelle('Pates')
                -> setimage('pasta_cat.jpg')
                -> setacive(1);

        $manager->persist($categorie3);



        $plat1 = new Plats();
        $plat1 -> setlibelle('District Burger')
                -> setdescription('Burger composé d’un bun’s du boulanger, deux steaks de 80g (origine française), de deux tranches poitrine de porc fumée, de deux tranches cheddar affiné, salade et oignons confits.')
                -> setprix('8.00')
                -> setimage('hamburger.jpg')
                -> setactive(1)
                ->setCategorie($categorie1);
        $manager->persist($plat1);

        $plat2 = new Plats();
        $plat2 -> setlibelle('Cheeseburger')
                -> setdescription('Burger composé d’un bun’s du boulanger, de salade, oignons rouges, pickles, oignon confit, tomate, d’un steak d’origine Française, d’une tranche de cheddar affiné, et de notre sauce maison.')
                -> setprix('8.00')
                -> setimage('cheesburger.jpg')
                -> setactive(1)
                ->setCategorie($categorie1);
        $manager->persist($plat2);

        $plat3 = new Plats();
        $plat3 -> setlibelle('Pizza Margherita')
                -> setdescription('Une authentique pizza margarita, un classique de la cuisine italienne! Une pâte faite maison, une sauce tomate fraîche, de la mozzarella Fior di latte, du basilic, origan, ail, sucre, sel & poivre...')
                -> setprix('15.40')
                -> setimage('pizza-margherita.jpg')
                -> setactive(1)
                ->setCategorie($categorie2);
        $manager->persist($plat3);

        $plat4 = new Plats();
        $plat4 -> setlibelle('Spaghetti aux légumes')
                -> setdescription('Un plat de spaghetti au pesto de basilic et légumes poêlés, très parfumé et rapide')
                -> setprix('10.00')
                -> setimage('spaghetti-legumes.jpg')
                -> setactive(1)
                ->setCategorie($categorie3);
        $manager->persist($plat4);

        $plat5 = new Plats();
        $plat5 -> setlibelle('Lasagnes')
                -> setdescription('Découvrez notre recette des lasagnes, l\'une des spécialités italiennes que tout le monde aime avec sa viande hachée et gratinée à l\'emmental. Et bien sûr, une inoubliable béchamel à la noix de muscade.')
                -> setprix('12.00')
                -> setimage('lasagnes_viande.jpg')
                -> setactive(1)
                ->setCategorie($categorie3);
        $manager->persist($plat5);







        $manager->flush();

    }
}
