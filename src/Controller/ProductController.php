<?php

namespace App\Controller;


use App\Classe\Search;
use App\Form\SearchType;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{

    #[Route('/nos-produits', name: 'products')]
    public function index(Request $request, ProductRepository $productRepository): Response
    {

        $search = new Search();
        $form = $this->createForm(SearchType::class, $search);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $products = $productRepository->findWithSearch($search);
        } else {
            $products = $productRepository->findAll();
            // dd($products);
        }

        return $this->render('product/index.html.twig', [
            'products' => $products,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/reservation/{slug}', name: 'reservation')]
    public function takeResevartion($slug, ProductRepository $productRepository): Response
    {
        return $this->render('reservation/show.html.twig', []);
    }

    #[Route('/produit/{slug}', name: 'product')]
    public function show($slug, ProductRepository $productRepository, int $stock): Response
    {
        $product = $productRepository->findOneByslug($slug);

        $stocks = $productRepository->findOneByStock($stock);
        dd($stocks);


        return $this->render('product/show.html.twig', [
            'product' => $product,
            'stocks' => $stocks,
        ]);
    }
}
