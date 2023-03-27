<?php

namespace App\DataFixtures;

use App\Entity\Member;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class MemberFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 6; $i++) {
            $member = new Member();
            $member->setFirstName($faker->firstName());
            $member->setLastName($faker->lastName());
            $member->setBiography($faker->text());
            $member->setFacebook($faker->url());
            $member->setInstagram($faker->url());
            $member->setWebsite($faker->url());

            $manager->persist($member);
        }

        $manager->flush();
    }
}
