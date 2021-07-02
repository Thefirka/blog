<?php


namespace App\LoginValidationApp;


use Doctrine\ORM\EntityManagerInterface;

interface ILoginValidation
{
    public function Validate(EntityManagerInterface $entityManager, string $name);
}