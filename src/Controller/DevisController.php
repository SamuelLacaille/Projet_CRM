<?php

namespace App\Controller;

use App\Entity\Devis;
use App\Form\DevisType;
use App\Repository\DevisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

  /**
     * @Route("/devis/new", name="New_devis")
     */
    public function newDevis(Request $request, EntityManagerInterface $entityManager): Response
    {

        $devis = new Devis();
        $form = $this->createForm(DevisType::class, $devis);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($devis);
            $entityManager->flush();

       //     return $this->redirectToRoute('utilisateur_index', [], Response::HTTP_SEE_OTHER);
       return $this->redirectToRoute('generation_devis', [], Response::HTTP_SEE_OTHER);

        }
        return $this->renderForm('devis/new.html.twig', [
            'form' => $form
        ]);
    
  }



     /**
     * @Route("/devis/generer/{id}", name="generation_devis")
     */
    public function generer(Devis $devis): Response
    {



        return $this->render('devis/generer.html.twig', [
            'devis' => $devis
        ]);

    }
}
