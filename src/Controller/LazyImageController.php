<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LazyImageController extends AbstractController
{
    #[Route('/lazy/image', name: 'app_lazy_image')]
    public function index(): Response
    {
        return $this->render('lazy_image/index.html.twig', [
            'controller_name' => 'LazyImageController',
        ]);
    }
}
