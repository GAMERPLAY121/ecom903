<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{

    /**
     * @Route("/", name="default")
     */
    public function index(ProductRepository $productRepository)
    {
        $products = $productRepository->findby(
            ['isTop' => true],
            ['name' => 'ASC']
        );

        return $this->render(
            'default/index.html.twig',
            [
                'products' => $products,
            ]
        );
    }

}
