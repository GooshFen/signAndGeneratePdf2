<?php

namespace App\Controller;

use App\Entity\TeletravailForm;
use App\Entity\User;
use App\Form\TeletravailFormType;
use App\Repository\TeletravailFormRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/teletravailform')]
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
    public function new(Request $request, EntityManagerInterface $entityManager, User $user): Response
    {
        // Générer ici le lien et le mail vers le formulaire à éditer vers le manager du collaborateur ayant compléter le formulaire.
        $teletravailForm = new TeletravailForm();
        // Créer le formulaire et passe les rôles aux formulaires
        $user = $this->getUser();
        $form = $this->createForm(TeletravailFormType::class, $teletravailForm, [
            'user_roles'  => $user->getRoles(),
        ]);

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
    public function edit(Request $request, TeletravailForm $teletravailForm, EntityManagerInterface $entityManager, User $user): Response
    {

        // Gérer l'envoie des mails au niveau de cette route au manager correspondant
        $user = $this->getUser();
        // dd($user->getRoles());
        $form = $this->createForm(TeletravailFormType::class, $teletravailForm, [
            'user_roles'  => $user->getRoles(),
        ]);

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
