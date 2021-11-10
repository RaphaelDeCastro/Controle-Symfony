<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieeController extends AbstractController
{
    /**
     * @Route("/categoriee", name="categoriee")
     */
    public function index(): Response
    {
        return $this->render('categoriee/index.html.twig', [
            'controller_name' => 'CategorieeController',
        ]);
    }
}
