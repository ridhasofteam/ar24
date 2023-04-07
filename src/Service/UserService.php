<?php

namespace App\Service;
use App\Service\Ar24Client;
use GuzzleHttp\RequestOptions;
use Symfony\Component\HttpFoundation\Request;
use App\Service\SignatureService;
use App\Service\DecryptService;
use App\Enum\Api;
use App\Helper\TranformerHelper;

class UserService 
{
    /**
     * @var Ar24Client
     */
    private $ar24Client;

    /**
     * @var SignatureService
     */
    private $signatureService;

     /**
     * @var DecryptService
     */
    private $decryptService;


    public function __construct(Ar24Client $ar24Client, SignatureService $signatureService, DecryptService $decryptService)
    {
        $this->ar24Client = $ar24Client;
        $this->signatureService = $signatureService;
        $this->decryptService = $decryptService;
    }


    public function getUserInfo($token, $date, $id, $email): array 
    {         
        $date = date($date);
        
        $signature = $this->signatureService->getSignature($date);

        try {
            $response = $this->ar24Client->getClient()->request(Request::METHOD_GET, Api::User, [
                RequestOptions::QUERY => [
                    'token' => $token,
                    'date' => $date,
                    'id_user' => $id,
                    'email' => $email
                ],
                RequestOptions::HEADERS => [
                    'signature' => $signature                
                ]
            ]);

            $encrypted_response = $this->decryptService->decrypt($date, (string) $response->getBody());
            if (!$encrypted_response) {
                $response =  TranformerHelper::jsonEncode((string) $response->getBody());
            
                return $response;
            }
             /**********************************************************************  
              avant la correction de la méthode de decryptage dans la documentaion de l'api  
              $encode_encrypted_response = TranformerHelper::encodage($encrypted_response); 
             *************************************************************************/    
            return TranformerHelper::jsonEncode($encrypted_response);
        }
        catch(\Exception $exception) {
            $response = [
                'status'=> 'ERROR',
                'message' => $exception->getMessage()
            ];
            return $response;
        }
        
    }


    public function createUser($params): array
    {
        $date = $params['date'];
        $signature = $this->signatureService->getSignature($date);
        try {
            $response = $this->ar24Client->getClient()->request(Request::METHOD_POST, Api::User, [
                    RequestOptions::HEADERS => [
                        'signature' => $signature                
                    ],
                    RequestOptions::FORM_PARAMS => $params
                ]);

            $encrypted_response = $this->decryptService->decrypt($date, (string) $response->getBody());

            if (!$encrypted_response) {
                    $response =  TranformerHelper::jsonEncode((string) $response->getBody());
                
                    return $response;
            }
            /**********************************************************************  
              avant la correction de la méthode de decryptage dans la documentaion de l'api  
              $encode_encrypted_response = TranformerHelper::encodage($encrypted_response); 
             *************************************************************************/    
            return TranformerHelper::jsonEncode($encrypted_response);
      } 
      catch(\Exception $exception) {
        $response = [
            'status'=> 'ERROR',
            'message' => $exception->getMessage()
        ];

        return $response;
     }
    }

}