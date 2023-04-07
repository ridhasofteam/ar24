<?php

namespace App\Controller;

use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Form\UserType;
use App\Entity\User;
class UserController extends AbstractController
{
    /**
     * @Route("/api/user_info", name="userinfo" , methods={"GET"})
     */
    public function getUserInfo(Request $request, UserService $userService): Response
    {
        $token = $request->query->get('token');
        $date = $request->query->get('date');
        $id_user = $request->query->get('id_user');
        $email = $request->query->get('email');
        
        $response = $userService->getUserInfo($token, $date, $id_user, $email); 
        return  new JsonResponse($response);

    }

    /**
     * @Route("/api/user_create", name="usercreate",  methods={"POST"})
     */
    public function createUser(Request $request, UserService $userService): Response
    {
        $param = $request->request->all();
        $form = $this->createForm(UserType::class, new User());
        $form->submit($request->request->all());

        if (false === $form->isValid()) {
            return  new JsonResponse([
                "statut" => "ERROR",
                "message" => "Invalid Data"
            ]);
        }
         $response = $userService->createUser($param); 
         return  new JsonResponse($response);
        
    }

}
