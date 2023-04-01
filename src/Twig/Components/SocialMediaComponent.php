<?php

namespace App\Twig\Components;

use App\Entity\Company;
use App\Repository\CompanyRepository;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('social_media')]
final class SocialMediaComponent
{
    public function __construct(private CompanyRepository $companyRepository)
    {
    }

    public function getCompany(): Company
    {
        return $this->companyRepository->findOneBy([]);
    }
}
