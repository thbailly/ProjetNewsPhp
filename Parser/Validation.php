<?php
/**
 * Created by PhpStorm.
 * User: Thibaut
 * Date: 11/01/2019
 * Time: 14:40
 */

class Validation
{
    public static function validerRSS(string $path):string{
        return ( filter_var($path,FILTER_VALIDATE_URL) );
    }

    public static function sanitizeString(string $string):string{
        return filter_var($string,FILTER_SANITIZE_STRING);
    }
}