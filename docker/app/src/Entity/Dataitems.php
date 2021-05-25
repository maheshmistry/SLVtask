<?php

namespace App\Entity;

use App\Repository\DataitemsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DataitemsRepository::class)
 */
class Dataitems
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Marke;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Material;

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarke(): ?string
    {
        return $this->Marke;
    }

    public function setMarke(?string $Marke): self
    {
        $this->Marke = $Marke;

        return $this;
    }

    public function getMaterial(): ?string
    {
        return $this->Material;
    }

    public function setMaterial(?string $Material): self
    {
        $this->Material = $Material;

        return $this;
    }
}
