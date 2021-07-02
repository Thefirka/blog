<?php


namespace App\UserSessionApp;

use App\Entity\User;

interface IUserSession
{
    public function getCurrentUser();
    public function addCurrentUser(User $user);
    public function logout();
}