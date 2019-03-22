<?php 

abstract class Validator
{
    abstract protected function isInt($int);
    abstract protected function isString($string);
    abstract protected function isBool($bool);
    abstract protected function isFloat($float);
}