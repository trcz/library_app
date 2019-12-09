<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DzieloController extends AbstractController
{
    /**
     * @Route("/dzielo", name="dzielo")
     */
    public function index()
    {
        return $this->render('dzielo/index.html.twig', [
            'controller_name' => 'DzieloController',
        ]);
    }
}
