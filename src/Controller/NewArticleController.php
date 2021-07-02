<?php


namespace App\Controller;


use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
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
        $session = new Session();
        $message = $session->getFlashBag()->get('error');
        $session->getFlashBag()->clear();
        $currentUser = $this->getUser();
        if (!$request->request->all()) {

            return $this->render('CreateArticle/createArticle.html.twig',[
                'name' => $name,
                'text' => $text,
                'currentUser' => $currentUser,
                'message'  => $message,
            ]);
        } else {
            $name = $request->request->get('name');
            $text = $request->request->get('text');

            $article = new Article();
            $article->setName($name);
            $article->setArticleBody($text);
            $article->setPublishedAt(new \DateTime());

            return $this->render('CreateArticle/createArticle.html.twig', [
                'name' => $name,
                'text' => $text,
                'message'  => $message,
            ]);
        }
    }
}