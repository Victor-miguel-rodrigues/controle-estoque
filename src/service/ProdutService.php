<?php
namespace Sistema\dev\service;

use Sistema\dev\utils\Validator;

class ProdutService{

            public static function product(array $data){

                     $date = Validator::validate([
                        'nome' => $data['nome'],
                        'categoria' => $data['categoria'],
                        'descricao' => $data['descricao'],
                        'valor' => $data['valor'],
                        'qtd_atual' => $data['qtd_atual'],
                        'preco' => $data['preco']
                     ]);

                     return $date;
            }
}