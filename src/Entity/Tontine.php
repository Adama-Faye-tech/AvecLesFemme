<?php

namespace App\Entity;

use App\Repository\TontineRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TontineRepository::class)]
class Tontine extends Campagne
{
    #[ORM\Column]
    private ?int $numeroTour = null;

    #[ORM\ManyToOne(targetEntity: Membre::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?Membre $beneficiaire = null;

    public function getNumeroTour(): ?int
    {
        return $this->numeroTour;
    }

    public function setNumeroTour(int $numeroTour): static
    {
        $this->numeroTour = $numeroTour;
        return $this;
    }

    public function getBeneficiaire(): ?Membre
    {
        return $this->beneficiaire;
    }

    public function setBeneficiaire(?Membre $beneficiaire): static
    {
        $this->beneficiaire = $beneficiaire;
        return $this;
    }
}