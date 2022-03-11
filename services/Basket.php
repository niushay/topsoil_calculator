<?php


namespace Services;


class Basket
{
    public function addToBasket($cost): int
    {
        $totalAmount = 0;

        if(isset($_SESSION["total_amount"])){
            $_SESSION["total_amount"] = $_SESSION["total_amount"] + $cost;
            $totalAmount = $_SESSION["total_amount"];
        }

        return $totalAmount;
    }
}