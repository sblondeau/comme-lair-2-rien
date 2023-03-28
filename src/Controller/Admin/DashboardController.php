<?php

namespace App\Controller\Admin;

use Symfony\Component\HttpFoundation\Response;
use App\Controller\Admin\CompanyCrudController;
use App\Entity\Company;
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
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Troupe', 'fa fa-users', Company::class)
            ->setAction('edit')->setEntityId($this->companyRepository->findOneBy([])->getId());
        yield MenuItem::subMenu('Spectacles', 'fa fa-masks-theater')->setSubItems([
            MenuItem::linkToCrud('Description', 'fa fa-tags', Spectacle::class),
            MenuItem::linkToCrud('Personnages', 'fa fa-users', Spectacle::class),
            MenuItem::linkToCrud('Calendrier', 'fa-regular fa-calendar', Spectacle::class),
        ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            // the name visible to end users
            ->setTitle('Comme l\'Air de Rien')
            // you can include HTML contents too (e.g. to link to an image)
            ->setTitle('<img src="{{ asset(\'build/images/logo.png\') }}"> Comme l\'Air de Rien')

            // by default EasyAdmin displays a black square as its default favicon;
            // use this method to display a custom favicon: the given path is passed
            // "as is" to the Twig asset() function:
            // <link rel="shortcut icon" href="{{ asset('...') }}">
            ->setFaviconPath('favicon.svg')

            // set this option if you prefer the page content to span the entire
            // browser width, instead of the default design which sets a max width
            ->renderContentMaximized()

            // by default, users can select between a "light" and "dark" mode for the
            // backend interface. Call this method if you prefer to disable the "dark"
            // mode for any reason (e.g. if your interface customizations are not ready for it)
            ->disableDarkMode();
    }

    public function configureAssets(): Assets
    {
        return Assets::new()->addWebpackEncoreEntry('admin');
    }
}
