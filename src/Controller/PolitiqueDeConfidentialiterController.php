<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PolitiqueDeConfidentialiterController extends AbstractController
{
    #[Route('/politique-de-confidentialiter', name: 'politique_de_confidentialiter')]
    public function index(): Response
    {
        return $this->render('politique_de_confidentialiter/index.html.twig');
    }
}
