<?php


namespace App\Controller;


use App\Entity\Article;
use App\Repository\ArticleRepository;
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
    public function NewArticle(Request $request, EntityManagerInterface $entityManager, ArticleRepository $repository)
    {
        $session = new Session();
        if (null == $this->getUser()) {
            $session->getFlashBag()->add('error', 'Please login first');
            return $this->redirectToRoute('app_homepage');
        }
        $name = '';
        $text = '';

        $message = $session->getFlashBag()->get('error');
        $session->getFlashBag()->clear();
        $currentUser = $this->getUser();
        if (!$request->request->all()) {
            return $this->render('NewArticle/NewArticle.twig',[
                'name' => $name,
                'text' => $text,
                'currentUser' => $currentUser,
                'message'  => $message,
            ]);
        } else {
            $name = $request->request->get('name');
            $text = $request->request->get('text');

            if (false == $repository->findBy(['name' => $name])) {
                $article = new Article();
                $article->setName($name);
                $article->setArticleBody($text);
                $article->setPublishedAt(new \DateTime());
                $article->setAuthor($currentUser);
                $entityManager->persist($article);
                $entityManager->flush();
                return $this->redirectToRoute('app_homepage');
            } else {
                $session->getFlashBag()->add('error', 'article with this name already exist');
                $message = $session->getFlashBag()->get('error');
            }
            return $this->render('NewArticle/NewArticle.twig', [
                'name' => $name,
                'text' => $text,
                'currentUser' => $currentUser,
                'message'  => $message,
            ]);
        }
    }
}