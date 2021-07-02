<?php


namespace App\Controller;


use App\LoginValidationApp\LoginValidationFactory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(Request $request, EntityManagerInterface $entityManager)
    {
        $session = new Session();
        $message = $session->getFlashBag()->get('error');
        $session->getFlashBag()->clear();
        if (!$request->request->all()) {
            return $this->render('Login/login.html.twig', [
                'message' => $message,
            ]);
        } else {
            $loginValidator = new LoginValidationFactory();
            $loginValidator = $loginValidator->createLoginValidation();
            $loginValidator->Validate($entityManager, $request->request->get('name'));
        }
    }
}