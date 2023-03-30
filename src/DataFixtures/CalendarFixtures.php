<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\DataFixtures\SpectacleFixtures;
use App\Entity\Calendar;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CalendarFixtures extends Fixture implements DependentFixtureInterface
{
    public const CALENDAR_NUMBER = 3;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($j = 0; $j < count(SpectacleFixtures::SPECTACLES); $j++) {
            for ($i = 0; $i < self::CALENDAR_NUMBER; $i++) {
                $calendar = new Calendar();
                $calendar->setDatetime($faker->dateTimeBetween());
                $calendar->setAddress($faker->address());
                $calendar->setInformation($faker->text());
                $calendar->setSpectacle($this->getReference('spectacle' . $j));

                $manager->persist($calendar);
            }
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            SpectacleFixtures::class,
        ];
    }
}
