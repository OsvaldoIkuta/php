<?php 

namespace App;

class Produto extends Validator
{

    private $descricao;
    private $mt3;
    private $peso;
    private $categoria;
    private $json = [];
    private $erros;

    public function __construct($descricao, $mt3, $peso, $categoria) 
    {
        $this->descricao = $descricao;
        $this->mt3 = $mt3;
        $this->peso = $peso;
        $this->categoria = $categoria;
    }

    public function checarDados()
    {
        $this->json[] = $this->isString($this->descricao, "Descrição");
        $this->json[] = $this->isFloat($this->mt3, "Cubagem");
        $this->json[]= $this->isFloat($this->peso, "Peso");
        $this->json[] = $this->isInt($this->categoria, "Categoria");

        return json_encode($this->json);
    }

    
    protected function isInt($int, $nome)
    {
        if (!is_int($int)){
            //$this->erros += 1 ;
            return ['messagem' => "$nome".' invalido '];
        }else {
            return ["$nome" => "$int"];
        }
    }

    protected function isString($string, $nome)
    {
        if (!is_string( $string)){
            //$this->erros += 1 ;
            return ['messagem' =>  "$nome".' invalido '];
        } else {
            return ["$nome" => "$string"];
        }
    }

    protected function isBool($bool, $nome)
    {
        if (!is_bool($bool)){
            //$this->erros += 1 ;
            return ['messagem' => "$nome".' invalido '];
        }else {
            return ["$nome" => "$bool"];
        }
    } 

    protected function isFloat($float, $nome)
    {
        if (!is_float( $float)) {
            //$this->erros += 1 ;
            return ['messagem' => "$nome".' invalido '];
        }else {
            return ["$nome" => "$float"];
        }
    }

}


abstract class Validator
{
    abstract protected function isInt($int, $nome);
    abstract protected function isString($string, $nome);
    abstract protected function isBool($bool, $nome);
    abstract protected function isFloat($float, $nome);
}