<?php

namespace App\Controller;

use App\Repository\ExerciceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ExerciceController extends AbstractController
{
    #[Route("/exercices", name: "app_exercice", methods: ["GET"])]
    public function index(ExerciceRepository $repository): Response
    {
        return $this->render("exercice/index.html.twig", [
            "exercices" => $repository->findAll(),
        ]);
    }

    #[Route("/exercices/{id}", name: "app_exercice_show", methods: ["GET"])]
    public function show(
        int $id,
        ExerciceRepository $repository
    ): Response {
        $exercice = $repository->find($id);

        if (!$exercice) {
            throw $this->createNotFoundException("Exercice introuvable.");
        }

        return $this->render("exercice/show.html.twig", [
            "exercice" => $exercice,
        ]);
    }
}
