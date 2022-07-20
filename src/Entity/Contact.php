<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $maiden_name;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adress;

    /**
     * @ORM\Column(type="integer")
     */
    private $zip_code;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $city;

    /**
     * @ORM\Column(type="integer")
     */
    private $phone_number;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $content;

    /**
     * @ORM\Column(type="boolean")
     */
    private $preferency;

    /**
     * @ORM\Column(type="date")
     */
    private $created_at;
  /**
     * @ORM\OneToOne(targetEntity=BabysittingService::class, cascade={"persist", "remove"})
     */
    private $babysitting;
    /**
     * @ORM\OneToOne(targetEntity=Housekeeping::class, cascade={"persist", "remove"})
    
     */
    private $housekeeping;

    /**
     * @ORM\OneToOne(targetEntity=PersonalAssistanceService::class, cascade={"persist", "remove"})
     
     */
    private $personalAssistanceService;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getMaidenName(): ?string
    {
        return $this->maiden_name;
    }

    public function setMaidenName(?string $maiden_name): self
    {
        $this->maiden_name = $maiden_name;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getZipCode(): ?int
    {
        return $this->zip_code;
    }

    public function setZipCode(int $zip_code): self
    {
        $this->zip_code = $zip_code;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPhoneNumber(): ?int
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(int $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function isPreferency(): ?bool
    {
        return $this->preferency;
    }

    public function setPreferency(bool $preferency): self
    {
        $this->preferency = $preferency;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
    public function getBabysitting(): ?BabysittingService
    {
        return $this->babysitting;
    }

    public function setBabysitting(?BabysittingService $babysitting): self
    {
        $this->babysitting = $babysitting;

        return $this;
    }
    
    public function getHousekeeping(): ?Housekeeping
    {
        return $this->housekeeping;
    }

    public function setHousekeeping(Housekeeping $housekeeping): self
    {
        $this->housekeeping = $housekeeping;

        return $this;
    }

    public function getPersonalAssistanceService(): ?PersonalAssistanceService
    {
        return $this->personalAssistanceService;
    }

    public function setPersonalAssistanceService(PersonalAssistanceService $personalAssistanceService): self
    {
        $this->personalAssistanceService = $personalAssistanceService;

        return $this;
    }
}
