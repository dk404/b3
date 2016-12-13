<?php

class test{
    private $a = "это private св-ва \$a";

    public $b = "это private св-ва \$b";

    static public $c = "это static св-ва \$c";

    public function d($d)
    {
        return $d;
    }

    public function getA()
    {
        return $this->a;
    }

}

?>

