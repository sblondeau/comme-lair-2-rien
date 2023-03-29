<?php

namespace App\Controller\Admin;

use Symfony\Component\HttpFoundation\Response;
use App\Controller\Admin\CompanyCrudController;
use App\Entity\Company;
use App\Entity\Member;
use App\Entity\Partner;
use App\Entity\Spectacle;
use App\Repository\CompanyRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private CompanyRepository $companyRepository)
    {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Compagnie');
        yield MenuItem::linkToCrud('Informations', 'fa fa-circle-info', Company::class)
            ->setAction('edit')->setEntityId($this->companyRepository->findOneBy([])->getId());
        yield MenuItem::linkToCrud('Membres', 'fa fa-users', Member::class);
        yield MenuItem::linkToCrud('Partenaires', 'fa fa-handshake-angle', Partner::class);

        yield MenuItem::section('Spectacles');
        yield MenuItem::linkToCrud('Spectacles', 'fa fa-tags', Spectacle::class);
        yield MenuItem::linkToCrud('Personnages', 'fa fa-users', Spectacle::class);
        yield MenuItem::linkToCrud('Calendrier', 'fa-regular fa-calendar', Spectacle::class);
        yield MenuItem::section();
        yield MenuItem::linkToRoute('Retour au site', 'fa fa-home', 'app_home');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            // you can include HTML contents too (e.g. to link to an image)
            ->setTitle('Comme l\'Air de Rien')

            // by default EasyAdmin displays a black square as its default favicon;
            // use this method to display a custom favicon: the given path is passed
            // "as is" to the Twig asset() function:
            // <link rel="shortcut icon" href="{{ asset('...') }}">
            ->setFaviconPath('favicon.svg')

            ->disableDarkMode();
    }

    public function configureAssets(): Assets
    {
        return Assets::new()->addWebpackEncoreEntry('admin');
    }
}
