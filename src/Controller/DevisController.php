<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Dompdf\Dompdf;
use Dompdf\Options;

class DevisController extends AbstractController
{
    /**
     * @Route("/devis", name="devis")
     */
    public function index(): Response
    {

  

// instantiate and use the dompdf class

$dompdf = new Dompdf();

$dompdf->loadHtml('hello world');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
ob_get_clean();
$dompdf->stream();

        return $this->render('devis/index.html.twig', [
            'controller_name' => 'DevisController',
        ]);
    }
}
