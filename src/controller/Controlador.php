<?php

namespace Sistema\dev\controller;

use Exception;
use Sistema\dev\http\Response;
use Sistema\dev\model\ProdutModel;
use Sistema\dev\service\ProdutService;
use Sistema\dev\http\Request;

class Controlador
{

    public static $produtService;

    public function index()
    {
        echo 'rota index funcionando';
    }


    public function create()
    {
        try {

            $body = Request::body();
            self::$produtService = ProdutService::product($body);
            ProdutModel::post(self::$produtService);

        } catch (Exception $e) {
            $statusCode = http_response_code();

            switch ($statusCode) {
                case 400: {
                    echo 'error  data is empty';
                    print_r(self::$produtService);
                    break;
                }
                case 401: {
                    echo "Rule mod or admin necessario";
                }
                default: {
                    echo 'erro fim';
                    break;
                }
            }
        }


    }

}
