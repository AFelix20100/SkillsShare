<?php

namespace App\Controller;

use App\Form\ChapterFormType;
use App\Entity\Chapter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChapterController extends AbstractController
{
    #[Route('/chapter/list', name: 'app_chapter')]
    public function index(): Response
    {
        return $this->render('chapter/index.html.twig', [
            'controller_name' => 'ChapterController',
        ]);
    }

    #[Route('/chapter/new', name: "new_chapter")]
    public function new(): Response
    {
        $chapter = new Chapter();
        return $this->render('chapter/index.html.twig', [
            'controller_name' => 'ChapterController',
        ]);
    }

    #[Route('/chapter/edit/{id}', methods: ['PUT'], name: "edit_chapter")]
    public function edit(int $id): Response
    {

    }

    #[Route('/chapter/delete/{id}', methods: ['DELETE'], name: "delete_chapter")]
    public function delete(int $id): Response
    {

    }
}