<?php


namespace App\NewUserValidationApp;


use App\Entity\User;
use App\Repository\UserRepository;
use App\UserSessionApp\UserSession;
use App\UserSessionApp\UserSessionFactory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactory;

class NewUserValidation implements INewUserValidation
{
    public function addToDb(EntityManagerInterface $entityManager, UserRepository $userRepository, Request $request)
    {
        if ($userRepository->findOneBy(['name' => $request->get('name')])) {
            $session = new Session();
            $session->getFlashBag()->add('error', 'User with this name already exist');
            return false;
        } else {
            $user = new User();
            $user->setName($request->get('name'));
            $user->setStatus('user');

            $passwordHasher = new PasswordHasherFactory([
                'common' => ['algorithm' => 'bcrypt'],
                'memory-hard'=> ['algorithm' => 'sodium'],
            ]);
            $userSession = new UserSessionFactory();
            $userSession = $userSession->NewUserSession();
            $passwordHasher = $passwordHasher->getPasswordHasher('common');
            $user->setPassword($passwordHasher->hash($request->get('password')));
            $userSession = new UserSessionFactory();
            $userSession = $userSession->NewUserSession();
            $userSession->addCurrentUser($user);
            $entityManager->persist($user);
            $entityManager->flush();
            return true;
        }
    }
}