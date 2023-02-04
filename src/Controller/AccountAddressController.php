<?php

namespace App\Controller;

use App\Classe\Cart;
use App\Entity\Address;
use App\Form\AddressType;
use App\Repository\AddressRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountAddressController extends AbstractController
{
    #[Route('/compte/adresses', name: 'account_address')]
    public function index(): Response
    {
        return $this->render('account/address.html.twig');
    }

    #[Route('/compte/ajouter-une-adresse', name: 'account_address_add')]
    public function add(Request $request, EntityManagerInterface $entityManager, Cart $cart,SessionInterface $session): Response
    {
        // Crée une nouvelle entité Address et un formulaire à l'aide du type de formulaire AddressType
        $address = new Address();

        $form = $this->createForm(AddressType::class, $address);

        // Gère la requête et valide le formulaire
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            // Si le formulaire est valide, enregistre l'adresse en base de données et redirige l'utilisateur vers la route 'order' s'il y a un panier en session ou vers la route 'account_address' sinon
            $address->setUser($this->getUser());
            $entityManager->persist($address);
            $entityManager->flush();
            if($cart->get($session))
            {
                return $this->redirectToRoute('order');
            }else
            {
                return $this->redirectToRoute('account_address');
            }

        }

        // Rendre la vue account/address_form.html.twig et passe le formulaire à la vue
        return $this->render('account/address_form.html.twig',[
            'form'=> $form->createView(),
        ]);
    }

    #[Route('/compte/modifier-une-adresse/{id}', name: 'account_address_edit')]
    public function edit(Request $request, EntityManagerInterface $entityManager,$id, AddressRepository $addressRepository): Response
    {
        $address = $addressRepository->findOneById($id);

        if(!$address || $address->getUser() != $this->getUser())
        {
            return  $this->redirectToRoute('account_address');
        }

            $form = $this->createForm(AddressType::class, $address);

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid())
            {
                $entityManager->flush();
                return $this->redirectToRoute('account_address');
//            dd($address);
            }

            return $this->render('account/address_form.html.twig',[
                'form'=> $form->createView(),
            ]);

    }

    #[Route('/compte/supprimer-une-adresse/{id}', name: 'account_address_delete')]
    public function delete(EntityManagerInterface $entityManager, AddressRepository $addressRepository,$id,)
    {
        $address = $addressRepository->findOneById($id);

        if($address || $address->getUser() == $this->getUser())
        {
            $entityManager->remove($address);
            $entityManager->flush();
        }

        return $this->redirectToRoute('account_address');
//            dd($address);
    }
}
