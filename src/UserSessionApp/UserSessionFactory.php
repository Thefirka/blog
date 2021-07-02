<?php


namespace App\UserSessionApp;


class UserSessionFactory
{
    public function NewUserSession()
    {
        return new UserSession();
    }
}