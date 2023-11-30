<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Courses;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use DateTime;

class CoursesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $data = 
        [
            [
                "Prenez en main Windows Server", 
                "Installez, configurez & administrez un système Windows Server 2019. Mettez votre système en réseau, déployez des serveurs DHCP & DNS & utilisez WSUS, Hyper-V & PowerShell", 
                6, 
                Courses::DIFFICULTY_EASY,
                4,
            ]
        ];

        foreach ($data as $oneCourse) 
        {
            $course = new Courses();
            $course->setCreatedAt(new DateTime("now"));
            $course->setTitle($oneCourse[0]);
            $course->setDescription($oneCourse[1]);
            $course->setDuration($oneCourse[2]);
            $course->setDifficulty($oneCourse[3]);
            $course->setCategory($manager->getRepository(Category::class)->findOneBy(["id" => $oneCourse[4]]));
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
