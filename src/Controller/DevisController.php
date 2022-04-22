<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Devis;
use App\Repository\TicketRepository;
use App\Form\DevisType;
use App\Repository\DevisRepository;
use Dompdf\Dompdf;
use Dompdf\Options;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Validator\Constraints\DateTime;


use App\Entity\Ticket;


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

          //  return $this->redirectToRoute('/showDevis/{devis.id}', [], Response::HTTP_SEE_OTHER);
          return $this->redirectToRoute('devis_show', ['id' => $devis->getId()], Response::HTTP_SEE_OTHER);

            
        }

        return $this->renderForm('devis/new.html.twig', [
            'devis' => $devis,
            'form' => $form,
        ]);
    }



    /**
     * @Route("/showDevis/{id}", name="devis_show")
     */
    public function show(Devis $devis, ManagerRegistry $doctrine): Response
    {


        $entityManager = $doctrine->getManager();
        $date = new DateTime();
        $ticket = new Ticket();
        $ticket->setHeure(new \DateTime());
        $ticket->setEvent("Nouveau Devis");
        
        $entityManager->persist($ticket);
        $entityManager->flush();
        


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