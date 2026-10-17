<?php
class animal1
{
    public $name;
    public $legs = 2;
    public $cold_blooded = "no";

    //fungsi me
    public function __construct($str)
    {
        $this->name = $str;
    }

    //fungsi yell untuk memanggil kata2 auoo
    public function yell()
    {
        return "Auooo";
    }

}

?>