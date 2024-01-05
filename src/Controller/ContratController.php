<?php

namespace App\Controller;

use Dompdf\Dompdf;
use App\Entity\Contrat;
use App\Form\ContratType;
use App\Form\SignatureType;
use App\Service\PdfSignerService;
use App\Repository\ContratRepository;
// use App\Services\CreateTempDirService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;


#[Route('/contrat')]
class ContratController extends AbstractController
{
    #[Route('/', name: 'app_contrat_index', methods: ['GET'])]
    public function index(ContratRepository $contratRepository): Response
    {
        return $this->render('contrat/index.html.twig', [
            'contrats' => $contratRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_contrat_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contrat = new Contrat();
        $form = $this->createForm(ContratType::class, $contrat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($contrat);
            $entityManager->flush();

            return $this->redirectToRoute('app_contrat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('contrat/new.html.twig', [
            'contrat' => $contrat,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_contrat_show', methods: ['GET'])]
    public function show(Contrat $contrat): Response
    {
        return $this->render('contrat/show.html.twig', [
            'contrat' => $contrat,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_contrat_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Contrat $contrat, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ContratType::class, $contrat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_contrat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('contrat/edit.html.twig', [
            'contrat' => $contrat,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_contrat_delete', methods: ['POST'])]
    public function delete(Request $request, Contrat $contrat, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contrat->getId(), $request->request->get('_token'))) {
            $entityManager->remove($contrat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_contrat_index', [], Response::HTTP_SEE_OTHER);
    }


    #[Route('/{id}/pdf', name: 'app_contrat_pdf', methods: ['POST', 'GET'])]
    public function pdf(Request $request, Contrat $contrat, EntityManagerInterface $entityManager, ContratRepository $contratRepository): Response
    {
        $dompdf = new Dompdf();

        


        $formSignature = $this->createForm(SignatureType::class, $contrat,['attr' => [
            'id' => 'signature'
        ]]);
        $formSignature->handleRequest($request);
        
        if ($formSignature->isSubmitted() && $formSignature->isValid()) {
            $signatureDataUrl = $formSignature->get('signatureDataUrl')->getData();
            

            $pathToSignatureImageFile = $this->convertDataUrlToImage($signatureDataUrl) ;
            // dd($pathToSignatureImageFile);
            // dd($parameterBagInterface->get('kernel.project_dir'));
            // Convertir l'encodage en base64 de la signature en image
            // $contrat->setSignatureDataUrl($signatureDataUrl);
            // $temp = $createTempDirService->createTemporaryDirectory();
            // dd($temp);

            // $entityManager->persist($contrat);
            // $entityManager->flush();

            return new Response('Signature saved successfully!');
        }

        return $this->render('contrat/pdf.html.twig', [
            'formSignature' => $formSignature,
        ]);

        // $dompdf->loadHtml($html) ;
        // $dompdf->setPaper('A4', 'portrait');
        // $dompdf->render();
        
        // $output = $dompdf->output();
        // $filename = 'contrat_'.$contrat->getId().'.pdf';
        // $file = $this->getParameter('kernel.project_dir').'/public/'.$filename;

        // $contrat->setPdfSansSignature($filename);
        // // dd(get_class_methods($contratRepository));
        // $entityManager->persist($contrat);
        // $entityManager->flush();

        // file_put_contents($file, $output);


        // return $this->render('contrat/pdf.html.twig',  [
        //     'contrat' => $contrat,
        // ]);
        // return $this->redirectToRoute('app_contrat_show', ['id' => $contrat->getId()], Response::HTTP_SEE_OTHER);





        // $response = new Response($output);
        // $response->headers->set('Content-Type', 'application/pdf');
        // $response->headers->set('Content-Disposition', 'inline; filename="' . $filename . '"');

        // return $response;

        // return $this->redirectToRoute('app_contrat_show', ['id' => $contrat->getId()], Response::HTTP_SEE_OTHER);
    }

    // #[Route('/save-signature', name: 'save_signature', methods: ['POST'])]
    // public function saveSignature(Request $request): Response
    // {
    //     $signatureDataUrl = $request->request->get('signatureDataUrl');
    //     dd($signatureDataUrl);
    //     // Implement logic to embed the signature in the PDF
    //     // Example: Use TCPDF to generate a PDF with the embedded signature
    //     $pdf = new \TCPDF();
    //     $pdf->AddPage();
    //     // ... Add your PDF content

    //     // Embed the signature image in the PDF
    //     $signatureImage = $this->convertDataUrlToImage($signatureDataUrl);
    //     $pdf->Image($signatureImage, 50, 50, 100, 50);

    //     // Output the signed PDF
    //     $pdfContent = $pdf->Output('', 'S');

    //     return new Response($pdfContent, 200, [
    //         'Content-Type' => 'application/pdf',
    //         'Content-Disposition' => 'inline; filename="signed_document.pdf"',
    //     ]);
    // }

 

    private function convertDataUrlToImage($dataUrl)
    {
        // Extract base64-encoded image data
        $base64Image = explode(',', $dataUrl)[1];

        // Decode base64 data and save it as an image file
        $imageData = base64_decode($base64Image);
        $imagePath = sys_get_temp_dir() . '/signature_image.png';
        file_put_contents($imagePath, $imageData);
        
        return $imagePath;
    }




}
