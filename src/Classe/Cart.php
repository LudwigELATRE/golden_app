<?php

namespace App\Classe;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Cart
{


    public function __construct()
    {

    }

    public function add(SessionInterface $session,$id)
    {
        $cart = $session->get('cart', []);

        if(!empty($cart[$id]))
        {
            $cart[$id]++;
        }else
        {
            $cart[$id] = 1;
        }

        $session->set('cart', $cart);
    }

    public function get(SessionInterface $session)
    {
        return $session->get('cart');
    }

    public function remove(SessionInterface $session)
    {
        return $session->remove('cart');
    }

    public function delete(SessionInterface $session, $id)
    {
        $cart = $session->get('cart', []);

        unset($cart[$id]);

        return $session->set('cart', $cart);
    }

    public function decrease(SessionInterface $session, $id)
    {
        $cart = $session->get('cart', []);

        if($cart[$id] >  1)
        {
            $cart[$id]--;
        }else{
            unset($cart[$id]);
        }
        return $session->set('cart', $cart);
    }

    public function getFull(SessionInterface $session, ProductRepository $productRepository)
    {
        $cartComplete = [];

        if($this->get($session))
        {
            foreach ($this->get($session) as $id => $quantity)
            {
                $product_object = $productRepository->findOneById($id);
                if(!$product_object)
                {
                    $this->delete($session, $id);
                    continue;
                }
                $cartComplete[] = [
                    'product'=> $product_object,
                    'quantity' => $quantity,
                ];
            }
        }
        return $cartComplete;

    }
}