<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VrRepository")
 */
class Vr
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomVr;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomVr(): ?string
    {
        return $this->nomVr;
    }

    public function setNomVr(string $nomVr): self
    {
        $this->nomVr = $nomVr;

        return $this;
    }
}
