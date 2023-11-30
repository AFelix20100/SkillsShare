<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CoursesController extends AbstractController
{
    #[Route('/courses', name: 'app_courses')]
    public function ShowCourses(): Response
    {
        return $this->render('courses/index.html.twig', [
            'controller_name' => 'CoursesController',
        ]);
    }
    #[Route('/categories', name: 'app_categories')]
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
