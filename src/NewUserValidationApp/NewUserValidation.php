<?php


namespace App\NewUserValidationApp;


use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

class NewUserValidation
{
    public function addToDb(EntityManagerInterface $entityManager, UserRepository $userRepository, User $user)
    {
        dd($userRepository->findOneBy(['name' => $user->getName()]));
    }
}