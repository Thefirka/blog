<?php


namespace App\Controller;


use App\Entity\Article;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class NewArticleController extends AbstractController
{
    /**
     * @Route ("/new", name="app_new_article")
     */
    public function NewArticle(Request $request, EntityManagerInterface $entityManager)
    {
        $name = '';
        $text = '';
        $authorName = '';
        if (!$request->request->all()) {

            return $this->render('CreateArticle/createArticle.html.twig',[
                'name' => $name,
                'text' => $text,
                'username' => $authorName
            ]);
        } else {
            $name = $request->request->get('name');
            $text = $request->request->get('text');

            $article = new Article();
            $article->setName($name);
            $article->setArticleBody($text);
            $article->setPublishedAt(new \DateTime());

            $user = new User();

            $user->setStatus('user');
            $user->setName('alsoTestName');
            $article->setAuthor($user);
            $entityManager->persist($article);
            $entityManager->flush();

            return $this->render('CreateArticle/createArticle.html.twig', [
                'name' => $name,
                'text' => $text,
                'username' => $authorName
            ]);
        }
    }
}