<?php
//    $age = 100 ;

//    if($age >= 18) {
//     echo "You can enter the site";
//    }

//    elseif($age == 0) {
//      echo "Please born first";
//    }

//    elseif($age >= 100) {
//      echo "Please prepare for grave";
//    }

//    else {
//     echo "You must grow to enter the site";
//    }

   $hours = 100;
   $rate = 15;
   $weekly_pay = null;

   if($hours <= 0) {
    $weekly_pay = 0;
   }

   elseif($hours <= 40) {
    $weekly_pay = $hours * $rate;
   }

   else {
    $weekly_pay = ($rate * 40) + (($hours - 40) * ($rate * 1.5));
   }

   echo "You made \${$weekly_pay} this week";


?>