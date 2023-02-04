<?php

namespace App\Controller\Admin;

use App\Entity\Carrier;
use App\Entity\CategoryPrestation;
use App\Entity\Newsletter;
use App\Entity\Order;
use App\Entity\Prestation;
use App\Entity\User;
use App\Entity\Category;
use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    ){}

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator->setController(OrderCrudController::class)->generateUrl();

         return $this->redirect($url);

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Golden Fingers');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateur', 'fa fa-user', User::class);
        yield MenuItem::linkToCrud('Commande', 'fa fa-shopping-cart', Order::class);
        yield MenuItem::linkToCrud('Categories', 'fa fa-list', Category::class);
        yield MenuItem::linkToCrud('Categories Prestation', 'fa fa-list', CategoryPrestation::class);
        yield MenuItem::linkToCrud('Produits', 'fa fa-tag', Product::class);
        yield MenuItem::linkToCrud('Prestation', 'fa fa-tag', Prestation::class);
        yield MenuItem::linkToCrud('Transporteur', 'fa fa-truck', Carrier::class);
        yield MenuItem::linkToCrud('Newsletter', 'fa-solid fa-envelope', Newsletter::class);
        yield MenuItem::linkToUrl('Retour au site', 'fa-solid fa-rotate-left', '/');

    }
}
