<?php

namespace App\Entity;

use App\Repository\CandidatRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidatRepository::class)]
class Candidat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $lastname = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $adress = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $country = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $nationality = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable:true)]
    private ?\DateTimeInterface $birthdate = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $birthPlace = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $shortDescription = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(nullable:true)]
    private ?\DateTimeImmutable $deletedAt = null;

    #[ORM\Column(nullable:true)]
    private ?int $jobCategory = null;

    #[ORM\Column(length: 255,nullable:true)]
    private ?string $adminNote = null;

    #[ORM\Column]
    private ?bool $isAvailable = null;

    #[ORM\OneToMany(targetEntity: Apply::class, mappedBy: 'Candidat', orphanRemoval: true)]
    private Collection $applies;

    #[ORM\ManyToOne(inversedBy: 'candidats')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Gender $Gender = null;

   

    #[ORM\OneToOne(inversedBy: 'candidat', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\OneToOne(inversedBy: 'candidat', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: true)]
    private ?Media $cv = null;

    #[ORM\OneToOne(inversedBy: 'candidat', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: true)]
    private ?Media $profilPic = null;

    #[ORM\OneToOne(inversedBy: 'candidat', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: true)]
    private ?Media $passport = null;

    #[ORM\OneToOne(inversedBy: 'candidat', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: true)]
    private ?Experience $experience = null;


    public function __construct()
    {
        $this->applies = new ArrayCollection();
        $this->createdAt = new DateTimeImmutable();
        $this->updatedAt = new DateTimeImmutable();
        $this->isAvailable = false;
    }

   
    
   
    public function getId(): ?int
    {
        return $this->id;
    }

    
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): static
    {
        $this->adress = $adress;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(string $nationality): static
    {
        $this->nationality = $nationality;

        return $this;
    }


    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTimeInterface $birthdate): static
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getBirthPlace(): ?string
    {
        return $this->birthPlace;
    }

    public function setBirthPlace(string $birthPlace): static
    {
        $this->birthPlace = $birthPlace;

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(string $shortDescription): static
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getDeletedAt(): ?\DateTimeImmutable
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(\DateTimeImmutable $deletedAt): static
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    public function getJobCategory(): ?int
    {
        return $this->jobCategory;
    }

    public function setJobCategory(int $jobCategory): static
    {
        $this->jobCategory = $jobCategory;

        return $this;
    }


    public function getAdminNote(): ?string
    {
        return $this->adminNote;
    }

    public function setAdminNote(string $adminNote): static
    {
        $this->adminNote = $adminNote;

        return $this;
    }

    public function isIsAvailable(): ?bool
    {
        return $this->isAvailable;
    }

    public function setIsAvailable(bool $isAvailable): static
    {
        $this->isAvailable = $isAvailable;

        return $this;
    }

    /**
     * @return Collection<int, Apply>
     */
    public function getApplies(): Collection
    {
        return $this->applies;
    }

    public function addApply(Apply $apply): static
    {
        if (!$this->applies->contains($apply)) {
            $this->applies->add($apply);
            $apply->setCandidat($this);
        }

        return $this;
    }

    public function removeApply(Apply $apply): static
    {
        if ($this->applies->removeElement($apply)) {
            // set the owning side to null (unless already changed)
            if ($apply->getCandidat() === $this) {
                $apply->setCandidat(null);
            }
        }

        return $this;
    }

    public function getGender(): ?Gender
    {
        return $this->Gender;
    }

    public function setGender(?Gender $Gender): static
    {
        $this->Gender = $Gender;

        return $this;
    }

   

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getCv(): ?Media
    {
        return $this->cv;
    }

    public function setCv(?Media $cv): static
    {
        $this->cv = $cv;

        return $this;
    }

    public function getProfilPic(): ?Media
    {
        return $this->profilPic;
    }

    public function setProfilPic(?Media $profilPic): static
    {
        $this->profilPic = $profilPic;

        return $this;
    }

    public function getPassport(): ?Media
    {
        return $this->passport;
    }

    public function setPassport(?Media $passport): static
    {
        $this->passport = $passport;

        return $this;
    }

    public function getExperience(): ?Experience
    {
        return $this->experience;
    }

    public function setExperience(Experience $experience): static
    {
        $this->experience = $experience;

        return $this;
    }

}
