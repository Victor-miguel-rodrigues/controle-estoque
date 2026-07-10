<?php

namespace Sistema\dev\configuration;

use Exception;
use PDO;

class Configure
{

    public static $instancia;

    public static function getInstancia(): PDO
    {
        if (self::$instancia !== null) {
            return self::$instancia;
        }


        try {
            self::$instancia = new PDO("mysql:host=$_ENV[DB_HOST];dbname=$_ENV[DB_NAME]", $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_PERSISTENT => PDO::FETCH_OBJ,
                PDO::ATTR_CASE => PDO::CASE_NATURAL
            ]);

            return self::$instancia;
        } catch (Exception $e) {
            echo (string) ['error' => $e->getMessage()];
        }

        return self::$instancia;
    }
}