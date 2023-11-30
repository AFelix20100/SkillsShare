<?php

namespace App\Controller;

use App\Entity\Courses;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CoursesController extends AbstractController
{
    #[Route('/courses', name: 'app_courses')]
    public function ShowCourses(EntityManagerInterface $entityManager, Request $request): Response
    {
        $courses = $entityManager->getRepository(Courses::class)->findAll();
        return $this->render('courses/index.html.twig', 
        [
        ]);
    }
    #[Route('/categories', name: 'app_categories')]
    public function ShowCategories(): Response
    {
        
        return $this->render('courses/viewIndex.html.twig', 
        [
            "course" => $course,
        ]);
    }

    #[Route('/categories/{id}', name: 'app_courses_by_category')]
    public function showCoursesByCategory(EntityManagerInterface $entityManager, Category $category): Response
    {
        $courses = $category->getCourses();
        return $this->render('category/courses_by_categ.html.twig', 
        [
            'courses' => $courses,
        ]);
    }
}
