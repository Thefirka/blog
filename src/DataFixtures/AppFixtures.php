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
//        $user = UserFactory::createOne();
//        dd($this->setReference('test', $user));

        ArticleFactory::new()::createMany(rand(1, 10));
        $manager->flush();
    }
}
