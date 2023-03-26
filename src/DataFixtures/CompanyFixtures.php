<?php

namespace App\DataFixtures;

use App\Entity\Company;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CompanyFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $company = new Company();
        $company->setDescription(
            'Lorem ipsum dolor sit amet consectetur. 
            Venenatis ut pellentesque donec tortor eget enim.
            Dolor lectus lacus placerat quis neque lacus urna auctor ipsum. 
            Massa lacus odio volutpat arcu massa ac orci. Mi amet turpis morbi posuere. 
            Sem curabitur gravida neque turpis ultricies sit velit pulvinar sit. 
            Elementum adipiscing amet eget lobortis magna. Risus eros ac faucibus molestie mauris arcu turpis.
            Sit enim quis lorem vitae placerat dolor risus. Bibendum amet habitasse volutpat placerat semper.'
        );

        $manager->persist($company);
        $manager->flush();
    }
}
