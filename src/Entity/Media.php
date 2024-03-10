<?php

namespace App\Entity;

use App\Repository\MediaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaRepository::class)]
class Media
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'Passport', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Candidat $url = null;

    #[ORM\OneToOne(inversedBy: 'cv', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Candidat $name = null;

    #[ORM\OneToOne(mappedBy: 'ProfilPic', cascade: ['persist', 'remove'])]
    private ?Candidat $Url = null;

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?Candidat
    {
        return $this->url;
    }

    public function setUrl(Candidat $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function getName(): ?Candidat
    {
        return $this->name;
    }

    public function setName(Candidat $name): static
    {
        $this->name = $name;

        return $this;
    }

   
}
