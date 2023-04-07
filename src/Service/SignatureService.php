<?php 

namespace App\Service;
use Symfony\Component\DependencyInjection\ContainerInterface;

class SignatureService {

    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }


    public function getSignature($date): string 
    {

        $private_key = $this->container->getParameter('private_key');
        $hashed_private_key = hash('sha256', $private_key);
        // Initialization Vector : First 16 bytes of 2 times hashed private key
        $iv = mb_strcut(hash('sha256', $hashed_private_key), 0, 16, 'UTF-8');
        $signature = openssl_encrypt($date, 'aes-256-cbc', $hashed_private_key, false, $iv);

        return $signature;

    }

}