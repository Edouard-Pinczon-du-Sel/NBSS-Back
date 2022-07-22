<?php

namespace App\Entity;

use App\Repository\PictureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PictureRepository::class)
 */
class Picture
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $placeOrder;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlaceOrder(): ?int
    {
        return $this->placeOrder;
    }

    public function setPlaceOrder(?int $placeOrder): self
    {
        $this->placeOrder = $placeOrder;

        return $this;
    }
}
