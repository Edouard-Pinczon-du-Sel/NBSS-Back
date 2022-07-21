<?php

namespace App\Entity;

use App\Repository\PersonalAssistanceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonalAssistanceRepository::class)
 */
class PersonalAssistance
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
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=PersonalAssistanceService::class, inversedBy="personalAssistance")
     * @ORM\JoinColumn(nullable=false)
     */
    private $personalAssistanceService;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPersonalAssistanceService(): ?PersonalAssistanceService
    {
        return $this->personalAssistanceService;
    }

    public function setPersonalAssistanceService(?PersonalAssistanceService $personalAssistanceService): self
    {
        $this->personalAssistanceService = $personalAssistanceService;

        return $this;
    }
}
