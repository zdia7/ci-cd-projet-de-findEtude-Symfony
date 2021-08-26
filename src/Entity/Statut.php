<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StatutRepository")
 */
class Statut
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
    private $optionOk;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOptionOk(): ?string
    {
        return $this->optionOk;
    }

    public function setOptionOk(string $optionOk): self
    {
        $this->optionOk = $optionOk;

        return $this;
    }
}
