<?php

namespace App\Controller;

use App\Entity\Courses;
use App\Form\CourseFormType;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
// use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Request;
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
        $form = $this->createForm(CourseFormType::class, $courses);

        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()) {
            $courses = $form->getData();
            dd($courses, $form);

        }

        return $this->render('courses/new.html.twig', [
            'coursesForm' => $form->createView(),
        ]);
    }

    #[Route('/categories', name: 'app_courses')]
    public function ShowCategories(): Response
    {
        return $this->render('courses/categorieIndex.html.twig', [
            'controller_name' => 'CoursesController',
        ]);
    }
    #[Route('/view', name: 'app_viewCourses')]
    public function ViewCourses(): Response
    {
        return $this->render('courses/viewIndex.html.twig', [
            'controller_name' => 'CoursesController',
        ]);
    }
}
