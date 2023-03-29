<?php

namespace App\DataFixtures;

use App\Entity\Member;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class MemberFixtures extends Fixture
{
    public const MEMBER_NUMBER = 6;
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < self::MEMBER_NUMBER; $i++) {
            $member = new Member();
            $member->setFirstName($faker->firstName());
            $member->setLastName($faker->lastName());
            $member->setBiography($faker->text());
            $member->setImage('');
            $member->setFacebook($faker->url());
            $member->setInstagram($faker->url());
            $member->setWebsite($faker->url());
            $this->addReference('member' . $i, $member);

            $manager->persist($member);
        }

        $manager->flush();
    }
}
