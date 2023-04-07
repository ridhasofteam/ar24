<?php

namespace App\Service;
use App\Service\Ar24Client;
use GuzzleHttp\RequestOptions;
use Symfony\Component\HttpFoundation\Request;
use App\Service\SignatureService;
use App\Service\DecryptService;
use App\Enum\Api;
use App\Helper\TranformerHelper;

class MailService 
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

    public function getRegisteredMailInfo($token, $date, $id): array 
    {         
        $date = date($date);
        try {
            $signature = $this->signatureService->getSignature($date);
            $response = $this->ar24Client->getClient()->request(Request::METHOD_GET, Api::MAIL, [
                RequestOptions::QUERY => [
                    'token' => $token,
                    'date' => $date,
                    'id' => $id,
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
            $encode_encrypted_response = TranformerHelper::encodage($encrypted_response);   
            return TranformerHelper::jsonEncode($encode_encrypted_response);
       }
        catch(\Exception $exception) {
            $response = [
                'status'=> 'ERROR',
                'message' => $exception->getMessage()
            ];
            return $response;
        }
    }

    public function postSendRegisteredMail($params): array 
    {         
        $date = date($params['date']);
              
        try {
            $signature = $this->signatureService->getSignature($date);
            $response = $this->ar24Client->getClient()->request(Request::METHOD_POST, Api::MAIL, [
                RequestOptions::FORM_PARAMS => $params,
                RequestOptions::HEADERS => [
                    'signature' => $signature                
                ]
            ]);

            $encrypted_response = $this->decryptService->decrypt($date, (string) $response->getBody());

            if (!$encrypted_response) {
                $response =  TranformerHelper::jsonEncode((string) $response->getBody());
            
                return $response;
            }
            $encode_encrypted_response = TranformerHelper::encodage($encrypted_response);   
            return TranformerHelper::jsonEncode($encode_encrypted_response);
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