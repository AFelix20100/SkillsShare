<?php

namespace App\Controller;

use App\Form\ChapterFormType;
use App\Entity\Chapter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;


class ChapterController extends AbstractController
{
    #[Route('/chapter/list', name: 'app_chapter')]
    public function index(): Response
    {
        return $this->render('chapter/index.html.twig', [
            'controller_name' => 'ChapterController',
        ]);
    }

    #[IsGranted("ROLE_ENSEIGNANT")]
    #[Route('/chapter/new', name: "new_chapter")]
    public function new(): Response
    {
        $chapter = new Chapter();
        $form = $this->createFormBuilder($chapter)
        ->add('titre', TextType::class)
        ->add('Video URL', TextType::class)
        ->add('contenu', TextType::class);
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
