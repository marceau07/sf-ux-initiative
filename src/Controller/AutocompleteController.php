<?php

namespace App\Controller;

use App\Entity\DailyResult;
use App\Form\DailyResultACType;
use App\Form\DailyResultAutocompleteField;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AutocompleteController extends AbstractController
{
    #[Route('/autocomplete', name: 'app_autocomplete')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $dailyResult = $entityManager->persist(new DailyResult());

        // $form = $this->createForm(DailyResultACType::class, $dailyResult); // Sans AJAX
        $form = $this->createForm(DailyResultAutocompleteField::class, $dailyResult); // Avec AJAX
        $form->handleRequest($request);

        return $this->render('autocomplete/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
