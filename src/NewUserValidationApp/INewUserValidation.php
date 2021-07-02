<?php


namespace App\NewUserValidationApp;


use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

interface INewUserValidation
{
    public function addToDb(EntityManagerInterface $entityManager, UserRepository $userRepository, Request $request);
}