<?php

namespace App\Controller;
use App\Entity\Dzielo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DzieloController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index()
    {
        $dziela = $this->getDoctrine()->getRepository(dzielo::class)->findall();
        
        return $this->render('dzielo/index.html.twig', [
            'dziela' => $dziela,
            
        ]);
    }
}
