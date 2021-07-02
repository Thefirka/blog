<?php

namespace App\DataFixtures;

use App\Factory\ArticleFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {

        ArticleFactory::new()::createMany(rand(1, 10));
        $manager->flush();
    }
}
