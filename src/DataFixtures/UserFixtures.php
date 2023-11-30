<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class UserFixtures extends Fixture implements DependentFixtureInterface
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $data = 
        [
            ["felix@skillsshare.com", "felix", []],
            ["thomas@skillsshare.com", "thomas", []],
            ["damien@skillsshare.com", "damien", []],
            ["alexandre@skillsshare.com", "alexandre", []],
            ["cyril@skillsshare.com", "cyril", ["ROLE_ENSEIGNANT"]],
            ["admin@skillsshare.com", "admin", ["ROLE_ENSEIGNANT", "ROLE_ADMIN"]],
            ["enseignant@skillsshare.com", "enseignant", ["ROLE_ENSEIGNANT"]],

        ];

        foreach ($data as $userData) 
        {
            $user = new User();
            $user->setEmail($userData[0]);
            $password = $this->hasher->hashPassword($user, $userData[1]);
            $user->setPassword($password);
            $user->setCreateAt(new DateTime("now"));
            $user->setRoles($userData[2]);
            $manager->persist($user);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CoursesFixtures::class,
        ];
    }
}
