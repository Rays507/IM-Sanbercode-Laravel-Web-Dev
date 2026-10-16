<?php
class animal1
{
    public $name;
    public $legs = 2;
    public $cold_blooded = "no";
    public $yell = "Auooo";

    public function __construct($str)
    {
        $this->name = $str;
    }

}

?>