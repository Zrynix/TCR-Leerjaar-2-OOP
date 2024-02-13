<?php
class flower{
    private $color;
    private $name;
}
function __construct($name, $color)
{
$this->color = $color;
$this->name = $name;
}


    

$flower1 = new flower("zonnebloem", "paars-geel");
$flower2 = new flower("paardenbloem", "roze");

var_dump($flower1);
echo("</br>");

var_dump($flower2);
echo("</br>");

$flower1->color = "geel";
var_dump


?>