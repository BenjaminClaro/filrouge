<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categorie1 = new Categorie();
        $categorie1 -> setlibelle('Burger')
                -> setimage('burger_cat.jpg')
                -> setactive('Yes');

        $manager->persist($categorie1);

        $categorie2 = new Categorie();
        $categorie2 -> setlibelle('Pizza')
                -> setimage('pizza_cat.jpg')
                -> setactive('Yes');

        $manager->persist($categorie2);

        $categorie3 = new Categorie();
        $categorie3 -> setlibelle('Pates')
                -> setimage('pasta_cat.jpg')
                -> setactive('Yes');

        $manager->persist($categorie3);

        $manager->flush();
    }
}
