<?php


namespace App\UserSessionApp;


use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class UserSession implements ISessionStorage
{
    private $session;
    private $sessionName;
    public function getSession()
    {
        // TODO: Implement getSession() method.
    }

    public function __construct(Session $session)
    {
        $this->sessionName = 'userSession';
        $this->session = $session;
        $this->session->start();

    }
}