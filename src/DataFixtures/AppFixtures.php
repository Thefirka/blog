<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Factory\ArticleFactory;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $repeat = rand(1, 10);
        ArticleFactory::new()::createMany(rand(1, 10));
    }
}
