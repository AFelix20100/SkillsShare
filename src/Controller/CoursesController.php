<?php

namespace App\Controller;

use App\Entity\Courses;
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
        ]);
    }
    #[Route('/categories', name: 'app_categories')]
    public function ShowCategories(): Response
    {
        return $this->render('courses/categorieIndex.html.twig', [
            'controller_name' => 'CoursesController',
        ]);
    }
}
