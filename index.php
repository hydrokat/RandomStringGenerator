<?php

echo "Testing the randomizer \n";

//Good day! This is Argie Bacani
//This is a randomizer-split script
$time_start = microtime(true);

$length = 128;
$split  = $length/2;

$theRand  = str_random($length);
$theSplit = str_split($theRand, $split);

$file = $theSplit[0];
$create = fopen($file, 'a');
fwrite($create, $theSplit[1]);
fclose($create);

$file = "data.txt";
$create = fopen($file, 'a');
fwrite($create, $theRand . PHP_EOL);
fclose($create);

echo "<pre>";
var_dump($theSplit);
echo "</pre>";

$time_end = microtime(true);
$time = $time_end - $time_start;

echo "Took $time seconds to finish\n";

function str_random($length) {
    $phpVersion = explode('.', PHP_VERSION);

    if($phpVersion[0] >= 7) return random_bytes($length);

    $max = ceil($length / 40);
    $random = '';
    for ($i = 0; $i < $max; $i ++) {
      $random .= sha1(microtime(true).mt_rand(0,99999));
    }

    return substr($random, 0, $length);
}
