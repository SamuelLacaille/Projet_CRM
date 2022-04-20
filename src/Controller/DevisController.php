<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Devis;
use App\Form\DevisType;
use App\Repository\DevisRepository;
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
$options = new Options();
$options->set('defaultFont', 'Courier');
$dompdf = new Dompdf($options);

$dompdf->loadHtml('hello world');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();

        return $this->render('devis/index.html.twig', [
            'controller_name' => 'DevisController',
        ]);
    }



  /**
     * @Route("/newDevis", name="devis_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $devis = new Devis();
        $form = $this->createForm(DevisType::class, $devis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($devis);
            $entityManager->flush();

            return $this->redirectToRoute('calendrier_index', [], Response::HTTP_SEE_OTHER);

            // processe avec envoi du pdf + possibilité de payer
            // enregistrement du client dans une base client
            // ajouter siret + ajout presta dynamique
            // les prix dynamiques + ttc + ht
        }

        return $this->renderForm('devis/new.html.twig', [
            'devis' => $devis,
            'form' => $form,
        ]);
    }



    /**
     * @Route("/showDevis/{id}", name="devis_show")
     */
    public function show(Devis $devis): Response
    {

// instantiate and use the dompdf class
$options = new Options();
$options->set('defaultFont', 'Courier');
$dompdf = new Dompdf($options);

$dompdf->loadHtml( $this->render('devis/show.html.twig', [
    'devis' => $devis,
]));

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();
ob_get_clean();
// Output the generated PDF to Browser
$dompdf->stream();



        return $this->render('devis/show.html.twig', [
            'devis' => $devis,
        ]);
    }
}
