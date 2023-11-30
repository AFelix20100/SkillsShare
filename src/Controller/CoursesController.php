<?php

namespace App\Controller;

use App\Entity\Courses;
use App\Entity\Category;
use App\Form\CourseFormType;
use DateTime;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


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

    #[Route('/courses/new', name: 'new_course')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $courses = new Courses();
        $form = $this->createForm(CourseFormType::class, $courses);
        $form->handleRequest($request);
        

        if ($form->isSubmitted() && $form->isValid()) {
            $coursesData =$form->getData();
            $courses->setTitle($coursesData->getTitle());
            $courses->setDescription($coursesData->getDescription());
            $courses->setDuration($coursesData->getDuration());
            $courses->setDifficulty($coursesData->getDifficulty());
            $courses->setCreatedAt(new DateTimeImmutable());
            $courses->setUpdatedAt(new DateTime());
            dd($courses);
            $entityManager->persist($courses);
            $entityManager->flush();

            return $this->redirectToRoute('app_courses');
         }
        return $this->render('courses/new.html.twig', [
            'coursesForm' => $form->createView(),
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
