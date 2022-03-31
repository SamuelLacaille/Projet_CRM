<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PlanningRepository;

class CommercialController extends AbstractController
{
    /**
     * @Route("/commercial", name="commercial")
     */
    public function index(PlanningRepository $calendrier)
    {


        $events = $calendrier->findAll();
       // dd($events);

        $rdv = [];

        foreach($events as $event){
            $rdv[] = [
                'id' => $event->getId(),
                'title'=> $event->getTitre(),
                'start' => $event->getDebut()->format("Y-m-d H:i:s"),
                'end' => $event->getFin()->format("Y-m-d H:i:s"),
                'description' => $event->getDescription(),
                'jourComplet' => $event->getJourComplet(),
                'emailRdv' => $event->getEmailRdv(),
                'emailCommercial' => $event->getEmailCommercial(),
            ];
        }

        $data = json_encode($rdv);
    
 
        return $this->render('commercial/index.html.twig', compact('data'));
    }
}
