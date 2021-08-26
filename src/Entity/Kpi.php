<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KpiRepository")
 */
class Kpi
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
    private $nomKpi;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomKpi(): ?string
    {
        return $this->nomKpi;
    }

    public function setNomKpi(string $nomKpi): self
    {
        $this->nomKpi = $nomKpi;

        return $this;
    }
}
