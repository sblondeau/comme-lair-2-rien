<?php

namespace App\DataFixtures;

use App\Entity\Spectacle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class SpectacleFixtures extends Fixture
{
    public const SPECTACLES = [
        [
            'title' => 'Devine qui vient diner ce soir ?',
            'description' => 'Dans un vignoble réputé sur la cote bourguignonne,un événement se prépare Simon, 
            le fils de la maison est amoureux, il a hâte de présenter l\'élue de son coeur à sa famille.',
        ],
        [
            'title' => 'Zabell est perdue',
            'description' => 'Zabell est perdue dans une grande cité, elle ne retrouve plus sa ruche...
            Une petite fille, Soline, va l\'aider à retrouver sa maison. Plusieurs personnages vont croiser sa route.',
        ],
    ];

    public function __construct(private SluggerInterface $slugger)
    {
    }

    public function load(ObjectManager $manager): void
    {
        foreach (self::SPECTACLES as $key => $spectacleData) {
            $spectacle = new Spectacle();
            $spectacle->setTitle($spectacleData['title']);
            $spectacle->setDescription($spectacleData['description']);
            $spectacle->setImage('');
            $spectacle->setSlug($this->slugger->slug($spectacle->getTitle()));
            $this->addReference('spectacle' . $key, $spectacle);
            $manager->persist($spectacle);
        }

        $manager->flush();
    }
}
