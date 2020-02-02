<?php

namespace App\Controller;

use App\Entity\Wypozyczenie;
use App\Form\WypozyczenieType;
use App\Repository\WypozyczenieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @Route("/wypozyczenie")
 * @Security("is_granted('ROLE_USER')")
 */
class WypozyczenieController extends AbstractController
{
    /**
     * @Route("/", name="wypozyczenie_index", methods={"GET"})
     */
    public function index(WypozyczenieRepository $wypozyczenieRepository): Response
    {
        return $this->render('wypozyczenie/index.html.twig', [
            'wypozyczenies' => $wypozyczenieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="wypozyczenie_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $wypozyczenie = new Wypozyczenie();
        $form = $this->createForm(WypozyczenieType::class, $wypozyczenie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($wypozyczenie);
            $entityManager->flush();

            return $this->redirectToRoute('wypozyczenie_index');
        }

        return $this->render('wypozyczenie/new.html.twig', [
            'wypozyczenie' => $wypozyczenie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="wypozyczenie_show", methods={"GET"})
     */
    public function show(Wypozyczenie $wypozyczenie): Response
    {
        return $this->render('wypozyczenie/show.html.twig', [
            'wypozyczenie' => $wypozyczenie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="wypozyczenie_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Wypozyczenie $wypozyczenie): Response
    {
        $form = $this->createForm(WypozyczenieType::class, $wypozyczenie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('wypozyczenie_index');
        }

        return $this->render('wypozyczenie/edit.html.twig', [
            'wypozyczenie' => $wypozyczenie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="wypozyczenie_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Wypozyczenie $wypozyczenie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$wypozyczenie->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($wypozyczenie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('wypozyczenie_index');
    }
    /**
     * @Route("/historia", name='historia')
     */
    public function history(UserInterface $user)
    {
        $userId = 9;
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT p FROM App\Entity\Wypozyczenie p
    WHERE p.uzytkownik_id LIKE :data')
            ->setParameter('data',$userId);


        $wypozyczenia = $query->getResult();
        return $this->render('wypozyczenie/historia.html.twig',[
            'wypozyczenies' => $wypozyczenia,
        ]);
    }
    /**
     * @Route("/oddaj", name="oddaj")
     */
    public function giveBack(Request $request)
    {

        $data = $request->request->get('oddaj');


        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT p FROM App\Entity\Wypozyczenie p
    WHERE p.id LIKE :data')
            ->setParameter('data',$data);


        $wypozyczenia = $query->getResult();
        return $this->render('wypozyczenie/historia.html.twig',[
            'wypozyczenies' => $wypozyczenia,
        ]);
    }
}
