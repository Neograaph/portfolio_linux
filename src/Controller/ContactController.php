<?php

namespace App\Controller;

use DateTime;
use DateTimeZone;
use App\Entity\User;
use DateTimeImmutable;
use App\Entity\Contact;
use App\Entity\Message;
use App\Form\ContactType;
use App\Form\MessageType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/api/new-contact", name="new-contact")
     */
    public function newContact(Request $request,EntityManagerInterface $em): Response
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
    /**
     * @Route("/api/new-message", name="new-message")
     */
    public function newMessage(Request $request,EntityManagerInterface $em): Response
    {
        $form = $this->createForm(MessageType::class);
        $form->handleRequest($request);

        $requestPayload = file_get_contents("php://input");
        // $requestPayload = '{"dataMessage":{"message":"hello"}}';
        $data = json_decode($requestPayload, true);

        $user = new User();
        $user = $this->getUser();
        
        $msg = new Message;
        $msg->setUser($user);
        $msg->setContent($data['dataMessage']['message']);

        $datetime = new DateTimeImmutable();
        // dd($datetime);
        $msg->setPostAt($datetime);
        // dd($msg);

        $em->persist($msg);
        $em->flush();

        return $this->json($data);
    }
}
