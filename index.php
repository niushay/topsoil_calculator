<?php
require __DIR__ . '/vendor/autoload.php';

use Services\Basket;
use Services\Calculation;

session_start();
$url = $_SERVER['REQUEST_URI'];

if($url == '/'){
    require "views/main.php";
}elseif($url == '/calculate'){
    //Requested Inputs
    $measurementUnit = $_POST['measurement_unit'];
    $depthMeasurementUnit = $_POST['depth_unit'];
    $length = $_POST['length'];
    $width = $_POST['width'];

    //Calculate
    $calculation = new Calculation($measurementUnit, $depthMeasurementUnit, $length, $width);
    $bagsCount = $calculation -> calculateBagsNumber();
    $cost = $bagsCount * 72;

    //Total Amount
    $totalAmount = isset($_SESSION["total_amount"]) ? $_SESSION["total_amount"] : 0;

    //Store Total Amount Session
    $_SESSION["total_amount"] = $totalAmount;

    //Render View
    require "views/result.php";
}elseif($url == '/add-to-basket'){
    $basket = new Basket();
    echo ($basket->addToBasket($_POST['cost']));
}

