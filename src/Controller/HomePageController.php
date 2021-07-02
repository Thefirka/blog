<?php


namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage(ArticleRepository $repository, UserRepository $userRepository)
    {
        $session = new Session();
        $currentUser = $this->getUser();
        $message = $session->getFlashBag()->get('error');
        $session->getFlashBag()->clear();

        $articles = $repository->findAllArticlesDESC();

        return $this->render('Homepage/homepage.html.twig', [
            'articles' => $articles,
            'currentUser' => $currentUser,
            'message'  => $message,
        ]);
    }
}