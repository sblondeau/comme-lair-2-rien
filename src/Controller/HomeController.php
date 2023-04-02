<?php

namespace App\Controller;

use App\Repository\CompanyRepository;
use App\Repository\MemberRepository;
use App\Repository\PartnerRepository;
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
        PartnerRepository $partnerRepository,
    ): Response {
        $company = $companyRepository->findOneBy([]);
        $spectacles = $spectacleRepository->findAll();
        $members = $memberRepository->findBy([], ['firstName' => 'ASC']);
        $partners = $partnerRepository->findBy([], ['name' => 'ASC']);

        return $this->render('home/index.html.twig', [
            'company' => $company,
            'spectacles' => $spectacles,
            'members' => $members,
            'partners' => $partners,
        ]);
    }

    #[Route('/mentions-legales', name: 'app_legal_mentions')]
    public function legalMentions(): Response
    {
        return $this->render('home/legalMentions.html.twig');
    }
}
