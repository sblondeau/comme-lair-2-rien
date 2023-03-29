<?php

namespace App\Controller;

use App\Entity\Spectacle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SpectacleController extends AbstractController
{
    #[Route('/spectacle/{spectacle}', name: 'app_spectacle')]
    public function index(Spectacle $spectacle): Response
    {
        return $this->render('spectacle/index.html.twig', [
            'spectacle' => $spectacle,
        ]);
    }
}
