<?php

namespace App\Controller\Admin;

use App\Controller\HomeController;
use App\Entity\NewsDetails;
use App\Entity\Roles;
use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        //return parent::index();
        
        //return $this->redirect($routerBuilder->setController(HomeController::class)->generateUrl());
        //return $this->redirect('/home');
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(NewsDetailsCrudController::class)->generateUrl());

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Newsproject')
            ->setTitle('<img src="..."> ACME <span class="text-small">Corp.</span>')

            // the path defined in this method is passed to the Twig asset() function
            ->setFaviconPath('favicon.svg')
            ->setTranslationDomain('my-custom-domain')
            ->setTextDirection('ltr')
            ->renderContentMaximized()
            ->renderSidebarMinimized()
            ->disableUrlSignatures()
            ->setFaviconPath('favicon.svg')
            ->generateRelativeUrls();
            //->setFaviconPath('favicon.svg');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToUrl('Dashboard', 'fa fa-dashboard', '/home');
        //yield MenuItem::linkToCrud('The News', 'fas fa-list', NewsDetails::class);
        yield MenuItem::linktoCrud('Users', 'fa fa-child', Users::class);
        yield MenuItem::linktoCrud('Users', 'fa fa-group', Roles::class);
    }
}
