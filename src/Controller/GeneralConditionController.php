<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GeneralConditionController extends AbstractController
{
    #[Route('/general/condition', name: 'general_condition')]
    public function index(): Response
    {
        return $this->render('general_condition/index.html.twig', [
            'controller_name' => 'GeneralConditionController',
        ]);
    }
}
