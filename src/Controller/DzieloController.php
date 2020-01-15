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
    
    /**
     * @Route("/mebel", name="mebel")
     */
    public function mebel_show()
    {
        $meble = $this->getDoctrine()->getRepository(mebel::class)->findall();
        
        return $this->render('mebel/index.html.twig', [
            'meble' => $meble,
            
        ]);
    }
    
    /**
     * @Route("/polka", name="polka")
     */
    public function index()
    {
        $polki = $this->getDoctrine()->getRepository(polka::class)->findall();
        
        return $this->render('polka/index.html.twig', [
            'polki' => $polki,
            
        ]);
    }
    
    /**
     * @Route("/pokoj", name="pokoj")
     */
    public function index()
    {
        $pokoje = $this->getDoctrine()->getRepository(pokoj::class)->findall();
        
        return $this->render('pokoj/index.html.twig', [
            'pokoje' => $pokoje,
            
        ]);
    }
    
    /**
     * @Route("/autor", name="autor")
     */
    public function index()
    {
        $autorzy = $this->getDoctrine()->getRepository(autor::class)->findall();
        
        return $this->render('autor/index.html.twig', [
            'autorzy' => $autorzy,
            
        ]);
    }
    
    /**
     * @Route("/uzytkownik", name="uzytkownik")
     */
    public function index()
    {
        $uzytkownicy = $this->getDoctrine()->getRepository(uzytkownik::class)->findall();
        
        return $this->render('uzytkownik/index.html.twig', [
            'uzytkownicy' => $uzytkownicy,
            
        ]);
    }
    
}
