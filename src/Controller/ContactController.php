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
     * @Route("/new-msg", name="new-msg")
     */
    public function newMsg(Request $request,EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        $requestPayload = file_get_contents("php://input");
        $data = json_decode($requestPayload, true);
        
        // $test = '{"dataContactJson":"{\"username\":\"\",\"email\":\"\",\"title\":\"sdzqs\",\"message\":\"\"}"}';
        // $test2 = '{"dataContact":{"username":"","email":"","title":"sdzqdsdzsd","message":"qzdsdzqqdsd"}}';
        // $testDecode = json_decode($test, true);
        // $testDecode2 = json_decode($test2, true);

        // $testDecode22 = $testDecode2['dataContact']['username'];       
        // dd($testDecode , $testDecode2 , $testDecode22);

        
        // $contact->setUsername('demoo');
        // $contact->setEmail('neo@admin.com');
        // $contact->setTitle('demotitre');
        // $contact->setMessage('Bonjour, je recherche un ...');
        
        $contact = new Contact;

        $contact->setUsername($data['dataContact']['username']);
        $contact->setEmail($data['dataContact']['email']);
        $contact->setTitle($data['dataContact']['title']);
        $contact->setMessage($data['dataContact']['message']);

        $em->persist($contact);
        $em->flush();


        return $this->json($data);
    }
}
