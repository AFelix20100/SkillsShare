<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Chapter;
use App\Entity\Courses;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use DateTime;
use DateTimeImmutable;

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
                5,
                "https://oc-course.imgix.net/courses/2356306/2356306_teaser_picture_1680854428.jpg?auto=compress,format&q=80"
            ],
            [
                "Créez votre site web avec HTML5 et CSS3", 
                "Vous rêvez d'apprendre à créer des sites web ? Débutez avec ce cours qui vous enseignera tout ce qu'il faut savoir sur le développement de sites web en HTML5 et CSS3 !", 
                15, 
                Courses::DIFFICULTY_EASY,
                7,
                "https://oc-course.imgix.net/courses/1603881/1603881_teaser_picture_1680854710.jpg?auto=compress,format&q=80"
            ],
            [
                "Apprenez à programmer avec JavaScript", 
                "Maîtrisez les bases de la programmation JavaScript et sa logique de programmation en réalisant un site web dynamique.", 
                12, 
                Courses::DIFFICULTY_HARD,
                7,
                "https://oc-course.imgix.net/courses/7696886/7696886_teaser_picture_1684221736.jpg?auto=compress,format&q=80"
            ],
            [
                "Découvrez l'univers de la cybersécurité", 
                "Installez, configurez & administrez un système Windows Server 2019. Mettez votre système en réseau, déployez des serveurs DHCP & DNS & utilisez WSUS, Hyper-V & PowerShell", 
                8, 
                Courses::DIFFICULTY_HARD,
                2,
                "https://oc-course.imgix.net/courses/6900101/6900101_teaser_picture_1680858599.jpg?auto=compress,format&q=80"
            ],
            [
                "Initiez-vous au Machine Learning", 
                "Découvrez le Machine Learning et ses différentes techniques (régression linéaire, classification non supervisée...). Vous verrez comment un algorithme apprend pour résoudre un problème de Data Science, et vous entrainerez votre premier modèle !", 
                30, 
                Courses::DIFFICULTY_HARD,
                3,
                "https://oc-course.imgix.net/courses/6417031/6417031_teaser_picture_1684742698.jpg?auto=compress,format&q=80"
            ],
            [
                "Augmentez votre trafic grâce au référencement naturel (SEO)", 
                "Décuplez le trafic de votre site web grâce au référencement naturel. Construisez une stratégie SEO intégrée à la stratégie marketing.", 
                10, 
                Courses::DIFFICULTY_AVERAGE,
                6,
                "https://oc-course.imgix.net/courses/5561431/5561431_teaser_picture_1680857670.jpg?auto=compress,format&q=80"
            ]
        ];

        $chapterData = ["https://www.google.com/url?sa=i&url=https%3A%2F%2Ftenor.com%2Fview%2Fintroduction-gif-26330777&psig=AOvVaw2OJVDJm5Kwq9Jp_PAyD53x&ust=1701441128554000&source=images&cd=vfe&ved=0CBEQjRxqFwoTCKDqjaL464IDFQAAAAAdAAAAABAE","Introduction", "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi tenetur laborum dolores esse. Nobis tenetur tempore, minima recusandae non sed pariatur quis? Ad tenetur veritatis quo, optio aliquid eveniet est!"];
        foreach ($data as $oneCourse) 
        {
            $course = new Courses();
            $course->setCreatedAt(new DateTimeImmutable("now"));
            $course->setUpdatedAt(new DateTimeImmutable("now"));
            $course->setTitle($oneCourse[0]);
            $course->setDescription($oneCourse[1]);
            $course->setDuration($oneCourse[2]);
            $course->setDifficulty($oneCourse[3]);
            $course->setCategory($manager->getRepository(Category::class)->findOneBy(["id" => $oneCourse[4]]));
            $course->setImg($oneCourse[5]);

            $chapter = new Chapter();
            $chapter->setTitle($chapterData[1]);
            $chapter->setContent($chapterData[2]);
            $chapter->setCreatedAt(new DateTimeImmutable("now"));
            $chapter->setUpdatedAt(new DateTimeImmutable("now"));
            $chapter->setCourses($course);
            $chapter->setVideoUrl($chapterData[0]);

            $manager->persist($course);
            $manager->persist($chapter);
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
