<?php

namespace App\Controller;

use App\Repository\CampagneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CampagneController extends AbstractController
{
    #[Route("/campagnes", name: "app_campagne", methods: ["GET"])]
    public function index(CampagneRepository $repository): Response
    {
        return $this->render("campagne/index.html.twig", [
            "campagnes" => $repository->findAll(),
        ]);
    }

    #[Route("/campagnes/{id}", name: "app_campagne_show", methods: ["GET"])]
    public function show(
        int $id,
        CampagneRepository $repository
    ): Response {
        $campagne = $repository->find($id);

        if (!$campagne) {
            throw $this->createNotFoundException("Campagne introuvable.");
        }

        return $this->render("campagne/show.html.twig", [
            "campagne" => $campagne,
        ]);
    }
}
