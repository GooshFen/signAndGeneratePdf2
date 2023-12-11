<?php

namespace App\Service;

use TCPDF;
use TCPDF_STATIC;

class PdfSignerService
{
    public function generateAndSignPdf($content, $signatureText)
    {
        // Create TCPDF instance
        $pdf = new TCPDF();
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        $pdf->AddPage();
        $pdf->writeHTML($content, true, false, true, false, '');


        dd($pdf->Output('', 'S'));
        // Get the document content
        // $documentContent = $pdf->getBuffer();

        // Sign the document using OpenSSL (example, replace with your own signing logic)
        // $signature = $this->signDocument($documentContent);

        // Add the signature to the document
        // $pdf->SetSignature($signature);
        
        return $pdf->Output('document_signed.pdf', 'S');
    }

    // private function signDocument($documentContent)
    // {
    //     // Use OpenSSL to sign the document (example, replace with your own signing logic)
    //     // This is a simplified example, you should adapt it based on your requirements
    //     $privateKeyPath = '/path/to/your/private/key.pem';
    //     $passphrase = 'your_passphrase';
        
    //     $privateKey = openssl_pkey_get_private("file://$privateKeyPath", $passphrase);
    //     openssl_sign($documentContent, $signature, $privateKey);

    //     return $signature;
    // }
}
