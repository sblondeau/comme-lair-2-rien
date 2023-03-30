<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\PressReview;
use App\DataFixtures\SpectacleFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class PressReviewFixtures extends Fixture implements DependentFixtureInterface
{
    public const PRESS_REVIEW_NUMBER = 3;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($j = 0; $j < count(SpectacleFixtures::SPECTACLES); $j++) {
            for ($i = 0; $i < self::PRESS_REVIEW_NUMBER; $i++) {
                $presseReview = new PressReview();
                $presseReview->setTitle($faker->words(3, true));
                $presseReview->setLink($faker->url());
                $presseReview->setImage('');
                $presseReview->setDetail($faker->text());
                $presseReview->setSpectacle($this->getReference('spectacle' . $j));

                $manager->persist($presseReview);
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
