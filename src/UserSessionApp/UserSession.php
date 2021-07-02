<?php


namespace App\UserSessionApp;


use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class UserSession implements IUserSession
{
    private $session;
    private $sessionName;
    private $currentUser;
    public function getCurrentUser()
    {
        $this->currentUser = $this->session->get($this->sessionName);
        return $this->currentUser;
    }

    public function __construct()
    {
        $this->sessionName = 'userSession';
        $this->session = new Session();
    }
    public function addCurrentUser(User $user)
    {
        $this->session->set($this->sessionName, $user->getName());
        $this->currentUser = $this->session->get($this->sessionName);
    }

    public function logout()
    {
        $this->session->clear();
        $this->currentUser = '';
        $this->sessionName = '';
    }

}