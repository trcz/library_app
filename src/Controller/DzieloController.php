<?php

namespace App\Controller;
use App\Entity\dzielo;
use mysql_xdevapi\Exception as d;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException\Exception;

class DzieloController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index()
    {
        $dziela = $this->getDoctrine()->getRepository(Dzielo::class)->findAll();
        
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
    public function polka_show()
    {
        $polki = $this->getDoctrine()->getRepository(polka::class)->findall();
        
        return $this->render('polka/index.html.twig', [
            'polki' => $polki,
            
        ]);
    }
    
    /**
     * @Route("/pokoj", name="pokoj")
     */
    public function pokoj_show()
    {
        $pokoje = $this->getDoctrine()->getRepository(pokoj::class)->findall();
        
        return $this->render('pokoj/index.html.twig', [
            'pokoje' => $pokoje,
            
        ]);
    }
    
    /**
     * @Route("/autor", name="autor")
     */
    public function autor_show()
    {
        $autorzy = $this->getDoctrine()->getRepository(autor::class)->findall();
        
        return $this->render('autor/index.html.twig', [
            'autorzy' => $autorzy,
            
        ]);
    }
    
    /**
     * @Route("/uzytkownik", name="uzytkownik")
     */
    public function uzytkownik_show()
    {
        $uzytkownicy = $this->getDoctrine()->getRepository(uzytkownik::class)->findall();
        
        return $this->render('uzytkownik/index.html.twig', [
            'uzytkownicy' => $uzytkownicy,
            
        ]);
    }
    
}
