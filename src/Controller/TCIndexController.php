<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TCIndexController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('projet/index.html.twig', [
            'controller_name' => 'ProjetController',
        ]);
    }

    #[Route('/article', name: 'article')]
    public function article(): Response
    {
        $repo=$this->getDoctrine()->getRepository(Article::class);
        $articles=$repo->findAll();
        return $this->render('tc_index/article.html.twig', [
            'controller_name' => 'article',
            'article'=>$articles
        ]);
    }

    #[Route('/article/{id}', name: 'article_show')]
    public function show(Article $article): Response
    {
        return $this->render('tc_index/article_show.html.twig', [
            'article' => $article,
        ]);
    }
}
