<?php

namespace Sistema\dev\http;

class Request
{

    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function body()
    {

        $corpo = json_decode(file_get_contents('php://input'), true) ?? [];

        $data = match(self::method()){
             'GET' => $_GET,
             'POST','PUT','DELETE' => $corpo
        };

        return  $data;
    }
}