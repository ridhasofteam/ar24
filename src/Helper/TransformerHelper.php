<?php

namespace App\Helper;


class TranformerHelper 
{
    public static function jsonEncode($data): array 
    {
        return (array) json_decode($data);
    }

    /***suite à la mise de la documentation de l'api, cette méthode est unitile */
    public static function encodage($data): string
    {
        $start = strpos($data, '"result');
        $end = strpos($data, '}');
        $result = '{ "status" : "SUCCESS", ' .substr($data, $start, $end - $start + strlen('}')).'}';

        return $result;
     
    }
        
}