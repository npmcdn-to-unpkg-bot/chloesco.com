<?php


$essay1 = new Essay;
print_r($essay1->compute());
class Essay {

public $grade;
public $weight;

function compute() {
echo '<pre>';
$total = explode(' ','the total is define by the product of grade by weight<br>');
print_r($total);
echo '</pre>';
    }
}



?>