<?php

/*
метод - функция внутри объекта
свойство - переменная внутри объекта
class - ключевое слово кла

class __пробел___ имя обьекта{

}
- private    $a;     - доступна только внутри этого класса.
- protected $a;     - доступна только внутри и extend
- static    $a;     - независим( пишут вместе с другими)
- abstract  $a;     - просто запомни )
- public    $a;     - доступна за пределы класса



*/

class test {

    private $a = "это private свойство";

    public $b = "это public свойство";

    static public $c = "это static свойство";

    public function d($var)
    {
        return $var;
    }

    public function getA(){
        return $this->a;
    }

}


?>


