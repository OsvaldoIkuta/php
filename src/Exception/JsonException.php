<?php 
namespace App\Exception;

class JsonException extends Exception
{
    public function mensagem() 
    {
        $mensagem = ['Mensagem' => 'Não é um JSON' ];
        return json_encode($mensagem);
    }
} 

?>