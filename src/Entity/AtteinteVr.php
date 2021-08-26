<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AtteinteVrRepository")
 */
class AtteinteVr
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
    private $optionVr;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOptionVr(): ?string
    {
        return $this->optionVr;
    }

    public function setOptionVr(string $optionVr): self
    {
        $this->optionVr = $optionVr;

        return $this;
    }
}
