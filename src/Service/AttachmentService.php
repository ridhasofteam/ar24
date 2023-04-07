<?php

namespace App\Service;
use App\Service\Ar24Client;
use GuzzleHttp\RequestOptions;
use Symfony\Component\HttpFoundation\Request;
use App\Service\SignatureService;
use App\Service\DecryptService;
use App\Enum\Api;
use App\Helper\TranformerHelper;

class AttachmentService 
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


    public function uploadAttachmentByUser($params, $file): array
    {
        $date = $params['date'];
        $signature = $this->signatureService->getSignature($date);
        try {
            $response = $this->ar24Client->getClient()->request(Request::METHOD_POST, Api::ATTACHMENT, [
                    RequestOptions::HEADERS => [
                        'signature' => $signature                
                    ],
                    RequestOptions::MULTIPART => [
                        [
                            'name'     => 'file',
                            'contents' => fopen($file->getPathname(), 'r'),
                        ],
                        [
                            'name'     => 'token',
                            'contents' => $params['token'],
                        ],
                        [
                            'name'     => 'date',
                            'contents' => $params['date'],
                        ],
                        [
                            'name'     => 'id_user',
                            'contents' => $params['id_user'],
                        ],
                    ],
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