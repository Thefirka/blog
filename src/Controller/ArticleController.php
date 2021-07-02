<?php


namespace App\Controller;


use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

    /**
     * @Route("/articles/{slug}", name="app_show")
     */
    public function show(Article $article)
    {
        $session = new Session();
        $message = $session->getFlashBag()->get('error');
        $session->getFlashBag()->clear();
        $currentUser = $this->getUser();
            return $this->render('Article/article.html.twig', [
                'article' => $article,
                'currentUser' => $currentUser,
                'message' => $message,
            ]);
    }
}