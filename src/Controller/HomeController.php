<?php

namespace App\Controller;

use App\Form\MessageType;
use Swift_Mailer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function indexAction(Request $request, Swift_Mailer $mailer)
    {
        $form = $this->createForm(MessageType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();
            $message = (new \Swift_Message('!!!!!!CUSTOMER!!!!!!'))
                ->setFrom($formData->getSender())
                ->setTo('viktoras.jefimovas@gmail.com')
                ->setBody(
                    $this->renderView(
                        'Emails/request.html.twig',
                        [
                            'sender' => $formData->getSender(),
                            'message' => $formData->getMessage(),
                        ]
                    ),
                    'text/html'
                );
            $mailer->send($message);
            $this->addFlash(
                'success',
                'Žinutė sėkmingai išsiųsta.'
            );
            return $this->redirect($request->getUri());
        }
        return $this->render('base.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }
}