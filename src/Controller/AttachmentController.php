<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\AttachmentService;
use Symfony\Component\HttpFoundation\JsonResponse;

class AttachmentController extends AbstractController
{
    /**
     * @Route("/api/upload_attechment", name="attechment", methods={"POST"})
     */
    public function upload(Request $request, AttachmentService $attachmentService): Response
    {
        $param = $request->request->all();
        
        if (!$request->files->has('file')) {
            throw new BadRequestHttpException("L'attribut 'data' doit contenir un fichier uploadé");
        }
        $file = $request->files->get('file');

        $response = $attachmentService->uploadAttachmentByUser($param, $file); 
        return  new JsonResponse($response);
    }
}