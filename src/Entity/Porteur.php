<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PorteurRepository")
 */
class Porteur
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
    private $nom_porteur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPorteur(): ?string
    {
        return $this->nom_porteur;
    }

    public function setNomPorteur(string $nom_porteur): self
    {
        $this->nom_porteur = $nom_porteur;

        return $this;
    }
}
