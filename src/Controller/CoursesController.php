<?php

namespace App\Controller;

use App\Entity\Courses;
use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;

class CoursesController extends AbstractController
{
    #[Route('/courses', name: 'app_courses')]
    public function showCourses(EntityManagerInterface $entityManager): Response
    {
        $courses = $entityManager->getRepository(Courses::class)->findAll();
        return $this->render('courses/index.html.twig', 
        [
            "courses" => $courses,
        ]);
    }
    
    #[Route('/{id}/view', name: 'app_viewCourses')]
    public function ViewCourses(Courses $course): Response
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
