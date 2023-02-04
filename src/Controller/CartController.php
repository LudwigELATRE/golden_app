<?php

namespace App\Controller;

use App\Classe\Cart;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    #[Route('/mon-panier', name: 'cart')]
    public function index(Cart $cart, SessionInterface $session, ProductRepository $productRepository): Response
    {
        return $this->render('cart/index.html.twig', [
            'cart' => $cart->getFull($session, $productRepository),
        ]);

    }

    #[Route('/cart/add/{id}', name: 'add_to_cart')]
    public function add(Cart $cart, $id, SessionInterface $session ): Response
    {
        $cart->add($session, $id);

        return $this->redirectToRoute('cart');
    }

    #[Route('/cart/remove', name: 'remove_my_cart')]
    public function remove(Cart $cart, SessionInterface $session): Response
    {
        $cart->remove($session);

        return $this->redirectToRoute('products');
    }

    #[Route('/cart/delete/{id}', name: 'delete_to_cart')]
    public function delete(Cart $cart, $id, SessionInterface $session ): Response
    {
        $cart->delete($session, $id );

        return $this->redirectToRoute('cart');
    }

    #[Route('/cart/decrease/{id}', name: 'decrease_to_cart')]
    public function decrease(Cart $cart, $id, SessionInterface $session ): Response
    {
        $cart->decrease($session, $id );

        return $this->redirectToRoute('cart');
    }
}
