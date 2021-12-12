<?php

namespace App\Controller;

use App\Repository\WorkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }
    /**
     * @Route("/api/portfolio", name="portfolio")
     */
    public function portfolioJsonShow(WorkRepository $workRepository): Response
    {
        $portfolio = $workRepository->findAll();
        return $this->json(
            $portfolio,200,[],['groups'=>'displayProject']
        );
    }
}
