<?php

namespace App\Controller;

use App\Entity\Autor;
use App\Entity\Dzielo;
use App\Form\DzieloType;
use App\Repository\DzieloRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request as RQ;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/dzielo")
 */
class DzieloController extends AbstractController
{
    /**
     * @Route("/", name="dzielo_index", methods={"GET"})
     */
    public function index(DzieloRepository $dzieloRepository): Response
    {
        return $this->render('dzielo/index.html.twig', [
            'dzielos' => $dzieloRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="dzielo_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $dzielo = new Dzielo();
        $form = $this->createForm(DzieloType::class, $dzielo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($dzielo);
            $entityManager->flush();

            return $this->redirectToRoute('dzielo_index');
        }

        return $this->render('dzielo/new.html.twig', [
            'dzielo' => $dzielo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dzielo_show", methods={"GET"})
     */
    public function show(Dzielo $dzielo): Response
    {
        return $this->render('dzielo/show.html.twig', [
            'dzielo' => $dzielo,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="dzielo_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Dzielo $dzielo): Response
    {
        $form = $this->createForm(DzieloType::class, $dzielo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dzielo_index');
        }

        return $this->render('dzielo/edit.html.twig', [
            'dzielo' => $dzielo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dzielo_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Dzielo $dzielo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dzielo->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($dzielo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('dzielo_index');
    }
    /**
     * @Route("/szukaj", name="search")
     */
    public function Search(RQ $request)
    {
        /*$phrase = strtolower($dzielo);
        $dziela = $this->getDoctrine()->getRepository(Dzielo::class)->findBy(['tytul'=>$phrase]);
        return $this->render('dzielo/index_.html.twig',[
            'dziela' => $dziela,

        ]);*/
        $request = $this->getRequest();
        $data = $request->request->get('search');


        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT p FROM App\Entity\Dzielo p
    WHERE p.tytul LIKE :data')
            ->setParameter('data',$data);


        $dziela = $query->getResult();
        return $this->render('dzielo/index_.html.twig',[
            'dziela' => $dziela,
        ]);
    }
}
