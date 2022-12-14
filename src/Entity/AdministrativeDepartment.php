<?php

namespace App\Entity;

use App\Repository\AdministrativeDepartmentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdministrativeDepartmentRepository::class)
 */
class AdministrativeDepartment
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
    private $firstname_of_deceased;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $lastname_of_deceased;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $maiden_name_of_deceased;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adress_deceased;

    /**
     * @ORM\Column(type="integer")
     */
    private $zip_code_of_deceased;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $city_of_deceased;

    /**
     * @ORM\Column(type="date")
     */
    private $date_of_birth;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $place_of_birth;

    /**
     * @ORM\Column(type="date")
     */
    private $date_of_deceased;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $place_of_deceased;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adress;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $postal_code;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $content;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstnameOfDeceased(): ?string
    {
        return $this->firstname_of_deceased;
    }

    public function setFirstnameOfDeceased(string $firstname_of_deceased): self
    {
        $this->firstname_of_deceased = $firstname_of_deceased;

        return $this;
    }

    public function getLastnameOfDeceased(): ?string
    {
        return $this->lastname_of_deceased;
    }

    public function setLastnameOfDeceased(string $lastname_of_deceased): self
    {
        $this->lastname_of_deceased = $lastname_of_deceased;

        return $this;
    }

    public function getMaidenNameOfDeceased(): ?string
    {
        return $this->maiden_name_of_deceased;
    }

    public function setMaidenNameOfDeceased(?string $maiden_name_of_deceased): self
    {
        $this->maiden_name_of_deceased = $maiden_name_of_deceased;

        return $this;
    }

    public function getAdressDeceased(): ?string
    {
        return $this->adress_deceased;
    }

    public function setAdressDeceased(string $adress_deceased): self
    {
        $this->adress_deceased = $adress_deceased;

        return $this;
    }

    public function getZipCodeOfDeceased(): ?int
    {
        return $this->zip_code_of_deceased;
    }

    public function setZipCodeOfDeceased(int $zip_code_of_deceased): self
    {
        $this->zip_code_of_deceased = $zip_code_of_deceased;

        return $this;
    }

    public function getCityOfDeceased(): ?string
    {
        return $this->city_of_deceased;
    }

    public function setCityOfDeceased(string $city_of_deceased): self
    {
        $this->city_of_deceased = $city_of_deceased;

        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->date_of_birth;
    }

    public function setDateOfBirth(\DateTimeInterface $date_of_birth): self
    {
        $this->date_of_birth = $date_of_birth;

        return $this;
    }

    public function getPlaceOfBirth(): ?string
    {
        return $this->place_of_birth;
    }

    public function setPlaceOfBirth(string $place_of_birth): self
    {
        $this->place_of_birth = $place_of_birth;

        return $this;
    }

    public function getDateOfDeceased(): ?\DateTimeInterface
    {
        return $this->date_of_deceased;
    }

    public function setDateOfDeceased(\DateTimeInterface $date_of_deceased): self
    {
        $this->date_of_deceased = $date_of_deceased;

        return $this;
    }

    public function getPlaceOfDeceased(): ?string
    {
        return $this->place_of_deceased;
    }

    public function setPlaceOfDeceased(string $place_of_deceased): self
    {
        $this->place_of_deceased = $place_of_deceased;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

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

    public function setAdress(?string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getPostalCode(): ?int
    {
        return $this->postal_code;
    }

    public function setPostalCode(?int $postal_code): self
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

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
}
