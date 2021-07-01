<?php

namespace App\DataFixtures;

use App\Factory\ArticleFactory;

use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = UserFactory::createOne();
        ArticleFactory::new()::createMany(rand(1, 10), ['authorName' => $user]);
    }
}
