<?php


namespace App\LoginValidationApp;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\ManagerRegistry;

class LoginValidation implements ILoginValidation
{
    public function Validate(EntityManagerInterface $entityManager, $name)
    {
        $repository = $entityManager->getRepository(User::class);
        $user = $repository->findOneBy(['name' => $name]);
        dd($user);
    }

}