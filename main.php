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


 while($TikkiPattice > 0 && $breads > 1){
     
     $breads=$breads-2;
     
     $TikkiPattice = $TikkiPattice -1;
     $maxProfit=$maxProfit+$priceTikkiBurger;
 }


while($nonVegPattice > 0 && $breads > 1){
    
     $breads = $breads-2;
     
     $nonVegPattice = $nonVegPattice -1;
     
     $maxProfit=$maxProfit+$priceNonVegBurger;
 }
 
 
  while($vegPattice > 0 && $breads > 1){
     $breads = $breads-2;
     $vegPattice = $vegPattice -1;
     
     $maxProfit=$maxProfit+$priceVegBurger;
 }

echo "Maximum Possible Profit is : " . $maxProfit;




?>


