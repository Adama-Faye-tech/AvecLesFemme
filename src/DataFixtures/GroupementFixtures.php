<?php

namespace App\DataFixtures;

use App\Entity\Groupement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GroupementFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $data = [
            ['nom' => 'GIE Teranga Mbour', 'tel' => '+221 77 123 45 67', 'adresse' => 'Mbour, Thiès'],
            ['nom' => 'GIE Jappo Dakar', 'tel' => '+221 78 234 56 78', 'adresse' => 'Pikine, Dakar'],
            ['nom' => 'GIE Dëgg Saint-Louis', 'tel' => '+221 76 345 67 89', 'adresse' => 'Sor, Saint-Louis'],
        ];
        foreach ($data as $groupementData) {
            $groupement = (new Groupement())
                ->setNom($groupementData['nom'])
                ->setTel($groupementData['tel'])
                ->setAdresse($groupementData['adresse']);
            $manager->persist($groupement);
        }

        $manager->flush();
    }
}
