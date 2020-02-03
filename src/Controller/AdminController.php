<?php

namespace App\Controller;

use App\Entity\Uzytkownik;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="main")
     * @Security("is_granted('ROLE_USER')")
     */
    public function menu()
    {
        return $this->render('index.html.twig', [

        ]);
    }
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("/uzytkownicy", name="uzytkownicy")
     */
    public function showUsers()
    {
        return $this->render("/admin/uzytkownicy.html.twig",[
            'uzytkownicy'=> $uzytkownicy = $this->getDoctrine()->getRepository(Uzytkownik::class)->findall()
        ]);
    }

    /**
     * @Route("/usun",name="usun")
     */
    public function deleteUser()
    {

    }


}
