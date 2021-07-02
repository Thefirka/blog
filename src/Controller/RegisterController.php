<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     */
    public function Register(Request $request)
    {
        $username = false;
        if (!$request->request->all()){
            return $this->render('Register/Register.html.twig');
        } else {

            return $this->redirect('/');
        }
    }
}