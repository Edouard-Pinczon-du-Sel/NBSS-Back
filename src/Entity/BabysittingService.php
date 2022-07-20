<?php

namespace App\Entity;

use App\Repository\BabysittingServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BabysittingServiceRepository::class)
 */
class BabysittingService
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $number_child;

    /**
     * @ORM\Column(type="integer")
     */
    private $number_hour;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $content;

    /**
     * @ORM\OneToMany(targetEntity=Days::class, mappedBy="babysittingService")
     */
    private $days;

  

    public function __construct()
    {
        $this->days = new ArrayCollection();
        $this->intervention = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberChild(): ?int
    {
        return $this->number_child;
    }

    public function setNumberChild(int $number_child): self
    {
        $this->number_child = $number_child;

        return $this;
    }

    public function getNumberHour(): ?int
    {
        return $this->number_hour;
    }

    public function setNumberHour(int $number_hour): self
    {
        $this->number_hour = $number_hour;

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