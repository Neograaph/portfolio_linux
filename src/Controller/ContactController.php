<?php

namespace App\Controller;

use App\Entity\Contact;
use Requests;
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
    public function index(): Response
    {
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
    /**
     * @Route("/new-msg", name="new-msg")
     */
    public function newMsg(Request $request,EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        $requestPayload = file_get_contents("php://input");
        $data = json_decode($requestPayload, true);

        // dd($dataPlugin);

        $contact = new Contact;
        $contact->setFirstname('maxime');
        $contact->setLastname('gauthier');
        $contact->setEmail('neo@admin.com');
        $contact->setTitle('demotitre');
        $contact->setMessage('Bonjour, je recherche un ...');
        // $contact->setFirstname($data['firstname']);
        // $contact->setLastname($data['lastname']);
        // $contact->setEmail($data['email']);
        // $contact->setTitle($data['title']);
        // $contact->setMessage($data['message']);
        $em->persist($contact);
        $em->flush();


        return $this->json($data);
    }
}
