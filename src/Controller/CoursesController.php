<?php

namespace App\Controller;

use App\Entity\Courses;
use Doctrine\ORM\EntityManager;
use App\Repository\CoursesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CoursesController extends AbstractController
{
    #[Route('/courses', name: 'app_courses')]
    public function ShowCourses(EntityManagerInterface $entityManager, Request $request): Response
    {
        $courses = $entityManager->getRepository(Courses::class)->findAll();

        return $this->render('courses/index.html.twig', [
            'controller_name' => 'CoursesController',
            'courses' => $courses,
        ]);
    }

    #[Route('/courses/new', name:'app_courses_new')]
    public function new(EntityManagerInterface $entityManager, Request $request): Response
    {
        $courses = new Courses();
        $form = $this->createForm(Courses::class, $courses);

        $form->handleRequest($request);
        
        dd($courses, $form);
        if($form->isSubmitted() && $form->isValid()) {
            $courses = $form->getData();

        }

        return $this->render('courses/index.html.twig', [
            'controller_name' => 'CoursesController'
        ]);
    }

    #[Route('/categories', name: 'app_courses')]
    public function ShowCategories(): Response
    {
        return $this->render('courses/categorieIndex.html.twig', [
            'controller_name' => 'CoursesController',
        ]);
    }
}
