<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use App\Repository\UtilisateurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/utilisateur")
 */
class UtilisateurController extends AbstractController
{
    /**
     * @Route("/", name="utilisateur_index", methods={"GET"})
     */
    public function index(UtilisateurRepository $utilisateurRepository): Response
    {
        return $this->render('utilisateur/index.html.twig', [
            'utilisateurs' => $utilisateurRepository->findAll(),
        ]);
    }

    /**
     * @Route("/api", name="getUtilisateurs")
     */

    public function getUtilisateurs() : JsonResponse {
        $utilisateurs= $this->getDoctrine()->getRepository(Utilisateur::class);
        $utilisateurs= $utilisateurs->findAll();
        if (!$utilisateurs) {
            return new JsonResponse("Page does not exist", 404);
        } else {
            $data = [
                'id' => $utilisateurs->getId(),
                'email' => $utilisateurs->getEmail(),
                'roles' => $utilisateurs->getRoles(),
            ];
            return new JsonResponse($data, Response::HTTP_OK);
        }
    }

    /**
     * @Route("/new", name="utilisateur_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $utilisateur = new Utilisateur();
        $form = $this->createForm(UtilisateurType::class, $utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $utilisateur->setPassword(
            $passwordEncoder->encodePassword($utilisateur, $utilisateur->getPassword()));
            $entityManager->persist($utilisateur);
            $entityManager->flush();

            return $this->redirectToRoute('utilisateur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('utilisateur/new.html.twig', [
            'utilisateur' => $utilisateur,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="utilisateur_show", methods={"GET"})
     */
    public function show(Utilisateur $utilisateur): Response
    {
        return $this->render('utilisateur/show.html.twig', [
            'utilisateur' => $utilisateur,
        ]);
    }

    /**
     * @Route("/api/{id}", name="getUtilisateur")
    */

    public function getUtilisateur($id) : JsonResponse {
    $utilisateur= $this->getDoctrine()->getRepository(Utilisateur::class);
    $utilisateur= $utilisateur->find($id);
    if (!$utilisateur) {
    return new JsonResponse("Page does not exist", 404);
    } else {
        $data = [
            'id' => $utilisateur->getId(),
            'email' => $utilisateur->getEmail(),
            'roles' => $utilisateur->getRoles(),
        ];
        return new JsonResponse($data, Response::HTTP_OK);
    }
}

    /**
     * @Route("/{id}/edit", name="utilisateur_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Utilisateur $utilisateur, EntityManagerInterface $entityManager, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $form = $this->createForm(UtilisateurType::class, $utilisateur);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $utilisateur->setPassword(
                $passwordEncoder->encodePassword($utilisateur, $utilisateur->getPassword()));
            $entityManager->flush();

            return $this->redirectToRoute('utilisateur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('utilisateur/edit.html.twig', [
            'utilisateur' => $utilisateur,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="utilisateur_delete", methods={"POST"})
     */
    public function delete(Request $request, Utilisateur $utilisateur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$utilisateur->getId(), $request->request->get('_token'))) {
            $entityManager->remove($utilisateur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('utilisateur_index', [], Response::HTTP_SEE_OTHER);
    }
}
