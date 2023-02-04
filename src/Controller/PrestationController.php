<?php

namespace App\Controller;

use App\Classe\Search;
use App\Form\SearchType;
use App\Repository\CategoryPrestationRepository;
use App\Repository\PrestationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrestationController extends AbstractController
{
    #[Route('/nos-prestations', name: 'prestations', methods: ['GET', 'POST'])]
    public function index(Request $request,PrestationRepository $prestationRepository, CategoryPrestationRepository $categoryPrestationRepository): Response
    {
        // Créer un nouvel objet de recherche et un formulaire utilisant le type de formulaire SearchType
        $search = new Search();
        $form = $this->createForm(SearchType::class, $search);

        // Traite la demande et valide le formulaire
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Si le formulaire est valide, utiliser le PrestationRepository pour trouver des prestations en utilisant les critères de recherche.
            $prestations = $prestationRepository->findWithSearch($search);
        } else {
            // Si le formulaire n'est pas soumis ou est invalide, récupérer toutes les prestations du référentiel
            $prestations = $prestationRepository->findAll();
            $namePrestas = $categoryPrestationRepository->findAll();
//            dd($namePrestas);
//            dd($prestations);
        }

        // Rendre le modèle prestation/index.html.twig et lui passer les variables prestations et formulaire
        return $this->render('prestation/index.html.twig', [
            'prestations' => $prestations,
            'namePrestas' => $namePrestas,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/prestation/{slug}', name: 'prestation')]
    public function show($slug,PrestationRepository $prestationRepository): Response
    {
        // Utiliser le PrestationRepository pour trouver une prestation par son slug.
        $prestation = $prestationRepository->findOneByslug($slug);
//        dd($prestation);

        // Rendre le modèle prestation/show.html.twig et lui passer la variable prestation.
        return $this->render('prestation/show.html.twig', [
            'prestation' => $prestation
        ]);
    }
}