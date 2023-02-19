<?php

namespace App\Entity;

use App\Repository\HorairesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HorairesRepository::class)]
class Horaires
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Début = null;

    #[ORM\Column(length: 255)]
    private ?string $fin = null;

    #[ORM\Column(length: 255)]
    private ?string $jour = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDébut(): ?string
    {
        return $this->Début;
    }

    public function setDébut(string $Début): self
    {
        $this->Début = $Début;

        return $this;
    }

    public function getFin(): ?string
    {
        return $this->fin;
    }

    public function setFin(string $fin): self
    {
        $this->fin = $fin;

        return $this;
    }

    public function getJour(): ?string
    {
        return $this->jour;
    }

    public function setJour(string $jour): self
    {
        $this->jour = $jour;

        return $this;
    }
}
