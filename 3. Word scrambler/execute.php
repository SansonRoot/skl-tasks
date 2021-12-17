<?php

require_once 'StringManipulator.php';

$mani = new StringManipulator();

$word = $_POST['word'];

echo $mani->scrambleString($word);

//echo $mani->scrambleString('hello')."\n";
//echo $mani->scrambleString('according')."\n";
//echo $mani->scrambleString('letter')."\n";
//echo $mani->scrambleString('aoccdrnig')."\n";
