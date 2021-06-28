<?php


namespace App\Controller;


use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    private $createNotFoundException;

    /**
     * @Route("/articles/{slug}")
     */
    public function show(Article $article)
    {
            return $this->render('article/article.html.twig', [
                'article' => $article
            ]);
    }
}