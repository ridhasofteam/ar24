<?php

namespace App\Helper;


class TranformerHelper 
{
    public static function jsonEncode($data): array 
    {
        return (array) json_decode($data);
    }


    public static function encodage($data): string
    {
        $start = strpos($data, '"result');
        $end = strpos($data, '}');
        $result = '{ "status" : "SUCCESS", ' .substr($data, $start, $end - $start + strlen('}')).'}';

        return $result;
     
    }
        
}