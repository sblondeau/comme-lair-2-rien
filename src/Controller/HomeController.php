<?php

namespace App\Controller;

use App\Repository\CompanyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(CompanyRepository $companyRepository): Response
    {
        $company = $companyRepository->findOneBy([]);

        return $this->render('home/index.html.twig', [
            'company' => $company,
        ]);
    }
}
