<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function Contact(ContactRepository $repo): Response
    {
        $contacts=$repo->findAll();

        return $this->render('contact/index.html.twig', [
            'contacts' => $contacts,
        ]);
    }
    /**
         * Permet d'afficher les contacts
         * 
         * @Route("/contact/liste", name="contact_list")
         * 
         * @return Response
         */
        public function liste(ContactRepository $repo): Response
        {
        $contacts=$repo->findAll();

        return $this->render('contact/liste.html.twig', [
            'contacts' => $contacts,
        ]);
    }
    
    /**
     * Permet d'afficher un seul contact
     * 
     * @Route("/contact/{id}", name="contact_show")
     * 
     * @return Response
     */
    public function show(Contact $contact){
        return $this->render('contact/show.html.twig', [
            'contact' => $contact,
        ]);
    }


    /**
     * Permet de créer un contact
     * 
     * @Route("/contact/new", name="contact_create")
     * 
     * @return Response
     */
    public function create(Request $request, EntityManagerInterface $manager){

        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        $this->addFlash(
            'success',
            "Le contact <strong>{$contact->getNom()} {$contact->getPrénom()}</strong> a bien été enregistrée !"
        );

        if($form->isSubmitted() && $form->isValid()){
            
            $manager->persist($contact);
            $manager->flush();
            
        }

        return $this->render('contact/new.html.twig', [
            'form' => $form->createView()
        ]);
    }
}

