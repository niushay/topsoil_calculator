<?php
namespace Services;

class ConvertUnits
{
    public static function convert($number, $unit)
    {
        $unitMultiply = [
          'yard' => 0.9144,
          'feet' => 0.3048,
          'inch' => 0.0254,
          'centimeter' => 0.01
        ];

        return $number * $unitMultiply[$unit];
    }
}