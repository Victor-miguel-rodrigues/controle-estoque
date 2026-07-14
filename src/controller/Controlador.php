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
        print_r(Response::response());
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
                    break;
                }
                case 401: {
                    echo "Rule mod or admin necessario";
                }
                default: {
                    echo 'erro code http is not a valid';
                    break;
                }
            }
        }

    }


    public function alter_produt(int $id)
    {
        try {
            $body = Request::body();
            $userService = ProdutService::alter_product($body, $id);
            print_r($userService);
        } catch (Exception $e) {
            $http_code = http_response_code();

            switch($http_code){
                   case 400: { echo "Data is not ";}
            }
        }
    }


    public function delet_produt($id){
                try{
                       Response::response_delete($id);
                }catch(Exception $e){
                        echo $e->getMessage();
                }
    }
}
