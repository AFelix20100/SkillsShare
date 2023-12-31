<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $data = ["Bureautique", "Cybersécurité", "Data", "Design", "Systèmes & Réseaux", "Marketing & Communication", "Développement", "Management", "Gestion de projet"];

        foreach ($data as $key => $value) 
        {
            $category = new Category();
            $category->setLabel($value);
            $manager->persist($category);
        }
        $manager->flush();
    }

}
