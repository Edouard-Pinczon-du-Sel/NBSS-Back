<?php

namespace App\Entity;

use App\Repository\HousekeepingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HousekeepingRepository::class)
 */
class Housekeeping
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
    private $number_hour;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $content;

    public function getId(): ?int
    {
        return $this->id;
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

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }
}
