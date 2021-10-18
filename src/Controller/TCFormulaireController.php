<?php

namespace App\Controller;

use App\Entity\Formulaire;
use App\Form\FormulaireType;
use App\Repository\FormulaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/formulaire')]
class TCFormulaireController extends AbstractController
{

    #[Route('/new', name: 'formulaire_new', methods: ['GET','POST'])]
    public function new(Request $request): Response
    {
        $formulaire = new Formulaire();
        $form = $this->createForm(FormulaireType::class, $formulaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($formulaire);
            $entityManager->flush();

            return $this->redirectToRoute('home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tc_formulaire/new.html.twig', [
            'formulaire' => $formulaire,
            'form' => $form,
        ]);
    }






}
