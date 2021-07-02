<?php


namespace App\Controller;


use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

    /**
     * @Route("/articles/{slug}", name="app_show")
     */
    public function show(Article $article)
    {
        $username = false;
            return $this->render('Article/article.html.twig', [
                'article' => $article,
                'username' => $username,
            ]);
    }
}