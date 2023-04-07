<?php 
namespace App\Service;
use Symfony\Component\DependencyInjection\ContainerInterface;

class DecryptService {

    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

     /**
     * decryptage response
     *
     * @param string $date
     * @param string $encrypted_response
     * @return string
     */
    public function decrypt($date, $encrypted_response): string
    {
        $private_key = $this->container->getParameter('private_key');
        $hashed_private_key = hash('sha256', $date.$private_key);            
        $iv = mb_strcut(hash('sha256', $hashed_private_key), 0, 16, 'UTF-8');
        $decrypted_response = openssl_decrypt($encrypted_response, 'aes-256-cbc', $hashed_private_key, false, $iv);
        
        return $decrypted_response;
    }

}