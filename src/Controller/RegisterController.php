<?php


namespace App\Controller;


use App\NewUserValidationApp\NewUserValidationFactory;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     */
    public function Register(Request $request, EntityManagerInterface $entityManager, UserRepository $repository)
    {
        $session = new Session();
        $message = $session->getFlashBag()->get('error');
        $session->getFlashBag()->clear();
        if (!$request->request->all()){
            return $this->render('Register/Register.html.twig', [
                'message' => $message
            ]);
        } else {
            $userValidation = new NewUserValidationFactory();
            $userValidation = $userValidation->createNewUserValidation();
            if($userValidation->addToDb($entityManager, $repository, $request)) {
                return $this->redirect('/');
            } else {
                return $this->render('Register/Register.html.twig', [
                    'message' => $message
                ]);
            }
        }
    }
}