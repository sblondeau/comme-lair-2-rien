<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Spectacle;
use App\Entity\SpectacleCharacter;
use App\DataFixtures\SpectacleFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class SpectacleCharacterFixtures extends Fixture implements DependentFixtureInterface
{
    public const CHARACTER_NUMBER = 5;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($j = 0; $j < count(SpectacleFixtures::SPECTACLES); $j++) {
            for ($i = 0; $i < self::CHARACTER_NUMBER; $i++) {
                $spectacleCharacter = new SpectacleCharacter();
                $spectacleCharacter->setName($faker->name());
                $spectacleCharacter->setImage('');
                $spectacleCharacter->setDescription($faker->text());
                $spectacleCharacter->setSpectacle($this->getReference('spectacle' . $j));
                $spectacleCharacter->setCompanyMember(
                    $this->getReference('member' . rand(0, MemberFixtures::MEMBER_NUMBER - 1))
                );
                $spectacleCharacter->setName($faker->name());
                $manager->persist($spectacleCharacter);
            }
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            SpectacleFixtures::class,
            MemberFixtures::class,
        ];
    }
}
