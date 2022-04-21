<?php
namespace App\Controller;

use App\Entity\Prospect;
use App\Form\ProspectType;
use App\Repository\ProspectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/prospect")
 */
class ProspectController extends AbstractController
{
    /**
     * @Route("/", name="prospect_index", methods={"GET"})
     */
    public function index(ProspectRepository $prospectRepository): Response
    {
        return $this->render('prospect/index.html.twig', [
            'prospects' => $prospectRepository->findAll(),
        ]);
    }

    /**
     * @Route("/api", name="getProspects")
     */

    public function getProspects() : JsonResponse {
        $prospects= $this->getDoctrine()->getRepository(Prospect::class);
        $prospects= $prospects->findAll();
        if (!$prospects) {
            return new JsonResponse("Page does not exist", 404);
        } else {
            $data = [
                'id' => $prospects->getId(),
                'email' => $prospects->getEmail(),
         
            ];
            return new JsonResponse($data, Response::HTTP_OK);
        }
    }

    /**
     * @Route("/new", name="prospect_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $prospect = new Prospect();
        $form = $this->createForm(ProspectType::class, $prospect);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
          
            $entityManager->persist($prospect);
            $entityManager->flush();

            return $this->redirectToRoute('prospect_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('prospect/new.html.twig', [
            'prospect' => $prospect,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="prospect_show", methods={"GET"})
     */
    public function show(Prospect $prospect): Response
    {
        return $this->render('prospect/show.html.twig', [
            'prospect' => $prospect,
        ]);
    }

    /**
     * @Route("/api/{id}", name="getProspect")
    */

    public function getProspect($id) : JsonResponse {
    $prospect= $this->getDoctrine()->getRepository(Prospect::class);
    $prospect= $prospect->find($id);
    if (!$prospect) {
    return new JsonResponse("Page does not exist", 404);
    } else {
        $data = [
            'id' => $prospect->getId(),
            'email' => $prospect->getEmail(),
          
        ];
        return new JsonResponse($data, Response::HTTP_OK);
    }
}

    /**
     * @Route("/{id}/edit", name="prospect_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Prospect $prospect, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProspectType::class, $prospect);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('prospect_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('prospect/edit.html.twig', [
            'prospect' => $prospect,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="prospect_delete", methods={"POST"})
     */
    public function delete(Request $request, Prospect $prospect, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$prospect->getId(), $request->request->get('_token'))) {
            $entityManager->remove($prospect);
            $entityManager->flush();
        }

        return $this->redirectToRoute('prospect_index', [], Response::HTTP_SEE_OTHER);
    }
}
