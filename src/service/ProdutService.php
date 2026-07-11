<?php
namespace Sistema\dev\service;

use Sistema\dev\model\ProdutModel;
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

            public static function alter_product(array $dados,$id) {
                   

                     $date = [
                        'nome' => $dados['nome']  ?? "",
                        'categoria' => $dados['categoria']  ??  "",
                        'descricao' => $dados['descricao'] ?? "",
                        'valor' => $dados['valor'] ?? "",
                        'qtd_atual' => $dados['qtd_atual'] ?? "",
                        'preco' => $dados['preco'] ?? ""
                     ];

                    return  ProdutModel::put($date,$id);

            }
}