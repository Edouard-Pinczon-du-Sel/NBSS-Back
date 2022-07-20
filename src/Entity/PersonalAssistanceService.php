<?php

namespace App\Entity;

use App\Repository\PersonalAssistanceServiceRepository;
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
}
