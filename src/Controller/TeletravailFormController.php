<?php

namespace App\Controller;

use App\Entity\TeletravailForm;
use App\Form\TeletravailFormType;
use App\Repository\TeletravailFormRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/teletravail/form')]
class TeletravailFormController extends AbstractController
{
    #[Route('/', name: 'app_teletravail_form_index', methods: ['GET'])]
    public function index(TeletravailFormRepository $teletravailFormRepository): Response
    {
        return $this->render('teletravail_form/index.html.twig', [
            'teletravail_forms' => $teletravailFormRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_teletravail_form_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $teletravailForm = new TeletravailForm();
        $form = $this->createForm(TeletravailFormType::class, $teletravailForm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($teletravailForm);
            $entityManager->flush();

            return $this->redirectToRoute('app_teletravail_form_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('teletravail_form/new.html.twig', [
            'teletravail_form' => $teletravailForm,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_teletravail_form_show', methods: ['GET'])]
    public function show(TeletravailForm $teletravailForm): Response
    {
        return $this->render('teletravail_form/show.html.twig', [
            'teletravail_form' => $teletravailForm,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_teletravail_form_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TeletravailForm $teletravailForm, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TeletravailFormType::class, $teletravailForm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_teletravail_form_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('teletravail_form/edit.html.twig', [
            'teletravail_form' => $teletravailForm,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_teletravail_form_delete', methods: ['POST'])]
    public function delete(Request $request, TeletravailForm $teletravailForm, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$teletravailForm->getId(), $request->request->get('_token'))) {
            $entityManager->remove($teletravailForm);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_teletravail_form_index', [], Response::HTTP_SEE_OTHER);
    }
}
