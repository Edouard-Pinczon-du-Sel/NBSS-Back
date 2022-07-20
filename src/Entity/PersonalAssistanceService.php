<?php

namespace App\Entity;

use App\Repository\PersonalAssistanceServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonalAssistanceServiceRepository::class)
 */
class PersonalAssistanceService
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $financial_help;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    private $organization;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $number_hour;

    /**
     * @ORM\OneToMany(targetEntity=Intervention::class, mappedBy="personalAssistanceService")
     */
    private $intervention;

    /**
     * @ORM\OneToMany(targetEntity=PersonalAssistance::class, mappedBy="personalAssistanceService")
     */
    private $personalAssistance;

    public function __construct()
    {
        $this->intervention = new ArrayCollection();
        $this->personalAssistance = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isFinancialHelp(): ?bool
    {
        return $this->financial_help;
    }

    public function setFinancialHelp(bool $financial_help): self
    {
        $this->financial_help = $financial_help;

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

    public function getOrganization(): ?string
    {
        return $this->organization;
    }

    public function setOrganization(?string $organization): self
    {
        $this->organization = $organization;

        return $this;
    }

    public function getNumberHour(): ?int
    {
        return $this->number_hour;
    }

    public function setNumberHour(?int $number_hour): self
    {
        $this->number_hour = $number_hour;

        return $this;
    }

    /**
     * @return Collection<int, Intervention>
     */
    public function getIntervention(): Collection
    {
        return $this->intervention;
    }

    public function addIntervention(Intervention $intervention): self
    {
        if (!$this->intervention->contains($intervention)) {
            $this->intervention[] = $intervention;
            $intervention->setPersonalAssistanceService($this);
        }

        return $this;
    }

    public function removeIntervention(Intervention $intervention): self
    {
        if ($this->intervention->removeElement($intervention)) {
            // set the owning side to null (unless already changed)
            if ($intervention->getPersonalAssistanceService() === $this) {
                $intervention->setPersonalAssistanceService(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PersonalAssistance>
     */
    public function getPersonalAssistance(): Collection
    {
        return $this->personalAssistance;
    }

    public function addPersonalAssistance(PersonalAssistance $personalAssistance): self
    {
        if (!$this->personalAssistance->contains($personalAssistance)) {
            $this->personalAssistance[] = $personalAssistance;
            $personalAssistance->setPersonalAssistanceService($this);
        }

        return $this;
    }

    public function removePersonalAssistance(PersonalAssistance $personalAssistance): self
    {
        if ($this->personalAssistance->removeElement($personalAssistance)) {
            // set the owning side to null (unless already changed)
            if ($personalAssistance->getPersonalAssistanceService() === $this) {
                $personalAssistance->setPersonalAssistanceService(null);
            }
        }

        return $this;
    }
}
