<?php

namespace App\Controller;

use App\Form\MyForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

class MyFirstController extends AbstractController
{
    private FlashBagInterface $flashBag;

    public function __construct(FlashBagInterface $flashBag)
    {
        $this->flashBag = $flashBag;
    }

    public function myForm(Request $request): Response
    {
        $form = $this->createForm(MyForm::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();

            $this->addFlash('success', 'Hello ' . $formData['firstname'] . ' ' . $formData['lastname'] . '!');

            return $this->redirectToRoute('greeting');
        }

        return $this->render('form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function greeting(): Response
    {
        return $this->render('greeting.html.twig');
    }
}