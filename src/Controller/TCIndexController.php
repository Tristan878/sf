<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Formulaire;
use App\Entity\Video;
use App\Form\FormulaireType;
use App\Repository\ArticleRepository;
use App\Repository\VideoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/video', name: 'video_index', methods: ['GET'])]
    public function video(VideoRepository $videoRepository): Response
    {
        return $this->render('tc_index/video.html.twig', [
            'videos' => $videoRepository->findAll(),
        ]);
    }

    #[Route('/video/{id}', name: 'video_show', methods: ['GET'])]
    public function video_show(Video $video): Response
    {
        return $this->render('tc_index/video_show.html.twig', [
            'video' => $video,
        ]);
    }

    #[Route('/news', name: 'news_index', methods: ['GET'])]
    public function news(ArticleRepository $articleRepository, \Symfony\Component\HttpFoundation\Request $request): Response
    {
        $news = $this->getDoctrine()->getRepository(Article::class)->findBy(
            ['type' => '2'],
            ['createdAt' => 'desc']);

        return $this->render('tc_index/news.html.twig', [
            'article' => $news]);
    }

    #[Route('/perso', name: 'perso_index', methods: ['GET'])]
    public function perso(ArticleRepository $articleRepository, \Symfony\Component\HttpFoundation\Request $request): Response
    {
        $perso = $this->getDoctrine()->getRepository(Article::class)->findBy(
            ['type' => '3'],
            ['createdAt' => 'desc']);

        return $this->render('tc_index/news.html.twig', [
            'article' => $perso]);
    }

}
