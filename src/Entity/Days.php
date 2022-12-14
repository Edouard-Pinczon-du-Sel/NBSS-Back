<?php

namespace App\Entity;

use App\Repository\DaysRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DaysRepository::class)
 */
class Days
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=BabysittingService::class, inversedBy="days")
     * @ORM\JoinColumn(nullable=false)
     */
    private $babysittingService;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBabysittingService(): ?BabysittingService
    {
        return $this->babysittingService;
    }

    public function setBabysittingService(?BabysittingService $babysittingService): self
    {
        $this->babysittingService = $babysittingService;

        return $this;
    }
}
