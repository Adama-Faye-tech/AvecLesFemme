<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Campagne;
use App\Entity\Epargne;
use App\Entity\Groupement;
use App\Entity\Membre;
use App\Entity\ModeCotisation;
use App\Entity\Role;
use App\Entity\Seance;
use App\Entity\Tontine;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
        $roleMembre = (new Role())->setNom('Membre');
        $roleTresorier = (new Role())->setNom('Trésorier');
        $roleSecretaire = (new Role())->setNom('Secrétaire');
        $manager->persist($roleMembre);
        $manager->persist($roleTresorier);
        $manager->persist($roleSecretaire);

        
        $groupement = (new Groupement())
            ->setNom('Groupement des Femmes de Dakar')
            ->setCreatedAt(new \DateTime());
        $manager->persist($groupement);

        
        for ($i = 1; $i <= 5; $i++) {
            $membre = (new Membre())
                ->setNomComplet("Membre $i")
                ->setTelephone("77000000$i")
                ->setAdresse("Adresse $i")
                ->setLogin("membre$i")
                ->setPassword(password_hash('password', PASSWORD_BCRYPT))
                ->setCreatedAt(new \DateTime());
            $manager->persist($membre);
        }

        
        $admin = (new Admin())
            ->setNomComplet('Admin Principal')
            ->setTelephone('771111111')
            ->setLogin('admin')
            ->setPassword(password_hash('admin', PASSWORD_BCRYPT))
            ->setCreatedAt(new \DateTime())
            ->setDroitsSuperAdmin(true);
        $manager->persist($admin);

       
        $campagne = (new Campagne())
            ->setNom('Campagne 2026')
            ->setDateDebut(new \DateTime())
            ->setMontant('5000.00')
            ->setCreatedAt(new \DateTime());
        $manager->persist($campagne);

        
        $epargne = (new Epargne())
            ->setNom('Epargne 2026')
            ->setDateDebut(new \DateTime())
            ->setMontant('10000.00')
            ->setCreatedAt(new \DateTime())
            ->setObjectif('Acheter un terrain');
        $manager->persist($epargne);

       
        $tontine = (new Tontine())
            ->setNom('Tontine 2026')
            ->setDateDebut(new \DateTime())
            ->setMontant('25000.00')
            ->setCreatedAt(new \DateTime())
            ->setNumeroTour(1);
        $manager->persist($tontine);

        $manager->flush();
    }
}