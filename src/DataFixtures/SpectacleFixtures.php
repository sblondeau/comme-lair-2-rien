<?php

namespace App\DataFixtures;

use App\Entity\Spectacle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SpectacleFixtures extends Fixture
{
    public const SPECTACLES = [
        [
            'title' => 'Devine qui vient diner ce soir ?',
            'description' => 'Dans un vignoble réputé sur la cote bourguignonne,un événement se prépare Simon, le fils de la maison est amoureux, il a hâte de présenter l\'élue de son coeur à sa famille,la jolie Angelina',
        ],
        [
            'title' => 'Zabell est perdue',
            'description' => 'Zabell est perdue dans une grande cité, elle ne retrouve plus sa ruche...
            Une petite fille, Soline, va l\'aider à retrouver sa maison. Plusieurs personnages vont croiser sa route. ',
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::SPECTACLES as $spectacleData) {
            $spectacle = new Spectacle();
            $spectacle->setTitle($spectacleData['title']);
            $spectacle->setDescription($spectacleData['description']);
            $manager->persist($spectacle);
        }

        $manager->flush();
    }
}
