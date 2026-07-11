<?php

namespace Sistema\dev\model;

use Exception;
use Sistema\dev\configuration\Configure;

class ProdutModel
{

    public static $instancia;

    public static function get()
    {
        self::$instancia = Configure::getInstancia();
        $sql = 'SELECT * FROM produtos';
        $stmt = self::$instancia->query($sql);

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            return http_response_code(401);
        }
    }

    /**
     * Summary of post
     * @param array $dados - recebe os dados do body
     * @return void
     */
    public static function post(array $dados)
    {
        self::$instancia = Configure::getInstancia();
        try {
            $stmt = self::$instancia->prepare("INSERT into produtos  (nome,categoria,descricao,valor_compra,qtd_atual,preco_venda) values (?,  ?,  ?,  ?,  ?, ?) ");


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

    public static function put(array $dados, $id)
    {
        self::$instancia = Configure::getInstancia();
        try{
            $dados = array_filter($dados, fn($dado) => $dado != null);
            $stmt = self::$instancia->query("SELECT * FROM   produtos WHERE id = {$id}");
            $stmt->execute();
        }catch(Exception $e){
            echo "adasda";
        }

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }else{
             return http_response_code(400);
        }
    }
}