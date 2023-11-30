<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Courses;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{

    #[IsGranted("ROLE_USER")]
    #[Route('/categories', name: 'app_categories')]
    public function showCategories(EntityManagerInterface $entityManager): Response
    {
        $categories = $entityManager->getRepository(Category::class)->findAll();
        return $this->render('category/index.html.twig', 
        [
            'categories' => $categories,
        ]);
    }

    
}
