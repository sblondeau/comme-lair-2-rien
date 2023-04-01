<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Company;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CompanyFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        $company = new Company();
        $company->setDescription($faker->text());
        $company->setFacebook($faker->url());
        $company->setInstagram($faker->url());
        $company->setSoundcloud($faker->url());
        $company->setYoutube($faker->url());
        $manager->persist($company);
        $manager->flush();
    }
}
