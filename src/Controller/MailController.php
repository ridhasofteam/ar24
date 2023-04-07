<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Service\MailService;

class MailController extends AbstractController
{



    /**
     * @Route("/api/registered_mail_info", name="registeredmailinfo" , methods={"GET"})
     */
    public function getInfomail(Request $request, MailService $mailService): Response
    {

        $token = $request->query->get('token');
        $date = $request->query->get('date');
        $id = $request->query->get('id');

        $response = $mailService->getRegisteredMailInfo($token, $date, $id); 
        return  new JsonResponse($response);
    }

    /**
     * @Route("/api/post_send_simple_registered_mail", name="postregisteredmailinfo", methods={"POST"})
     */
    public function postmail(Request $request, MailService $mailService): Response
    {
        $params = $request->request->all();
       
        $response = $mailService->postSendRegisteredMail($params); 

        return  new JsonResponse($response);
    }
}