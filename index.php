<?php 
require 'vendor/autoload.php';

header('Content-Type: application/json');

use App\Produto;
use App\Exception\JsonException;
//phpinfo();
$produtosDados = json_decode(file_get_contents('php://input'));



//$um = $json->descricao;
//var_dump($um);



try
{
    if ($produtos == null)
    {
        throw new JsonException;
    }
    else 
    {
        $produto = new Produto($produtosDados->descricao, $produtosDados->mt3, $produtosDados->peso, $produtosDados->categoria);

        $resultado = $produto->checarDados();

        echo $resultado;
    }

}
catch (JsonException $j)
{
    echo $j->mensagem();
} 
finally
{
    $mesagem = ['Mensagem' => 'Erro desconhecido'];
    echo json_encode($mesagem);
}



//var_dump($resultado);

//echo json_encode($json);
?>