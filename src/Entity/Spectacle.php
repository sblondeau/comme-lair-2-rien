<?php

namespace App\Entity;

use App\Repository\SpectacleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpectacleRepository::class)]
class Spectacle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\OneToMany(
        mappedBy: 'spectacle',
        targetEntity: SpectacleCharacter::class,
        cascade: ['persist', 'remove'],
        orphanRemoval: true
    )]
    private Collection $spectacleCharacters;

    public function __construct()
    {
        $this->spectacleCharacters = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, SpectacleCharacter>
     */
    public function getSpectacleCharacters(): Collection
    {
        return $this->spectacleCharacters;
    }

    public function addSpectacleCharacter(SpectacleCharacter $spectacleCharacter): self
    {
        if (!$this->spectacleCharacters->contains($spectacleCharacter)) {
            $this->spectacleCharacters->add($spectacleCharacter);
            $spectacleCharacter->setSpectacle($this);
        }

        return $this;
    }

    public function removeSpectacleCharacter(SpectacleCharacter $spectacleCharacter): self
    {
        if ($this->spectacleCharacters->removeElement($spectacleCharacter)) {
            // set the owning side to null (unless already changed)
            if ($spectacleCharacter->getSpectacle() === $this) {
                $spectacleCharacter->setSpectacle(null);
            }
        }

        return $this;
    }
}
