<?php


namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage(ArticleRepository $repository)
    {
        $username = false;
        $articles = $repository->findAllArticlesDESC();

        return $this->render('Homepage/homepage.html.twig', [
            'articles' => $articles,
            'username' => $username,
        ]);
    }
}