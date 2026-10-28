<?php

namespace App\Controller;

use App\Repository\GroupementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class GroupementController extends AbstractController
{
    #[Route("/", name: "app_home", methods: ["GET"])]
    #[Route("/groupements", name: "app_groupement", methods: ["GET"])]
    public function index(GroupementRepository $repository): Response
    {
        return $this->render("groupement/index.html.twig", [
            "groupements" => $repository->findAll(),
        ]);
    }

    #[Route("/groupements/{id}", name: "app_groupement_show", methods: ["GET"])]
    public function show(
        int $id,
        GroupementRepository $repository
    ): Response {
        $groupement = $repository->find($id);

        if (!$groupement) {
            throw $this->createNotFoundException("Groupement introuvable.");
        }

        return $this->render("groupement/show.html.twig", [
            "groupement" => $groupement,
        ]);
    }
}
