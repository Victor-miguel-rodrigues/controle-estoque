<?php

namespace Sistema\dev\utils;

use Exception;

class Validator
{

    public static function validate(array $fields)
    {

        foreach ($fields as $field => $value) 
        {
            if (empty(trim($value))) 
            {
                http_response_code(400);
                throw new Exception("  {$field} is empty");
            }
        }

        return $fields;
    }
}