<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\PressReview;
use App\DataFixtures\SpectacleFixtures;
use App\Entity\Gallery;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class GalleryFixtures extends Fixture implements DependentFixtureInterface
{
    public const GALLERY_NUMBER = 10;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($j = 0; $j < count(SpectacleFixtures::SPECTACLES); $j++) {
            for ($i = 0; $i < self::GALLERY_NUMBER; $i++) {
                $gallery = new Gallery();
                $gallery->setImage($faker->image(__DIR__ . '/../../public/uploads/galleries', fullPath: false));
                $gallery->setLegend($faker->text());
                $gallery->setSpectacle($this->getReference('spectacle' . $j));

                $manager->persist($gallery);
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
