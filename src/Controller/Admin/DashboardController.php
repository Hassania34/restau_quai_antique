<?php

namespace App\Controller\Admin;

use App\Entity\Utilisateur;
use App\Entity\Reservation;
use App\Entity\Plats;
use App\Entity\Menus;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin.index')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Restau Quai Antique - Administration');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-list', Utilisateur::class);
        yield MenuItem::linkToCrud('Reservation', 'fas fa-list', Reservation::class);
        yield MenuItem::linkToCrud('Plats', 'fas fa-list', Plats::class);
        yield MenuItem::linkToCrud('Menus', 'fas fa-list', Menus::class);
    }
}
