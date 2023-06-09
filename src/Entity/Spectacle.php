<?php

namespace App\Entity;

use App\Repository\SpectacleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SpectacleRepository::class)]
class Spectacle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(max: 255)]
    #[Assert\NotBlank()]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(max: 255)]
    #[Assert\NotBlank()]
    private ?string $image = null;

    #[ORM\OneToMany(
        mappedBy: 'spectacle',
        targetEntity: SpectacleCharacter::class,
        cascade: ['persist', 'remove'],
        orphanRemoval: true
    )]
    #[Assert\Valid()]
    private Collection $spectacleCharacters;

    #[ORM\OneToMany(
        mappedBy: 'spectacle',
        targetEntity: Calendar::class,
        cascade: ['persist', 'remove'],
        orphanRemoval: true
    )]
    #[ORM\OrderBy(['datetime' => 'ASC'])]
    #[Assert\Valid()]
    private Collection $calendars;

    #[ORM\OneToMany(
        mappedBy: 'spectacle',
        targetEntity: PressReview::class,
        cascade: ['persist', 'remove'],
        orphanRemoval: true
    )]
    #[Assert\Valid()]
    private Collection $pressReviews;

    #[ORM\OneToMany(
        mappedBy: 'spectacle',
        targetEntity: Gallery::class,
        cascade: ['persist', 'remove'],
        orphanRemoval: true
    )]
    #[Assert\Valid()]
    private Collection $galleries;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    public function __construct()
    {
        $this->spectacleCharacters = new ArrayCollection();
        $this->calendars = new ArrayCollection();
        $this->pressReviews = new ArrayCollection();
        $this->galleries = new ArrayCollection();
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

    public function setImage(?string $image): self
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

    /**
     * @return Collection<int, Calendar>
     */
    public function getCalendars(): Collection
    {
        return $this->calendars;
    }

    public function addCalendar(Calendar $calendar): self
    {
        if (!$this->calendars->contains($calendar)) {
            $this->calendars->add($calendar);
            $calendar->setSpectacle($this);
        }

        return $this;
    }

    public function removeCalendar(Calendar $calendar): self
    {
        if ($this->calendars->removeElement($calendar)) {
            // set the owning side to null (unless already changed)
            if ($calendar->getSpectacle() === $this) {
                $calendar->setSpectacle(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PressReview>
     */
    public function getPressReviews(): Collection
    {
        return $this->pressReviews;
    }

    public function addPressReview(PressReview $pressReview): self
    {
        if (!$this->pressReviews->contains($pressReview)) {
            $this->pressReviews->add($pressReview);
            $pressReview->setSpectacle($this);
        }

        return $this;
    }

    public function removePressReview(PressReview $pressReview): self
    {
        if ($this->pressReviews->removeElement($pressReview)) {
            // set the owning side to null (unless already changed)
            if ($pressReview->getSpectacle() === $this) {
                $pressReview->setSpectacle(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Gallery>
     */
    public function getGalleries(): Collection
    {
        return $this->galleries;
    }

    public function addGallery(Gallery $gallery): self
    {
        if (!$this->galleries->contains($gallery)) {
            $this->galleries->add($gallery);
            $gallery->setSpectacle($this);
        }

        return $this;
    }

    public function removeGallery(Gallery $gallery): self
    {
        if ($this->galleries->removeElement($gallery)) {
            // set the owning side to null (unless already changed)
            if ($gallery->getSpectacle() === $this) {
                $gallery->setSpectacle(null);
            }
        }

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
}
