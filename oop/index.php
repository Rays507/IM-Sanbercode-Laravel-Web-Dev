<?php
require_once("animal.php");
require_once("ape.php");
require_once("frog.php");

$sheep = new animal("shaun");

echo "Name : ".$sheep->name."<br>"; // "shaun"
echo "Legs : ".$sheep->legs."<br>"; // 4
echo "Cold blooded : ".$sheep->cold_blooded."<br>"; // "no"

// NB: Boleh juga menggunakan method get (get_name(), get_legs(), get_cold_blooded())
echo "<br>";

$frog = new animal2("buduk");

echo "Name : ".$frog->name."<br>";
echo "Legs : ".$frog->legs."<br>";
echo "Cold blooded : ".$frog->cold_blooded."<br>";
echo "Jump : ".$frog->jump()."<br>";

echo "<br>";

$ape = new animal1("kera sakti");

echo "Name : ".$ape->name."<br>";
echo "Legs : ".$ape->legs."<br>";
echo "Cold blooded : ".$ape->cold_blooded."<br>";
echo "Yell : ".$ape->yell()."<br>";
?>