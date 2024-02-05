<?php

namespace App\Controller\Admin;

use App\Controller\Admin\UtilisateurCrudController;
use App\Entity\Utilisateur;
use App\Controller\Admin\PlatsCrudController;
use App\Entity\Plats;
use App\Controller\Admin\CategoriesCrudController;
use App\Entity\Categories;
use App\Controller\Admin\CommandesCrudController;
use App\Entity\Commandes;

use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
         $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
         return $this->redirect($adminUrlGenerator->setController(UtilisateurCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Filrouge');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-user', Utilisateur::class);
        yield MenuItem::linkToCrud('Plats', 'fas fa-tag', Plats::class);
        yield MenuItem::linkToCrud('Catégories', 'fas fa-tag', Categories::class);
        yield MenuItem::linkToCrud('Commandes', 'fas fa-list', Commandes::class);
    }
}
