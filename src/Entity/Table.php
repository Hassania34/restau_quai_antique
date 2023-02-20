<?php

namespace App\Entity;

use App\Repository\TableRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TableRepository::class)]
#[ORM\Table(name: '`table`')]
class Table
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numéro = null;

    #[ORM\Column]
    private ?int $type = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNuméro(): ?int
    {
        return $this->numéro;
    }

    public function setNuméro(int $numéro): self
    {
        $this->numéro = $numéro;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }
}
