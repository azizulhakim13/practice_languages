<?php
    setcookie("fav_food", "pizza", time() + (86400 * 4), "/");
    setcookie("fav_drink", "Juice", time() + (86400 * 4), "/");
    setcookie("fav_dessert", "Faluda", time() - 0, "/");

    foreach($_COOKIE as $key => $value){
        echo "{$key} = {$value} <br>";
    }

    if(isset($_COOKIE["fav_food"])){
        echo "Buy some {$_COOKIE["fav_food"]} !!!";
    }
    else {
        echo "We don' have any data of you.t";
    }
?>