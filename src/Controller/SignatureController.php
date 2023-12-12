<?php

namespace App\Controller;

use App\Entity\Contrat;
use App\Form\SignatureType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SignatureController extends AbstractController
{
    #[Route('/save_signature', name: 'signature', methods: ['POST'])]
    public function saveSignature(Request $request, EntityManagerInterface $entityManager): Response
    {
        $signature = new Contrat() ;
        $form = $this->createForm(SignatureType::class, $signature);
        $form->handleRequest($request);
        dump($form->get('signatureDataUrl')->getData());
        dd($form->isSubmitted());
        

        if ($form->isSubmitted() && $form->isValid()) {
            $signatureDataUrl = $form->get('signatureDataUrl')->getData();
            dd($signatureDataUrl);
            // Implement logic to process the signature data (e.g., embed it in the PDF)

            // ...

            // Return a response (e.g., a PDF with the embedded signature)
            return new Response('Signature saved successfully!');
        }

        return new Response('Invalid form submission.', Response::HTTP_BAD_REQUEST);
    }
}
