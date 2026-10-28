<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdminRepository::class)]
class Admin extends Membre
{
    #[ORM\Column(options: ['default' => false])]
    private bool $droitsSuperAdmin = false;

    public function getDroitsSuperAdmin(): bool
    {
        return $this->droitsSuperAdmin;
    }

    public function setDroitsSuperAdmin(bool $droitsSuperAdmin): static
    {
        $this->droitsSuperAdmin = $droitsSuperAdmin;

        return $this;
    }
}
