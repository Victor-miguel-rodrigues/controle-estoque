<?php
namespace Sistema\dev\http;

use Sistema\dev\model\ProdutModel;

/*
             nome,categoria,descricao,valor_compra,qtd_atual,preco_venda
*/
class Response
{
    public static function response()
    {
        $json = [];
        $attr = ProdutModel::get();

        foreach ($attr as $att) {
            $json[] = "{ 'id' => $att[id], 'nome' => $att[nome], 'categoria' => $att[categoria], 'descrição' => $att[descricao], 'valor_compra' => $att[valor_compra], 'quantidade atual' => $att[qtd_atual], 'preco_venda' => $att[preco_venda] }";
        }
        return json_encode($json);
    }

    public static function response_delete($id){
         $rest = ProdutModel::delete($id);

          return   "{
                'delete' => true,
                'message' => true,
                'rest' => [$rest]
         }";

    }
}