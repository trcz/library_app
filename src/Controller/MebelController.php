<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
class DzieloController extends AbstractController
{
    /**
     * @Route("/mebel", name="mebel")
     */
    public function index()
    {
        $meble = $this->getDoctrine()->getRepository(mebel::class)->findall();
        
        return $this->render('mebel/index.html.twig', [
            'meble' => $meble,
            
        ]);
    }
}
