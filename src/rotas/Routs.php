<?php


use Pecee\SimpleRouter\SimpleRouter;

try{
        SimpleRouter::setDefaultNamespace('Sistema\dev\controller');

        // get
        SimpleRouter::group(['prefix' => 'controle-estoque-10-07-2026/'],  function() {
                     SimpleRouter::get('/' ,'Controlador@index');
                     SimpleRouter::post('/product/create', 'Controlador@create');
        });
        //put 

        //del

        // post


        SimpleRouter::start();
}catch(Exception $e){
    print_r(['error' => $e->getMessage()]);
}