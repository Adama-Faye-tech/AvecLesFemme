<?php

namespace App\Controller;

use App\Repository\GroupementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class GroupementController extends AbstractController
{
    public function __construct(private readonly GroupementRepository $groupementRepository)
    {
    }

    #[Route('/', name: 'app_home', methods: ['GET'])]
    #[Route('/groupement', name: 'app_groupement', methods: ['GET'])]
    public function index(): Response
    {
        $groupements = $this->groupementRepository->findAll();

        return $this->render('groupement/index.html.twig', [
            'dataGroupements' => $groupements,
        ]);
    }
}
