<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Planning;

class PlanningController extends AbstractController
{
    /**
     * @Route("/planning", name="planning")
     */
    public function index(): Response
    {
        return $this->render('planning/index.html.twig', [
            'controller_name' => 'PlanningController',
        ]);
    }

      /**
     * @Route("/planning/{id}/edit", name="planning_event_edit", methods={"PUT"})
     */
    public function majEvent(?PlanningController $calendrier, Request $request)
    //crée $calendrier si existe pas
    {
        // recup des donnees
        $donnees = json_decode($request->getContent());
        
        if(isset($donnees->titre) && !empty($donnees->titre) &&
           isset($donnees->description) && !empty($donnees->description) &&
           isset($donnees->start) && !empty($donnees->start) &&
           isset($donnees->emailRdv) && !empty($donnees->emailRdv) &&
           isset($donnees->emailCommercial) && !empty($donnees->emailCommercial)
    
        
        ){
            //donnees completes
            // code 200
            $code = 200;
            if(!$calendrier){
                $calendrier = new Planning;
                $code = 201;

            }
            $calendrier->setTitre($donnees->titre);
            $calendrier->setDescription($donnees->description);
            $calendrier->setDebut(new DateTime($donnees->start));
            if($donnees->jourComplet){
                $calendrier->setFin(new DateTime($donnees->start));
            }else{
                $calendrier->setFin(new DateTime($donnees->end));
            }
            $calendrier->setJourComplet($donnees->jourComplet);
            $calendrier->setEmailRdv($donnees->emailRdv);
            $calendrier->setEmailCommercial($donnees->emailCommercial);

            $em = $this->getDoctrine()->getManager();
            $em->persist($calendrier);
            $em->flush();

            return new Response("OK", $code);

        }else{
            // donnees pas completes
            return new Response('Données incomplètes',404);
        }



        return $this->render('planning/index.html.twig', [
            'controller_name' => 'PlanningController',
        ]);
    }
}
