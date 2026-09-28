<?php

$b = 4 != 4;
$c = 3 + 7 == 10;

echo "Nilai b = ";
var_dump($b);

echo "<br>";

echo "Nilai c = ";
var_dump($c);

echo "<hr>";

$a = ($b and $c);
echo "\$a = ";
var_dump($a);

$a = ($b or $c);
echo "\$a = ";
var_dump($a);

$a = ($b xor $c);
echo "\$a = ";
var_dump($a);

$a = (!$b or $c);
echo "\$a = ";
var_dump($a);

$a = $b && $c;
echo "\$a = ";
var_dump($a);

$a = $b || $c;
echo "\$a = ";
var_dump($a);

?>