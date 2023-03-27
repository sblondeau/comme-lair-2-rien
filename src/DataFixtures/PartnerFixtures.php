<?php

namespace App\DataFixtures;

use App\Entity\Partner;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PartnerFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 6; $i++) {
            $parner = new Partner();
            $parner->setName($faker->company());
            $parner->setImage('https://placehold.co/600x400');
            $parner->setDescription($faker->text());
            $parner->setWebsite($faker->url());

            $manager->persist($parner);
        }
        $manager->flush();
    }
}
