<?php

namespace App\Controller;

use App\Entity\Newsletter;
use App\Form\NewsletterFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    // Renvoie vers notre vue newsletter
    #[Route('/newsletter', name: 'newsletter')]
    public function add(Request $request): Response
    {
        $newsletter = new Newsletter();
        $form = $this->createForm(NewsletterFormType::class, $newsletter);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $newsletter = $form->getData();

            $this->entityManager->persist($newsletter);
            $this->entityManager->flush();


            $this->addFlash('message', 'Inscription en attente de validation.');


            return $this->RedirectToRoute('home');
        }

        return $this->render('home/newsletter.html.twig',[
            'newsletterForm' => $form->createView(),
        ]);
    }

}
