<?php

namespace App\Twig\Components;

use App\Repository\SpectacleRepository;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('spectacle')]
final class SpectacleComponent
{
    public function __construct(private SpectacleRepository $spectacleRepository)
    {
    }

    public function getSpectacles(): array
    {
        return $this->spectacleRepository->findAll();
    }
}
