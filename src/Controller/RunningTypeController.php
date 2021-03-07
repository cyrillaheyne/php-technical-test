<?php

namespace App\Controller;

use App\Entity\RunningType;
use App\Form\RunningTypeType;
use App\Repository\RunningTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/running_type")
 */
class RunningTypeController extends AbstractController
{
    /**
     * @Route("/", name="running_type_index", methods={"GET"})
     */
    public function index(RunningTypeRepository $runningTypeRepository): Response
    {
        return $this->render('running_type/index.html.twig', [
            'running_types' => $runningTypeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="running_type_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $runningType = new RunningType();
        $form = $this->createForm(RunningTypeType::class, $runningType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($runningType);
            $entityManager->flush();

            return $this->redirectToRoute('running_type_index');
        }

        return $this->render('running_type/new.html.twig', [
            'running_type' => $runningType,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="running_type_show", methods={"GET"})
     */
    public function show(RunningType $runningType): Response
    {
        return $this->render('running_type/show.html.twig', [
            'running_type' => $runningType,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="running_type_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RunningType $runningType): Response
    {
        $form = $this->createForm(RunningTypeType::class, $runningType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('running_type_index');
        }

        return $this->render('running_type/edit.html.twig', [
            'running_type' => $runningType,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="running_type_delete", methods={"DELETE"})
     */
    public function delete(Request $request, RunningType $runningType): Response
    {
        if ($this->isCsrfTokenValid('delete'.$runningType->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($runningType);
            $entityManager->flush();
        }

        return $this->redirectToRoute('running_type_index');
    }
}
