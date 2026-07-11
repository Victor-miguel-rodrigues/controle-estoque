<?php


use Pecee\SimpleRouter\SimpleRouter;

try{
        SimpleRouter::setDefaultNamespace('Sistema\dev\controller');

        // get
        SimpleRouter::group(['prefix' => 'controle-estoque-10-07-2026/'],  function() {
                     SimpleRouter::get('/' ,'Controlador@index');
                     SimpleRouter::post('/product/create', 'Controlador@create');
                     SimpleRouter::put("/product/{id}/alter", "Controlador@alter_produt")->where([ 'id' => '[0-9]+' ]);
        });
        //put 

        //del

        // post


        SimpleRouter::start();
}catch(Exception $e){
    print_r(['error' => $e->getMessage()]);
}