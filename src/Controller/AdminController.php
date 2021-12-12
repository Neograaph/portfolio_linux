<?php

namespace App\Controller;

use App\Entity\Work;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin/add/work", name="add-work")
     */
    public function addWork(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createFormBuilder()
            ->add('name', TextType::class)
            ->add('languages', TextType::class)
            ->add('date', TextType::class)
            ->add('description', TextareaType::class) 
            ->add('lien_du_site', TextType::class)
            ->add('lien_du_code', TextType::class)
            ->add('submit', SubmitType::class, ['label' => 'valider'])
            ->getForm()
        ;

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $data = $form->getData();
            
            $work = new Work();
            $work->setName($data['name']);
            $work->setLanguages($data['languages']);
            $work->setDate($data['date']);
            $work->setDescription($data['description']);
            $work->setLinkWeb($data['lien_du_site']);
            $work->setLinkRepo($data['lien_du_code']);

            $em->persist($work);
            $em->flush();

            return $this->redirectToRoute("home");
        }

        return $this->render('admin/addWork.html.twig', [
            'formulaireAddPortfolio' => $form->createView()
        ]);
    }
}
