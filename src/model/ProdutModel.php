<?php

namespace Sistema\dev\model;

use Exception;
use Sistema\dev\configuration\Configure;

class ProdutModel
{

    public static $instancia;

    /**
     * Summary of post
     * @param array $dados - recebe os dados do body
     * @return void
     */
    public static function post(array $dados)
    {
         self::$instancia = Configure::getInstancia();
        try {
        $stmt = self::$instancia->prepare( "INSERT into produtos  (nome,categoria,descricao,valor_compra,qtd_atual,preco_venda) values (?,  ?,  ?,  ?,  ?, ?) ");


            $stmt->execute([
                $dados['nome'],
                $dados['categoria'],
                $dados['descricao'],
                $dados['valor'],
                $dados['qtd_atual'],
                $dados['preco']
            ]);

            if ($stmt->rowCount() > 0) {
                http_response_code(200);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}