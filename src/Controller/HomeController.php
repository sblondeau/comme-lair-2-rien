<?php

namespace App\Controller;

use App\Repository\CompanyRepository;
use App\Repository\MemberRepository;
use App\Repository\SpectacleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        CompanyRepository $companyRepository,
        SpectacleRepository $spectacleRepository,
        MemberRepository $memberRepository,
    ): Response {
        $company = $companyRepository->findOneBy([]);
        $spectacles = $spectacleRepository->findAll();
        $members = $memberRepository->findBy([], ['firstName' => 'ASC']);

        return $this->render('home/index.html.twig', [
            'company' => $company,
            'spectacles' => $spectacles,
            'members' => $members,
        ]);
    }
}
