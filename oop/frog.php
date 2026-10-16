<?php
class animal2
{
    public $name;
    public $legs = 4;
    public $cold_blooded = "no";
    public $jump = "Hop Hop";

    public function __construct($str)
    {
        $this->name = $str;
    }

}

?>