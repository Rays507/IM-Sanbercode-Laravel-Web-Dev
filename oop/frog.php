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

    //fungsi jump untuk memanggil kata2 Hop hop
    public function jump()
    {
        return "Hop hop";
    }

}

?>