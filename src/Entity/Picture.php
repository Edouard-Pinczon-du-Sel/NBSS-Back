<?php

namespace App\Entity;

use App\Repository\PictureRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=PictureRepository::class)
 * @Vich\Uploadable
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
    private $place_order;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlaceOrder(): ?int
    {
        return $this->place_order;
    }

    public function setPlaceOrder(?int $place_order): self
    {
        $this->place_order = $place_order;

        return $this;
    }
}