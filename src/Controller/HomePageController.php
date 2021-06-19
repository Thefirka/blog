<?php


namespace App\Controller;


use App\Entity\Article;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage()
    {
        $articles = ['first article', 'second article', 'third article'];
        return $this->render('homepage/homepage.html.twig', [
            'articles' => $articles,
        ]);
    }
    /**
     * @Route("/new")
     */
    public function new(EntityManagerInterface $entityManager)
    {
        $article = new Article();
        $article->setName(strval(rand()))
            ->setSlug(strval(rand()))
            ->setArticleBody('"Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
             nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
             reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
             cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."');
            if (rand(1, 10) > 2) {
                $article->setPublishedAt(new DateTime(sprintf('-%d days', rand(1, 100))));
            }
            $entityManager->persist($article);
            $entityManager->flush();
        return new Response(sprintf(
            'this article id is #%d slug %s',
                    $article->getId(),
                    $article->getSlug()
        ));
    }
}