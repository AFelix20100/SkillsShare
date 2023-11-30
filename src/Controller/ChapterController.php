<?php

namespace App\Controller;

use App\Form\ChapterFormType;
use App\Entity\Chapter;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
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
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $chapter = new Chapter();
        $form = $this->createForm(ChapterFormType::class, $chapter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $chapter = $form->getData();

            $entityManager->persist($chapter);
            $entityManager->flush();

            return $this->redirectToRoute('app_chapter');
         }

        return $this->render('chapter/index.html.twig', [
            'chapterForm' => $form->createView(),
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
