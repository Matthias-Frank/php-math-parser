<?php

use PHPMathParser\Math;

require_once 'lib/PHPMathParser/Math.php';

$math = new Math();

$math->setDebug(true); //Schaltet den Debug-Mode ein


$answer = $math->evaluate('(2 + 3) * 4');
echo " Das Ergebnis lautet: ".$answer;
// int(20)

$answer = $math->evaluate('1 + 2 * ((3 + 4) * 5 + 6)');
echo " Das Ergebnis lautet: ".$answer;
// int(83)

$answer = $math->evaluate('(1 + 2) * (3 + 4) * (5 + 6)');
echo " Das Ergebnis lautet: ".$answer;
// int(231)

$math->registerVariable('a', 4);
$answer = $math->evaluate('($a + 3) * 4');
echo " Das Ergebnis lautet: ".$answer;
// int(28)

$math->registerVariable('a', 5);
$answer = $math->evaluate('($a + $a) * 4');
echo " Das Ergebnis lautet: ".$answer;
// int(40)

$math->registerVariable('wert',6);
$answer = $math->evaluate('-$wert^2');
echo " Das Ergebnis lautet: ".$answer;

$math->registerVariable('wert',6);
$answer = $math->evaluate('-($wert^2)');
echo " Das Ergebnis lautet: ".$answer;

$math->registerVariable('wert',6);
$answer = $math->evaluate('--3');
echo " Das Ergebnis lautet: ".$answer;

$math->registerVariable('wert',6);
$answer = $math->evaluate('(5)^(-(2))+6');
echo " Das Ergebnis lautet: ".$answer;

$math->registerVariable('a',2);
$math->registerVariable('b',3);
$answer = $math->evaluate('($a+$b*10+(10*4))');
echo " Das Ergebnis lautet: ".$answer;