<?php

use Slatch\CollectionsSumComparator\Arithmetic\Sum;
use Slatch\CollectionsSumComparator\Comparator;
use Slatch\CollectionsSumComparator\Comparing\LowerOrEqual;

require_once __DIR__ . '/vendor/autoload.php';

$first = ['суп', 'борщ', 'крем-суп'];
$second = ['каша', 'плов'];
$third = ['компот', 'чай', 'кисель'];

$fPrices = [20, 24, 18];
$sPrices = [8, 9];
$tPrices = [2, 3, 4];

$max = 30;

//

$f = array_combine($first, $fPrices);
$s = array_combine($second, $sPrices);
$t = array_combine($third, $tPrices);

$comparator = new Comparator(new Sum(), new LowerOrEqual());
foreach ($comparator->compareMultiple($max, $f, $s, $t) as $menu) {
    foreach ($menu as $dish => $price) {
        echo $dish . ' ';
    }
    echo array_sum($menu) . PHP_EOL;
}

/////

$max = 29;
foreach ($comparator->compare($max, $f, $s) as $menu) {
    foreach ($menu as $dish => $price) {
        echo $dish . ' ';
    }
    echo array_sum($menu) . PHP_EOL;
}
