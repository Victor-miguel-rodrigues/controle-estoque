<?php

namespace Sistema\dev\model;

use Exception;
use Sistema\dev\configuration\Configure;
use PDOException;

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
        try {
            $dados = array_filter($dados, fn($dado) => $dado != null);
            $stmt = self::$instancia->query("SELECT * FROM   produtos WHERE id = {$id}");
            $stmt->execute();
        } catch (Exception $e) {

        }

        if ($stmt->rowCount() > 0) {
            $db_dados = $stmt->fetchAll(\PDO::FETCH_ASSOC);


            foreach ($db_dados as $dado) {
                if (!empty($dados['nome'])) {
                    if ($dado['nome'] != $dados['nome']) {
                        self::alter_db(self::$instancia, $id, 'nome', $dados['nome']);
                    }
                }
                if (!empty($dados['categoria'])) {
                    if ($dado['categoria'] != $dados['categoria']) {
                        self::alter_db(self::$instancia, $id, 'categoria', $dados['categoria']);
                    }
                }
                if (!empty($dados['descricao'])) {
                    if ($dado['descricao'] != $dados['descricao']) {
                        self::alter_db(self::$instancia, $id, 'descricao', $dados['descricao']);
                    }
                }
                if (!empty($dados['valor'])) {
                    if ($dado['valor_compra'] != $dados['valor']) {
                        self::alter_db(self::$instancia, $id, 'valor_compra', $dados['valor']);
                    }
                }
                if (!empty($dados['qtd_atual'])) {
                    if ($dado['qtd_atual'] != $dados['qtd_atual']) {
                        self::alter_db(self::$instancia, $id, 'qtd_atual', $dados['qtd_atual']);
                    }
                }
                if (!empty($dados['preco'])) {
                    if ($dado['preco_venda'] != $dados['preco']) {
                        self::alter_db(self::$instancia, $id, 'preco_venda', $dados['preco']);
                    }
                }
            }

        } else {
            return http_response_code(400);
        }
    }


    public static function alter_db($instancia, int $id, $dado, $novo_dado)
    {
        try {
            $stmt = $instancia->query("UPDATE  produtos set   $dado = '$novo_dado'    where id = $id ");
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }

    }

}