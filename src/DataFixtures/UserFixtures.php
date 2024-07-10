<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        // Store created users in an array to be able to set managers
        $users = [];

        // Create some roles first
        $roles = [];
        for ($i = 0; $i < 3; $i++) {
            $role = new Role();
            $role->setName($faker->jobTitle);
            $manager->persist($role);
            $roles[] = $role;
        }

        $manager->flush(); // Persist roles to the database

        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setEmail($faker->unique()->safeEmail);
            $user->setRoles(['ROLE_USER']);
            $user->setPassword($this->passwordHasher->hashPassword($user, 'password'));
            $user->setLastname($faker->lastName);
            $user->setFirstname($faker->firstName);
            $user->setWorkingplace($faker->city);
            $user->setCountReminder($faker->numberBetween(0, 10));
            $user->setLastReminder($faker->dateTimeThisYear);

            // Assign a random role from the created roles
            $user->setIdRole($roles[array_rand($roles)]);

            // Optionally set manager
            if ($i > 0) {
                $managerUser = $users[array_rand($users)];
                $user->setIdManager($managerUser);
            }

            $manager->persist($user);
            $users[] = $user; // Store user for future manager assignments
        }

        $manager->flush();
    }
}
