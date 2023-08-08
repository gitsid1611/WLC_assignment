<?php
// Your code here!
/* 

Burgerking sells three items: 
VegBurger which needs 2 breads & 1 veg pattice
NonVegBurger which needs 2 breads & 1 non-veg pattice
TikkiBurger which needs 2 breads & 1 tikki pattice

Given bread quantity, veg pattice quantity, non-veg pattice quantity, tikki pattice quantity & price of all 3 items

Print the total maximum possible profit by making all possible items based on bread availability 

Also, test for all inputs, we would change all the values while testing, the quantity values as well as price

And program has to be optimal with respect to time & space complexity

*/

$breads = 15;
$vegPattice = 3;
$nonVegPattice = 2;
$TikkiPattice = 1;
$priceVegBurger = 100;
$priceNonVegBurger = 125;
$priceTikkiBurger = 112;

$maxProfit = 0;

function maxProfit($breads, $vegPattice, $nonVegPattice, $TikkiPattice, $priceVegBurger, $priceNonVegBurger, $priceTikkiBurger) {
    $dp = array_fill(0, $breads + 1, array_fill(0, $vegPattice + 1, array_fill(0, $nonVegPattice + 1, array_fill(0, $TikkiPattice + 1, -1))));
    
    return maxProfitHelper($breads, $vegPattice, $nonVegPattice, $TikkiPattice, $priceVegBurger, $priceNonVegBurger, $priceTikkiBurger, $dp);
}

function maxProfitHelper($breads, $vegPattice, $nonVegPattice, $TikkiPattice, $priceVegBurger, $priceNonVegBurger, $priceTikkiBurger, &$dp) {
    if ($breads < 2) {
        return 0;
    }
    
    if ($dp[$breads][$vegPattice][$nonVegPattice][$TikkiPattice] != -1) {
        return $dp[$breads][$vegPattice][$nonVegPattice][$TikkiPattice];
    }
    
    $maxProfit = 0;
    
    if ($vegPattice > 0) {
        $maxProfit = max($maxProfit, $priceVegBurger + maxProfitHelper($breads - 2, $vegPattice - 1, $nonVegPattice, $TikkiPattice, $priceVegBurger, $priceNonVegBurger, $priceTikkiBurger,$dp));
    }
    
    if ($nonVegPattice > 0) {
        $maxProfit = max($maxProfit,$priceNonVegBurger + maxProfitHelper($breads - 2,$vegPattice,$nonVegPattice - 1,$TikkiPattice,$priceVegBurger,$priceNonVegBurger,$priceTikkiBurger,$dp));
    }
    
    if ($TikkiPattice > 0) {
        $maxProfit = max($maxProfit,$priceTikkiBurger + maxProfitHelper($breads - 2,$vegPattice,$nonVegPattice,$TikkiPattice - 1,$priceVegBurger,$priceNonVegBurger,$priceTikkiBurger,$dp));
    }
    
    return ($dp[$breads][$vegPattice][$nonVegPattice][$TikkiPattice] = $maxProfit);
}

echo maxProfit($breads,$vegPattice,$nonVegPattice,$TikkiPattice,$priceVegBurger,$priceNonVegBurger,$priceTikkiBurger);
?>
